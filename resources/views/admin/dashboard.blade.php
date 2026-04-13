<x-admin-layout>
    <div class="space-y-8">
        <header>
            <h2 class="text-3xl font-bold tracking-tight text-white">Admin Dashboard</h2>
            <p class="text-zinc-500 mt-2 text-sm">System overview and statistics</p>
        </header>

        {{-- Stats grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-medium text-zinc-400">Total Users</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-cyan-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 7.359-3.684 9.333 9.333 0 0 0-3.684-7.359m-11.972 0a9.348 9.348 0 0 0 7.359 3.684m0 0a9.338 9.338 0 0 0 7.359-3.684m0 0A9.338 9.338 0 0 0 21 12a9.337 9.337 0 0 0-7.359-3.684m11.972 0a9.348 9.348 0 0 1-7.359 3.684m0 0a9.338 9.338 0 0 1-7.359-3.684m0 0A9.338 9.338 0 0 1 3 12a9.337 9.337 0 0 1 7.359-3.684m0 0a9.348 9.348 0 0 1 7.359 3.684" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $totalUsers }}</p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-medium text-zinc-400">Total Models</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-emerald-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2.25A2.25 2.25 0 0 1 7.5 5.25v13.5A2.25 2.25 0 0 1 5.25 21H3m0-18v16.5c0 1.243 1.007 2.25 2.25 2.25h13.5A2.25 2.25 0 0 0 21 19.5V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $totalModels }}</p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-medium text-zinc-400">Total Sales</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-violet-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">{{ $totalSales }}</p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-medium text-zinc-400">Total Revenue</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-pink-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 3.071-.879 4.242 0M9.75 11.25c.386 0 .75-.064 1.093-.184m7.020-1.566a18.094 18.094 0 0 0-3.282-.5M15 19.5a18.094 18.094 0 0 0-3.282-.5m0 0c-1.148 0-2.263.099-3.352.287m7.352-.287a18.096 18.096 0 0 1-3.282-.5m0 0H21m0 0v-3.375m0 0a18.097 18.097 0 0 0-3.282-.5m0 0H3m0 3.375v-3.375m0 0a18.096 18.096 0 0 0 3.282.5m0 0H21" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-white">${{ number_format($totalRevenue, 2) }}</p>
            </div>
        </div>

        {{-- Quick links --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <a href="{{ route('admin.users.index') }}"
                class="bg-zinc-900 border border-zinc-800/60 hover:border-cyan-500 rounded-xl p-6 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-white group-hover:text-cyan-400 transition-colors">Manage Users</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-cyan-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 7.359-3.684 9.333 9.333 0 0 0-3.684-7.359m-11.972 0a9.348 9.348 0 0 0 7.359 3.684m0 0a9.338 9.338 0 0 0 7.359-3.684m0 0A9.338 9.338 0 0 0 21 12a9.337 9.337 0 0 0-7.359-3.684m11.972 0a9.348 9.348 0 0 1-7.359 3.684m0 0a9.338 9.338 0 0 1-7.359-3.684m0 0A9.338 9.338 0 0 1 3 12a9.337 9.337 0 0 1 7.359-3.684m0 0a9.348 9.348 0 0 1 7.359 3.684" />
                    </svg>
                </div>
                <p class="text-sm text-zinc-400">View and manage all users</p>
            </a>

            <a href="{{ route('admin.models.index') }}"
                class="bg-zinc-900 border border-zinc-800/60 hover:border-emerald-500 rounded-xl p-6 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-white group-hover:text-emerald-400 transition-colors">Manage Models</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-emerald-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2.25A2.25 2.25 0 0 1 7.5 5.25v13.5A2.25 2.25 0 0 1 5.25 21H3m0-18v16.5c0 1.243 1.007 2.25 2.25 2.25h13.5A2.25 2.25 0 0 0 21 19.5V5.25A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25" />
                    </svg>
                </div>
                <p class="text-sm text-zinc-400">View and manage all 3D models</p>
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="bg-zinc-900 border border-zinc-800/60 hover:border-orange-500 rounded-xl p-6 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-white group-hover:text-orange-400 transition-colors">Categories</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-orange-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                </div>
                <p class="text-sm text-zinc-400">Manage model categories</p>
            </a>

            <a href="{{ route('admin.purchases.index') }}"
                class="bg-zinc-900 border border-zinc-800/60 hover:border-pink-500 rounded-xl p-6 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-white group-hover:text-pink-400 transition-colors">Purchases</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-pink-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                </div>
                <p class="text-sm text-zinc-400">View all purchases</p>
            </a>

            <a href="{{ route('admin.sales.index') }}"
                class="bg-zinc-900 border border-zinc-800/60 hover:border-violet-500 rounded-xl p-6 transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-white group-hover:text-violet-400 transition-colors">Sales Report</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-violet-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>
                <p class="text-sm text-zinc-400">View sales analytics</p>
            </a>
        </div>
    </div>
</x-admin-layout>