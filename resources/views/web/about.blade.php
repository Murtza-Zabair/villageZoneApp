@extends('web.layout')

@section('title', 'About Us - Village Zone')

@section('content')
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
        <div class="px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">
                    <i class="fas fa-seedling mr-3"></i>
                    About Village Zone
                </h1>
                <p class="text-xl text-green-100">
                    Empowering farmers with innovative solutions since 2018
                </p>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="bg-white rounded-lg shadow-lg mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Cultivating Success Through Innovation</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Village Zone was founded with a simple yet powerful vision: to bridge the gap between traditional
                    farming wisdom and modern agricultural technology. We believe that every farmer, regardless of size or
                    experience, deserves access to the tools, knowledge, and resources needed to thrive in today's
                    competitive agricultural landscape.
                </p>
                <p class="text-gray-600 mb-6">
                    Our comprehensive platform combines cutting-edge technology with time-tested farming practices, creating
                    solutions that are both innovative and practical. From precision agriculture tools to expert
                    consultation services, we're committed to helping farmers increase productivity, reduce costs, and build
                    sustainable operations for future generations.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">10,000+</div>
                        <div class="text-sm text-gray-600">Farmers Served</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">500+</div>
                        <div class="text-sm text-gray-600">Products Available</div>
                    </div>
                </div>
            </div>
            <div class="p-8">
                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-lg p-8">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-award text-green-600 text-2xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-1">Quality Assured</h4>
                            <p class="text-sm text-gray-600">Certified products and services</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-users text-blue-600 text-2xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-1">Expert Support</h4>
                            <p class="text-sm text-gray-600">24/7 agricultural guidance</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-leaf text-yellow-600 text-2xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-1">Sustainable</h4>
                            <p class="text-sm text-gray-600">Environmentally responsible</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-rocket text-purple-600 text-2xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-1">Innovation</h4>
                            <p class="text-sm text-gray-600">Latest technology solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Call to Action -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg shadow-lg p-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Transform Your Farm?</h2>
        <p class="text-xl text-green-100 mb-8">Join thousands of successful farmers who trust Village Zone for their
            agricultural needs</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('market') }}"
                class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-50 transition-colors">
                <i class="fas fa-shopping-cart mr-2"></i>
                Explore Products
            </a>
            <a href="{{ route('contact') }}"
                class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors">
                <i class="fas fa-phone mr-2"></i>
                Contact Us
            </a>
        </div>
    </div>
@endsection
