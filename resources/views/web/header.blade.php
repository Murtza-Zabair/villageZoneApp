<header class="bg-green-600 shadow-lg">
    <nav class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-white text-2xl font-bold flex items-center">
                    <i class="fas fa-seedling mr-2"></i>
                    Village Zone
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-white hover:text-green-200 transition-colors">
                    Home
                </a>
                <a href="{{ route('market') }}" class="text-white hover:text-green-200 transition-colors">
                    Market
                </a>
                <a href="{{ route('healthcare') }}" class="text-white hover:text-green-200 transition-colors">
                    Healthcare
                </a>
                <a href="{{ route('farming.tips') }}" class="text-white hover:text-green-200 transition-colors">
                    Farming Tips
                </a>
                <a href="{{ route('contact') }}" class="text-white hover:text-green-200 transition-colors">
                    Contact
                </a>
                <a href="{{ route('about') }}" class="text-white hover:text-green-200 transition-colors">
                    About
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="text-white hover:text-green-200 transition-colors relative">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    @if (session('cart') && count(session('cart')) > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                @auth
                    <div class="relative group">
                        <button class="text-white hover:text-green-200 transition-colors flex items-center">
                            <i class="fas fa-user mr-1"></i>
                            {{ Auth::user()->name }}
                            <i class="fas fa-chevron-down ml-1"></i>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('orders.my') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Orders</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-green-200 transition-colors">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-800 transition-colors">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white hover:text-green-200">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
            <div class="flex flex-col space-y-2">
                <a href="{{ route('home') }}" class="text-white hover:text-green-200 py-2">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a href="{{ route('market') }}" class="text-white hover:text-green-200 py-2">
                    <i class="fas fa-store mr-2"></i> Market
                </a>
                <a href="{{ route('healthcare') }}" class="text-white hover:text-green-200 py-2">
                    <i class="fas fa-heartbeat mr-2"></i> Healthcare
                </a>
                <a href="{{ route('farming.tips') }}" class="text-white hover:text-green-200 py-2">
                    <i class="fas fa-lightbulb mr-2"></i> Farming Tips
                </a>
                <a href="{{ route('contact') }}" class="text-white hover:text-green-200 py-2">
                    <i class="fas fa-envelope mr-2"></i> Contact
                </a>
                <a href="{{ route('about') }}" class="text-white hover:text-green-200 py-2">
                    <i class="fas fa-info-circle mr-2"></i> About
                </a>
            </div>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>
