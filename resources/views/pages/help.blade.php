@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full min-h-screen bg-[#F8F9FA] dark:bg-slate-950 overflow-hidden z-0 transition-colors duration-500">
    <div class="absolute -top-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#91BF77] rounded-full blur-[100px] md:blur-[140px] opacity-40 dark:opacity-20 transition-opacity duration-500"></div>
    <div class="absolute top-[10%] -right-[10%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-[#FF8E3C] rounded-full blur-[90px] md:blur-[120px] opacity-20 dark:opacity-10 transition-opacity duration-500"></div>
    <div class="absolute -bottom-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#81D4FA] rounded-full blur-[100px] md:blur-[140px] opacity-30 dark:opacity-15 transition-opacity duration-500"></div>
</div>

<section class="relative z-10 flex flex-col gap-6 px-5 pt-10 pb-[150px]">

    <div class="flex items-center justify-between">
        <a href="{{ url()->previous() }}" class="flex w-12 h-12 shrink-0 items-center justify-center rounded-full bg-white/60 dark:bg-white/10 backdrop-blur-md border border-white/50 dark:border-white/10 shadow-sm transition-all hover:scale-105">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 19.92L8.48 13.4C7.71 12.63 7.71 11.37 8.48 10.6L15 4.07996" stroke="currentColor" class="text-black dark:text-white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <h1 class="font-bold text-xl md:text-2xl text-black dark:text-white transition-colors">Pusat Bantuan</h1>
        <div class="w-12"></div> {{-- Spacer --}}
    </div>

    <div class="mt-6">
        <h2 class="font-bold text-[32px] leading-tight text-black dark:text-white transition-colors">Butuh Bantuan?</h2>
        <p class="text-gray-700 dark:text-gray-400 transition-colors">Kami siap membantu kendala kosan lu.</p>
    </div>

    <div class="flex flex-col gap-4 mt-2">

        <div class="group flex flex-col rounded-[30px] border border-white/50 dark:border-white/10 p-5 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-lg shadow-sm transition-all duration-300 hover:border-[#91BF77] dark:hover:border-[#91BF77]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#91BF77]/20 flex items-center justify-center text-[#91BF77] transition-transform duration-500 group-hover:scale-110">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-black dark:text-white">Panduan Booking</h3>
            </div>
            <hr class="border-black/5 dark:border-white/10">
            <p class="text-sm text-gray-600 dark:text-gray-400 leading-[24px]">
                Pilih kosan favorit lu, isi data diri dengan benar (terutama nomor WA), lalu selesaikan pembayaran via Midtrans.
            </p>
        </div>

        <div class="group flex flex-col rounded-[30px] border border-white/50 dark:border-white/10 p-5 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-lg shadow-sm transition-all duration-300 hover:border-[#91BF77] dark:hover:border-[#91BF77]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#F08C1F]/20 flex items-center justify-center text-[#F08C1F] transition-transform duration-500 group-hover:scale-110">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-black dark:text-white">Masalah Pembayaran</h3>
            </div>
            <hr class="border-black/5 dark:border-white/10">
            <p class="text-sm text-gray-600 dark:text-gray-400 leading-[24px]">
                Jika pembayaran sudah berhasil tapi status belum berubah, tunggu maksimal 5 menit atau hubungi Admin dengan melampirkan bukti transfer.
            </p>
        </div>

        <div class="group flex flex-col rounded-[30px] border border-white/50 dark:border-white/10 p-5 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-lg shadow-sm transition-all duration-300 hover:border-[#91BF77] dark:hover:border-[#91BF77]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#EB5757]/20 flex items-center justify-center text-[#EB5757] transition-transform duration-500 group-hover:scale-110">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-black dark:text-white">Kebijakan Refund</h3>
            </div>
            <hr class="border-black/5 dark:border-white/10">
            <p class="text-sm text-gray-600 dark:text-gray-400 leading-[24px]">
                Pembatalan H-1 sebelum mulai kos akan dipotong biaya admin 10%.
            </p>
        </div>

        <a href="https://wa.me/628xxxxxxxx" class="group flex items-center justify-between rounded-[35px] p-6 bg-black/80 dark:bg-white/10 backdrop-blur-xl border border-white/10 text-white transition-all hover:scale-[1.02] shadow-2xl">
            <div class="flex flex-col gap-1">
                <h3 class="font-bold text-xl">Masih Bingung?</h3>
                <p class="text-sm text-white/60 group-hover:text-white transition-colors">Tanya langsung ke Admin Kosin</p>
            </div>
            <div class="w-14 h-14 rounded-full bg-[#91BF77] flex items-center justify-center shadow-[0_0_20px_rgba(145,191,119,0.5)] transition-transform duration-500 group-hover:rotate-12">
                <svg width="28" height="28" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
            </div>
        </a>
    </div>
</section>

@include('includes.navigation')
@endsection