@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full min-h-screen bg-[#F8F9FA] dark:bg-slate-950 overflow-hidden z-0 transition-colors duration-500">
    <div class="absolute -top-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#91BF77] rounded-full blur-[100px] md:blur-[140px] opacity-40 dark:opacity-20 transition-opacity duration-500"></div>
    <div class="absolute top-[10%] -right-[10%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-[#FF8E3C] rounded-full blur-[90px] md:blur-[120px] opacity-20 dark:opacity-10 transition-opacity duration-500"></div>
    <div class="absolute -bottom-[10%] -left-[10%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-[#81D4FA] rounded-full blur-[100px] md:blur-[140px] opacity-30 dark:opacity-15 transition-opacity duration-500"></div>
</div>

<div class="relative z-10 flex flex-col gap-[30px] pt-[60px] pb-[150px] px-5">

    <div class="flex flex-col gap-2 text-center">
        <h1 class="font-bold text-[32px] leading-[45px] text-black dark:text-white transition-colors">
            Explore Our<br>Beautiful Kos
        </h1>
        <p class="text-gray-600 dark:text-gray-400 transition-colors">Cari tempat ternyamanmu sekarang</p>
    </div>

    <form action="{{ route('find-kos.result') }}"
        class="flex flex-col rounded-[40px] border border-white/50 dark:border-white/10 p-6 gap-6 bg-white/40 dark:bg-white/5 backdrop-blur-xl shadow-2xl transition-all">

        <div id="InputContainer" class="flex flex-col gap-5">

            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold text-black dark:text-white ml-2">Name</p>
                <label class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white/60 dark:bg-black/20 border border-white/50 dark:border-white/5 focus-within:ring-2 focus-within:ring-[#91BF77] transition-all duration-300">
                    <img src="{{ asset('assets/images/icons/note-favorite.svg') }}" class="w-5 h-5 flex shrink-0 dark:invert opacity-60" alt="icon">
                    <input type="text" name="search"
                        class="appearance-none outline-none w-full bg-transparent font-semibold text-black dark:text-white placeholder:text-gray-400 placeholder:font-normal"
                        placeholder="Type the kos name">
                </label>
            </div>

            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold text-black dark:text-white ml-2">Choose City</p>
                <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white/60 dark:bg-black/20 border border-white/50 dark:border-white/5 focus-within:ring-2 focus-within:ring-[#91BF77] transition-all duration-300 group">
                    <img src="{{ asset('assets/images/icons/location.svg') }}"
                        class="absolute w-5 h-5 flex shrink-0 transform -translate-y-1/2 top-1/2 left-5 dark:invert opacity-60" alt="icon">
                    <select name="city" class="appearance-none outline-none w-full bg-transparent pl-8 text-black dark:text-white font-semibold cursor-pointer">
                        <option value="" hidden class="dark:bg-slate-900">Select city</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->slug }}" class="dark:bg-slate-900">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <img src="{{ asset('assets/images/icons/arrow-down.svg') }}" class="w-5 h-5 dark:invert opacity-60 group-hover:translate-y-1 transition-transform" alt="icon">
                </label>
            </div>

            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold text-black dark:text-white ml-2">Choose Category</p>
                <label class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white/60 dark:bg-black/20 border border-white/50 dark:border-white/5 focus-within:ring-2 focus-within:ring-[#91BF77] transition-all duration-300 group">
                    <img src="{{ asset('assets/images/icons/3dcube.svg') }}"
                        class="absolute w-5 h-5 flex shrink-0 transform -translate-y-1/2 top-1/2 left-5 dark:invert opacity-60" alt="icon">
                    <select name="category" class="appearance-none outline-none w-full bg-transparent pl-8 text-black dark:text-white font-semibold cursor-pointer">
                        <option value="" hidden class="dark:bg-slate-900">Select category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" class="dark:bg-slate-900">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <img src="{{ asset('assets/images/icons/arrow-down.svg') }}" class="w-5 h-5 dark:invert opacity-60 group-hover:translate-y-1 transition-transform" alt="icon">
                </label>
            </div>

            <button type="submit"
                class="flex w-full justify-center items-center rounded-full p-[16px_20px] bg-ngekos-orange hover:bg-orange-600 font-bold text-white shadow-[0_10px_20px_rgba(240,140,31,0.3)] hover:shadow-[0_15px_25px_rgba(240,140,31,0.4)] transform hover:-translate-y-1 transition-all duration-300 mt-2">
                Explore Now
            </button>
        </div>
    </form>

    @include('includes.navigation')
    @endsection