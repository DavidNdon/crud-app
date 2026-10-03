<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product - Sheffield Africa Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for smooth interactive image gallery switching -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 min-h-screen py-10 px-4 sm:px-6 lg:px-8 font-sans antialiased text-slate-800">
    
    <div class="max-w-5xl mx-auto bg-white p-6 sm:p-10 rounded-2xl shadow-sm border border-slate-200">
        
        <!-- Header Section -->
        <div class="mb-8 border-b border-slate-100 pb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="inline-block bg-blue-50 text-blue-900 text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2 border border-blue-100">
                    Sheffield Africa Inventory
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Product Details</h1>
            </div>
            <a href="{{ route('products.index') }}" class="bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm font-semibold px-4 py-2 rounded-xl transition duration-150 flex items-center space-x-2">
                <span>&larr; Back to List</span>
            </a>
        </div>

        <!-- Main Responsive Grid (Gallery on Left, Details on Right for Desktop) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            
            <!-- Left Column: Interactive Single-Image Gallery Slider -->
            <div class="bg-slate-50 p-4 sm:p-6 rounded-2xl border border-slate-100 flex flex-col justify-between"
                 x-data="{ 
                     activeSlide: 0, 
                     images: [
                         @foreach($product->images as $img)
                             '{{ asset('storage/' . $img->image_path) }}',
                         @endforeach
                     ] 
                 }">
                
                <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Product Gallery</span>

                @if($product->images->count() > 0)
                    <!-- Main Display Image -->
                    <div class="relative w-full aspect-square bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm flex items-center justify-center">
                        <img :src="images[activeSlide]" alt="Product Gallery Image" class="object-cover w-full h-full transition-all duration-300">

                        <!-- Previous Button -->
                        <template x-if="images.length > 1">
                            <button @click="activeSlide = (activeSlide === 0) ? images.length - 1 : activeSlide - 1" 
                                    class="absolute left-3 bg-slate-900/70 hover:bg-slate-900 text-white p-2.5 rounded-full shadow-md transition backdrop-blur-sm focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                        </template>

                        <!-- Next Button -->
                        <template x-if="images.length > 1">
                            <button @click="activeSlide = (activeSlide === images.length - 1) ? 0 : activeSlide + 1" 
                                    class="absolute right-3 bg-slate-900/70 hover:bg-slate-900 text-white p-2.5 rounded-full shadow-md transition backdrop-blur-sm focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </template>

                        <!-- Image Counter Badge -->
                        <div class="absolute bottom-3 right-3 bg-slate-900/70 text-white text-xs font-semibold px-2.5 py-1 rounded-md backdrop-blur-sm">
                            <span x-text="activeSlide + 1"></span> / <span x-text="images.length"></span>
                        </div>
                    </div>

                    <!-- Thumbnail Selector Bar -->
                    <template x-if="images.length > 1">
                        <div class="flex gap-2 mt-4 overflow-x-auto pb-2">
                            <template x-for="(imgSrc, index) in images" :key="index">
                                <button @click="activeSlide = index" 
                                        :class="{'ring-2 ring-blue-900 border-transparent': activeSlide === index, 'border-slate-200 opacity-60': activeSlide !== index}"
                                        class="w-16 h-16 rounded-lg overflow-hidden border bg-white flex-shrink-0 transition hover:opacity-100 focus:outline-none">
                                    <img :src="imgSrc" class="object-cover w-full h-full">
                                </button>
                            </template>
                        </div>
                    </template>
                @else
                    <!-- Fallback when no images exist -->
                    <div class="w-full aspect-square bg-white rounded-xl border border-slate-200 flex flex-col items-center justify-center text-slate-400 p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-sm italic">No images uploaded for this product yet.</p>
                    </div>
                @endif
            </div>

            <!-- Right Column: Product Details & Specifications -->
            <div class="space-y-5 flex flex-col justify-between h-full">
                <div class="space-y-4">
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Product Name</span>
                        <p class="text-slate-900 font-bold text-xl">{{ $product->name }}</p>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Description</span>
                        <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $product->description ?? 'No description provided.' }}</p>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Amount</span>
                        <p class="text-blue-900 font-extrabold text-2xl">KSh {{ number_format($product->amount, 2) }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('products.edit', $product->id) }}" class="w-full sm:w-auto bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-6 py-3 rounded-xl transition duration-150 shadow-sm text-center">
                        Edit Product & Images
                    </a>
                </div>
            </div>

        </div>

    </div>
</body>
</html>