<x-admin-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-white">Users Management</h2>
            <div class="flex gap-4">
                <a href="{{ route('admin.users.create') }}"
                    class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-black font-bold rounded-lg transition-colors">
                    + Create User
                </a>
                <a href="{{ route('admin.dashboard') }}"
                    class="text-sm text-zinc-400 hover:text-cyan-400 transition-colors">Back to Dashboard</a>
            </div>
        </div>

        @if($users->count())
            <div class="overflow-x-auto bg-zinc-900 rounded-xl border border-zinc-800/60">
                <table class="w-full">
                    <thead class="border-b border-zinc-800/60">
                        <tr class="text-left text-xs font-bold uppercase tracking-widest text-zinc-400">
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Joined</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/40">
                        @foreach($users as $user)
                            <tr class="hover:bg-zinc-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-medium text-white">{{ $user->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $user->email }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-3 py-1 rounded-full text-xs font-bold {{ $user->role === 'admin' ? 'bg-red-500/10 text-red-400' : 'bg-blue-500/10 text-blue-400' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-zinc-400">{{ $user->created_at->format('M d, Y') }}</p>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="inline-block px-3 py-1 bg-cyan-500/10 text-cyan-400 text-xs font-bold rounded hover:bg-cyan-500/20 transition-colors">
                                        Edit
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-500/10 text-red-400 text-xs font-bold rounded hover:bg-red-500/20 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        @else
            <div class="text-center py-12 text-zinc-500">
                <p>No users found</p>
            </div>
        @endif
    </div>
<div class="space-y-3">
    <!-- User Row 1 (Active) -->
    <div
        class="group relative bg-surface-container border-l-2 border-secondary p-5 flex items-center justify-between transition-all hover:bg-surface-container-high cursor-pointer">
        <div class="flex items-center gap-4">
            <div class="relative w-12 h-12 rounded-full overflow-hidden bg-surface-variant">
                <img alt="User"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                    data-alt="portrait of a professional creative director with short dark hair and a confident expression in a studio with soft lighting"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBK1MH5hGGksfiHlYmKkMCnTm8QAgU_WWUNbksvRYWdJaQBGP01pcsUm-Y_8VDz8VLK6U_6K3MJl1_y57J-545YnUtXoHgBJytTa1wiJSYqIxvkD5pTHgfKHQSE-643wCgB5qTStfbH3T6vHzXLx3IJ96zssQqvvd114SbtwMcPOuVamqBNDbKpGo8j_oiSG9Owb0sWnGK-JM1YCqZxMODkFZepiCE2tSDJcJCo6paAW3kiqa0rWYdv13-84DgNav6D53YXJJ3-DG4" />
                <div class="absolute inset-0 bg-secondary/10"></div>
            </div>
            <div>
                <div class="font-bold text-on-surface group-hover:text-primary transition-colors">Alex
                    Thorne</div>
                <div class="text-xs text-outline font-label">a.thorne@studio.ai</div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Join Date</div>
            <div class="text-sm font-medium">Oct 12, 2023</div>
        </div>
        <div class="text-right flex items-center gap-8">
            <div class="hidden sm:block">
                <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Purchased
                </div>
                <div class="text-sm font-bold text-secondary">24 Models</div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-on-surface transition-colors"
                data-icon="chevron_right">chevron_right</span>
        </div>
    </div>
    <!-- User Row 2 -->
    <div
        class="group bg-surface-container-low p-5 flex items-center justify-between transition-all hover:bg-surface-container-high cursor-pointer">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant">
                <img alt="User"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                    data-alt="close up portrait of a smiling woman with glasses and natural lighting in an urban environment"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnONWYmcy8aRMyq7IvWHCmMfsXXLTj7swLiHYM-KzskgWA_tJVWiyj9shuQ2A8zwA2c3BFo_-3erdi_bUjfRTM2923R741hSn5xWEog6j-8rKXH3biFxc19DkXmKzeZiUSvQBOjc6mWJXj6BXCFppwsVnKCLeRdkNsYU1_p9kEnfF_BaxGxkV4Mmd_7swZJ84iHd2h1Iqbr6oZ93svwjuPaDEBDSQ6dDxDW2OB0Q2oL4QGt_hBxp4gm6Hf5vSgiDV1VshBe6PeE74" />
            </div>
            <div>
                <div class="font-bold text-on-surface">Elena Rodriguez</div>
                <div class="text-xs text-outline font-label">elena.ro@viz.io</div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Join Date</div>
            <div class="text-sm font-medium text-on-surface-variant">Nov 04, 2023</div>
        </div>
        <div class="text-right flex items-center gap-8">
            <div class="hidden sm:block">
                <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Purchased
                </div>
                <div class="text-sm font-bold text-on-surface">12 Models</div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-on-surface transition-colors"
                data-icon="chevron_right">chevron_right</span>
        </div>
    </div>
    <!-- User Row 3 -->
    <div
        class="group bg-surface-container-low p-5 flex items-center justify-between transition-all hover:bg-surface-container-high cursor-pointer">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant">
                <img alt="User"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                    data-alt="minimalist portrait of a man with sharp features wearing a black turtleneck against a dark grey background"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD86QwumL-Ztjd-fS11USGE0Sdk6hK7qGXzCYWxraN6IvtgAWv63HxXunkPUZJDb_4fOZNWEOdzeXmEiIFvMhLBf_HG9Yk5-Dc95__gFHLZC-4QkdLvXLGjtExKj6YjpMzBBVf1YB8peO8Xn-X1ioDjxfhQWBxJsmZlA8Mjl031SM2Fj7zhGhNkrqA1QscDyzmv71U0Io0gC_mz5beFpu0hRuQxeouhwKD8kB3ql9q-asyRoeMbIK2tjUkZzZGM4uIG4ckiiI-3iGg" />
            </div>
            <div>
                <div class="font-bold text-on-surface">Jordan S.</div>
                <div class="text-xs text-outline font-label">j.smith@architects.net</div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Join Date</div>
            <div class="text-sm font-medium text-on-surface-variant">Jan 18, 2024</div>
        </div>
        <div class="text-right flex items-center gap-8">
            <div class="hidden sm:block">
                <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Purchased
                </div>
                <div class="text-sm font-bold text-on-surface">3 Models</div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-on-surface transition-colors"
                data-icon="chevron_right">chevron_right</span>
        </div>
    </div>
    <!-- User Row 4 -->
    <div
        class="group bg-surface-container-low p-5 flex items-center justify-between transition-all hover:bg-surface-container-high cursor-pointer">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant">
                <img alt="User"
                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                    data-alt="fashionable portrait of a woman with vibrant hair color and dramatic eyeshadow in cinematic studio lighting"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCbdil5KMHpPGT-X-wUb-KROuI02nN-8CSdi6dklUgBHxR1PkI4wmkzpYnnRmPszqQVb1HNiMl2MJs2LQflauXqMfX_-2U5FUzd4N8neq_AFtQ8DqLLoDKrtL6nKdruWv9Qa1lJSX-Ul16VqK-Gd8-HVfgI-Ys4-MP54mpr7_-QyVAOa9lqsBKHo8yVXdk4c6-Hs5xxXk_toEq6XitGv3_2yqqu2gpw6eQsJDeqI5AfTPIH9vmi96ysYm4gZt29GSywnxakMRF2WbU" />
            </div>
            <div>
                <div class="font-bold text-on-surface">Maya Chen</div>
                <div class="text-xs text-outline font-label">maya@gaming.dev</div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Join Date</div>
            <div class="text-sm font-medium text-on-surface-variant">Feb 02, 2024</div>
        </div>
        <div class="text-right flex items-center gap-8">
            <div class="hidden sm:block">
                <div class="text-xs text-outline font-label uppercase tracking-tighter mb-1">Purchased
                </div>
                <div class="text-sm font-bold text-on-surface">45 Models</div>
            </div>
            <span class="material-symbols-outlined text-outline group-hover:text-on-surface transition-colors"
                data-icon="chevron_right">chevron_right</span>
        </div>
    </div>
</div>
<div class="pt-6 flex justify-center">
    <button
        class="font-label text-xs font-bold uppercase tracking-widest text-outline hover:text-primary transition-colors flex items-center gap-2">
        Load More Users
        <span class="material-symbols-outlined text-sm" data-icon="expand_more">expand_more</span>
    </button>
</div>
</div>
<!-- Detail Inspection Panel (The "Asymmetric" Element) -->
<div class="col-span-12 lg:col-span-4 space-y-6">
    <div class="sticky top-12 bg-surface-container-high p-8 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-8">
            <div>
                <h3 class="font-headline text-2xl font-bold tracking-tight mb-1">User Details</h3>
                <p class="text-secondary font-label text-xs font-bold uppercase">Selection: Alex Thorne</p>
            </div>
            <button class="text-outline hover:text-error transition-colors">
                <span class="material-symbols-outlined" data-icon="person_off">person_off</span>
            </button>
        </div>
        <div class="space-y-6">
            <!-- Summary Stats -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-surface-container p-4">
                    <div class="text-outline text-[10px] font-label uppercase tracking-widest mb-1">Total
                        Spent</div>
                    <div class="text-lg font-headline font-bold text-primary">$4,280.00</div>
                </div>
                <div class="bg-surface-container p-4">
                    <div class="text-outline text-[10px] font-label uppercase tracking-widest mb-1">Active
                        Plans</div>
                    <div class="text-lg font-headline font-bold">Pro Tier</div>
                </div>
            </div>
            <!-- Purchased Models Section -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-bold text-sm">Inventory (24)</h4>
                    <button class="text-xs text-primary font-bold hover:underline">Manage All</button>
                </div>
                <div class="space-y-3">
                    <!-- Model Item 1 -->
                    <div
                        class="flex items-center gap-4 bg-surface p-3 transition-colors hover:bg-surface-variant group">
                        <div class="w-12 h-12 bg-surface-container flex-shrink-0">
                            <img alt="Model" class="w-full h-full object-cover"
                                data-alt="abstract 3D rendered sphere with liquid chrome texture floating in a dark purple void with glowing highlights"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGnZ47D36wUZwBgotmfJ5lN0uwuSm5X_TbJoDDcZIF_lzDIMI46XSDiWP1eZfPT7VFEjKuVpssWEezexLB-vX8nWogwg3jrxCbKnK3D1sSCYrpQ8dIqAvbU5AihekW6FMUTwu5E79ZAmj7Gng2I2G1cZfsdq_Y_Aw4qxV2LMhIRKXvPmIL59lYW6yR3SQzLZ8SorxygqTLmIgD-ELp_ZCyuyDfh9GlfZTPlcpwyVBPs2kRSrXxDqvhTCdJ9kuH7t2OO2db1YVay2c" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-bold truncate group-hover:text-primary transition-colors">
                                Cyber-Organic Pod v2</div>
                            <div class="text-[10px] text-outline font-label">Bought: Oct 14, 2023</div>
                        </div>
                        <button class="text-outline hover:text-on-surface">
                            <span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                        </button>
                    </div>
                    <!-- Model Item 2 -->
                    <div
                        class="flex items-center gap-4 bg-surface p-3 transition-colors hover:bg-surface-variant group">
                        <div class="w-12 h-12 bg-surface-container flex-shrink-0">
                            <img alt="Model" class="w-full h-full object-cover"
                                data-alt="geometric architectural structure with neon blue light strips and sleek dark metallic surfaces"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ2931kXybAnIMQA_1RlT_qlmdvkdHRoEH77tlW7Jg_Jx6nxLucP_VxcrVJX429HAe4wJYy3HrEdDnobr7vtMvJf9ln89I44vIF3Y-eRdTk7G1ZcuF7bshJoIE9SysSwhIlblF64gV2COwUqGzrALILqU4c7NFVN1Z5TrYIFCnZBG03pnNsthtI9N3jPtojmDU60IacvUwedTGsHeDCw5GpEZwQjd0_fpigWMSqC5GgBebDFu8TnTZccMnv_hRrLMOAo9fPgfgHOs" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-bold truncate group-hover:text-primary transition-colors">
                                Neon Modular Hub</div>
                            <div class="text-[10px] text-outline font-label">Bought: Oct 18, 2023</div>
                        </div>
                        <button class="text-outline hover:text-on-surface">
                            <span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                        </button>
                    </div>
                    <!-- Model Item 3 -->
                    <div
                        class="flex items-center gap-4 bg-surface p-3 transition-colors hover:bg-surface-variant group">
                        <div class="w-12 h-12 bg-surface-container flex-shrink-0">
                            <img alt="Model" class="w-full h-full object-cover"
                                data-alt="hyper-realistic 3D robot arm with exposed circuitry and carbon fiber components on a clean white background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYayqprhlulZxcknbtXDH1Q3vf22yFsTpZFlLQ4NKeVTD6lBdhEV0xbBOtwJxWOifcszbcaZrSNikRKQWRtHky0pLEPf3KFN7Gk79jBfQjyhBDGy6yZjhOBwIrjEHbBgZBoUTt7oqG3B6CkJNeEueMscMl8CM6vUwkrAbYKjkFQ1h0XUOf23LVwykgeml5zn0IZcHb0lhxIdt7enOQc6dh0hk2m7-ncmtdlwybAUCq5dRy7yQ1JHqB1_Qx3173eO0jMf0cEGGEbAM" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-bold truncate group-hover:text-primary transition-colors">
                                Robotic Rig - Alpha</div>
                            <div class="text-[10px] text-outline font-label">Bought: Nov 01, 2023</div>
                        </div>
                        <button class="text-outline hover:text-on-surface">
                            <span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="pt-4 border-t border-outline-variant/10 space-y-3">
                <button
                    class="w-full border border-primary/20 text-primary py-3 text-xs font-bold font-label uppercase tracking-widest hover:bg-primary/5 transition-all">
                    Send Notification
                </button>
                <button
                    class="w-full border border-error/20 text-error py-3 text-xs font-bold font-label uppercase tracking-widest hover:bg-error/5 transition-all">
                    Flag Account
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</main>
</x-admin-layout>