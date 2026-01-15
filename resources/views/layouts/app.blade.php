<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Financiero')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white shadow-xl transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col h-full">
            <!-- Logo/Header -->
            <div class="px-6 py-6 bg-gradient-to-r from-blue-600 to-blue-700">
                <h2 class="text-2xl font-bold text-white">Sistema</h2>
                <p class="text-blue-100 text-sm mt-1">Gestión Financiera</p>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('utilities.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors {{ request()->routeIs('utilities.index') ? 'bg-blue-50 border-l-4 border-blue-600 text-gray-700 font-medium' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Dashboard
                </a>

                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Catálogos</p>
                </div>

                <a href="{{ route('providers.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors {{ request()->routeIs('providers.*') ? 'bg-blue-50 border-l-4 border-blue-600 text-gray-700 font-medium' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Proveedores
                </a>

                <a href="{{ route('incomes.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors {{ request()->routeIs('incomes.*') ? 'bg-blue-50 border-l-4 border-blue-600 text-gray-700 font-medium' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Ingresos
                </a>

                <a href="{{ route('expenses.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors {{ request()->routeIs('expenses.*') ? 'bg-blue-50 border-l-4 border-blue-600 text-gray-700 font-medium' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Gastos
                </a>
            </nav>

            <!-- Footer -->
            <div class="px-6 py-4 border-t border-gray-200">
                <p class="text-xs text-gray-500">© 2025 Sistema Financiero</p>
            </div>
        </div>
    </div>

    <!-- Mobile menu button -->
    <button id="menuBtn" class="md:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-lg">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- Main Content -->
    <div class="md:ml-64 min-h-screen">
        @yield('content')
    </div>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>

    @stack('scripts')
</body>

</html>