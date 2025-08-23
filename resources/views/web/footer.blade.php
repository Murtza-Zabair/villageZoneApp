<footer class="bg-green-600 text-white mt-12">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h5 class="text-xl font-bold mb-4 flex items-center">
                    <i class="fas fa-seedling mr-2"></i>
                    Village Zone
                </h5>
                <p class="text-green-100">
                    Your trusted partner in agricultural excellence. Connecting farmers with quality products and
                    expert knowledge.
                </p>
            </div>

            <div>
                <h6 class="text-lg font-semibold mb-4">Quick Links</h6>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-green-100 hover:text-white transition-colors">Home</a>
                    </li>
                    <li><a href="{{ route('market') }}"
                            class="text-green-100 hover:text-white transition-colors">Market</a></li>
                    <li><a href="{{ route('farming.tips') }}"
                            class="text-green-100 hover:text-white transition-colors">Farming Tips</a></li>
                    <li><a href="{{ route('healthcare') }}"
                            class="text-green-100 hover:text-white transition-colors">Healthcare</a></li>
                </ul>
            </div>

            <div>
                <h6 class="text-lg font-semibold mb-4">Support</h6>
                <ul class="space-y-2">
                    <li><a href="{{ route('contact') }}"
                            class="text-green-100 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="{{ route('about') }}" class="text-green-100 hover:text-white transition-colors">About
                            Us</a></li>
                    <li><a href="#" class="text-green-100 hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="text-green-100 hover:text-white transition-colors">Help
                            Center</a></li>
                </ul>
            </div>

            <div>
                <h6 class="text-lg font-semibold mb-4">Connect With Us</h6>
                <div class="flex space-x-4 mb-4">
                    <a href="#" class="text-green-100 hover:text-white transition-colors">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-green-100 hover:text-white transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-green-100 hover:text-white transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-green-100 hover:text-white transition-colors">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                </div>
                <p class="text-green-100">
                    <i class="fas fa-envelope mr-2"></i>
                    info@Village Zone.com
                </p>
                <p class="text-green-100">
                    <i class="fas fa-phone mr-2"></i>
                    +1 (555) 123-4567
                </p>
            </div>
        </div>

        <hr class="border-green-500 my-6">

        <div class="flex flex-col md:flex-row justify-center items-center">
            <p class="text-green-100 mb-4 md:mb-0">
                &copy; 2024 Village Zone. All rights reserved.
            </p>
            {{-- <div class="flex space-x-4">
                <a href="#" class="text-green-100 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-green-100 hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="text-green-100 hover:text-white transition-colors">Cookie Policy</a>
            </div> --}}
        </div>
    </div>
</footer>
