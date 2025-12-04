@props(['title', 'value', 'icon', 'iconBg' => 'bg-blue-100', 'iconColor' => 'text-blue-600', 'trend' => null, 'trendUp' => true])

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
    <div class="flex items-start justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-600 mb-2">{{ $title }}</p>
            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-bold text-gray-900">{{ $value }}</h3>
                @if($trend)
                    <span class="inline-flex items-center gap-1 text-xs font-medium {{ $trendUp ? 'text-green-600' : 'text-red-600' }}">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($trendUp)
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                            @endif
                        </svg>
                        {{ $trend }}
                    </span>
                @endif
            </div>
        </div>
        
        <div class="flex items-center justify-center w-12 h-12 {{ $iconBg }} {{ $iconColor }} rounded-xl">
            {!! $icon !!}
        </div>
    </div>
</div>