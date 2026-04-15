@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[300px] md:w-[800px] h-[300px] md:h-[800px] bg-[#91BF77] rounded-full blur-[100px] opacity-30 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[20%] -right-[10%] w-[300px] md:w-[700px] h-[300px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[100px] opacity-15 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden">

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-10 md:mt-16 max-w-screen-md mx-auto w-full">
        <a href="{{route('check-booking')}}"
            class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shrink-0 rounded-full bg-white/40 dark:bg-white/10 backdrop-blur-md border border-white/50 dark:border-white/10 shadow-lg active:scale-90 transition-all">
            <img src="{{asset('assets/images/icons/arrow-left.svg')}}" class="w-6 h-6 md:w-7 md:h-7 dark:invert" alt="icon">
        </a>
        <p class="font-bold text-black dark:text-white transition-colors text-sm md:text-lg">My Booking Details</p>
        <div class="dummy-btn w-10 md:w-12"></div>
    </div>

    <div id="Header" class="relative flex flex-col items-center px-5 mt-6 w-full max-w-screen-md mx-auto gap-4">
        <div class="flex flex-col w-full rounded-[35px] border border-white/60 dark:border-white/10 p-4 md:p-6 gap-5 bg-white/40 dark:bg-white/5 backdrop-blur-3xl shadow-sm">
            <div class="flex gap-4">
                <div class="flex w-24 h-24 md:w-32 md:h-32 shrink-0 rounded-[25px] bg-white/20 overflow-hidden border border-white/40">
                    <img src="{{asset('storage/' . $transaction->boardingHouse->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                </div>
                <div class="flex flex-col justify-center gap-1 md:gap-2 w-full min-w-0">
                    <p class="font-bold text-base md:text-xl text-black dark:text-white truncate transition-colors">{{ $transaction->boardingHouse->name }}</p>
                    <hr class="border-black/5 dark:border-white/10">
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center gap-2">
                            <img src="{{asset('assets/images/icons/location.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-sm text-gray-600 dark:text-gray-400">Kota {{ $transaction->boardingHouse->city->name }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{asset('assets/images/icons/buildings.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-sm text-gray-600 dark:text-gray-400">In {{ $transaction->boardingHouse->category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-black/5 dark:border-white/10">

            <div class="flex gap-4">
                <div class="flex w-24 h-28 md:w-32 md:h-36 shrink-0 rounded-[25px] bg-white/20 overflow-hidden border border-white/20">
                    <img src="{{ asset('storage/' . $transaction->room->images->first()->image) }}" class="w-full h-full object-cover" alt="room image">
                </div>
                <div class="flex flex-col justify-center gap-2 w-full min-w-0">
                    <p class="font-bold text-base md:text-lg text-black dark:text-white">{{ $transaction->room->name }}</p>
                    <div class="flex flex-wrap gap-x-4 gap-y-1">
                        <div class="flex items-center gap-1">
                            <img src="{{asset('assets/images/icons/profile-2user.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500">{{ $transaction->room->capacity }} People</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <img src="{{asset('assets/images/icons/3dcube.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500">{{ $transaction->room->square_feet }} sqft flat</p>
                        </div>
                    </div>
                    <p class="font-bold text-sm md:text-base text-[#F08C1F]">Rp {{ number_format($transaction->room->price, 0, ',', '.') }}<span class="text-[10px] font-normal text-gray-400">/bulan</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-4 mt-8 px-5 pb-32 max-w-screen-md mx-auto w-full">

        <div class="accordion group flex flex-col rounded-[30px] p-5 bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-white/60 dark:border-white/10 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
            <label class="relative flex items-center justify-between cursor-pointer">
                <p class="font-bold text-black dark:text-white">Customer Information</p>
                <img src="{{asset('assets/images/icons/arrow-up.svg')}}" class="w-7 h-7 dark:invert transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                <input type="checkbox" class="absolute hidden">
            </label>
            <div class="flex flex-col gap-4 pt-6 text-sm">
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Name</p>
                    <p class="font-bold text-black dark:text-white">{{$transaction->name}}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Email</p>
                    <p class="font-bold text-black dark:text-white">{{$transaction->email}}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Phone</p>
                    <p class="font-bold text-black dark:text-white">{{$transaction->phone_number}}</p>
                </div>
            </div>
        </div>

        <div class="accordion group flex flex-col rounded-[30px] p-5 bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-white/60 dark:border-white/10 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
            <label class="relative flex items-center justify-between cursor-pointer">
                <p class="font-bold text-black dark:text-white">Booking Schedule</p>
                <img src="{{asset('assets/images/icons/arrow-up.svg')}}" class="w-7 h-7 dark:invert transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                <input type="checkbox" class="absolute hidden">
            </label>
            <div class="flex flex-col gap-4 pt-6 text-sm">
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Booking ID</p>
                    <p class="font-black text-[#91BF77]">{{$transaction->code}}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Duration</p>
                    <p class="font-bold text-black dark:text-white">{{$transaction->duration}} Bulan</p>
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

        <div class="accordion group flex flex-col rounded-[30px] p-5 bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-white/60 dark:border-white/10 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
            <label class="relative flex items-center justify-between cursor-pointer">
                <p class="font-bold text-black dark:text-white">Payment Details</p>
                <img src="{{asset('assets/images/icons/arrow-up.svg')}}" class="w-7 h-7 dark:invert transition-all duration-300 group-has-[:checked]:rotate-180" alt="icon">
                <input type="checkbox" class="absolute hidden">
            </label>
            @php
            $subtotal = $transaction->room->price * $transaction->duration;
            $tax = $subtotal * 0.11;
            $insurance = $subtotal * 0.01;
            $total = $subtotal + $tax + $insurance;
            $down_payment = $total * 0.3;
            @endphp
            <div class="flex flex-col gap-4 pt-6 text-sm">
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Method</p>
                    <p class="font-bold text-black dark:text-white">{{ $transaction->payment_method == 'full_payment' ? 'Full Payment 100%' : 'Down Payment 30%' }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Sub Total</p>
                    <p class="font-bold text-black dark:text-white">Rp {{ number_format($subtotal, 0, ',', '.')}}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">PPN 11%</p>
                    <p class="font-bold text-black dark:text-white">Rp {{ number_format($tax, 0, ',', '.')}}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-500">Insurance</p>
                    <p class="font-bold text-black dark:text-white">Rp {{ number_format($insurance, 0, ',', '.')}}</p>
                </div>
                <hr class="border-black/5 dark:border-white/10">
                <div class="flex items-center justify-between">
                    <p class="font-black text-black dark:text-white">Grand Total</p>
                    <p class="font-black text-lg text-[#F08C1F]">Rp {{ number_format($transaction->payment_method == 'full_payment' ? $total : $down_payment, 0, ',', '.')}}</p>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <p class="text-gray-500">Status</p>
                    @if ($transaction->payment_status == 'pending' )
                    <p class="rounded-full px-4 py-1.5 bg-[#F08C1F] font-black text-white text-[10px] tracking-widest shadow-lg shadow-orange-500/20">PENDING</p>
                    @else
                    <p class="rounded-full px-4 py-1.5 bg-[#91BF77] font-black text-white text-[10px] tracking-widest shadow-lg shadow-green-500/20">SUCCESSFUL</p>
                    @endif
                </div>
            </div>
        </div>

        <div id="BottomButton" class="fixed bottom-8 inset-x-0 px-5 z-40 max-w-screen-md mx-auto">
            <a href="{{ route('help') }}"
                class="flex w-full justify-center items-center rounded-full py-4 bg-slate-900/95 dark:bg-black/90 backdrop-blur-xl border border-white/10 font-black text-white text-sm md:text-base shadow-2xl transition-all active:scale-95">
                Contact Customer Service
            </a>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('assets/js/accodion.js')}}"></script>
<script>
    const tabLinks = document.querySelectorAll('.tab-link');
    tabLinks.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-target-tab');
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.querySelector(targetTab).classList.toggle('hidden');
        });
    });
</script>
@endsection