@props(['name', 'role', 'image'])

<div class="flex md:flex-col items-center lg:items-start w-full mb-10">
    <div class="relative group">
        <img
            src="{{ asset('storage/'.$image) }}"
            class="w-12 h-12 lg:w-16 lg:h-16 rounded-2xl object-cover shadow-sm ring-1 ring-gray-100 transition-transform duration-300 group-hover:scale-105"
        />
        <div
            class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"
        ></div>
    </div>

    <div class="hidden lg:block mt-4">
        <h2
            class="text-[15px] font-bold text-gray-900 tracking-tight leading-none"
        >
            {{ $name }}
        </h2>
        <p class="text-[12px] font-medium text-gray-500 mt-1.5">{{ $role }}</p>
    </div>
</div>
