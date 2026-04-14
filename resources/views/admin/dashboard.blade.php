<x-admin-layout>
    <div class="space-y-8">
        {{-- Page Header --}}
        <div>
            <h2 class="text-3xl font-black text-white tracking-tight">Dashboard</h2>
            <p class="text-zinc-500 mt-1 text-sm">
                Welcome back, <span class="text-zinc-300">{{ auth()->user()->name }}</span> —
                {{ now()->format('l, F j, Y') }}
            </p>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            {{-- Total Users --}}
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <p class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">Total Users</p>
                    <div class="p-2 rounded-lg bg-cyan-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5 text-cyan-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-black text-white">{{ number_format($totalUsers) }}</p>
                <a href="{{ route('admin.users.index') }}"
                   class="text-xs text-cyan-400 hover:text-cyan-300 font-medium transition-colors">
                    View all users →
                </a>
            </div>

            {{-- Total Models --}}
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <p class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">3D Models</p>
                    <div class="p-2 rounded-lg bg-violet-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5 text-violet-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-black text-white">{{ number_format($totalModels) }}</p>
                <a href="{{ route('admin.models.index') }}"
                   class="text-xs text-violet-400 hover:text-violet-300 font-medium transition-colors">
                    Manage models →
                </a>
            </div>

            {{-- Total Sales --}}
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-6 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <p class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">Total Sales</p>
                    <div class="p-2 rounded-lg bg-orange-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5 text-orange-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-black text-white">{{ number_format($totalSales) }}</p>
                <a href="{{ route('admin.purchases.index') }}"
                   class="text-xs text-orange-400 hover:text-orange-300 font-medium transition-colors">
                    View purchases →
                </a>
            </div>

            {{-- Total Revenue --}}
            <div class="bg-gradient-to-br from-cyan-500/10 to-violet-500/10 border border-cyan-500/20 rounded-2xl p-6 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <p class="text-xs font-semibold text-zinc-500 uppercase tracking-widest">Total Revenue</p>
                    <div class="p-2 rounded-lg bg-emerald-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5 text-emerald-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
                <p class="text-4xl font-black text-white">${{ number_format($totalRevenue, 2) }}</p>
                <a href="{{ route('admin.sales.index') }}"
                   class="text-xs text-emerald-400 hover:text-emerald-300 font-medium transition-colors">
                    Sales report →
                </a>
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Recent Purchases --}}
            <div class="lg:col-span-2 bg-zinc-900 border border-zinc-800/60 rounded-2xl overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-800/60">
                    <h3 class="font-bold text-white">Recent Purchases</h3>
                    <a href="{{ route('admin.purchases.index') }}"
                       class="text-xs text-zinc-500 hover:text-cyan-400 transition-colors">
                        View all →
                    </a>
                </div>
                @if($recentPurchases->count())
                    <div class="divide-y divide-zinc-800/40">
                        @foreach($recentPurchases as $purchase)
                            <div class="flex items-center gap-4 px-6 py-3.5">
                                <div class="w-8 h-8 rounded-lg bg-zinc-800 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-4 text-zinc-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-white truncate">{{ $purchase->threed->name ?? 'Unknown Model' }}</p>
                                    <p class="text-xs text-zinc-500 truncate">by {{ $purchase->user->name ?? 'Unknown User' }}</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    @if(($purchase->threed->price ?? 0) == 0)
                                        <p class="text-sm font-bold text-emerald-400">Free</p>
                                    @else
                                        <p class="text-sm font-bold text-white">${{ number_format($purchase->threed->price ?? 0, 2) }}</p>
                                    @endif
                                    <p class="text-xs text-zinc-600">{{ $purchase->purchased_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-center">
                        <p class="text-zinc-600 text-sm">No purchases yet</p>
                    </div>
                @endif
            </div>

            {{-- Right column: Recent Users + Quick Actions --}}
            <div class="space-y-6">

                {{-- Recent Users --}}
                <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl overflow-hidden">
                    <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-800/60">
                        <h3 class="font-bold text-white">New Users</h3>
                        <a href="{{ route('admin.users.index') }}"
                           class="text-xs text-zinc-500 hover:text-cyan-400 transition-colors">
                            View all →
                        </a>
                    </div>
                    @if($recentUsers->count())
                        <div class="divide-y divide-zinc-800/40">
                            @foreach($recentUsers as $user)
                                <div class="flex items-center gap-3 px-5 py-3">
                                    <div class="w-8 h-8 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center flex-shrink-0">
                                        <span class="text-xs font-bold text-zinc-300">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-white truncate leading-tight">{{ $user->name }}</p>
                                        <p class="text-xs text-zinc-500 truncate">{{ $user->created_at->diffForHumans() }}</p>
                                    </div>
                                    <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                        {{ $user->role === 'admin'
                                            ? 'bg-red-500/10 text-red-400'
                                            : 'bg-zinc-800 text-zinc-500' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="px-5 py-8 text-center">
                            <p class="text-zinc-600 text-sm">No users yet</p>
                        </div>
                    @endif
                </div>

                {{-- Quick Actions --}}
                <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl p-5 space-y-2">
                    <h3 class="font-bold text-white mb-3">Quick Actions</h3>
                    <a href="{{ route('admin.models.create') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-medium transition-colors group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4 text-cyan-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Upload New Model
                    </a>
                    <a href="{{ route('admin.categories.create') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4 text-orange-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z M6 6h.008v.008H6V6Z" />
                        </svg>
                        Add Category
                    </a>
                    <a href="{{ route('admin.users.create') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4 text-violet-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        Create User
                    </a>
                    <a href="{{ route('admin.sales.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-4 text-emerald-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                        Sales Report
                    </a>
                </div>
            </div>
        </div>

        {{-- Top Models --}}
        @if($topModels->count())
        <div class="bg-zinc-900 border border-zinc-800/60 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-800/60">
                <h3 class="font-bold text-white">Top Selling Models</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-500">
                            <th class="px-6 py-3">Model</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Price</th>
                            <th class="px-6 py-3">Sales</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($topModels as $model)
                            <tr class="hover:bg-zinc-800/40 transition-colors">
                                <td class="px-6 py-3">
                                    <p class="text-sm font-medium text-white">{{ $model->name }}</p>
                                </td>
                                <td class="px-6 py-3">
                                    <span class="text-xs text-zinc-400">{{ $model->category->name ?? '—' }}</span>
                                </td>
                                <td class="px-6 py-3">
                                    @if($model->price == 0)
                                        <span class="text-sm font-bold text-emerald-400">Free</span>
                                    @else
                                        <span class="text-sm font-bold text-white">${{ number_format($model->price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3">
                                    <span class="inline-flex items-center gap-1 text-sm text-zinc-300 font-medium">
                                        {{ $model->purchases_count }}
                                        <span class="text-xs text-zinc-600">sales</span>
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-right">
                                    <a href="{{ route('admin.models.edit', $model) }}"
                                       class="text-xs text-zinc-500 hover:text-cyan-400 transition-colors">
                                        Edit →
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</x-admin-layout>