<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'LibrarySystem') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8fafc; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
    </style>
</head>
<body class="antialiased text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Modern Navbar -->
        <nav class="bg-white/80 glass sticky top-0 z-50 border-b border-gray-100 h-16 flex items-center px-6 md:px-12">
            <div class="flex items-center justify-between w-full max-w-7xl mx-auto">
                <a href="/" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-900 ml-1">Lumina<span class="text-indigo-600">Lib</span></span>
                </a>
                
                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-500">
                    @auth
                        <a href="/books" class="hover:text-indigo-600 transition-colors">Books</a>
                        <a href="/members" class="hover:text-indigo-600 transition-colors">Members</a>
                        <a href="/loans" class="hover:text-indigo-600 transition-colors">Loans</a>
                        <a href="/reports" class="hover:text-indigo-600 transition-colors">Reports</a>
                    @else
                        <a href="/" class="hover:text-indigo-600 transition-colors">Home</a>
                        <a href="/about" class="hover:text-indigo-600 transition-colors">About</a>
                        <a href="/services" class="hover:text-indigo-600 transition-colors">Services</a>
                    @endauth
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <span class="text-sm font-semibold text-gray-700">{{ auth()->user()->name }}</span>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-rose-600 hover:bg-rose-50 rounded-lg transition-colors">Logout</button>
                        </form>
                    @else
                        <a href="/login" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Login</a>
                        <a href="/register" class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 shadow-md shadow-indigo-100 transition-all active:scale-95">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-grow py-8 px-6 md:px-12 max-w-7xl mx-auto w-full">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 animate-in fade-in slide-in-from-top duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-rose-50 border border-rose-100 text-rose-700 px-4 py-3 rounded-xl flex items-center gap-3 animate-in fade-in slide-in-from-top duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-white border-t border-gray-100 py-8 px-6 text-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} LuminaLib Library System. Build with Excellence.</p>
        </footer>
    </div>
</body>
</html>
