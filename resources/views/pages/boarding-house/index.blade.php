@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full min-h-screen bg-[#F8F9FA] dark:bg-slate-950 overflow-hidden z-0 transition-colors duration-500">
    <div class="absolute -top-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#91BF77] rounded-full blur-[100px] md:blur-[140px] opacity-40 dark:opacity-20 transition-opacity duration-500"></div>
    <div class="absolute top-[10%] -right-[10%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-[#FF8E3C] rounded-full blur-[90px] md:blur-[120px] opacity-20 dark:opacity-10 transition-opacity duration-500"></div>
    <div class="absolute -bottom-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#81D4FA] rounded-full blur-[100px] md:blur-[140px] opacity-30 dark:opacity-15 transition-opacity duration-500"></div>
</div>

<div class="relative z-10 pb-[150px]">
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="{{route('find-kos')}}" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full bg-white/60 dark:bg-white/10 backdrop-blur-md border border-white/50 dark:border-white/10 shadow-sm transition-all hover:scale-110">
            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px] dark:invert" alt="icon">
        </a>
        <p class="font-bold text-lg text-black dark:text-white">Search Results</p>
        <div class="dummy-btn w-12"></div>
    </div>

    <div id="Header" class="relative flex flex-col gap-1 px-5 mt-8">
        <h1 class="font-bold text-[32px] leading-tight text-black dark:text-white">Kos Terdekat</h1>
        <p class="text-gray-600 dark:text-gray-400">Tersedia <span class="font-bold text-[#91BF77]">{{ $boardingHouses->count() }}</span> kosan untukmu</p>
    </div>

    <section id="Result" class="relative flex flex-col gap-4 px-5 mt-6">
        @forelse($boardingHouses as $house)
        <a href="{{ route('kos.show', $house->slug) }}" class="card group">
            <div class="flex rounded-[30px] border border-white/50 dark:border-white/10 p-3 md:p-4 gap-4 bg-white/40 dark:bg-white/5 backdrop-blur-lg shadow-sm hover:border-[#91BF77] dark:hover:border-[#91BF77] transition-all duration-300">

                <div class="flex w-[110px] h-[160px] md:w-[130px] md:h-[180px] shrink-0 rounded-[25px] bg-white/20 overflow-hidden">
                    <img src="{{ asset('storage/' . $house->thumbnail) }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="thumbnail">
                </div>

                <div class="flex flex-col justify-center gap-2 w-full min-w-0">
                    <h3 class="font-semibold text-base md:text-lg text-black dark:text-white leading-tight line-clamp-2 min-h-[40px] md:min-h-[54px] transition-colors" title="{{ $house->name }}">
                        {{ $house->name }}
                    </h3>

                    <hr class="border-black/5 dark:border-white/10">

                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/location.svg') }}" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert" alt="icon">
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 truncate">{{ $house->city->name }}</p>
                    </div>

                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert" alt="icon">
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 truncate">{{ $house->category->name }}</p>
                    </div>

                    <hr class="border-black/5 dark:border-white/10">

                    <p class="font-bold text-base md:text-xl text-ngekos-orange whitespace-nowrap">
                        Rp {{ number_format($house->price, 0, ',', '.') }}<span class="text-xs md:text-sm text-gray-500 font-normal">/bln</span>
                    </p>
                </div>
            </div>
        </a>
        @empty
        <div class="flex flex-col items-center justify-center p-10 rounded-[40px] border border-dashed border-white/40 dark:border-white/10 bg-white/20 dark:bg-white/5 backdrop-blur-md mt-10">
            <div class="w-20 h-20 bg-gray-200 dark:bg-white/10 rounded-full flex items-center justify-center mb-4">
                <i class="fa-solid fa-magnifying-glass text-2xl text-gray-400"></i>
            </div>
            <p class="text-gray-600 dark:text-gray-400 text-center font-medium">Wah, kosan yang lu cari belum ada di kota atau kategori ini, brok.</p>
            <a href="{{ route('find-kos') }}" class="mt-4 text-[#91BF77] font-bold hover:underline">Coba cari yang lain yuk!</a>
        </div>
        @endforelse
    </section>
</div>

@include('includes.navigation')

@endsection