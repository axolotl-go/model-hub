<x-admin-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-white">Purchases Management</h2>
            <a href="{{ route('admin.dashboard') }}"
                class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Dashboard</a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-zinc-400">Total Purchases</p>
                        <p class="text-2xl font-bold text-white">{{ number_format($stats['total_purchases']) }}</p>
                    </div>
                    <div class="p-3 bg-blue-500/10 rounded-lg">
                        <span class="material-symbols-outlined text-blue-400">shopping_cart</span>
                    </div>
                </div>
            </div>

            <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-zinc-400">Total Revenue</p>
                        <p class="text-2xl font-bold text-white">${{ number_format($stats['total_revenue'], 2) }}</p>
                    </div>
                    <div class="p-3 bg-green-500/10 rounded-lg">
                        <span class="material-symbols-outlined text-green-400">attach_money</span>
                    </div>
                </div>
            </div>

            <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-zinc-400">Avg. Order Value</p>
                        <p class="text-2xl font-bold text-white">
                            ${{ $stats['total_purchases'] > 0 ? number_format($stats['total_revenue'] / $stats['total_purchases'], 2) : '0.00' }}
                        </p>
                    </div>
                    <div class="p-3 bg-purple-500/10 rounded-lg">
                        <span class="material-symbols-outlined text-purple-400">trending_up</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Purchases -->
        <div class="bg-zinc-900 border border-zinc-800/60 rounded-xl p-6">
            <h3 class="text-lg font-bold text-white mb-4">Recent Purchases</h3>
            <div class="space-y-3">
                @foreach($stats['recent_purchases'] as $purchase)
                    <div class="flex items-center justify-between p-3 bg-zinc-800/50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-cyan-500/10 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-cyan-400 text-sm">shopping_bag</span>
                            </div>
                            <div>
                                <p class="font-medium text-white">{{ $purchase->user->name }}</p>
                                <p class="text-sm text-zinc-400">{{ $purchase->threed->name }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-white">${{ number_format($purchase->threed->price, 2) }}</p>
                            <p class="text-xs text-zinc-400">{{ $purchase->purchased_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- All Purchases Table -->
        @if($purchases->count())
            <div class="overflow-x-auto bg-zinc-900 rounded-xl border border-zinc-800/60">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-400">
                            <th class="px-6 py-4">User</th>
                            <th class="px-6 py-4">Model</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($purchases as $purchase)
                            <tr class="hover:bg-zinc-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white">{{ $purchase->user->name }}</p>
                                    <p class="text-sm text-zinc-400">{{ $purchase->user->email }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white">{{ $purchase->threed->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-blue-500/10 text-blue-400 text-xs font-bold rounded">
                                        {{ $purchase->threed->category->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-bold text-white">${{ number_format($purchase->threed->price, 2) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $purchase->purchased_at->format('M d, Y H:i') }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.purchases.show', $purchase) }}"
                                        class="inline-block px-3 py-1 bg-cyan-500/10 text-cyan-400 text-xs font-bold rounded hover:bg-cyan-500/20 transition-colors">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $purchases->links() }}
        @else
            <div class="text-center py-12 text-zinc-500">
                <p>No purchases found</p>
            </div>
        @endif
    </div>
</x-admin-layout>