@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[300px] md:w-[800px] h-[300px] md:h-[800px] bg-[#91BF77] rounded-full blur-[100px] opacity-30 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[20%] -right-[10%] w-[300px] md:w-[700px] h-[300px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[100px] opacity-15 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden max-w-screen-md mx-auto">

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-10 md:mt-16 w-full">
        <a href="{{route('find-kos')}}"
            class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center shrink-0 rounded-full bg-white/20 dark:bg-white/10 backdrop-blur-xl border border-white/40 shadow-lg active:scale-90 transition-all">
            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-6 h-6 md:w-7 md:h-7 dark:invert" alt="icon">
        </a>
        <p class="font-bold text-black dark:text-white text-sm md:text-lg">Browse Kos</p>
        <div class="dummy-btn w-10 md:w-12"></div>
    </div>

    <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-6 w-full">
        <div class="flex flex-col gap-[6px]">
            <h1 class="font-bold text-2xl md:text-[32px] md:leading-[48px] text-black dark:text-white">Kos in {{ $category->name }}</h1>
            <p class="text-sm md:text-base text-gray-600 dark:text-gray-400">Tersedia {{ $boardingHouses->count() }} Kos in {{ $category->name }}</p>
        </div>
        <button class="flex flex-col items-center text-center shrink-0 rounded-[22px] p-[10px_20px] gap-2 bg-white/40 dark:bg-white/5 backdrop-blur-xl border border-white/60 dark:border-white/10 shadow-sm">
            <img src="{{ asset('assets/images/icons/star.svg') }}" class="w-5 h-5" alt="icon">
            <p class="font-bold text-sm text-black dark:text-white">4/5</p>
        </button>
    </div>

    <section id="Result" class="relative flex flex-col gap-4 px-5 mt-6 mb-9 w-full">
        @foreach ($boardingHouses as $boardingHouse)
        <a href="{{ route('kos.show', $boardingHouse->slug) }}" class="card group">
            <div class="flex rounded-[35px] border border-white/60 dark:border-white/10 p-4 md:p-5 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-3xl shadow-sm hover:border-[#91BF77] dark:hover:border-[#91BF77] transition-all duration-300">

                <div class="flex w-[100px] h-[150px] md:w-[120px] md:h-[183px] shrink-0 rounded-[25px] bg-white/20 overflow-hidden border border-white/20">
                    <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                </div>

                <div class="flex flex-col justify-center gap-3 w-full min-w-0">
                    <h3 class="font-bold text-base md:text-lg leading-[24px] md:leading-[27px] line-clamp-2 min-h-[48px] md:min-h-[54px] text-black dark:text-white transition-colors">{{$boardingHouse->name}}</h3>

                    <hr class="border-black/5 dark:border-white/10">

                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/location.svg') }}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                        <p class="text-[12px] md:text-sm text-gray-600 dark:text-gray-400">{{ $boardingHouse->city->name }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-4 h-4 dark:invert opacity-60" alt="icon">
                        <p class="text-[12px] md:text-sm text-gray-500">4 People</p>
                    </div>

                    <hr class="border-black/5 dark:border-white/10">

                    <p class="font-bold text-base md:text-lg text-[#F08C1F]">Rp {{ number_format($boardingHouse->price, 0, ',', '.') }}<span class="text-[10px] md:text-xs font-normal text-gray-400">/bln</span></p>
                </div>
            </div>
        </a>
        @endforeach
    </section>

</div>
@endsection