<x-admin-layout>
    <div class="space-y-6">
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">Sales Report</h2>
                <p class="text-sm text-zinc-500 mt-1">
                    Total revenue: <span class="text-cyan-400 font-bold">${{ number_format($totalRevenue, 2) }}</span>
                </p>
            </div>
        </div>

        @if($sales->count())
            <div class="overflow-x-auto bg-zinc-900 rounded-xl border border-zinc-800/60">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-500">
                            <th class="px-6 py-4">Model</th>
                            <th class="px-6 py-4">Buyer</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Purchase Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($sales as $sale)
                            <tr class="hover:bg-zinc-800/40 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white text-sm">{{ $sale->threed->name }}</p>
                                    <p class="text-xs text-zinc-500">{{ $sale->threed->category->name ?? '—' }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-white font-medium">{{ $sale->user->name }}</p>
                                    <p class="text-xs text-zinc-500">{{ $sale->user->email }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($sale->threed->price == 0)
                                        <span class="text-sm font-bold text-emerald-400">Free</span>
                                    @else
                                        <span class="text-sm font-bold text-white">${{ number_format($sale->threed->price, 2) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $sale->purchased_at->format('M d, Y') }}</p>
                                    <p class="text-xs text-zinc-600">{{ $sale->purchased_at->format('H:i') }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                {{ $sales->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                     stroke="currentColor" class="size-12 text-zinc-700 mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p class="text-zinc-500 font-medium">No sales yet</p>
                <p class="text-zinc-600 text-sm mt-1">Sales will appear here once users make purchases</p>
            </div>
        @endif
    </div>
</x-admin-layout>