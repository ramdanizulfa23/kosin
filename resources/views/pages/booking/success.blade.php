@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[400px] md:w-[800px] h-[400px] md:h-[800px] bg-[#91BF77] rounded-full blur-[100px] opacity-40 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[20%] -right-[10%] w-[350px] md:w-[700px] h-[350px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[100px] opacity-20 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden">

    <div class="relative flex flex-col gap-8 my-12 md:my-16 px-5 max-w-screen-md mx-auto w-full">

        <div class="flex flex-col gap-2 text-center">
            <h1 class="font-black text-2xl md:text-5xl text-black dark:text-white leading-tight transition-colors">
                Booking Successful<br>
                <span class="text-[#91BF77]">Congratulations!</span>
            </h1>
            <p class="text-[10px] md:text-sm text-gray-500 dark:text-gray-400">Kos telah di booking, kami tunggu kehadirannya.</p>
        </div>

        <div id="Header" class="relative flex flex-col w-full rounded-[40px] border border-white/60 dark:border-white/10 p-5 md:p-8 gap-6 bg-white/40 dark:bg-white/5 backdrop-blur-3xl shadow-2xl">

            <div class="flex gap-4">
                <div class="flex w-24 h-24 md:w-32 md:h-32 shrink-0 rounded-[30px] bg-white/20 overflow-hidden border border-white/40">
                    <img src="{{asset('storage/' . $transaction->boardingHouse->thumbnail)}}" class="w-full h-full object-cover" alt="house">
                </div>
                <div class="flex flex-col justify-center gap-2 w-full min-w-0">
                    <p class="font-bold text-base md:text-2xl text-black dark:text-white truncate transition-colors">{{$transaction->boardingHouse->name}}</p>
                    <hr class="border-black/5 dark:border-white/10">
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center gap-2">
                            <img src="{{asset('assets/images/icons/location.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-sm text-gray-600 dark:text-gray-400 truncate">Kota {{$transaction->boardingHouse->city->name}}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{asset('assets/images/icons/buildings.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-sm text-gray-600 dark:text-gray-400 truncate">In {{$transaction->boardingHouse->category->name}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-black/5 dark:border-white/10">

            <div class="flex gap-4">
                <div class="flex w-24 h-32 md:w-32 md:h-40 shrink-0 rounded-[30px] bg-white/20 overflow-hidden border border-white/40">
                    <img src="{{asset('storage/' . $transaction->room->images->first()->image)}}" class="w-full h-full object-cover" alt="room">
                </div>
                <div class="flex flex-col justify-center gap-3 w-full min-w-0">
                    <p class="font-bold text-base md:text-lg text-black dark:text-white">{{$transaction->room->name}}</p>
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-2">
                            <img src="{{asset('assets/images/icons/profile-2user.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500">{{$transaction->room->capacity}} People</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <img src="{{asset('assets/images/icons/3dcube.svg')}}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500">{{$transaction->room->square_feet}} sqft flat</p>
                        </div>
                        <div class="flex items-start gap-2">
                            <img src="{{asset('assets/images/icons/calendar.svg')}}" class="w-4 h-4 md:w-5 md:h-5 dark:invert opacity-60 mt-0.5" alt="icon">
                            <p class="text-[10px] md:text-xs text-gray-500 font-bold leading-relaxed">
                                {{\Carbon\Carbon::parse($transaction->start_date)->isoFormat('D MMM YYYY')}} - <br class="md:hidden">
                                {{\Carbon\Carbon::parse($transaction->start_date)->addMonths($transaction->duration)->isoFormat('D MMM YYYY')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <p class="font-bold text-black dark:text-white ml-2 text-xs md:text-base">Your Booking ID</p>
            <div class="flex items-center justify-between rounded-full p-4 md:p-5 gap-3 bg-white/60 dark:bg-white/5 border border-white dark:border-white/10 backdrop-blur-md shadow-sm">
                <div class="flex items-center gap-3">
                    <img src="{{asset('assets/images/icons/note-favorite-green.svg')}}" class="w-6 h-6 flex shrink-0" alt="icon">
                    <p class="font-black text-lg md:text-xl text-[#91BF77] tracking-wider">{{$transaction->code}}</p>
                </div>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest hidden md:block">Verified Transaction</p>
            </div>
        </div>

        <div class="flex flex-col gap-4 mt-4">
            <a href="{{route('home')}}"
                class="w-full rounded-full py-4 md:py-5 text-center font-black text-white bg-[#F08C1F] hover:bg-orange-600 shadow-lg shadow-orange-500/20 transition-all active:scale-95 text-xs md:text-base">
                Explore Other Kos
            </a>

            <form action="{{route('check-booking.show')}}" method="POST" class="w-full">
                @csrf
                <input type="hidden" name="code" value="{{$transaction->code}}">
                <input type="hidden" name="email" value="{{$transaction->email}}">
                <input type="hidden" name="phone_number" value="{{$transaction->phone_number}}">

                <button type="submit"
                    class="w-full rounded-full py-4 md:py-5 text-center font-black text-white bg-slate-900 dark:bg-black/80 backdrop-blur-xl border border-white/10 hover:bg-black transition-all active:scale-95 text-xs md:text-base">
                    Check Your Booking
                </button>
            </form>
        </div>
    </div>
</div>

@endsection