<!DOCTYPE html>
<html lang="id" class="h-full bg-white">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title ?? "Portfolio" }}</title>

        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet"
        />

        <!-- Icons -->

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
            integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full text-gray-900">
        <div class="flex min-h-screen">
            <!-- Sidebar -->

            <x-sidebar.index />

            <!-- Main Content -->

            <main
                class="flex-1 transition-all duration-300 /* Mobile: Padding bawah agar tidak tertutup bottom bar */ pb-24 px-6 pt-8 /* Tablet Landscape: Margin kiri seukuran mini sidebar */ md:ml-24 md:pb-8 md:px-12 /* Desktop: Margin kiri seukuran full sidebar */ lg:ml-72 lg:px-20 lg:pt-16"
            >
                <div class="max-w-5xl mx-auto">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
        </div>
    </body>
</html>
