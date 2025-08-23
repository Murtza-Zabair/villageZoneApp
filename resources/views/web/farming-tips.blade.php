@extends('web.layout')

@section('title', 'Farming Tips - Village Zone')

@section('content')
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
        <div class="px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">
                    <i class="fas fa-lightbulb mr-3"></i>
                    Expert Farming Tips
                </h1>
                <p class="text-xl text-emerald-100">
                    Proven strategies and techniques to maximize your agricultural success
                </p>
            </div>
        </div>
    </div>

    <!-- Featured Tips Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <a href="#crop-cultivation"
            class="block bg-gradient-to-br from-green-400 to-green-600 text-white rounded-lg p-6 text-center hover:transform hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-green-700">
            <i class="fas fa-seedling text-3xl mb-3"></i>
            <h3 class="text-lg font-semibold mb-2">Crop Cultivation</h3>
            <p class="text-green-100 text-sm">Planting, growing, and harvesting tips</p>
        </a>

        <a href="#water-management"
            class="block bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-lg p-6 text-center hover:transform hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-blue-700">
            <i class="fas fa-tint text-3xl mb-3"></i>
            <h3 class="text-lg font-semibold mb-2">Water Management</h3>
            <p class="text-blue-100 text-sm">Efficient irrigation and conservation</p>
        </a>

        <a href="#seasonal-farming"
            class="block bg-gradient-to-br from-yellow-400 to-yellow-600 text-white rounded-lg p-6 text-center hover:transform hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-yellow-700">
            <i class="fas fa-sun text-3xl mb-3"></i>
            <h3 class="text-lg font-semibold mb-2">Seasonal Farming</h3>
            <p class="text-yellow-100 text-sm">Season-specific cultivation advice</p>
        </a>

        <a href="#technology"
            class="block bg-gradient-to-br from-purple-400 to-purple-600 text-white rounded-lg p-6 text-center hover:transform hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-purple-700">
            <i class="fas fa-cogs text-3xl mb-3"></i>
            <h3 class="text-lg font-semibold mb-2">Technology</h3>
            <p class="text-purple-100 text-sm">Modern farming techniques and tools</p>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Crop Cultivation Tips -->
            <div id="crop-cultivation" class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-leaf text-green-600 mr-3"></i>
                        Crop Cultivation Excellence
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-green-700">Soil Preparation</h3>
                            <div class="space-y-4">
                                <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                                    <h4 class="font-semibold text-green-800 mb-2">1. Soil Testing</h4>
                                    <p class="text-gray-700 text-sm">Test pH levels (6.0-7.0 ideal for most crops), nutrient
                                        content, and organic matter percentage before planting.</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                                    <h4 class="font-semibold text-green-800 mb-2">2. Organic Matter</h4>
                                    <p class="text-gray-700 text-sm">Add compost or well-rotted manure to improve soil
                                        structure and fertility. Aim for 3-5% organic matter content.</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                                    <h4 class="font-semibold text-green-800 mb-2">3. Tillage Timing</h4>
                                    <p class="text-gray-700 text-sm">Till when soil moisture is at field capacity - not too
                                        wet or too dry. Follow the "squeeze test" method.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-blue-700">Smart Planting</h3>
                            <div class="space-y-4">
                                <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                                    <h4 class="font-semibold text-blue-800 mb-2">Seed Selection</h4>
                                    <p class="text-gray-700 text-sm">Choose disease-resistant varieties suited to your
                                        climate zone. Check germination rates before large-scale planting.</p>
                                </div>
                                <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                                    <h4 class="font-semibold text-blue-800 mb-2">Spacing & Depth</h4>
                                    <p class="text-gray-700 text-sm">Follow recommended spacing for proper air circulation.
                                        Plant seeds 2-3 times their diameter deep.</p>
                                </div>
                                <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                                    <h4 class="font-semibold text-blue-800 mb-2">Succession Planting</h4>
                                    <p class="text-gray-700 text-sm">Stagger plantings every 2-3 weeks for continuous
                                        harvest throughout the growing season.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Water Management -->
            <div id="water-management" class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-50 px-6 py-4 border-b">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-water text-blue-600 mr-3"></i>
                        Efficient Water Management
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-clock text-blue-600 text-xl"></i>
                            </div>
                            <h4 class="font-semibold mb-2">Optimal Timing</h4>
                            <p class="text-sm text-gray-600">Water early morning or late evening to reduce evaporation
                                losses</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-thermometer-half text-blue-600 text-xl"></i>
                            </div>
                            <h4 class="font-semibold mb-2">Deep Watering</h4>
                            <p class="text-sm text-gray-600">Water deeply but less frequently to encourage deep root growth
                            </p>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-layer-group text-blue-600 text-xl"></i>
                            </div>
                            <h4 class="font-semibold mb-2">Mulching</h4>
                            <p class="text-sm text-gray-600">Use organic mulch to retain soil moisture and reduce watering
                                needs</p>
                        </div>
                    </div>

                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <h4 class="font-semibold text-yellow-800 mb-2 flex items-center">
                            <i class="fas fa-exclamation-triangle text-yellow-600 mr-2"></i>
                            Water Conservation Tips
                        </h4>
                        <ul class="space-y-2 text-sm text-yellow-700">
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i>Install drip irrigation systems for 30-50%
                                water savings</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i>Collect rainwater in tanks or ponds for dry
                                season use</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i>Use moisture sensors to monitor soil water
                                levels</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i>Group plants with similar water
                                requirements together</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Pest and Disease Management -->
            <div id="seasonal-farming" class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-red-50 px-6 py-4 border-b">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-bug text-red-600 mr-3"></i>
                        Integrated Pest Management
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-red-700">Prevention First</h3>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <i class="fas fa-shield-alt text-green-500 mr-3 mt-1"></i>
                                    <div>
                                        <strong>Crop Rotation</strong>
                                        <p class="text-sm text-gray-600">Rotate crops annually to break pest and disease
                                            cycles</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-seedling text-green-500 mr-3 mt-1"></i>
                                    <div>
                                        <strong>Companion Planting</strong>
                                        <p class="text-sm text-gray-600">Plant marigolds, basil, or nasturtiums to repel
                                            pests naturally</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-eye text-green-500 mr-3 mt-1"></i>
                                    <div>
                                        <strong>Regular Monitoring</strong>
                                        <p class="text-sm text-gray-600">Inspect plants weekly for early pest and disease
                                            detection</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-orange-700">Natural Solutions</h3>
                            <div class="space-y-3">
                                <div class="bg-orange-50 p-3 rounded-lg">
                                    <strong class="text-orange-800">Beneficial Insects</strong>
                                    <p class="text-sm text-gray-700 mt-1">Encourage ladybugs, lacewings, and parasitic
                                        wasps</p>
                                </div>
                                <div class="bg-orange-50 p-3 rounded-lg">
                                    <strong class="text-orange-800">Organic Sprays</strong>
                                    <p class="text-sm text-gray-700 mt-1">Use neem oil, soap sprays, or diatomaceous earth
                                    </p>
                                </div>
                                <div class="bg-orange-50 p-3 rounded-lg">
                                    <strong class="text-orange-800">Physical Barriers</strong>
                                    <p class="text-sm text-gray-700 mt-1">Row covers, sticky traps, and copper barriers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seasonal Calendar -->
            <div id="technology" class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-yellow-50 px-6 py-4 border-b">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-calendar-alt text-yellow-600 mr-3"></i>
                        Seasonal Farming Calendar
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                            <h4 class="font-semibold text-green-800 mb-2 flex items-center">
                                <i class="fas fa-leaf mr-2"></i>Spring
                            </h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• Soil preparation and testing</li>
                                <li>• Plant cool-season crops</li>
                                <li>• Start seedlings indoors</li>
                                <li>• Prune fruit trees</li>
                                <li>• Apply pre-emergent herbicides</li>
                            </ul>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                            <h4 class="font-semibold text-yellow-800 mb-2 flex items-center">
                                <i class="fas fa-sun mr-2"></i>Summer
                            </h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• Plant warm-season crops</li>
                                <li>• Increase watering frequency</li>
                                <li>• Harvest early crops</li>
                                <li>• Pest monitoring and control</li>
                                <li>• Side-dress with fertilizer</li>
                            </ul>
                        </div>
                        <div class="bg-orange-50 p-4 rounded-lg border-l-4 border-orange-400">
                            <h4 class="font-semibold text-orange-800 mb-2 flex items-center">
                                <i class="fas fa-tree mr-2"></i>Fall
                            </h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• Harvest main crops</li>
                                <li>• Plant cover crops</li>
                                <li>• Collect and store seeds</li>
                                <li>• Prepare equipment for storage</li>
                                <li>• Apply winter fertilizers</li>
                            </ul>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                            <h4 class="font-semibold text-blue-800 mb-2 flex items-center">
                                <i class="fas fa-snowflake mr-2"></i>Winter
                            </h4>
                            <ul class="space-y-1 text-sm text-gray-700">
                                <li>• Plan next year's garden</li>
                                <li>• Order seeds and supplies</li>
                                <li>• Maintain and repair tools</li>
                                <li>• Study crop rotation plans</li>
                                <li>• Attend farming workshops</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
