<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $serverkey = config('midtrans.serverKey');
        $hashedKey = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverkey);

        if ($hashedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        $transactionStatus = $request->transaction_status;
        $orderId = $request->order_id;
        $transaction = Transaction::where('code', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Setup Twilio
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $twilio = new Client($sid, $token);

        // Buat Pesan (Titik double sudah dibuang)
        $messages =
            "Halo, " . $transaction->name . "!" . PHP_EOL . PHP_EOL .
            "Kami telah menerima pembayaran Anda dengan kode booking: " . $transaction->code . "." . PHP_EOL .
            "Total pembayaran: Rp " . number_format($transaction->total_amount, 0, ',', '.') . PHP_EOL . PHP_EOL .
            "Anda bisa datang ke kos: " . $transaction->boardingHouse->name . PHP_EOL .
            "Alamat: " . $transaction->boardingHouse->address . PHP_EOL .
            "Mulai tanggal: " . date('d-m-Y', strtotime($transaction->start_date)) . PHP_EOL . PHP_EOL .
            "Terima kasih atas kepercayaan Anda! 😊" . PHP_EOL .
            "Kami tunggu kedatangan Anda.";

        switch ($transactionStatus) {
            case 'capture':
                if ($request->payment_type == 'credit_card') {
                    if ($request->fraud_status == 'challenge') {
                        $transaction->update(['payment_status' => 'pending']);
                    } else {
                        $transaction->update(['payment_status' => 'success']);
                        $this->sendWhatsApp($twilio, $transaction, $messages);
                    }
                }
                break;
            case 'settlement':
                $transaction->update(['payment_status' => 'success']);
                $this->sendWhatsApp($twilio, $transaction, $messages);
                break;
            case 'pending':
                $transaction->update(['payment_status' => 'pending']);
                break;
            case 'expire':
                $transaction->update(['payment_status' => 'expired']);
                break;
            case 'deny':
                $transaction->update(['payment_status' => 'failed']);
                break;
            case 'cancel':
                $transaction->update(['payment_status' => 'canceled']);
                break;
            default:
                $transaction->update(['payment_status' => 'unknown']);
                break;
        }

        return response()->json(['message' => 'Callback received Successfully']);
    }

    // Fungsi Helper (Harus di DALAM class, tapi di LUAR function callback)
    private function sendWhatsApp($twilio, $transaction, $messages)
    {
        $recipient = $transaction->phone_number;
        if (str_starts_with($recipient, '0')) {
            $recipient = '62' . substr($recipient, 1);
        }

        try {
            $twilio->messages->create(
                "whatsapp:+" . $recipient,
                [
                    "from" => "whatsapp:+14155238886",
                    "body" => $messages
                ]
            );
        } catch (\Exception $e) {
            Log::error('Twilio Error: ' . $e->getMessage());
        }
    }
}
