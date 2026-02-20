@props(['socials'])

<div class="hidden lg:flex flex-col w-full gap-4 mt-auto pt-8 border-t border-gray-50">
    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest px-1">Connect</p>
    <div class="flex items-center gap-3 px-1">
        @foreach($socials as $social)
            <a href="{{ $social->link }}" target="_blank" 
               class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-all duration-200">
                <span class="sr-only">{{ $social->title }}</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    {{-- Ikon dinamis di sini --}}
                </svg>
            </a>
        @endforeach
    </div>
</div>