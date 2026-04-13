<x-admin-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-white">3D Models Management</h2>
            <div class="flex gap-4">
                <a href="{{ route('admin.models.create') }}"
                    class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                    + Create Model
                </a>
                <a href="{{ route('admin.dashboard') }}"
                    class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Dashboard</a>
            </div>
        </div>

        @if($models->count())
            <div class="overflow-x-auto bg-zinc-900 rounded-xl border border-zinc-800/60">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-400">
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Author</th>
                            <th class="px-6 py-4">Created</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($models as $model)
                            <tr class="hover:bg-zinc-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white">{{ $model->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $model->category->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($model->price == 0)
                                        <span class="font-bold text-emerald-400">Free</span>
                                    @else
                                        <span class="font-bold text-white">${{ number_format($model->price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $model->user->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $model->created_at->format('M d, Y') }}</p>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.models.edit', $model) }}"
                                        class="inline-block px-3 py-1 bg-cyan-500/10 text-cyan-400 text-xs font-bold rounded hover:bg-cyan-500/20 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.models.destroy', $model) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500/10 text-red-400 text-xs font-bold rounded hover:bg-red-500/20 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $models->links() }}
        @else
            <div class="text-center py-12 text-zinc-500">
                <p>No models found</p>
            </div>
        @endif
    </div>
    <div class="col-span-1 p-6 bg-surface-container-low rounded-xl border-l-2 border-primary/40">
        <p class="text-xs font-label text-on-surface-variant uppercase tracking-widest mb-1">Total Assets</p>
        <h3 class="text-3xl font-headline font-bold text-primary">1,248</h3>
    </div>
    <div class="col-span-1 p-6 bg-surface-container-low rounded-xl border-l-2 border-secondary/40">
        <p class="text-xs font-label text-on-surface-variant uppercase tracking-widest mb-1">Active Listings</p>
        <h3 class="text-3xl font-headline font-bold text-secondary">892</h3>
    </div>
    <div class="col-span-1 p-6 bg-surface-container-low rounded-xl border-l-2 border-tertiary/40">
        <p class="text-xs font-label text-on-surface-variant uppercase tracking-widest mb-1">Pending Review</p>
        <h3 class="text-3xl font-headline font-bold text-tertiary">14</h3>
    </div>
    <div class="col-span-1 p-6 bg-surface-container-low rounded-xl border-l-2 border-on-surface-variant/40">
        <p class="text-xs font-label text-on-surface-variant uppercase tracking-widest mb-1">Storage Used</p>
        <h3 class="text-3xl font-headline font-bold text-on-surface">4.2 TB</h3>
    </div>
    </section>
    <!-- Main Assets Table -->
    <div
        class="flex-1 bg-surface-container-low rounded-2xl overflow-hidden shadow-2xl shadow-black/50 border border-outline-variant/5">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-high/50 border-b border-outline-variant/10">
                    <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant">Asset
                    </th>
                    <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant">
                        Category</th>
                    <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant">Price
                    </th>
                    <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant">Sales
                    </th>
                    <th class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant">
                        Status</th>
                    <th
                        class="px-6 py-4 text-xs font-label uppercase tracking-widest text-on-surface-variant text-right">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/5">
                <!-- Row 1 -->
                <tr class="hover:bg-surface-container-highest/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded bg-surface-container-highest overflow-hidden">
                                <img alt="Cyberpunk Robot Hand"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    data-alt="close-up of a futuristic chrome robotic hand with glowing neon purple wiring against a dark industrial background"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZqN91Im_xB_MHiu-dKjGemKviCd23m4cNV3wMkiRZT_I0n_3JIpvUrNZq6OnFBvS6a5G9HjQh_uJv10SI_sds96NRRwjYkRKnb70Lo6M9I-rqkMeTDg_4Ajp3pTCmvkHMRB3YtjCQie6G7RltMrJJx_41NJ2rqr-iK6ORmrxRpWtjMhypLsQQxLnULAAJlqCKY647CEbTPkU8sgTxRapcc-j3LJpNQwI0BZRE2rHjxeKVplSIn6wFcHrrXuW0ZdKp-2PBoimWAAc" />
                            </div>
                            <div>
                                <p class="font-headline font-medium text-on-surface">Cyber-Arm MK.IV</p>
                                <p class="text-xs font-label text-on-surface-variant">OBJ, FBX, BLEND</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-label text-on-surface-variant">Cybernetics</td>
                    <td class="px-6 py-4 font-headline font-bold text-primary">$120.00</td>
                    <td class="px-6 py-4 text-sm font-label text-on-surface">432</td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-tighter">Live</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"><span
                                    class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
                            <button class="p-2 text-on-surface-variant hover:text-error transition-colors"><span
                                    class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
                        </div>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="hover:bg-surface-container-highest/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded bg-surface-container-highest overflow-hidden">
                                <img alt="Neoclassical Bust"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    data-alt="minimalist 3d render of a classical greek bust sculpture with a modern holographic glitch effect overlay"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7bN3mpYwvpowLg3MxBeobJ3Odw4vVZFAAwMxohtdoP06CrEC7VBOpnQzGw9kkD7WW7HOpHm9wK-SGRE5fv0Uws25BhdxO6hF3b_ex7J4uL5QykCn-eq7vSR5nyDCncfLswjHSp9C4HzObn8IgrU4lHqJakJGBUCycs51xIJLSYkOR4tqUW--QMPc8VS3bFTqf3pwEmr9nttSkZsTgMZJROMB2A5utmIjI0DrBmilHJJlT2sixn50-WY5PT6hG5QafkOYt8zbAUR0" />
                            </div>
                            <div>
                                <p class="font-headline font-medium text-on-surface">Digital Apollo</p>
                                <p class="text-xs font-label text-on-surface-variant">STL, OBJ</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-label text-on-surface-variant">Sculptures</td>
                    <td class="px-6 py-4 font-headline font-bold text-primary">$45.00</td>
                    <td class="px-6 py-4 text-sm font-label text-on-surface">1,029</td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-tighter">Live</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"><span
                                    class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
                            <button class="p-2 text-on-surface-variant hover:text-error transition-colors"><span
                                    class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
                        </div>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr class="hover:bg-surface-container-highest/30 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded bg-surface-container-highest overflow-hidden">
                                <img alt="Abstract Landscape"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    data-alt="surreal 3d landscape with floating geometric obsidian islands over a liquid mercury ocean under a red sky"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2jz__B0nzR8hY1CaSsWFGTkknWymbx9xw6QwwEp7drx43XMGfpusrJ-GjqEKaLgclAUGRPrPg4Xdv-msWN263eQ0y99GAgz3JuLzVPj0Z2Bq5Sc3A0lVih_OHiN2RoKk3dvEoM0uTPRW2SU43yuZsgVR0CAs8W6fP5ZIWyd3ZaCbOY2NtHuL51UsJTYxq4McTfv2czjnfBfIRDXp9BaOAjWqRvFKh5Qz_c3_1kpma_KNyir7eo9wxSAubGSxNGdvhsTblrFU0tFI" />
                            </div>
                            <div>
                                <p class="font-headline font-medium text-on-surface">Void Lands #02</p>
                                <p class="text-xs font-label text-on-surface-variant">BLEND, GLTF</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-label text-on-surface-variant">Environments</td>
                    <td class="px-6 py-4 font-headline font-bold text-primary">$290.00</td>
                    <td class="px-6 py-4 text-sm font-label text-on-surface">0</td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full bg-tertiary/10 text-tertiary text-[10px] font-black uppercase tracking-tighter">Reviewing</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="p-2 text-on-surface-variant hover:text-primary transition-colors"><span
                                    class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
                            <button class="p-2 text-on-surface-variant hover:text-error transition-colors"><span
                                    class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table
            class="flex-1 bg-surface-container-low rounded-2xl overflow-hidden shadow-2xl shadow-black/50 border border-outline-variant/5">

            <x-dynamic-table :headers="['Asset', 'Category', 'Price', 'Sales', 'Status', 'Actions']" :rows="[['a', 'b', 'c', 'd', 'e', 'f']]" />

        </table>

        <footer class="p-6 bg-surface-container-high/20 flex justify-between items-center">
            <p class="text-xs font-label text-on-surface-variant uppercase tracking-widest">Showing 3 of 1,248
                assets</p>
            <div class="flex gap-2">
                <button
                    class="px-3 py-1 bg-surface-container-highest text-on-surface rounded hover:bg-outline-variant/30 transition-colors">Previous</button>
                <button
                    class="px-3 py-1 bg-surface-container-highest text-on-surface rounded hover:bg-outline-variant/30 transition-colors">Next</button>
            </div>
        </footer>
    </div>
    </main>

</x-admin-layout>