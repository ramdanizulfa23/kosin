<div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
    <nav class="fixed bottom-5 w-full max-w-screen-md left-1/2 -translate-x-1/2 px-5 z-50">
        <div class="grid grid-cols-4 h-fit rounded-[40px] justify-between py-4 px-2 md:px-5 bg-black/70 dark:bg-black/80 backdrop-blur-lg border border-white/20 shadow-2xl">

            @php
            // List menu buat looping biar rapi dan gak typo
            $menus = [
            ['route' => 'home', 'icon' => 'global', 'label' => 'Discover'],
            ['route' => 'check-booking', 'icon' => 'note-favorite', 'label' => 'Orders'],
            ['route' => 'find-kos', 'icon' => 'search-status', 'label' => 'Find'],
            ['route' => 'help', 'icon' => '24-support', 'label' => 'Help'],
            ];
            @endphp

            @foreach($menus as $menu)
            @php
            $isActive = request()->routeIs($menu['route']);
            // Rumus filter buat ngerubah icon PUTIH jadi HIJAU #91BF77
            $greenFilter = "filter: invert(78%) sepia(11%) saturate(1102%) hue-rotate(52deg) brightness(92%) contrast(88%);";
            @endphp

            <a href="{{ route($menu['route']) }}" class="relative flex flex-col items-center text-center gap-1 group pb-2">
                <img src="{{ asset('assets/images/icons/' . $menu['icon'] . '.svg') }}"
                    class="w-7 h-7 md:w-8 md:h-8 flex shrink-0 transition-all duration-300 group-hover:-translate-y-1 
             {{ $isActive ? 'scale-110 opacity-100' : 'opacity-60 group-hover:opacity-100' }}"
                    style="@if($isActive) {{ $greenFilter }} @endif"
                    alt="icon">

                <span class="font-semibold text-xs md:text-sm transition-colors {{ $isActive ? 'text-[#91BF77]' : 'text-white/60 group-hover:text-white' }}">
                    {{ $menu['label'] }}
                </span>

                @if($isActive)
                <div class="absolute bottom-0 w-1.5 h-1.5 rounded-full bg-[#91BF77] shadow-[0_0_10px_2px_rgba(145,191,119,0.8)]"></div>
                @endif
            </a>
            @endforeach

        </div>
    </nav>
</div>