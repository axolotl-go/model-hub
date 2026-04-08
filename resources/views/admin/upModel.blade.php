<x-admin-layout>
    <main class="min-h-screen p-8 md:p-12">
        <!-- Header Section -->
        <header class="max-w-6xl mx-auto mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <nav class="flex items-center gap-2 text-on-surface-variant text-sm mb-4 font-label">
                    <span class="hover:text-primary cursor-pointer">Assets</span>
                    <span class="material-symbols-outlined text-xs" data-icon="chevron_right">chevron_right</span>
                    <span class="text-on-surface">Upload New Model</span>
                </nav>
                <h2 class="text-5xl font-headline font-bold tracking-tight text-on-surface">Upload Asset</h2>
            </div>
            <div class="flex items-center gap-4">
                <button
                    class="px-6 py-2.5 rounded-md border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors font-label text-sm">
                    Save Draft
                </button>
                <button
                    class="px-8 py-2.5 rounded-md bg-gradient-to-r from-primary to-primary-container text-on-primary font-bold shadow-lg shadow-primary/10 hover:scale-[1.02] transition-transform font-label text-sm">
                    Publish Model
                </button>
            </div>
        </header>
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column: Primary Data -->
            <div class="lg:col-span-8 space-y-8">
                <!-- 1. Drag-and-Drop Section -->
                <section
                    class="bg-surface-container-low rounded-xl p-8 transition-all hover:bg-surface-container border-2 border-dashed border-outline-variant/30 flex flex-col items-center justify-center text-center group cursor-pointer">
                    <div
                        class="w-16 h-16 rounded-full bg-surface-container-high flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary text-3xl"
                            data-icon="upload_file">upload_file</span>
                    </div>
                    <h3 class="text-xl font-headline font-semibold mb-2">Drop your 3D files here</h3>
                    <p class="text-on-surface-variant mb-6 max-w-sm">Support for OBJ, FBX, GLB, and GLTF. Max file size:
                        500MB.</p>
                    <button
                        class="px-6 py-2 bg-surface-container-highest text-on-surface rounded-md font-label text-sm border border-outline-variant/50 hover:bg-surface-bright transition-colors">
                        Browse Files
                    </button>
                </section>
                <!-- 2. Asset Details -->
                <section class="bg-surface-container-low rounded-xl p-8 space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="material-symbols-outlined text-secondary"
                            data-icon="description">description</span>
                        <h3 class="text-lg font-headline font-bold">Asset Details</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="grid gap-2">
                            <label class="text-xs font-label uppercase tracking-widest text-on-surface-variant">Model
                                Title</label>
                            <input
                                class="w-full bg-surface-container-lowest border-none rounded-sm px-4 py-3 focus:ring-1 focus:ring-primary text-on-surface placeholder:text-on-surface-variant/40 transition-all font-body"
                                placeholder="e.g. Cyberpunk Modular Interior" type="text" />
                        </div>
                        <div class="grid gap-2">
                            <label
                                class="text-xs font-label uppercase tracking-widest text-on-surface-variant">Description</label>
                            <textarea
                                class="w-full bg-surface-container-lowest border-none rounded-sm px-4 py-3 focus:ring-1 focus:ring-primary text-on-surface placeholder:text-on-surface-variant/40 transition-all font-body resize-none"
                                placeholder="Describe your asset, its intended use, and unique features..."
                                rows="5"></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="grid gap-2">
                                <label
                                    class="text-xs font-label uppercase tracking-widest text-on-surface-variant">Category</label>
                                <select
                                    class="w-full bg-surface-container-lowest border-none rounded-sm px-4 py-3 focus:ring-1 focus:ring-primary text-on-surface transition-all font-body">
                                    <option>Environment &amp; Architecture</option>
                                    <option>Characters</option>
                                    <option>Vehicles</option>
                                    <option>Props</option>
                                    <option>Weapons</option>
                                </select>
                            </div>
                            <div class="grid gap-2">
                                <label
                                    class="text-xs font-label uppercase tracking-widest text-on-surface-variant">Tags</label>
                                <input
                                    class="w-full bg-surface-container-lowest border-none rounded-sm px-4 py-3 focus:ring-1 focus:ring-primary text-on-surface placeholder:text-on-surface-variant/40 transition-all font-body"
                                    placeholder="sci-fi, modular, low-poly..." type="text" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Right Column: Technical & Commercial -->
            <div class="lg:col-span-4 space-y-8">
                <!-- 4. Technical Specs -->
                <section class="bg-surface-container-low rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-primary"
                            data-icon="settings_input_component">settings_input_component</span>
                        <h3 class="text-lg font-headline font-bold">Technical Specs</h3>
                    </div>
                    <div class="space-y-6">

                        <div class="space-y-3">
                            <label
                                class="text-xs font-label uppercase tracking-widest text-on-surface-variant">Features</label>
                            <label
                                class="flex items-center justify-between p-3 rounded-md bg-surface-container hover:bg-surface-container-high transition-colors cursor-pointer">
                                <span class="text-sm">Rigged</span>
                                <input
                                    class="w-5 h-5 rounded-sm bg-surface-container-lowest border-none text-primary focus:ring-primary"
                                    type="checkbox" />
                            </label>
                            <label
                                class="flex items-center justify-between p-3 rounded-md bg-surface-container hover:bg-surface-container-high transition-colors cursor-pointer">
                                <span class="text-sm">Animated</span>
                                <input
                                    class="w-5 h-5 rounded-sm bg-surface-container-lowest border-none text-primary focus:ring-primary"
                                    type="checkbox" />
                            </label>
                            <label
                                class="flex items-center justify-between p-3 rounded-md bg-surface-container hover:bg-surface-container-high transition-colors cursor-pointer">
                                <span class="text-sm">UV Unwrapped</span>
                                <input checked=""
                                    class="w-5 h-5 rounded-sm bg-surface-container-lowest border-none text-primary focus:ring-primary"
                                    type="checkbox" />
                            </label>
                            <label
                                class="flex items-center justify-between p-3 rounded-md bg-surface-container hover:bg-surface-container-high transition-colors cursor-pointer">
                                <span class="text-sm">PBR Materials</span>
                                <input checked=""
                                    class="w-5 h-5 rounded-sm bg-surface-container-lowest border-none text-primary focus:ring-primary"
                                    type="checkbox" />
                            </label>
                        </div>
                    </div>
                </section>
                <!-- 5. Pricing and Licensing -->
                <section class="bg-surface-container-low rounded-xl p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="material-symbols-outlined text-secondary" data-icon="payments">payments</span>
                        <h3 class="text-lg font-headline font-bold">Commercial</h3>
                    </div>
                    <div class="space-y-6">
                        <div class="grid gap-2">
                            <label class="text-xs font-label uppercase tracking-widest text-on-surface-variant">Price
                                (USD)</label>
                            <div class="relative">
                                <span
                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant font-bold">$</span>
                                <input
                                    class="w-full bg-surface-container-lowest border-none rounded-sm pl-8 pr-4 py-2.5 focus:ring-1 focus:ring-primary text-black font-label font-bold text-xl"
                                    placeholder="0.00" type="number" />
                            </div>
                        </div>
                        <div class="grid gap-2">
                            <label class="text-xs font-label uppercase tracking-widest text-on-surface-variant">License
                                Type</label>
                            <div class="space-y-2">
                                <button
                                    class="w-full text-left p-3 rounded-md bg-surface-container border border-primary/40 flex flex-col gap-1">
                                    <span class="text-sm font-bold text-primary">Standard Royalty Free</span>
                                    <span class="text-[10px] text-on-surface-variant leading-relaxed">Personal and
                                        commercial projects. No resale of the model itself.</span>
                                </button>
                                <button
                                    class="w-full text-left p-3 rounded-md bg-surface-container-lowest border border-transparent hover:border-outline-variant transition-all flex flex-col gap-1">
                                    <span class="text-sm font-bold">Editorial Only</span>
                                    <span class="text-[10px] text-on-surface-variant leading-relaxed">Restricted to
                                        news, educational, or non-commercial use.</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Help Box -->
                <div
                    class="p-6 rounded-xl bg-gradient-to-br from-surface-container-high to-background border border-outline-variant/10">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="material-symbols-outlined text-primary text-sm" data-icon="info">info</span>
                        <h4 class="text-sm font-bold">Optimization Tip</h4>
                    </div>
                    <p class="text-xs text-on-surface-variant leading-relaxed">
                        Models under 100k polygons with GLB export tend to sell 40% faster on Kinetic Gallery.
                    </p>
                </div>
            </div>
        </div>
        <!-- Footer Actions (Mobile Only Visibility managed by responsive wrapper) -->
        <div
            class="max-w-6xl mx-auto mt-12 pt-8 border-t border-outline-variant/10 flex justify-end gap-4 pb-24 lg:pb-0">
            <button
                class="px-8 py-3 rounded-md border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors font-label text-sm">
                Cancel
            </button>
            <button
                class="px-12 py-3 rounded-md bg-gradient-to-r from-primary to-primary-container text-on-primary font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] transition-transform font-label text-sm">
                Complete Upload
            </button>
        </div>
    </main>
</x-admin-layout>