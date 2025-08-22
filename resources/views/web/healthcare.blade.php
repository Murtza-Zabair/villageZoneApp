@extends('web.layout')

@section('title', 'Agricultural Healthcare - AgriConnect')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
    <div class="px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">
                <i class="fas fa-heartbeat mr-3"></i>
                Agricultural Healthcare
            </h1>
            <p class="text-xl text-blue-100">
                Comprehensive health solutions for crops, livestock, and farmers
            </p>
        </div>
    </div>
</div>

<!-- Quick Access Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <a href="#plant-health" class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow block focus:outline-none focus:ring-2 focus:ring-green-400">
        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-seedling text-green-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Plant Health</h3>
        <p class="text-gray-600 text-sm">Disease detection and treatment solutions</p>
    </a>
    
    <a href="#livestock-health" class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow block focus:outline-none focus:ring-2 focus:ring-blue-400">
        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-horse-head text-blue-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Livestock Care</h3>
        <p class="text-gray-600 text-sm">Veterinary services and animal health</p>
    </a>
    
    <a href="#farmer-wellness" class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow block focus:outline-none focus:ring-2 focus:ring-purple-400">
        <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-user-md text-purple-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Farmer Wellness</h3>
        <p class="text-gray-600 text-sm">Health resources for agricultural workers</p>
    </a>
    
    <a href="#emergency-care" class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow block focus:outline-none focus:ring-2 focus:ring-red-400">
        <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-ambulance text-red-600 text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Emergency Care</h3>
        <p class="text-gray-600 text-sm">24/7 emergency agricultural health services</p>
    </a>
</div>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Plant Health Section -->
    <div class="lg:col-span-3 space-y-8">
        <!-- Disease Diagnosis -->
        <div id="plant-health" class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-green-50 px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-microscope text-green-600 mr-3"></i>
                    Plant Disease Diagnosis
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Common Plant Diseases</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-red-500 text-xs mt-2 mr-2"></i>
                                <div>
                                    <strong>Bacterial Blight:</strong> Causes brown spots on leaves
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-orange-500 text-xs mt-2 mr-2"></i>
                                <div>
                                    <strong>Fungal Infections:</strong> White powdery coating on plants
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-yellow-500 text-xs mt-2 mr-2"></i>
                                <div>
                                    <strong>Viral Diseases:</strong> Yellowing and stunted growth
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-green-500 text-xs mt-2 mr-2"></i>
                                <div>
                                    <strong>Nutrient Deficiency:</strong> Discolored or wilted leaves
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Treatment Options</h3>
                        <div class="space-y-3">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <strong class="text-blue-600">Organic Solutions</strong>
                                <p class="text-sm text-gray-600 mt-1">Neem oil, copper fungicides, beneficial insects</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <strong class="text-green-600">Chemical Treatments</strong>
                                <p class="text-sm text-gray-600 mt-1">Targeted pesticides and fungicides</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <strong class="text-purple-600">Preventive Care</strong>
                                <p class="text-sm text-gray-600 mt-1">Proper spacing, crop rotation, soil health</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <a href="{{ route('contact') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors inline-flex items-center">
                        Update Plant Diagnosis
                    </a>
                </div>
            </div>
        </div>

        <!-- Livestock Health -->
        <div id="livestock-health"  class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-50 px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-stethoscope text-blue-600 mr-3"></i>
                    Livestock Health Management
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3 text-blue-600">Cattle Care</h3>
                        <ul class="space-y-2 text-sm">
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Vaccination schedules</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Nutritional supplements</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Disease prevention</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Regular health checkups</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-3 text-green-600">Poultry Health</h3>
                        <ul class="space-y-2 text-sm">
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Egg quality monitoring</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Respiratory care</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Hygiene protocols</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feed optimization</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-3 text-purple-600">Small Animals</h3>
                        <ul class="space-y-2 text-sm">
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Goat & sheep care</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Pig health management</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Breeding programs</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Parasite control</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-4">
                    <div class="flex">
                        <i class="fas fa-exclamation-triangle text-yellow-400 mr-3 mt-1"></i>
                        <div>
                            <p class="text-sm font-semibold text-yellow-800">Emergency Veterinary Services</p>
                            <p class="text-sm text-yellow-700">Call our 24/7 hotline: <strong>1-800-VET-HELP</strong> for urgent livestock emergencies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Farmer Wellness -->
        <div id="farmer-wellness" class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-purple-50 px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-user-friends text-purple-600 mr-3"></i>
                    Farmer Health & Wellness
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Health Risks in Agriculture</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-lungs text-red-500 mr-3 mt-1"></i>
                                <div>
                                    <strong>Respiratory Issues</strong>
                                    <p class="text-sm text-gray-600">Dust, chemicals, and allergen exposure</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-hand-paper text-orange-500 mr-3 mt-1"></i>
                                <div>
                                    <strong>Skin Conditions</strong>
                                    <p class="text-sm text-gray-600">Chemical burns, sun exposure, allergic reactions</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-bone text-yellow-500 mr-3 mt-1"></i>
                                <div>
                                    <strong>Musculoskeletal Injuries</strong>
                                    <p class="text-sm text-gray-600">Back strain, repetitive motion injuries</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Prevention & Safety</h3>
                        <div class="space-y-3">
                            <div class="bg-green-50 p-3 rounded-lg">
                                <strong class="text-green-600">Personal Protection</strong>
                                <p class="text-sm text-gray-600 mt-1">Proper PPE, safety training, equipment maintenance</p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <strong class="text-blue-600">Regular Checkups</strong>
                                <p class="text-sm text-gray-600 mt-1">Annual health screenings, vaccinations</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-lg">
                                <strong class="text-purple-600">Mental Health</strong>
                                <p class="text-sm text-gray-600 mt-1">Stress management, support groups, counseling</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div id="emergency-care" class="bg-red-50 border border-red-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-red-800 mb-4 flex items-center">
                <i class="fas fa-phone-alt mr-2"></i>
                Emergency Contacts
            </h3>
            <div class="space-y-3">
                <div>
                    <p class="font-semibold text-red-700">Veterinary Emergency</p>
                    <p class="text-red-600">1-800-VET-HELP</p>
                </div>
                <div>
                    <p class="font-semibold text-red-700">Plant Disease Hotline</p>
                    <p class="text-red-600">1-800-PLANT-DR</p>
                </div>
                <div>
                    <p class="font-semibold text-red-700">Poison Control</p>
                    <p class="text-red-600">1-800-222-1222</p>
                </div>
            </div>
        </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg shadow-lg mt-12 p-8">
    <div class="text-center">
        <h2 class="text-3xl font-bold mb-4">Need Immediate Help?</h2>
        <p class="text-xl text-blue-100 mb-6">Our team of agricultural health experts is here to assist you</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:1-800-AGRI-HELP" 
               class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                <i class="fas fa-phone mr-2"></i>
                Call Now: 1-800-AGRI-HELP
            </a>
            <a href="{{ route('contact') }}" 
               class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                <i class="fas fa-envelope mr-2"></i>
                Send Message
            </a>
        </div>
    </div>
</div>
@endsection