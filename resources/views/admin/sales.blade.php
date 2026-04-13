<x-admin-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">Sales Report</h2>
                <p class="text-sm text-zinc-400 mt-1">Total Revenue: <span
                        class="font-bold text-cyan-400">${{ number_format($totalRevenue, 2) }}</span></p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Dashboard</a>
        </div>

        @if($sales->count())
            <div class="overflow-x-auto bg-zinc-900 rounded-xl border border-zinc-800/60">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-400">
                            <th class="px-6 py-4">Model</th>
                            <th class="px-6 py-4">Buyer</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Purchase Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($sales as $sale)
                            <tr class="hover:bg-zinc-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white">{{ $sale->threed->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $sale->user->name }} ({{ $sale->user->email }})</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($sale->threed->price == 0)
                                        <span class="font-bold text-emerald-400">Free</span>
                                    @else
                                        <span class="font-bold text-white">${{ number_format($sale->threed->price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $sale->purchased_at->format('M d, Y H:i') }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $sales->links() }}
        @else
            <div class="text-center py-12 text-zinc-500">
                <p>No sales found</p>
            </div>
        @endif
    </div>
</x-admin-layout>