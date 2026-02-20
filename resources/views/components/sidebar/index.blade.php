<aside
    class="fixed bottom-0 left-0 z-50 w-full h-20 bg-white/80 backdrop-blur-md border-t border-gray-100 px-6 md:top-0 md:left-0 md:h-screen md:w-24 md:border-t-0 md:border-r md:flex-col lg:w-72 lg:px-8 lg:py-10 flex items-center justify-between"
>
    <div
        class="flex md:flex-col items-center justify-between w-full h-full font-inter"
    >
        <x-sidebar.profile
            name="Nama Kamu"
            role="Lead Developer"
            image="profile.jpg"
        />

        <nav
            class="flex md:flex-col items-center justify-around md:justify-start w-full gap-1 lg:gap-2"
        >
            <x-sidebar.nav-item
                href="/"
                label="Home"
                icon="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                active
            />
            <x-sidebar.nav-item
                href="/projects"
                label="Projects"
                icon="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
            />
            <x-sidebar.nav-item
                href="/articles"
                label="Articles"
                icon="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"
            />
            <x-sidebar.nav-item
                href="/contact"
                label="Contact"
                icon="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
            />
        </nav>

        <x-sidebar.social :socials="$socials" />
    </div>
</aside>
