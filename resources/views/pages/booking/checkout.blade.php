@extends('layout.app')

@section('content')

<style>
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
        -webkit-text-fill-color: #FFFFFF !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    input {
        background-color: transparent !important;
        color: #FFFFFF !important;
    }
</style>

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[300px] md:w-[800px] h-[300px] md:h-[800px] bg-[#91BF77] rounded-full blur-[100px] opacity-30 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[20%] -right-[10%] w-[300px] md:w-[700px] h-[300px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[100px] opacity-15 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden">

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-10 md:mt-16 max-w-screen-md mx-auto w-full">
        <a href="{{route('booking.information', $boardingHouse->slug)}}"
            class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shrink-0 rounded-full bg-white/20 dark:bg-white/10 backdrop-blur-xl border border-white/40 shadow-lg active:scale-90 transition-all">
            <img src="{{asset('assets/images/icons/arrow-left.svg')}}" class="w-6 h-6 md:w-7 md:h-7 dark:invert" alt="icon">
        </a>
        <p class="font-bold text-black dark:text-white text-sm md:text-lg">Checkout Koskos</p>
        <div class="dummy-btn w-10 md:w-12"></div>
    </div>

    <div id="Header" class="relative flex flex-col items-center px-5 mt-6 w-full max-w-screen-md mx-auto gap-4">
        <div class="flex flex-col w-full rounded-[35px] border border-white/60 dark:border-white/10 p-4 md:p-6 gap-5 bg-white/40 dark:bg-white/5 backdrop-blur-3xl shadow-sm">
            <div class="flex gap-4">
                <div class="flex w-24 h-24 md:w-32 md:h-32 shrink-0 rounded-[25px] bg-white/20 overflow-hidden">
                    <img src="{{asset('storage/' . $boardingHouse->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                </div>
                <div class="flex flex-col justify-center gap-2 w-full min-w-0">
                    <p class="font-bold text-base md:text-xl text-black dark:text-white truncate transition-colors">{{ $boardingHouse->name }}</p>
                    <hr class="border-black/5 dark:border-white/10">
                    <div class="flex items-center gap-2">
                        <img src="{{asset('assets/images/icons/location.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400">Kota {{ $boardingHouse->city->name }}</p>
                    </div>
                </div>
            </div>
            <hr class="border-black/5 dark:border-white/10">
            <div class="flex gap-4">
                <div class="flex w-24 h-28 md:w-32 md:h-36 shrink-0 rounded-[25px] bg-white/20 overflow-hidden border border-white/20">
                    <img src="{{ asset('storage/' . $room->images->first()->image) }}" class="w-full h-full object-cover" alt="room image">
                </div>
                <div class="flex flex-col justify-center gap-2 w-full min-w-0">
                    <p class="font-bold text-base md:text-lg text-black dark:text-white">{{ $room->name }}</p>
                    <div class="flex flex-wrap gap-x-3 gap-y-1">
                        <div class="flex items-center gap-1">
                            <img src="{{asset('assets/images/icons/profile-2user.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500">{{ $room->capacity }} People</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <img src="{{asset('assets/images/icons/3dcube.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500">{{ $room->square_feet }} sqft flat</p>
                        </div>
                    </div>
                    <p class="font-bold text-base md:text-lg text-[#F08C1F] mt-1">Rp {{ number_format($room->price, 0, ',', '.') }}<span class="text-xs font-normal text-gray-400">/bln</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-4 mt-6 px-5 max-w-screen-md mx-auto w-full">
        <div class="accordion group flex flex-col rounded-[30px] p-5 bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-white/60 dark:border-white/10 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
            <label class="relative flex items-center justify-between cursor-pointer">
                <p class="font-bold text-black dark:text-white">Customer Information</p>
                <img src="{{asset('assets/images/icons/arrow-up.svg')}}" class="w-7 h-7 dark:invert transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                <input type="checkbox" class="absolute hidden">
            </label>
            <div class="flex flex-col gap-4 pt-6 text-sm">
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Name</p>
                    <p class="font-bold text-black dark:text-white">{{ $transaction['name'] }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Email</p>
                    <p class="font-bold text-black dark:text-white">{{ $transaction['email'] }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Phone</p>
                    <p class="font-bold text-black dark:text-white">{{ $transaction['phone_number'] }}</p>
                </div>
            </div>
        </div>

        <div class="accordion group flex flex-col rounded-[30px] p-5 bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-white/60 dark:border-white/10 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
            <label class="relative flex items-center justify-between cursor-pointer">
                <p class="font-bold text-black dark:text-white">Booking Details</p>
                <img src="{{asset('assets/images/icons/arrow-up.svg')}}" class="w-7 h-7 dark:invert transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                <input type="checkbox" class="absolute hidden">
            </label>
            <div class="flex flex-col gap-4 pt-6 text-sm">
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Duration</p>
                    <p class="font-bold text-black dark:text-white">{{ $transaction['duration']}} Months</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Started At</p>
                    <p class="font-bold text-black dark:text-white">{{ \Carbon\Carbon::parse($transaction['start_date'])->isoFormat ('D MMMM YYYY') }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Ended At</p>
                    <p class="font-bold text-black dark:text-white">{{ \Carbon\Carbon::parse($transaction['start_date'])->addMonths(intval($transaction['duration']))->isoFormat ('D MMMM YYYY') }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('booking.payment', $boardingHouse->slug) }}" method="POST" class="relative flex flex-col gap-6 mt-6 pb-48 max-w-screen-md mx-auto w-full px-5">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <input type="hidden" name="duration" value="{{ $transaction['duration'] }}">
        <input type="hidden" name="start_date" value="{{ $transaction['start_date'] }}">
        <input type="hidden" name="name" value="{{ $transaction['name'] }}">
        <input type="hidden" name="email" value="{{ $transaction['email'] }}">
        <input type="hidden" name="phone_number" value="{{ $transaction['phone_number'] }}">
        <div id="PaymentOptions" class="flex flex-col rounded-[35px] border border-white/60 dark:border-white/10 p-6 md:p-8 gap-6 bg-white/40 dark:bg-white/5 backdrop-blur-3xl shadow-sm">
            <div id="TabButton-Container" class="flex items-center justify-between border-b border-black/5 dark:border-white/10 gap-2 pb-2">
                <label class="tab-link group relative flex-1 flex flex-col items-center gap-3 cursor-pointer" data-target-tab="#DownPayment-Tab">
                    <input type="radio" name="payment_method" value="down_payment" class="absolute hidden" checked>
                    <p class="text-[11px] md:text-sm font-black text-gray-400 group-has-[:checked]:text-[#F08C1F]">Down Payment</p>
                    <div class="h-1 w-full bg-[#F08C1F] scale-x-0 group-has-[:checked]:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </label>
                <label class="tab-link group relative flex-1 flex flex-col items-center gap-3 cursor-pointer" data-target-tab="#FullPayment-Tab">
                    <input type="radio" name="payment_method" value="full_payment" class="absolute hidden">
                    <p class="text-[11px] md:text-sm font-black text-gray-400 group-has-[:checked]:text-[#F08C1F]">Pay in Full</p>
                    <div class="h-1 w-full bg-[#F08C1F] scale-x-0 group-has-[:checked]:scale-x-100 transition-transform duration-300 rounded-full"></div>
                </label>
            </div>

            <div id="TabContent-Container">
                @php
                $subtotal = $room->price * $transaction['duration'];
                $tax = $subtotal * 0.11;
                $insurance = $subtotal * 0.01;
                $total = $subtotal + $tax + $insurance;
                $down_payment = $total * 0.3;
                @endphp

                <div id="DownPayment-Tab" class="tab-content flex flex-col gap-4">
                    <p class="text-[10px] md:text-xs text-gray-500 italic bg-black/5 dark:bg-white/5 p-3 rounded-2xl">Lunasin sisa pembayaran secara cash setelah survey kos ya.</p>
                    <div class="flex flex-col gap-3 text-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500">Sub Total</p>
                            <p class="font-bold text-black dark:text-white">Rp {{number_format($subtotal, 0, ',', '.')}}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500">PPN 11%</p>
                            <p class="font-bold text-black dark:text-white">Rp {{number_format($tax, 0, ',', '.')}}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500">Insurance</p>
                            <p class="font-bold text-black dark:text-white">Rp {{number_format($insurance, 0, ',', '.')}}</p>
                        </div>
                        <hr class="border-black/5 dark:border-white/10">
                        <div class="flex items-center justify-between">
                            <p class="font-black text-black dark:text-white">DP (30%)</p>
                            <p id="downPaymentPrice" class="font-black text-xl text-[#F08C1F]">Rp {{number_format($down_payment, 0, ',', '.')}}</p>
                        </div>
                    </div>
                </div>

                <div id="FullPayment-Tab" class="tab-content flex flex-col gap-4 hidden">
                    <p class="text-[10px] md:text-xs text-gray-500 italic bg-black/5 dark:bg-white/5 p-3 rounded-2xl">Kaga perlu bayar biaya tambahan lagi pas survey nanti.</p>
                    <div class="flex flex-col gap-3 text-sm">
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500">Sub Total</p>
                            <p class="font-bold text-black dark:text-white">Rp {{number_format($subtotal, 0, ',', '.')}}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500">PPN 11%</p>
                            <p class="font-bold text-black dark:text-white">Rp {{number_format($tax, 0, ',', '.')}}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500">Insurance</p>
                            <p class="font-bold text-black dark:text-white">Rp {{number_format($insurance, 0, ',', '.')}}</p>
                        </div>
                        <hr class="border-black/5 dark:border-white/10">
                        <div class="flex items-center justify-between">
                            <p class="font-black text-black dark:text-white">Grand Total</p>
                            <p id="fullPaymentPrice" class="font-black text-xl text-[#F08C1F]">Rp {{number_format($total, 0, ',', '.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="BottomNav" class="fixed bottom-6 inset-x-0 px-5 z-50 max-w-screen-md mx-auto">
            <div class="flex items-center justify-between rounded-[45px] py-5 px-8 bg-slate-900/95 dark:bg-black backdrop-blur-3xl border border-white/10 shadow-2xl">
                <div class="flex flex-col">
                    <p id="price" class="font-black text-xl md:text-2xl text-[#91BF77]"></p>
                    <span class="text-[9px] text-white/40 uppercase tracking-widest font-bold">Grand Total</span>
                </div>
                <button type="submit" class="rounded-full py-4 px-10 bg-[#F08C1F] hover:bg-orange-600 font-black text-white text-sm shadow-lg transition-all active:scale-95">Pay Now</button>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script src="{{asset('assets/js/accodion.js')}}"></script>
<script src="{{asset('assets/js/checkout.js')}}"></script>
@endsection