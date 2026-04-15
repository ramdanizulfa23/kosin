@extends('layout.app')

@section('content')

<style>
    /* Autofill Adaptif: Biar kotak autofill gak ngerusak desain */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        transition: background-color 5000s ease-in-out 0s;
        -webkit-text-fill-color: inherit !important;
        /* Ikut warna teks asli */
    }

    /* CSS murni dihapus/disederhanakan supaya Tailwind gak kalah telak */
    input {
        background-color: transparent !important;
        -webkit-appearance: none;
        appearance: none;
    }

    /* Placeholder agar pas di kedua mode */
    input::placeholder {
        color: rgba(107, 114, 128, 0.6) !important;
        /* Warna abu-abu (gray-400) */
    }

    .dark input::placeholder {
        color: rgba(255, 255, 255, 0.3) !important;
    }
</style>

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[400px] md:w-[800px] h-[400px] md:h-[800px] bg-[#91BF77] rounded-full blur-[100px] md:blur-[140px] opacity-30 dark:opacity-20 transition-opacity duration-500"></div>
    <div class="absolute top-[20%] -right-[10%] w-[350px] md:w-[700px] h-[350px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[100px] opacity-15 dark:opacity-10 transition-opacity duration-500"></div>
    <div class="absolute bottom-0 left-0 w-[400px] md:w-[800px] h-[400px] md:h-[800px] bg-[#81D4FA] rounded-full blur-[100px] opacity-20 dark:opacity-15 transition-opacity duration-500"></div>
</div>

<div class="relative z-10 flex flex-col min-h-screen">

    <main class="flex flex-col gap-10 pt-[60px] pb-[150px] px-6 max-w-screen-md mx-auto w-full">

        <div class="flex flex-col gap-3 text-center">
            <h1 class="font-black text-3xl md:text-5xl text-black dark:text-white leading-tight transition-colors">
                Check Your<br>Booking Details
            </h1>
            <p class="text-sm md:text-base text-gray-600 dark:text-gray-400">Cari status pesanan anda disini</p>
        </div>

        <form action="{{ route('check-booking.show') }}" method="POST"
            class="flex flex-col rounded-[45px] border border-black/5 dark:border-white/10 p-7 md:p-12 gap-8 bg-white/70 dark:bg-slate-900/40 backdrop-blur-3xl shadow-2xl transition-all">
            @csrf

            <div class="flex flex-col gap-1 ml-2">
                <h2 class="font-black text-xl md:text-2xl text-black dark:text-white">Your Information</h2>
                <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400">Isi sesuai data yang anda isi ketika mendaftar</p>
            </div>

            <div id="InputContainer" class="flex flex-col gap-6">

                <div class="flex flex-col w-full gap-2">
                    <p class="font-bold text-black dark:text-white ml-3 text-sm md:text-base">Booking ID</p>
                    <label class="flex items-center w-full rounded-full p-4 md:p-5 gap-4 bg-black/5 dark:bg-[#1e293b]/50 border transition-all duration-300
                        {{ $errors->has('code') ? 'border-red-500 ring-1 ring-red-500' : 'border-black/10 dark:border-white/10' }} 
                        focus-within:ring-2 focus-within:ring-[#91BF77]">
                        <img src="{{ asset('assets/images/icons/note-favorite.svg') }}" class="w-6 h-6 flex shrink-0 dark:invert opacity-100" alt="icon">
                        <input type="text" name="code" value="{{ old('code') }}" required
                            class="appearance-none outline-none w-full bg-transparent font-black text-black dark:text-white placeholder:text-gray-400 placeholder:font-normal"
                            placeholder="Code Transaction">
                    </label>
                    @error('code')
                    <p class="text-[10px] text-red-500 ml-5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                    <p class="font-bold text-black dark:text-white ml-3 text-sm md:text-base">Email Address</p>
                    <label class="flex items-center w-full rounded-full p-4 md:p-5 gap-4 bg-black/5 dark:bg-[#1e293b]/50 border transition-all duration-300
                        {{ $errors->has('email') ? 'border-red-500 ring-1 ring-red-500' : 'border-black/10 dark:border-white/10' }} 
                        focus-within:ring-2 focus-within:ring-[#91BF77]">
                        <img src="{{ asset('assets/images/icons/sms.svg') }}" class="w-6 h-6 flex shrink-0 dark:invert opacity-70" alt="icon">
                        <input type="email" name="email" required
                            class="appearance-none outline-none w-full bg-transparent font-bold text-black dark:text-white placeholder:text-gray-400 placeholder:font-normal"
                            placeholder="Email Adress">
                    </label>
                    @error('email')
                    <p class="text-[10px] text-red-500 ml-5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                    <p class="font-bold text-black dark:text-white ml-3 text-sm md:text-base">Phone No</p>
                    <label class="flex items-center w-full rounded-full p-4 md:p-5 gap-4 bg-black/5 dark:bg-[#1e293b]/50 border transition-all duration-300
                        {{ $errors->has('phone_number') ? 'border-red-500 ring-1 ring-red-500' : 'border-black/10 dark:border-white/10' }} 
                        focus-within:ring-2 focus-within:ring-[#91BF77]">
                        <img src="{{ asset('assets/images/icons/call.svg') }}" class="w-6 h-6 flex shrink-0 dark:invert opacity-70" alt="icon">
                        <input type="tel" name="phone_number" required
                            class="appearance-none outline-none w-full bg-transparent font-bold text-black dark:text-white placeholder:text-gray-400 placeholder:font-normal"
                            placeholder="Phone Number">
                    </label>
                    @error('phone_number')
                    <p class="text-[10px] text-red-500 ml-5">{{ $message }}</p>
                    @enderror
                </div>

                @if (session('error'))
                <div class="p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-center text-red-500 text-xs font-bold italic">
                    {{ session('error') }}
                </div>
                @endif

                <button type="submit"
                    class="flex w-full justify-center items-center rounded-full py-5 bg-[#F08C1F] hover:bg-orange-600 font-black text-white shadow-xl shadow-orange-500/20 active:scale-95 transition-all mt-4 text-sm md:text-lg uppercase tracking-widest">
                    View My Booking
                </button>
            </div>
        </form>
    </main>

    <div class="fixed bottom-0 inset-x-0 z-50">
        @include('includes.navigation')
    </div>
</div>

@endsection