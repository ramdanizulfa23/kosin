@extends('layout.app')

@section('content')

<style>
    /* Paksa teks input & autofill jadi PUTIH NYALA */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px transparent inset !important;
        -webkit-text-fill-color: #FFFFFF !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    input {
        color: #FFFFFF !important;
        background-color: transparent !important;
    }

    input::placeholder {
        color: rgba(255, 255, 255, 0.4) !important;
    }
</style>

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[300px] md:w-[800px] h-[300px] md:h-[800px] bg-[#91BF77] rounded-full blur-[80px] md:blur-[120px] opacity-30 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[20%] -right-[10%] w-[300px] md:w-[700px] h-[300px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[80px] md:blur-[120px] opacity-15 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden">

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-10 md:mt-16 max-w-screen-md mx-auto w-full">
        <a href="{{route('kos.rooms', $boardingHouse->slug)}}"
            class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shrink-0 rounded-full bg-white/20 dark:bg-white/10 backdrop-blur-xl border border-white/40 shadow-lg active:scale-90 transition-all">
            <img src="{{asset('assets/images/icons/arrow-left.svg')}}" class="w-6 h-6 md:w-7 md:h-7 dark:invert" alt="icon">
        </a>
        <p class="font-bold text-black dark:text-white transition-colors text-sm md:text-lg">Customer Information</p>
        <div class="dummy-btn w-10 md:w-12"></div>
    </div>

    <div id="Header" class="relative flex flex-col items-center px-5 mt-6 w-full max-w-screen-md mx-auto gap-4">
        <div class="flex flex-col w-full rounded-[35px] border border-white/60 dark:border-white/10 p-4 md:p-6 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-3xl shadow-sm">
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
                    <p class="font-bold text-base md:text-lg text-black dark:text-white transition-colors">{{ $room->name }}</p>
                    <div class="flex flex-wrap gap-x-4 gap-y-1">
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

    <form action="{{ route('booking.information.save', $boardingHouse->slug) }}" method="POST" class="relative flex flex-col gap-6 mt-8 pb-48 w-full max-w-screen-md mx-auto">
        @csrf
        <input type="hidden" name="room_id" value="{{ request()->query('room_id') ?? $data['room_id'] ?? '' }}">

        <div class="flex flex-col gap-1 px-6">
            <h2 class="font-bold text-lg md:text-xl text-black dark:text-white">Your Personal Data</h2>
            <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400">Pastiin data lu bener ya brok biar admin gampang verifikasi.</p>
        </div>

        <div id="InputContainer" class="flex flex-col gap-5 px-6">
            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold text-black dark:text-white text-sm md:text-base ml-2">Complete Name</p>
                <label class="flex items-center w-full rounded-full p-4 gap-4 bg-white/10 dark:bg-white/5 border transition-all duration-300
                    {{ $errors->has('name') ? 'border-red-500 ring-1 ring-red-500' : 'border-white/50 dark:border-white/10' }} 
                    focus-within:ring-2 focus-within:ring-[#91BF77]">
                    <img src="{{asset('assets/images/icons/profile-2user.svg')}}" class="w-5 h-5 flex shrink-0 dark:invert opacity-60" alt="icon">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="appearance-none outline-none w-full bg-transparent font-bold text-sm md:text-base text-white placeholder:text-gray-400"
                        placeholder="Write your full name">
                </label>
                @error('name') <p class="text-[10px] text-red-500 ml-4">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold text-black dark:text-white text-sm md:text-base ml-2">Email Address</p>
                <label class="flex items-center w-full rounded-full p-4 gap-4 bg-white/10 dark:bg-white/5 border transition-all duration-300
                    {{ $errors->has('email') ? 'border-red-500 ring-1 ring-red-500' : 'border-white/50 dark:border-white/10' }} 
                    focus-within:ring-2 focus-within:ring-[#91BF77]">
                    <img src="{{asset('assets/images/icons/sms.svg')}}" class="w-5 h-5 flex shrink-0 dark:invert opacity-60" alt="icon">
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="appearance-none outline-none w-full bg-transparent font-bold text-sm md:text-base text-white placeholder:text-gray-400"
                        placeholder="Write your email">
                </label>
                @error('email') <p class="text-[10px] text-red-500 ml-4">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold text-black dark:text-white text-sm md:text-base ml-2">Phone No</p>
                <label class="flex items-center w-full rounded-full p-4 gap-4 bg-white/10 dark:bg-white/5 border transition-all duration-300
                    {{ $errors->has('phone_number') ? 'border-red-500 ring-1 ring-red-500' : 'border-white/50 dark:border-white/10' }} 
                    focus-within:ring-2 focus-within:ring-[#91BF77]">
                    <img src="{{asset('assets/images/icons/call.svg')}}" class="w-5 h-5 flex shrink-0 dark:invert opacity-60" alt="icon">
                    <input type="tel" name="phone_number" value="{{ old('phone_number') ?? old('phone') }}"
                        class="appearance-none outline-none w-full bg-transparent font-bold text-sm md:text-base text-white placeholder:text-gray-400"
                        placeholder="Write your phone number">
                </label>
                @error('phone_number') <p class="text-[10px] text-red-500 ml-4">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between p-5 rounded-[30px] bg-white/10 dark:bg-white/5 border border-white/40 dark:border-white/10 backdrop-blur-xl">
                <p class="font-bold text-black dark:text-white text-sm md:text-base">Duration (Month)</p>
                <div class="flex items-center gap-5">
                    <button type="button" id="Minus" class="w-10 h-10 flex shrink-0 active:scale-90 transition-transform">
                        <img src="{{asset('assets/images/icons/minus.svg')}}" class="dark:invert" alt="minus">
                    </button>
                    <input id="Duration" type="text" value="1" name="duration" readonly
                        class="appearance-none outline-none bg-transparent w-8 text-center font-black text-xl text-white">
                    <button type="button" id="Plus" class="w-10 h-10 flex shrink-0 active:scale-90 transition-transform">
                        <img src="{{asset('assets/images/icons/plus.svg')}}" class="dark:invert" alt="plus">
                    </button>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <p class="font-bold text-black dark:text-white text-sm md:text-base ml-2">Moving Date</p>
                <div class="swiper w-full overflow-hidden">
                    <div class="swiper-wrapper select-dates pb-2"></div>
                </div>
            </div>
        </div>

        <div id="BottomNav" class="fixed bottom-6 inset-x-0 px-5 z-50 max-w-screen-md mx-auto">
            <div class="flex items-center justify-between rounded-[45px] py-5 px-8 bg-slate-900/95 dark:bg-black backdrop-blur-2xl border border-white/10 shadow-2xl">
                <div class="flex flex-col">
                    <p id="price" class="font-black text-xl md:text-2xl text-[#91BF77]">
                        Rp {{ number_format($room->price, 0, ',', '.') }}
                    </p>
                    <span class="text-[9px] text-white/40 uppercase tracking-widest font-bold">Grand Total</span>
                </div>
                <button type="submit"
                    class="rounded-full py-4 px-10 bg-[#F08C1F] hover:bg-orange-600 font-black text-white text-sm md:text-base shadow-lg transition-all active:scale-95">
                    Book Now
                </button>
            </div>
        </div>
    </form>
</div>

<input type="hidden" id="defaultPriceInput" value="{{ $room->price }}">
@endsection

@section('scripts')
<script src="{{asset('assets/js/cust-info.js')}}"></script>
@endsection