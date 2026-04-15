@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-[#91BF77] rounded-full blur-[80px] md:blur-[120px] opacity-40 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[10%] -right-[10%] w-[250px] md:w-[500px] h-[250px] md:h-[500px] bg-[#FF8E3C] rounded-full blur-[70px] md:blur-[120px] opacity-20 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden">

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[40px] md:mt-[60px] max-w-screen-md mx-auto w-full">
        <a href="{{route('kos.show', $boardingHouse->slug)}}"
            class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shrink-0 rounded-full bg-white/40 dark:bg-white/10 backdrop-blur-md border border-white/50 dark:border-white/10 shadow-sm transition-all active:scale-90">
            <img src="{{asset('assets/images/icons/arrow-left.svg')}}" class="w-6 h-6 md:w-7 md:h-7 dark:invert" alt="icon">
        </a>
        <p class="font-bold text-black dark:text-white transition-colors text-sm md:text-base">Choose Available Room</p>
        <div class="dummy-btn w-10 md:w-12"></div>
    </div>

    <div id="Header" class="relative flex items-center justify-center px-5 mt-6 w-full">
        <div class="flex w-full max-w-screen-md rounded-[30px] border border-white/60 dark:border-white/10 p-3 md:p-4 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-lg shadow-sm">
            <div class="flex w-[100px] h-[110px] md:w-[120px] md:h-[132px] shrink-0 rounded-[25px] bg-white/20 overflow-hidden">
                <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
            </div>
            <div class="flex flex-col justify-center gap-2 w-full min-w-0">
                <h1 class="font-bold text-base md:text-lg text-black dark:text-white leading-tight line-clamp-1 transition-colors">{{ $boardingHouse->name }}</h1>
                <hr class="border-black/5 dark:border-white/10">
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('assets/images/icons/location.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                    <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 truncate">Kota {{ $boardingHouse->city->name }}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('assets/images/icons/3dcube.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                    <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 truncate">{{ $boardingHouse->category->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('booking', $boardingHouse->slug) }}" class="relative flex flex-col gap-4 mt-8 pb-32">
        <input type="hidden" name="boarding_house_id" value="{{ $boardingHouse->id }}">
        <h2 class="font-bold px-5 text-black dark:text-white transition-colors max-w-screen-md mx-auto w-full">Available Rooms</h2>

        <div id="RoomsContainer" class="flex flex-col gap-4 px-5 max-w-screen-md mx-auto w-full">
            @foreach ($boardingHouse->rooms as $room)
            <label class="relative group cursor-pointer">
                <input type="radio" name="room_id" class="absolute top-1/2 left-1/2 -z-10 opacity-0" value="{{ $room->id }}" required>

                <div class="flex rounded-[30px] border border-white/50 dark:border-white/10 p-3 md:p-4 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-md hover:border-[#91BF77] group-has-[:checked]:ring-2 group-has-[:checked]:ring-[#91BF77] group-has-[:checked]:bg-white/60 dark:group-has-[:checked]:bg-white/10 transition-all duration-300">

                    <div class="flex w-[100px] h-[130px] md:w-[120px] md:h-[156px] shrink-0 rounded-[25px] bg-white/20 overflow-hidden">
                        <img src="{{ asset('storage/' . $room->images->first()->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="room image">
                    </div>

                    <div class="flex flex-col justify-center gap-2 md:gap-3 w-full min-w-0">
                        <h3 class="font-bold text-base md:text-lg text-black dark:text-white leading-tight transition-colors">{{ $room->name }}</h3>
                        <hr class="border-black/5 dark:border-white/10">

                        <div class="flex items-center gap-[6px]">
                            <img src="{{asset('assets/images/icons/profile-2user.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 transition-colors">{{ $room->capacity }} People</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <img src="{{asset('assets/images/icons/3dcube.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 transition-colors">{{ $room->square_feet }} sqft flat</p>
                        </div>

                        <hr class="border-black/5 dark:border-white/10">
                        <p class="font-bold text-base md:text-lg text-[#F08C1F]">
                            Rp {{ number_format($room->price, 0, ',', '.') }}<span class="text-xs font-normal text-gray-500 dark:text-gray-400">/bln</span>
                        </p>
                    </div>
                </div>
            </label>
            @endforeach
        </div>

        <div id="BottomButton" class="fixed bottom-6 inset-x-0 px-5 z-40 max-w-screen-md mx-auto">
            <button type="submit"
                class="w-full rounded-full py-4 md:py-5 bg-slate-900 dark:bg-black/90 backdrop-blur-xl border border-white/10 font-bold text-white text-center shadow-2xl hover:bg-black transition-all active:scale-95 shadow-[#91BF77]/10">
                Continue Booking
            </button>
        </div>
    </form>
</div>

@endsection