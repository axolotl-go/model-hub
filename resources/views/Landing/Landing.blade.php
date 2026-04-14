<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Manrope:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-container": "#f8f1ff",
                        "secondary": "#ac89ff",
                        "tertiary": "#ff5dd7",
                        "on-primary-container": "#005359",
                        "surface-container-highest": "#25252a",
                        "primary-container": "#00eefc",
                        "surface-tint": "#8ff5ff",
                        "on-surface": "#f0edf1",
                        "primary-dim": "#00deec",
                        "surface-dim": "#0e0e11",
                        "on-surface-variant": "#acaaae",
                        "surface-container": "#19191d",
                        "primary": "#8ff5ff",
                        "surface": "#0e0e11",
                        "outline-variant": "#48474b",
                        "on-primary": "#005d63",
                        "background": "#0e0e11",
                        "surface-container-low": "#131316",
                        "surface-container-high": "#1f1f23"
                    },
                    "fontFamily": {
                        "headline": ["Space Grotesk"],
                        "body": ["Manrope"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        /* Mantenemos solo la configuración base del icono, lo demás es Tailwind */
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body selection:bg-primary selection:text-on-primary">

    <nav class="fixed top-0 w-full z-50 bg-zinc-950/60 backdrop-blur-xl border-b border-white/5">
        <div class="flex justify-between items-center w-full px-8 py-4 max-w-full font-headline tracking-tight">
            <x-application-logo />
        </div>
    </nav>
    <main class="relative">
        <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden bg-[radial-gradient(circle_at_50%_50%,rgba(143,245,255,0.05)_0%,rgba(14,14,17,1)_70%)]">
            <div class="absolute inset-0 z-0">
                <img alt="Hero" class="w-full h-full object-cover opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnbMnbAAoHjXVyDjznN8RtUJwi-oZnCpytVgau1nTKwSKNolDtm5ePxkHED_4RCbvnV5Diwepe_bma0Cbep-P-mxboT_uEqRt7ku5gPV6v2hZDqC1RWRLmEs96tJmTatVA0EVvE3fmyw8YtByp8e08_jMY4lPtnMo8zsStPhaoX-DljPheJpG9I4i0ZoPvB7RSd2-8Ec0EI4be_lX6MziUZZonhZOE8rzdJ9oOqE8rgM6ibzJ6vsd7ArZ5o6SElMU_PSToW-2P_6wu" />
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-8 flex flex-col items-center text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-surface-container border border-primary/20 mb-8">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-[10px] font-label font-bold tracking-widest text-primary uppercase">New Collections</span>
                </div>

                <h1 class="text-6xl md:text-8xl font-headline font-bold tracking-tighter mb-6 leading-tight">
                    The Future of <br />
                    <span class="bg-gradient-to-br from-primary to-primary-container bg-clip-text text-transparent">Digital Dimensions</span>
                </h1>

                <p class="text-xl text-on-surface-variant max-w-2xl mb-12 font-light leading-relaxed">
                    Exclusive marketplace for high-fidelity 3D assets, curated for architects, game developers, and the next generation of digital creators.
                </p>

                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="{{ route('landing') }}" class="px-10 py-4 rounded-lg bg-gradient-to-br from-primary to-primary-dim text-on-primary-container font-headline font-bold text-lg hover:brightness-110 transition-all shadow-lg shadow-primary/10">
                        Explore Gallery
                    </a>
                </div>
            </div>
        </section>

        <section class="py-24 bg-surface-container-low">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="flex flex-col gap-4">
                        <span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 1;">layers</span>
                        <h3 class="text-2xl font-headline font-bold">High-Fidelity Meshes</h3>
                        <p class="text-on-surface-variant font-light">Optimized topology and high-res textures for seamless integration into any production pipeline.</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <span class="material-symbols-outlined text-4xl text-secondary" style="font-variation-settings: 'FILL' 1;">verified</span>
                        <h3 class="text-2xl font-headline font-bold">Certified Artists</h3>
                        <p class="text-on-surface-variant font-light">Every creator is hand-picked and vetted to ensure the highest standard of technical quality.</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <span class="material-symbols-outlined text-4xl text-tertiary" style="font-variation-settings: 'FILL' 1;">description</span>
                        <h3 class="text-2xl font-headline font-bold">Instant Licensing</h3>
                        <p class="text-on-surface-variant font-light">Clear, transparent licensing terms stored on-chain for complete creative peace of mind.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-32 bg-surface">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="text-4xl font-headline font-bold mb-4 tracking-tight">Featured Models</h2>
                        <p class="text-on-surface-variant">Top performing assets from our worldwide community</p>
                    </div>
                    <a class="text-primary font-bold hover:underline" href="{{route('landing')}}">View all models →</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="group bg-surface-container-high rounded-xl overflow-hidden transition-all hover:bg-surface-container-highest cursor-pointer">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img alt="Model" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUiDOevSx-dvci9DxhJddOeqP_iI8vT8DMa5flCEviheX_8lRdZN_exK5VpHtv89EGkg8_GsVRtinchJ9jOSi_koLvCU4zg0-HZxQ6z2_r9-wFMu8rsMfCOMYoJ7ZMfhhnEg8ZFqx10LbIQCBovgdaAkkSYtLNybZm8jOwo7Mj_wSjYl4ywZvKfnv-CTFU34VmbEFRbpuaSdii7xp9su-tzDR-epwPhXVQ5BuQXKp5LqlhamfH0uN_bD13VYzls8cxO1p-WC4GJJfT" />
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="text-xl font-headline font-bold">Ethereal Organics V2</h4>
                                <span class="text-primary font-bold">Free</span>
                            </div>
                            <div class="flex items-center gap-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <x-footer />
</body>

</html>