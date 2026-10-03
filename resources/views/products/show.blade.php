<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product - Sheffield Africa Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 p-6">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-200">
        <!-- Header Section -->
        <div class="mb-6 border-b border-slate-100 pb-4">
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Product Details</h1>
            <p class="text-sm text-slate-500 mt-0.5">Viewing complete information and gallery</p>
        </div>

        <div class="space-y-5">
            <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Product Name</span>
                <p class="text-slate-800 font-semibold text-lg">{{ $product->name }}</p>
            </div>

            <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Description</span>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $product->description ?? 'No description provided.' }}</p>
            </div>

            <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Amount</span>
                <p class="text-blue-900 font-bold text-xl">KSh {{ number_format($product->amount, 2) }}</p>
            </div>

            <!-- Image Gallery Grid -->
            <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                <span class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Product Gallery</span>
                @if($product->images->count() > 0)
                    <div class="grid grid-cols-3 gap-3">
                        @foreach($product->images as $img)
                            <div class="relative overflow-hidden rounded-lg border border-slate-200 aspect-square bg-white shadow-sm">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="Product Image" class="object-cover w-full h-full">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-slate-400 text-sm italic">No images uploaded for this product yet.</p>
                @endif
            </div>
        </div>

        <div class="mt-8 pt-4 border-t border-slate-100 flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="bg-slate-200 text-slate-700 hover:bg-slate-300 text-sm font-semibold px-4 py-2.5 rounded-lg transition duration-150">Back to List</a>
            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition duration-150 shadow-sm">Edit Product</a>
        </div>
    </div>
</body>
</html>