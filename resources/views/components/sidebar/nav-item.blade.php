@props(['href', 'icon', 'label', 'active' => false])

<a href="{{ $href }}" 
   class="flex items-center justify-center lg:justify-start group relative p-3 lg:px-4 lg:py-3 w-full rounded-xl transition-all duration-200
   {{ $active ? 'bg-gray-900 text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
    
    <svg class="w-6 h-6 lg:w-5 lg:h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        {!! $icon !!}
    </svg>
    
    <span class="hidden lg:block ml-3 text-[14px] font-semibold tracking-wide">
        {{ $label }}
    </span>

    @if($active)
        <span class="absolute -top-1 left-1/2 -translate-x-1/2 w-1 h-1 bg-gray-900 rounded-full md:hidden"></span>
    @endif
</a>