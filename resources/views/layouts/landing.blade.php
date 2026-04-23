<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="bg-zinc-950 text-zinc-100 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        <nav
            class="fixed top-0 left-0 right-0 w-full z-50 bg-black backdrop-blur-xl shadow-lg flex justify-between items-center px-8 h-20">
            <div class="flex items-center gap-12">
                <a href="{{ route('kinetic-gallery') }}">
                    <x-application-logo />
                </a>

            </div>
            <div class="flex items-center gap-6">

                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 text-[#F0F0F0] hover:border-[#F0F0F0] rounded-md text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-[#F0F0F0] hover:border-[#F0F0F0] rounded-md text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 text-[#F0F0F0] border border-transparent hover:border-[#F0F0F0] hover:border-[#3E3E3A] rounded-md text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

        </nav>
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="pt-32 pb-20 px-8 max-w-[1600px] mx-auto">
            <header class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-20">
                <div class="lg:col-span-5 flex flex-col justify-center">
                    <h1 class="text-4xl lg:text-7xl text-[#EDEDEC] font-bold tracking-tighter mb-6 leading-[0.9]">
                        Dimensional <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#8ff5ff] to-[#ff5dd7]">Future</span>
                    </h1>
                    <p class="text-zinc-400 text-lg max-w-md mb-8">
                        Discover rare digital sculptures and high-fidelity 3D models curated for the next generation of
                        creative builders.
                    </p>
                    <div class="flex gap-4">
                        <x-primary-button>
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                                <span>Get Started</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </x-primary-button>
                    </div>
                </div>

                <div class="lg:col-span-7 h-[400px] rounded-2xl overflow-hidden relative group">
                    <x-card-model :item="$featured" />
                </div>
    </div>
    </header>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
        <div class="flex flex-wrap gap-2 p-1 bg-[#131316] rounded-xl">
            {{-- Botón "Todos" --}}
            <a href="{{ route('landing') }}" class="px-6 py-2 rounded-lg font-bold text-sm transition-colors
                      {{ !isset($activeCategory) || !$activeCategory
    ? 'bg-[#7000ff] text-white'
    : 'text-zinc-500 hover:text-zinc-200' }}">
                All Assets
            </a>
            {{-- Botones de categoría --}}
            @foreach($categories as $category)
                    <a href="{{ route('landing', ['category' => $category->id]) }}" class="px-6 py-2 rounded-lg font-bold text-sm transition-colors
                                                                                                                                                                      {{ isset($activeCategory) && $activeCategory == $category->id
                ? 'bg-[#7000ff] text-white'
                : 'text-zinc-500 hover:text-zinc-200' }}">
                        {{ $category->name }}
                    </a>
            @endforeach
        </div>
        {{-- Contador de resultados --}}
        @isset($activeCategory)
            @if($activeCategory)
                <p class="text-zinc-500 text-sm">
                    Mostrando <span class="text-white font-bold">{{ $threeds->count() }}</span>
                    modelos
                </p>
            @endif
        @endisset
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @yield('content')
    </div>
    </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</body>

</html>