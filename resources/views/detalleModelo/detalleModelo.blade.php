<x-app-layout>
    <header>
        <script type="module"
            src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
    </header>
    {{-- <x-view-model-three /> --}}

    <main class="min-h-screen">
        <!-- Hero Viewer Section -->
        <section class="relative w-full h-[716px] bg-sky-900 overflow-hidden flex items-center justify-center">
            <div class="absolute inset-0 bg-gradient-to-t from-surface to-transparent z-10"></div>
            <div class="w-full h-full object-cover opacity-80 z-10">
                <x-view-model-three />
            </div>
            <!-- Viewer Controls (Glassmorphism Overlay) -->
            <div
                class="absolute bottom-12 left-1/2 -translate-x-1/2 z-20 flex gap-4 p-2 bg-surface-variant/60 backdrop-blur-xl rounded-full border border-outline-variant/20">
                <button class="p-3 bg-primary/20 text-primary rounded-full hover:bg-primary/30 transition-all">
                    <span class="material-symbols-outlined">view_in_ar</span>
                </button>
                <button class="p-3 text-on-surface-variant hover:text-on-surface transition-all">
                    <span class="material-symbols-outlined">rotate_right</span>
                </button>
                <button class="p-3 text-on-surface-variant hover:text-on-surface transition-all">
                    <span class="material-symbols-outlined">zoom_in</span>
                </button>
                <button class="p-3 text-on-surface-variant hover:text-on-surface transition-all">
                    <span class="material-symbols-outlined">fullscreen</span>
                </button>
            </div>
        </section>
        <!-- Content Grid -->
        <div class="max-w-7xl mx-auto px-8 py-16 grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left Column: Primary Details -->
            <div class="lg:col-span-8 space-y-12">
                <header>
                    <div class="flex gap-3 mb-6">
                        <span
                            class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-label font-bold uppercase tracking-widest rounded-full">New
                            Release</span>
                        <span
                            class="px-3 py-1 bg-surface-container-highest text-primary font-label text-[10px] uppercase tracking-widest rounded-full">Certified
                            Artist</span>
                    </div>
                    <h1 class="text-6xl font-headline font-bold text-on-surface tracking-tighter mb-4">Cyber-Relic
                        Prototype v.04</h1>
                    <p class="text-on-surface-variant text-lg leading-relaxed max-w-2xl font-body">
                        A master-class in hard-surface modeling. This prototype asset features procedurally generated
                        textures, fully articulated rigging for mechanical joints, and PBR-ready materials optimized for
                        high-end cinematic rendering.
                    </p>
                </header>
                <!-- Bento Grid Specs -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="p-6 bg-surface-container rounded-xl">
                        <span
                            class="block text-outline text-[11px] font-label uppercase tracking-widest mb-2">Polycount</span>
                        <span class="text-2xl font-headline font-bold text-on-surface">142,502</span>
                    </div>
                    <div class="p-6 bg-surface-container rounded-xl">
                        <span
                            class="block text-outline text-[11px] font-label uppercase tracking-widest mb-2">Vertices</span>
                        <span class="text-2xl font-headline font-bold text-on-surface">78,920</span>
                    </div>
                    <div class="p-6 bg-surface-container rounded-xl">
                        <span
                            class="block text-outline text-[11px] font-label uppercase tracking-widest mb-2">License</span>
                        <span class="text-2xl font-headline font-bold text-on-surface">Standard</span>
                    </div>
                    <div class="p-6 bg-surface-container rounded-xl">
                        <span
                            class="block text-outline text-[11px] font-label uppercase tracking-widest mb-2">PBR</span>
                        <span class="text-2xl font-headline font-bold text-on-surface">Yes</span>
                    </div>
                </div>
                <!-- Additional Information -->
                <section class="space-y-6">
                    <h3 class="text-xl font-headline font-bold text-on-surface">Model Description</h3>
                    <div class="prose prose-invert max-w-none text-on-surface-variant space-y-4">
                        <p>This model is part of the 'Anomalous Echo' collection. It was sculpted with anatomical
                            precision in ZBrush and retopologized in Maya for optimal performance. The UV maps are
                            organized into 4 UDIM tiles to ensure maximum texture resolution (8K).</p>
                        <p>Perfect for sci-fi environments, product visualization, or high-fidelity game cinematics.
                            Includes baked normal maps, roughness, and metalness maps.</p>
                    </div>
                </section>
                <!-- Preview Thumbnails -->
                <section class="space-y-6">
                    <h3 class="text-xl font-headline font-bold text-on-surface">Asset Previews</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="aspect-square bg-surface-container rounded-xl overflow-hidden group">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-60"
                                data-alt="Close up detailed wireframe of a 3D robot arm model showing complex geometry and clean topology"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsmcUeqb6XYFH1sEYAFLaEFYa4MG-Z1CKiw2PLwZABazckUy7F8SnXsKkrXNdsUvw90ERP3VIUT7WVZrzobrKjFJM_BrTNvzV0jLG7Vs_GSxAtXSDa6Xe_j7fEquk_yQQDaf8k-JjtIj3WfdTEwva5FpZ3Yh-zM789RbgRGAMzB8VnPAKrIDxcXQCiSLBiGqzIzrl4InAPFIEA9XvaBhsc8yAhuqnTIJ8sCF9Y9YtblC24sWAqDtaNcMDBUtsKUFhRDzsI7TR_Pt0" />
                        </div>
                        <div class="aspect-square bg-surface-container rounded-xl overflow-hidden group">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-60"
                                data-alt="Clay render of a futuristic mechanical unit with soft shadows and clean surfaces on a dark background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHUk-qn4N31JZphJ4ELsF8yC7RXVpF5yqifP0hfPfLD-XnBKZ6R2tt4opDcUBnCm7x6gE_Dsh3Q9KdHn13CPxsnwnAbaKlhw3-IqvkjbuA0PuTqjWhZtt_t31i14zZBroGy4O6E8YerbYCHHZUlStXKwXyuufuNjk5t7_bV0RLcAe-7uPse240x2bXncIVx30UZ6TrHDFbo2hJOelvdifvflpN-AX5WIX1a_7seAX9YNj7bM6I60Af9Zmtd8A9iIRGGAQO7rDh1cQ" />
                        </div>
                        <div class="aspect-square bg-surface-container rounded-xl overflow-hidden group">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-60"
                                data-alt="Technical UV layout map for a 3D model with various colored islands on a dark grid"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvF8y1Cqq1oDf-BLwZwkB6P2wuT4V2S8BLtgtaRMsHP34HbIHYXAh9QSWdEqZIK-uz2Jikowmed79lKcC_WV5Wr6SPd_FSCBoDp2YF_Withjn-hlFO3SLwdcPcyxQ-dPvWb1oCJeBmxN9MOfChlaii5LyiZSQiLV05qGlB3_wZJBS5567NZamm7bC3mJPXecPAd4Imp7--atnq4cKHVho1wMo5dYgV9O67yvu-sDheR0wMN2B7006LkbhujWb18BehJPaBlAwZZEo" />
                        </div>
                    </div>
                </section>
            </div>
            <!-- Right Column: Sticky Sidebar -->
            <aside class="lg:col-span-4">
                <div class="sticky top-32 space-y-6">
                    <!-- Buy Card -->
                    <div class="bg-surface-container-high rounded-2xl p-8 border border-outline-variant/10 shadow-2xl">
                        <div class="flex justify-between items-end mb-8">
                            <div>
                                <span
                                    class="block text-outline text-[12px] font-label uppercase tracking-widest mb-1">Standard
                                    License</span>
                                <span class="text-5xl font-headline font-bold text-on-surface">$59.00</span>
                            </div>
                            <div class="text-right">
                                <span class="text-tertiary font-bold text-sm">Save 15%</span>
                            </div>
                        </div>
                        <!-- Formats Selection -->
                        <div class="space-y-4 mb-8">
                            <label class="text-outline text-[11px] font-label uppercase tracking-widest">Included
                                Formats</label>
                            <div class="grid grid-cols-2 gap-2">
                                <div
                                    class="flex items-center gap-2 p-3 bg-surface-container rounded-lg border border-primary/20">
                                    <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                                    <span class="text-sm font-label font-medium">FBX</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 p-3 bg-surface-container rounded-lg border border-primary/20">
                                    <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                                    <span class="text-sm font-label font-medium">OBJ</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 p-3 bg-surface-container rounded-lg border border-primary/20">
                                    <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                                    <span class="text-sm font-label font-medium">STL</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 p-3 bg-surface-container rounded-lg border border-primary/20">
                                    <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                                    <span class="text-sm font-label font-medium">BLEND</span>
                                </div>
                            </div>
                        </div>
                        <button
                            class="w-full py-5 buy-gradient text-on-primary font-headline font-bold text-lg rounded-xl hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-3 mb-4">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">shopping_bag</span>
                            Buy &amp; Download
                        </button>
                        <button
                            class="w-full py-4 bg-surface-variant/40 text-on-surface-variant font-label font-medium rounded-xl hover:bg-surface-variant transition-all">
                            Add to Wishlist
                        </button>
                        <div class="mt-8 pt-8 border-t border-outline-variant/20 space-y-4">
                            <div class="flex items-center gap-4 text-sm text-on-surface-variant">
                                <span class="material-symbols-outlined text-secondary">verified_user</span>
                                <span>Verified Asset Integrity</span>
                            </div>
                            <div class="flex items-center gap-4 text-sm text-on-surface-variant">
                                <span class="material-symbols-outlined text-secondary">update</span>
                                <span>Free Lifetime Updates</span>
                            </div>
                        </div>
                    </div>
                    <!-- Creator Info -->
                    <div class="bg-surface-container p-6 rounded-2xl flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-primary to-secondary p-[2px]">
                            <div
                                class="w-full h-full rounded-full bg-surface-container flex items-center justify-center overflow-hidden">
                                <img class="w-full h-full object-cover"
                                    data-alt="Portrait of a digital artist, close up, creative lighting with blue tones"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR_r1GSkgM35LHf_Tl7Osd1UYzpbLQTGIprfQCAxo_0LQQgAE917i57zHoP4rEkj51swbsbefJyeGYJWttfaPX06uhDwqGqS91L9MsEPJyZ6OLu1maPqlDszUhuvGtMqPzVoNmfJemcnPJmKyloz-OW-dPpNyuEbeHskzSCHu2o4T0qE3Ju5AZ_TbAvsPjVPDZ0UgqB9NMzFZuPWeCGXdEryRzoA09RQFInVIz0NgfC7Ben9jZKss0UMxEWY2d5fYONC5HAkgBr9s" />
                            </div>
                        </div>
                        <div>
                            <span class="block text-outline text-[10px] font-label uppercase tracking-widest">Created
                                By</span>
                            <span class="text-on-surface font-headline font-bold">Xenon_Studio</span>
                        </div>
                        <button
                            class="ml-auto text-primary text-sm font-label font-bold hover:underline">Follow</button>
                    </div>
                </div>
            </aside>
        </div>
    </main>

</x-app-layout>