<footer class="w-full bg-zinc-950 border-t border-zinc-800/50 py-12 mt-10">
    <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-8">

        <div class="flex flex-col gap-2 text-center md:text-left">
            <x-application-logo />
            <p class="text-zinc-500 text-sm lowercase tracking-normal">
                © {{ date('Y') }} Kinetic Gallery. Built for the 3D generation.
            </p>
        </div>

        <div class="flex flex-wrap justify-center gap-8 text-[10px] uppercase tracking-[0.2em] font-bold">
            <a class="text-zinc-500 hover:text-cyan-400 transition-colors duration-300" href="#">Terms of Service</a>
            <a class="text-zinc-500 hover:text-cyan-400 transition-colors duration-300" href="#">Privacy Policy</a>
            <a class="text-zinc-500 hover:text-cyan-400 transition-colors duration-300" href="#">Contact</a>
            <a class="text-zinc-500 hover:text-cyan-400 transition-colors duration-300" href="#">API Docs</a>
        </div>

        <div class="flex gap-6 items-center">
            <a class="text-zinc-500 hover:text-white transition-all duration-300 transform hover:scale-110" href="#">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                </svg>
            </a>
            <a class="text-zinc-500 hover:text-white transition-all duration-300 transform hover:scale-110" href="#">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.493-1.1-1.1s.493-1.1 1.1-1.1 1.1.493 1.1 1.1-.493 1.1-1.1 1.1zm9 6.891h-2v-3.86c0-2.023-2.422-1.87-2.422 0v3.86h-2v-6h2v1.09c.897-1.662 4.422-1.787 4.422 1.411v3.499z"></path>
                </svg>
            </a>
        </div>
    </div>
</footer>