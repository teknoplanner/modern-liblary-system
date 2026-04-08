<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>@yield('title', 'Manajemen') | LuminaLib</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cyan: {
                            50: '#ecfeff',
                            100: '#cffafe',
                            200: '#a5f3fc',
                            300: '#67e8f9',
                            400: '#22d3ee',
                            500: '#06b6d4',
                            600: '#0891b2',
                            700: '#0e7490',
                            800: '#155e75',
                            900: '#164e63',
                            950: '#083344',
                        },
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #fdfdfd; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(0, 0, 0, 0.05); }
        .text-gradient { background: linear-gradient(135deg, #0891b2 0%, #06b6d4 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="antialiased text-slate-900">
    <div class="min-h-screen flex flex-col">
        <!-- Modern Navbar -->
        <nav class="glass sticky top-0 z-50 h-20 flex items-center px-6 md:px-12 backdrop-blur-md">
            <div class="flex items-center justify-between w-full max-w-7xl mx-auto">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-cyan-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-cyan-200 group-hover:rotate-6 transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <span class="text-2xl font-extrabold tracking-tight text-slate-900">Lumina<span class="text-cyan-600">Lib</span></span>
                </a>
                
                <div class="hidden md:flex items-center gap-10 text-[15px] font-bold text-slate-500">
                    @auth
                        <a href="/books" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Koleksi Buku</a>
                        <a href="/members" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Anggota</a>
                        <a href="/loans" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Peminjaman</a>
                        <a href="/reports" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Laporan</a>
                    @else
                        <a href="/" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Beranda</a>
                        <a href="/about" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Tentang Kami</a>
                        <a href="/services" class="hover:text-cyan-600 transition-colors uppercase tracking-widest text-[11px]">Layanan</a>
                    @endauth
                </div>

                <div class="flex items-center gap-6">
                    @auth
                        <div class="hidden sm:flex flex-col items-end">
                            <span class="text-xs font-black text-slate-400 uppercase tracking-tighter">Petugas</span>
                            <span class="text-sm font-bold text-slate-800 leading-tight">{{ auth()->user()->name }}</span>
                        </div>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="p-2.5 text-rose-500 hover:bg-rose-50 rounded-xl transition-all active:scale-90">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            </button>
                        </form>
                    @else
                        <a href="/login" class="text-sm font-bold text-slate-600 hover:text-cyan-600 transition-colors">Masuk</a>
                        <a href="/register" class="px-7 py-3 bg-cyan-600 text-white text-sm font-black rounded-2xl hover:bg-cyan-700 shadow-xl shadow-cyan-100 transition-all active:scale-95 uppercase tracking-widest">Daftar</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-grow py-12 px-6 md:px-12 max-w-7xl mx-auto w-full">
            @if(session('success'))
                <div class="mb-8 bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-3xl flex items-center gap-4 animate-in fade-in slide-in-from-top duration-500 shadow-sm">
                    <div class="w-8 h-8 bg-emerald-500/10 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="font-bold text-sm tracking-tight">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 bg-rose-50 border border-rose-100 text-rose-700 px-6 py-4 rounded-3xl flex items-center gap-4 animate-in fade-in slide-in-from-top duration-500 shadow-sm">
                    <div class="w-8 h-8 bg-rose-500/10 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </div>
                    <span class="font-bold text-sm tracking-tight">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-white border-t border-slate-100 py-12 px-6 text-center">
            <div class="max-w-7xl mx-auto flex flex-col items-center gap-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-cyan-600">LuminaLib v1.0</span>
                    <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                </div>
                <p class="text-slate-400 text-sm font-medium">&copy; {{ date('Y') }} Sistem Perpustakaan LuminaLib. Dikelola dengan Integritas.</p>
            </div>
        </footer>
    </div>

    @stack('modals')
</body>
</html>
