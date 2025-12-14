<div>
    @if($type === 'bar')
        <div
            @class([
                'w-full bg-gray-200 rounded-full overflow-hidden',
                'h-1' => $size === 'sm',
                'h-2.5' => $size === 'md',
                'h-4' => $size === 'lg',
            ])
        >
            <div
                @class([
                    'h-full rounded-full transition-all duration-300',
                    'bg-blue-500' => $color === 'blue',
                    'bg-green-500' => $color === 'green',
                    'bg-red-500' => $color === 'red',
                    'bg-yellow-500' => $color === 'yellow',
                    'bg-purple-500' => $color === 'purple',
                    'bg-stripes' => $striped,
                    'animate-stripes' => $animated,
                ])
                style="width: {{ $this->getPercentage() }}%"
            ></div>
        </div>
        @if($showValue)
            <p class="mt-1 text-sm text-gray-600">{{ number_format($this->getPercentage(), 0) }}%</p>
        @endif
    @elseif($type === 'circle')
        <div class="relative inline-flex items-center justify-center">
            <svg
                @class([
                    'transform -rotate-90',
                    'w-16 h-16' => $size === 'sm',
                    'w-24 h-24' => $size === 'md',
                    'w-32 h-32' => $size === 'lg',
                ])
            >
                <circle
                    cx="50%"
                    cy="50%"
                    r="45%"
                    stroke="currentColor"
                    stroke-width="8"
                    fill="none"
                    class="text-gray-200"
                />
                <circle
                    cx="50%"
                    cy="50%"
                    r="45%"
                    stroke="currentColor"
                    stroke-width="8"
                    fill="none"
                    stroke-linecap="round"
                    stroke-dasharray="{{ 2 * 3.14159 * 45 }}"
                    stroke-dashoffset="{{ 2 * 3.14159 * 45 * (1 - $this->getPercentage() / 100) }}"
                    @class([
                        'text-blue-500' => $color === 'blue',
                        'text-green-500' => $color === 'green',
                        'text-red-500' => $color === 'red',
                        'transition-all duration-300',
                    ])
                />
            </svg>
            @if($showValue)
                <span class="absolute text-lg font-semibold text-gray-700">{{ number_format($this->getPercentage(), 0) }}%</span>
            @endif
        </div>
    @endif
</div>
