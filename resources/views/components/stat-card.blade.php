@props([
    'title',
    'value',
    'subtext' => null,
])

<div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
    <!-- Icon Container (Venus circular layout) -->
    <div class="h-14 w-14 rounded-full bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
        {{ $slot }}
    </div>
    
    <!-- Text Details -->
    <div class="flex flex-col">
        <span class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider leading-none mb-1.5">
            {{ $title }}
        </span>
        <span class="text-2xl font-black text-[#1B254B] leading-none mb-1">
            {{ $value }}
        </span>
        @if($subtext)
            <span class="text-[10px] font-bold text-[#A3AED0] leading-none">
                {{ $subtext }}
            </span>
        @endif
    </div>
</div>
