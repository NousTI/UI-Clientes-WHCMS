@props([
    'title',
    'value',
    'subtext' => null,
    'illustration' => null,
])

<div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex justify-between items-center transition-all hover:scale-[1.02] duration-200 min-h-[140px] col-span-1">
    <!-- Sección Izquierda: Columna vertical (Arriba: Icono + Título, Abajo: Valor + Subtext) -->
    <div class="flex flex-col justify-between h-full space-y-4">
        <!-- Fila Superior: Icono + Título -->
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                {{ $slot }}
            </div>
            <span class="text-sm font-bold text-[#1B254B] tracking-tight">{{ $title }}</span>
        </div>
        
        <!-- Fila Inferior: Valor + Subtexto -->
        <div class="flex flex-col">
            <span class="text-3xl font-black text-[#1B254B] leading-none mb-1">
                {{ $value }}
            </span>
            @if($subtext)
                <span class="text-[10px] font-bold text-[#A3AED0] leading-none">
                    {{ $subtext }}
                </span>
            @endif
        </div>
    </div>
    
    <!-- Sección Derecha: Ilustración SVG/Imagen Grande Opcional -->
    @if($illustration)
        <div class="w-16 h-16 sm:w-20 sm:h-20 shrink-0 flex items-center justify-center ml-2 select-none">
            <img src="{{ asset($illustration) }}" alt="{{ $title }} Illustration" class="w-full h-full object-contain">
        </div>
    @endif
</div>
