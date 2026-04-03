<aside
    class="h-screen w-64 fixed left-0 top-0 bg-zinc-900 border-r border-zinc-800/50 flex flex-col py-6 font-['Manrope'] font-medium z-50">
    <div class="px-6 mb-8">
        <h1 class="text-xl font-black text-white tracking-tighter">Admin Panel</h1>
        <p class="text-xs text-zinc-500 font-label uppercase tracking-widest">System Controller</p>
    </div>
    <nav class="flex-1 flex flex-col">
        <a class="flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-200 hover:bg-zinc-800/80 transition-all duration-200 ease-in-out"
            href="#">
            <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
            <span>Dashboard</span>
        </a>
        <!-- Active State: Manage Models -->
        <a class="flex items-center gap-3 px-4 py-3 bg-zinc-800 text-cyan-400 border-l-4 border-violet-500 transition-all duration-200 ease-in-out"
            href="#">
            <span class="material-symbols-outlined" data-icon="view_in_ar">view_in_ar</span>
            <span>Manage Models</span>

        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-200 hover:bg-zinc-800/80 transition-all duration-200 ease-in-out"
            href="#">
            <span class="material-symbols-outlined" data-icon="group">group</span>
            <span>User Directory</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-200 hover:bg-zinc-800/80 transition-all duration-200 ease-in-out"
            href="#">
            <span class="material-symbols-outlined" data-icon="payments">payments</span>
            <span>Sales Data</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-200 hover:bg-zinc-800/80 transition-all duration-200 ease-in-out"
            href="#">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span>Settings</span>
        </a>
    </nav>
    <div class="px-4 mb-6">
        <button
            class="w-full py-3 bg-gradient-to-br from-primary to-primary-container text-on-primary font-bold rounded-lg flex items-center justify-center gap-2 shadow-lg shadow-primary/10 active:scale-95 transition-transform">
            <span class="material-symbols-outlined text-sm">add</span>
            Upload New Model
        </button>
    </div>
    <div class="border-t border-zinc-800/50 pt-4">
        <a class="flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-200 transition-all" href="#">
            <span class="material-symbols-outlined" data-icon="help">help</span>
            <span>Support</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-200 transition-all" href="#">
            <span class="material-symbols-outlined" data-icon="logout">logout</span>
            <span>Log Out</span>
        </a>
    </div>
</aside>