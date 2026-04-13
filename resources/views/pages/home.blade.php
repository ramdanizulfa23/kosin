@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full min-h-screen bg-[#F8F9FA] dark:bg-slate-950 overflow-hidden z-0 transition-colors duration-500">
    <div class="absolute -top-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#91BF77] rounded-full blur-[100px] md:blur-[140px] opacity-40 dark:opacity-20 transition-opacity duration-500"></div>
    <div class="absolute top-[10%] -right-[10%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-[#FF8E3C] rounded-full blur-[90px] md:blur-[120px] opacity-20 dark:opacity-10 transition-opacity duration-500"></div>
    <div class="absolute top-[45%] -right-[15%] w-[350px] md:w-[550px] h-[350px] md:h-[550px] bg-[#91BF77] rounded-full blur-[100px] md:blur-[140px] opacity-30 dark:opacity-15 transition-opacity duration-500"></div>
    <div class="absolute -bottom-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#81D4FA] rounded-full blur-[100px] md:blur-[140px] opacity-30 dark:opacity-15 transition-opacity duration-500"></div>
</div>

<div class="relative z-10 pb-[150px]">

    <div id="TopNav" class="relative z-10 flex items-center justify-between px-5 mt-[60px]">
        <div class="flex flex-col gap-1">
            <p class="text-gray-800 dark:text-gray-300 transition-colors duration-300">Selamat Datang,</p>
            <h1 class="font-bold text-xl leading-[30px] text-black dark:text-white transition-colors duration-300">Temukan Kos Disini</h1>
        </div>

        <button id="theme-toggle" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full bg-white/60 dark:bg-white/10 backdrop-blur-md border border-white/50 dark:border-white/10 shadow-sm transition-all hover:scale-105 cursor-pointer z-50">
            <svg id="theme-toggle-light-icon" class="hidden w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 3.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-3.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 11-1.414-1.414l.708-.708a1 1 0 011.414 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-3.22a1 1 0 01-1.415 0l-.708-.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm3.22-4.22a1 1 0 010-1.415l.708-.708a1 1 0 011.414 1.414l-.708.708a1 1 0 01-1.414 0zM10 5a5 5 0 100 10 5 5 0 000-10z"></path>
            </svg>
            <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
        </button>
    </div>

    <div id="Categories" class="swiper w-full overflow-x-hidden mt-[30px]">
        <div class="swiper-wrapper">
            @foreach ($categories as $category)
            <div class="swiper-slide !w-fit pb-[50px]">
                <a href="{{route('category.show', $category->slug)}}" class="card group">
                    <div class="flex flex-col items-center w-[120px] shrink-0 rounded-[40px] p-4 pb-5 gap-3 bg-white/50 dark:bg-white/10 backdrop-blur-lg border border-white/40 dark:border-white/10 shadow-lg text-center transition-colors duration-300">
                        <div class="w-[70px] h-[70px] rounded-full flex shrink-0 overflow-hidden">
                            <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            <h3 class="font-semibold text-black dark:text-white transition-colors">{{$category->name}}</h3>
                            <p class="text-sm text-ngekos-grey dark:text-gray-400 transition-colors">{{ $category->boardinghouses->count()}} Kos</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <section id="Popular" class="flex flex-col gap-4">
        <div class="flex items-center justify-between px-5">
            <h2 class="font-bold text-xl leading-[30px] text-black dark:text-white transition-colors">Kos Populer</h2>
            <a href="{{route('find-kos')}}">
                <div class="flex items-center gap-2">
                    <span class="text-black dark:text-white transition-colors">See all</span>
                    <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0 dark:invert transition-all" alt="icon">
                </div>
            </a>
        </div>
        <div class="swiper w-full overflow-x-hidden">
            <div class="swiper-wrapper">
                @foreach ($popularBoardingHouses as $boardingHouse)
                <div class="swiper-slide !w-fit">
                    <a href="{{ route('kos.show', $boardingHouse->slug) }}" class="card group">
                        <div class="flex flex-col w-[230px] md:w-[250px] shrink-0 rounded-[24px] md:rounded-[30px] bg-white/40 dark:bg-white/5 backdrop-blur-lg border border-white/50 dark:border-white/10 shadow-sm p-3 md:p-4 pb-4 md:pb-5 gap-2 md:gap-[10px] hover:border-[#91BF77] dark:hover:border-[#91BF77] transition-all duration-300">
                            <div class="flex w-full h-[130px] md:h-[150px] shrink-0 rounded-[18px] md:rounded-[30px] bg-white/20 overflow-hidden">
                                <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-2 md:gap-3">
                                <h3 class="font-semibold text-sm md:text-lg text-black dark:text-white leading-tight md:leading-[1.4] line-clamp-2 min-h-[40px] md:min-h-[54px] transition-colors" title="{{$boardingHouse->name}}">
                                    {{$boardingHouse->name}}
                                </h3>
                                <hr class="border-[#F1F2F6] dark:border-white/10">
                                <div class="flex items-center gap-[6px]">
                                    <img src="{{asset('assets/images/icons/location.svg')}}" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert transition-all" alt="icon">
                                    <p class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 truncate transition-colors">{{ $boardingHouse->city->name }}</p>
                                </div>
                                <div class="flex items-center gap-[6px]">
                                    <img src="{{asset('assets/images/icons/3dcube.svg')}}" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert transition-all" alt="icon">
                                    <p class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 truncate transition-colors">{{ $boardingHouse->category->name}}</p>
                                </div>
                                <div class="flex items-center gap-[6px]">
                                    <img src="{{asset('assets/images/icons/profile-2user.svg')}}" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert transition-all" alt="icon">
                                    <p class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 truncate transition-colors">{{ $boardingHouse->rooms->count() }} Rooms</p>
                                </div>
                                <hr class="border-[#F1F2F6] dark:border-white/10">
                                <p class="font-semibold text-base md:text-lg text-ngekos-orange whitespace-nowrap">
                                    Rp {{ number_format($boardingHouse->price, 0, ',', '.') }}<span class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 font-normal transition-colors">/bln</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="Cities" class="flex flex-col px-5 gap-4 mt-[30px]">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-[30px] leading-[45px] text-black dark:text-white transition-colors">Browse Cities</h2>
        </div>
        <div class="swiper w-full overflow-x-hidden mt-4">
            <div class="swiper-wrapper">
                @foreach ($cities as $city)
                <div class="swiper-slide !w-fit">
                    <a href="{{route('city.show', $city->slug)}}" class="card group">
                        <div class="flex items-center w-fit rounded-[22px] p-[10px] pr-5 gap-3 bg-white/40 dark:bg-white/5 backdrop-blur-md border border-white/50 dark:border-white/10 shadow-sm hover:border-[#91BF77] dark:hover:border-[#91BF77] transition-all duration-300">
                            <div class="w-[55px] h-[55px] flex shrink-0 rounded-full border-4 border-white/50 dark:border-white/10 ring-1 ring-[#F1F2F6] dark:ring-transparent overflow-hidden">
                                <img src="{{ asset('storage/' . $city->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-semibold text-black dark:text-white whitespace-nowrap transition-colors">{{ $city->name }}</h3>
                                <p class="text-sm text-ngekos-grey dark:text-gray-400 whitespace-nowrap transition-colors">{{ number_format($city->boardinghouses->count()) }} Kos</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="Best" class="flex flex-col gap-4 px-5 mt-[50px]">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-[30px] leading-[45px] text-black dark:text-white transition-colors">All Great Kos</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($boardingHouses as $boardingHouse)
            <a href="{{ route('kos.show', $boardingHouse->slug) }}" class="card group">
                <div class="flex rounded-[30px] border border-white/50 dark:border-white/10 bg-white/40 dark:bg-white/5 backdrop-blur-lg shadow-sm p-3 md:p-4 gap-3 md:gap-4 hover:border-[#91BF77] dark:hover:border-[#91BF77] transition-all duration-300">
                    <div class="flex w-[100px] h-[140px] md:w-[120px] md:h-[183px] shrink-0 rounded-[20px] md:rounded-[30px] bg-white/20 overflow-hidden">
                        <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="thumbnail">
                    </div>
                    <div class="flex flex-col justify-center gap-2 md:gap-3 w-full min-w-0">
                        <h3 class="font-semibold text-base md:text-lg text-black dark:text-white leading-tight md:leading-[27px] line-clamp-2 transition-colors">{{$boardingHouse->name}}</h3>
                        <hr class="border-[#F1F2F6] dark:border-white/10">
                        <div class="flex items-center gap-[6px]">
                            <img src="assets/images/icons/location.svg" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert transition-all" alt="icon">
                            <p class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 truncate transition-colors">{{ $boardingHouse->city->name }}</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <img src="assets/images/icons/3dcube.svg" class="w-4 h-4 md:w-5 md:h-5 flex shrink-0 dark:invert transition-all" alt="icon">
                            <p class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 truncate transition-colors">{{ $boardingHouse->category->name}}</p>
                        </div>
                        <hr class="border-[#F1F2F6] dark:border-white/10">
                        <p class="font-semibold text-base md:text-lg text-ngekos-orange whitespace-nowrap">Rp {{ number_format($boardingHouse->price, 0, ',', '.') }}<span class="text-xs md:text-sm text-ngekos-grey dark:text-gray-400 font-normal transition-colors">/bln</span></p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
</div>

@include('includes.navigation')

<script>
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
        document.documentElement.classList.add('dark');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
        document.documentElement.classList.remove('dark');
    }

    const themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    });
</script>

@endsection