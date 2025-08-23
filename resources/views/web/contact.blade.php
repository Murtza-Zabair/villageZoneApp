@extends('web.layout')

@section('title', 'Contact Us - Village Zone')

@section('content')
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
        <div class="px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">
                    <i class="fas fa-envelope mr-3"></i>
                    Get In Touch
                </h1>
                <p class="text-xl text-blue-100">
                    We're here to help you grow your agricultural business
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Methods -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-phone text-green-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Call Us</h3>
            <p class="text-gray-600 mb-3">Mon - Fri: 8AM - 6PM</p>
            <a href="tel:+1234567890" class="text-green-600 font-semibold hover:text-green-700">
                +1 (234) 567-8900
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-envelope text-blue-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Email Us</h3>
            <p class="text-gray-600 mb-3">We'll respond within 24 hours</p>
            <a href="mailto:info@Village Zone.com" class="text-blue-600 font-semibold hover:text-blue-700">
                info@Village Zone.com
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow">
            <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-map-marker-alt text-purple-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Visit Us</h3>
            <p class="text-gray-600 mb-3">Agricultural Innovation Center</p>
            <address class="text-purple-600 font-semibold not-italic">
                123 Farm Road<br>
                AgriCity, AC 12345
            </address>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Contact Form -->
        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b">
                    <h2 class="text-2xl font-semibold text-gray-800">Send us a Message</h2>
                    <p class="text-gray-600 mt-1">Fill out the form below and we'll get back to you as soon as possible</p>
                </div>

                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="Enter your full name">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="your@email.com">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Subject <span class="text-red-500">*</span>
                            </label>
                            <select id="subject" name="subject" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select a subject</option>
                                <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>
                                    General Inquiry</option>
                                <option value="Product Support" {{ old('subject') == 'Product Support' ? 'selected' : '' }}>
                                    Product Support</option>
                                <option value="Technical Help" {{ old('subject') == 'Technical Help' ? 'selected' : '' }}>
                                    Technical Help</option>
                                <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>
                                    Partnership Opportunities</option>
                                <option value="Feedback" {{ old('subject') == 'Feedback' ? 'selected' : '' }}>Feedback &
                                    Suggestions</option>
                                <option value="Complaint" {{ old('subject') == 'Complaint' ? 'selected' : '' }}>Complaint
                                </option>
                            </select>
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" rows="6" required maxlength="2000"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Please describe how we can help you...">{{ old('message') }}</textarea>
                            <div class="flex justify-between items-center mt-2">
                                @error('message')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @else
                                    <p class="text-gray-500 text-sm">Please be as detailed as possible</p>
                                @enderror
                                <span class="text-gray-400 text-sm" id="charCount">0/2000</span>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="mt-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800">Our Location</h2>
                <p class="text-gray-600 mt-1">Visit our Agricultural Innovation Center in Gujranwala</p>
            </div>

            <div class="h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13618.89316471097!2d74.1800!3d32.1877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391eeaa20f94f9ad%3A0x5c8b27a3e4c3a4!2sGujranwala%2C%20Punjab!5e0!3m2!1sen!2s!4v1690000000000!5m2!1sen!2s"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

    <script>
        // Character counter for message textarea
        document.addEventListener('DOMContentLoaded', function() {
            const messageTextarea = document.getElementById('message');
            const charCount = document.getElementById('charCount');

            messageTextarea.addEventListener('input', function() {
                const length = this.value.length;
                charCount.textContent = `${length}/2000`;

                if (length > 1900) {
                    charCount.className = 'text-red-500 text-sm';
                } else if (length > 1500) {
                    charCount.className = 'text-yellow-500 text-sm';
                } else {
                    charCount.className = 'text-gray-400 text-sm';
                }
            });
        });

        // Form submission feedback
        const form = document.querySelector('form');
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';
            submitBtn.disabled = true;
        });
    </script>
@endsection
