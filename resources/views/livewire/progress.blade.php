@php
$sizes = ['sm' => 'h-1', 'md' => 'h-2', 'lg' => 'h-4', 'xl' => 'h-6'];
$colors = ['blue' => 'bg-blue-600', 'green' => 'bg-green-600', 'red' => 'bg-red-600', 'yellow' => 'bg-yellow-500', 'purple' => 'bg-purple-600', 'gray' => 'bg-gray-600'];
$sizeClass = $sizes[$size] ?? $sizes['md'];
$colorClass = $colors[$color] ?? $colors['blue'];
$percentage = $this->getPercentage();
@endphp

<div class="w-full">
    @if($showLabel)
        <div class="flex justify-between mb-1">
            <span class="text-sm font-medium text-gray-700">{{ $slot ?? '' }}</span>
            <span class="text-sm font-medium text-gray-700">{{ round($percentage) }}%</span>
        </div>
    @endif

    <div class="w-full bg-gray-200 rounded-full {{ $sizeClass }} overflow-hidden">
        <div
            class="{{ $colorClass }} {{ $sizeClass }} rounded-full transition-all duration-300 {{ $striped ? 'bg-stripes' : '' }} {{ $animated ? 'animate-stripes' : '' }}"
            style="width: {{ $percentage }}%"
            role="progressbar"
            aria-valuenow="{{ $value }}"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}"
        ></div>
    </div>

    @if($striped || $animated)
    <style>
    .bg-stripes { background-image: linear-gradient(45deg, rgba(255,255,255,.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,.15) 50%, rgba(255,255,255,.15) 75%, transparent 75%, transparent); background-size: 1rem 1rem; }
    .animate-stripes { animation: stripes 1s linear infinite; }
    @@keyframes stripes { from { background-position: 1rem 0; } to { background-position: 0 0; } }
    </style>
    @endif
</div>
