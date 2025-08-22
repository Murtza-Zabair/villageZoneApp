<x-app-layout>
    <head>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    </head>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Product') }} - {{ $product->name }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-blue-600 hover:underline">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Product Name & Category in one line -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select id="category" name="category" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror">
                                    <option value="">Select a category</option>
                                    <option value="Fruits Seeds" {{ old('category', $product->category) === 'Fruits Seeds' ? 'selected' : '' }}>Fruits Seeds</option>
                                    <option value="Fertilizers" {{ old('category', $product->category) === 'Fertilizers' ? 'selected' : '' }}>Fertilizers</option>
                                    <option value="Farming Books" {{ old('category', $product->category) === 'Farming Books' ? 'selected' : '' }}>Farming Books</option>
                                    <option value="Veg Seeds" {{ old('category', $product->category) === 'Veg Seeds' ? 'selected' : '' }}>Veg Seeds</option>
                                    <option value="Farming Instrument" {{ old('category', $product->category) === 'Farming Instrument' ? 'selected' : '' }}>Farming Instrument</option>
                                    <option value="Farming Machine" {{ old('category', $product->category) === 'Farming Machine' ? 'selected' : '' }}>Farming Machine</option>
                                    <option value="Kitchen Gardening Products" {{ old('category', $product->category) === 'Kitchen Gardening Products' ? 'selected' : '' }}>Kitchen Gardening Products</option>
                                    <option value="Other" {{ old('category', $product->category) === 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        

                        <!-- Price & Stock in one line -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price (Rs)</label>
                                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                                    step="0.01" min="0" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror">
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                                    min="0" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('stock') border-red-500 @enderror">
                                @error('stock')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description & Image in one line -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea id="description" name="description" rows="6" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="image" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100" id="image-upload-area">
                                        @if ($product->image)
                                            <img id="current-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                                            <div class="hidden flex-col items-center justify-center pt-5 pb-6" id="upload-placeholder">
                                        @else
                                            <img id="current-image" src="" alt="Preview" class="hidden w-full h-full object-cover rounded-lg">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-placeholder">
                                        @endif
                                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                        </div>
                                        <input id="image" name="image" type="file" accept="image/*" class="hidden" onchange="previewImage(event)" />
                                    </label>
                                </div>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('admin.products.index') }}" 
                               class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const currentImage = document.getElementById('current-image');
            const placeholder = document.getElementById('upload-placeholder');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    currentImage.src = e.target.result;
                    currentImage.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                // If no file selected, show current image or placeholder
                @if ($product->image)
                    currentImage.src = "{{ asset('storage/' . $product->image) }}";
                    currentImage.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                @else
                    currentImage.classList.add('hidden');
                    placeholder.classList.remove('hidden');
                @endif
            }
        }
    </script>
</x-app-layout>