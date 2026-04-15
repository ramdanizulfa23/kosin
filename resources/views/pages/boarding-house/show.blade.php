@extends('layout.app')

@section('content')

<div id="Background" class="fixed inset-0 w-full h-full bg-[#F8F9FA] dark:bg-slate-950 transition-colors duration-500 z-0">
    <div class="absolute -top-[10%] -left-[10%] w-[300px] md:w-[800px] h-[300px] md:h-[800px] bg-[#91BF77] rounded-full blur-[80px] md:blur-[120px] opacity-30 dark:opacity-20 transition-opacity"></div>
    <div class="absolute top-[20%] -right-[10%] w-[300px] md:w-[700px] h-[300px] md:h-[700px] bg-[#FF8E3C] rounded-full blur-[80px] md:blur-[120px] opacity-15 dark:opacity-10 transition-opacity"></div>
</div>

<div class="relative flex flex-col w-full min-h-screen z-10 overflow-x-hidden">

    <div id="TopNavAbsolute" class="absolute top-6 md:top-10 inset-x-0 flex items-center justify-between px-5 z-30 w-full max-w-screen-xl mx-auto">
        <a href="{{ route('home') }}" class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center rounded-full bg-black/20 backdrop-blur-xl border border-white/20 shadow-lg active:scale-90 transition-all">
            <img src="{{ asset('assets/images/icons/arrow-left-transparent.svg')}}" class="w-6 h-6 md:w-8 md:h-8" alt="back">
        </a>
        <p class="font-bold text-white drop-shadow-lg text-sm md:text-xl">Details</p>
        <button class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center rounded-full bg-black/20 backdrop-blur-xl border border-white/20 shadow-lg active:scale-90 transition-all">
            <img src="{{asset('assets/images/icons/like.svg')}}" class="w-5 h-5 md:w-6 md:h-6" alt="like">
        </button>
    </div>

    <div id="Gallery" class="swiper-gallery w-full z-0">
        <div class="swiper-wrapper">
            @foreach ($boardingHouse->rooms as $room)
            @foreach ($room->images as $image)
            <div class="swiper-slide !w-full">
                <div class="relative w-full aspect-[3/4] md:aspect-video lg:aspect-[21/9] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/40 z-10"></div>
                    <img src="{{asset('storage/' . $image->image)}}" class="w-full h-full object-cover" alt="gallery">
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>

    <main id="Details" class="relative -mt-12 flex flex-col rounded-t-[45px] pt-10 pb-48 gap-8 bg-white/80 dark:bg-slate-900/90 backdrop-blur-3xl border-t border-white/40 dark:border-white/5 shadow-[-10px_-10px_30px_rgba(0,0,0,0.05)] w-full">

        <div id="Title" class="flex flex-col md:flex-row md:items-center justify-between gap-4 px-6 max-w-screen-xl mx-auto w-full">
            <div class="flex flex-col gap-2">
                <h1 class="font-black text-2xl md:text-5xl text-black dark:text-white leading-tight transition-colors">
                    {{ $boardingHouse->name }}
                </h1>
                <div class="flex items-center gap-2 opacity-60">
                    <img src="{{asset('assets/images/icons/location.svg')}}" class="w-4 h-4 md:w-6 md:h-6 dark:invert" alt="icon">
                    <p class="text-gray-700 dark:text-gray-300 text-xs md:text-xl font-medium">{{ $boardingHouse->address }}</p>
                </div>
            </div>

            @php $averageRating = $boardingHouse->testimonials->avg('rating') ?? 0; @endphp
            <div class="flex items-center gap-3 bg-white dark:bg-slate-800 px-5 py-3 md:px-8 md:py-4 rounded-[25px] border border-gray-100 dark:border-white/10 shadow-xl w-fit">
                <img src="{{ asset('assets/images/icons/star 1.svg') }}" class="w-5 h-5 md:w-8 md:h-8" alt="star">
                <p class="text-base md:text-2xl font-black text-black dark:text-white">
                    {{ number_format($averageRating, 1) }} <span class="text-[10px] md:text-sm font-normal opacity-40">/ 5.0</span>
                </p>
            </div>
        </div>

        <div id="Features" class="grid grid-cols-2 lg:grid-cols-4 gap-4 px-6 max-w-screen-xl mx-auto w-full">
            @php
            $features = [
            ['icon' => '3dcube.svg', 'text' => "In " . $boardingHouse->category->name],
            ['icon' => 'profile-2user.svg', 'text' => $boardingHouse->rooms->count() . " Kamar"],
            ['icon' => 'shield-tick.svg', 'text' => "Privacy 100%"],
            ['icon' => 'location.svg', 'text' => "Elite Area"]
            ];
            @endphp
            @foreach($features as $feature)
            <div class="flex items-center gap-3 p-4 md:p-6 rounded-[30px] bg-white/50 dark:bg-white/5 border border-white/60 dark:border-white/10 shadow-sm">
                <img src="{{asset('assets/images/icons/' . $feature['icon'])}}" class="w-5 h-5 md:w-8 md:h-8 dark:invert opacity-70" alt="icon">
                <p class="text-[11px] md:text-lg font-bold text-gray-800 dark:text-gray-200">{{ $feature['text'] }}</p>
            </div>
            @endforeach
        </div>

        <div id="About" class="flex flex-col gap-3 px-6 max-w-screen-xl mx-auto w-full">
            <h2 class="font-black text-lg md:text-3xl text-black dark:text-white">About</h2>
            <div class="leading-relaxed text-gray-700 dark:text-gray-400 text-xs md:text-xl md:max-w-4xl opacity-80">
                {!! $boardingHouse->description !!}
            </div>
        </div>

        <div id="Tabs" class="swiper-tab w-full overflow-hidden max-w-screen-xl mx-auto">
            <div class="swiper-wrapper px-6 pb-2">
                @php $tabs = ['Bonus-Tab' => 'Bonus Kos', 'Testimonials-Tab' => 'Testimonials', 'Rules-Tab' => 'Rules', 'Contact-Tab' => 'Contact']; @endphp
                @foreach($tabs as $id => $label)
                <div class="swiper-slide !w-fit mr-3">
                    <button class="tab-link rounded-full px-6 md:px-10 py-3 md:py-5 border transition-all duration-300 text-xs md:text-lg font-black
                        {{ $loop->first ? 'active-tab bg-slate-900 text-white border-slate-900' : 'bg-white/40 dark:bg-white/5 text-gray-500 border-white/40 dark:border-white/10' }}"
                        data-target-tab="#{{ $id }}">
                        {{ $label }}
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        <div id="TabsContent" class="px-6 min-h-[250px] max-w-screen-xl mx-auto w-full">
            <div id="Bonus-Tab" class="tab-content flex flex-col gap-4">
                @foreach ($boardingHouse->bonuses as $bonus)
                <div class="flex items-center rounded-[35px] border border-white dark:border-white/10 p-3 pr-5 gap-5 bg-white/60 dark:bg-white/5 shadow-sm hover:translate-x-2 transition-transform">
                    <img src="{{ asset('storage/' . $bonus->image) }}" class="w-20 h-20 md:w-28 md:h-28 shrink-0 rounded-[25px] object-cover shadow-md" alt="bonus">
                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-sm md:text-xl text-black dark:text-white truncate">{{ $bonus->name }}</p>
                        <p class="text-[10px] md:text-base text-gray-500 dark:text-gray-400 line-clamp-2 leading-relaxed">{{ $bonus->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="Testimonials-Tab" class="tab-content hidden flex flex-col gap-5">
                @foreach ($boardingHouse->testimonials as $testimonial)
                <div class="flex flex-col rounded-[35px] border border-white dark:border-white/10 p-6 gap-4 bg-white/60 dark:bg-white/5 backdrop-blur-md shadow-sm">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" class="w-12 h-12 md:w-20 md:h-20 rounded-full border-4 border-white dark:border-slate-800 object-cover shadow-md" alt="user">
                        <div class="flex flex-col">
                            <p class="font-bold text-sm md:text-xl text-black dark:text-white">{{ $testimonial->name }}</p>
                            <p class="text-[10px] md:text-xs text-gray-500 font-medium opacity-60">{{ $testimonial->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <p class="text-xs md:text-lg text-gray-700 dark:text-gray-300 italic leading-relaxed">"{{ $testimonial->content }}"</p>
                    <div class="flex gap-1.5">
                        @for ($i = 0; $i < $testimonial->rating; $i++)
                            <img src="{{asset('assets/images/icons/star 1.svg')}}" class="w-4 h-4 md:w-6 md:h-6" alt="star">
                            @endfor
                    </div>
                </div>
                @endforeach
            </div>

            <div id="Rules-Tab" class="tab-content hidden text-gray-500 text-sm italic p-6">Rules info coming soon...</div>
            <div id="Contact-Tab" class="tab-content hidden text-gray-500 text-sm italic p-6">Contact info coming soon...</div>
        </div>
    </main>

    <div class="fixed bottom-6 inset-x-0 px-5 z-50 max-w-screen-xl mx-auto">
        <div class="w-full flex items-center justify-between rounded-[45px] py-4 md:py-7 px-8 md:px-14 bg-slate-900/95 dark:bg-black backdrop-blur-2xl border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.3)]">
            <div class="flex flex-col">
                <p class="text-white/40 text-[9px] md:text-xs uppercase tracking-[0.2em] font-black">Price/Month</p>
                <p class="text-[#91BF77] font-black text-xl md:text-4xl">
                    Rp {{ number_format($boardingHouse->price, 0, ',', '.') }}
                </p>
            </div>
            <a href="{{ route('kos.rooms', $boardingHouse->slug) }}"
                class="rounded-full py-4 md:py-6 px-8 md:px-16 bg-[#F08C1F] hover:bg-orange-600 font-black text-white text-xs md:text-xl shadow-xl active:scale-95 transition-all">
                Book Now
            </a>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function() {
                const target = this.getAttribute('data-target-tab');

                // 1. Reset Semua Button
                tabLinks.forEach(btn => {
                    btn.classList.remove('active-tab', 'bg-slate-900', 'text-white', 'border-slate-900');
                    btn.classList.add('bg-white/40', 'dark:bg-white/5', 'text-gray-500', 'border-white/40', 'dark:border-white/10');
                });

                // 2. Set Active Button
                this.classList.add('active-tab', 'bg-slate-900', 'text-white', 'border-slate-900');
                this.classList.remove('bg-white/40', 'dark:bg-white/5', 'text-gray-500', 'border-white/40', 'dark:border-white/10');

                // 3. Toggle Content
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                document.querySelector(target).classList.remove('hidden');
            });
        });
    });
</script>
<script src="{{asset('assets/js/details.js')}}"></script>
@endsection