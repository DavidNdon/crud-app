<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Sheffield Africa Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen py-10 px-4 sm:px-6 lg:px-8 font-sans antialiased text-slate-800">

    <div class="max-w-3xl mx-auto bg-white p-6 sm:p-10 rounded-2xl shadow-sm border border-slate-200">

        <!-- Header Section -->
        <div class="mb-6 border-b border-slate-100 pb-4">
            <span class="inline-block bg-blue-50 text-blue-900 text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-2 border border-blue-100">
                Sheffield Africa Inventory
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Edit Product</h1>
            <p class="text-sm text-slate-500 mt-0.5">Modify product details, manage existing gallery images, or upload new ones.</p>
        </div>

        <!-- Edit Form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                    class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent text-sm">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Description</label>
                <textarea name="description" rows="4"
                    class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Amount -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Amount (KSh)</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount', $product->amount) }}" required
                    class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent text-sm">
            </div>

            <!-- Manage Existing Gallery Images -->
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Existing Gallery Images</label>
                <p class="text-xs text-slate-400 mb-3">Check the box on any image you wish to remove from the gallery.</p>

                @if($product->images->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    @foreach($product->images as $img)
                    <div class="relative bg-white border border-slate-200 rounded-lg p-2 flex flex-col items-center shadow-sm">
                        <div class="w-full aspect-square rounded overflow-hidden mb-2 bg-slate-100">
                            <img src="{{ asset('storage/' . $img->image_path) }}" alt="Product Image" class="object-cover w-full h-full">
                        </div>
                        <label class="flex items-center space-x-1.5 cursor-pointer text-xs font-medium text-red-600 hover:text-red-800">
                            <!-- Fixed here: changed from id ?? $img->id to just $img->id -->
                            <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                            <span>Delete</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-xs text-slate-400 italic">No existing images found for this product.</p>
                @endif
            </div>

            <!-- Upload New Images -->
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Add New Gallery Images</label>
                <input type="file" name="images[]" multiple
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-900 hover:file:bg-blue-100 cursor-pointer">
                <p class="text-xs text-slate-400 mt-1">You can select multiple new pictures simultaneously.</p>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('products.index') }}" class="bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm font-semibold px-5 py-2.5 rounded-xl transition duration-150">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow-sm transition duration-150">
                    Update Product
                </button>
            </div>
        </form>

    </div>
</body>

</html>