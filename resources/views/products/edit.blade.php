<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Sheffield Africa Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 p-6">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-200">
        <!-- Header Section -->
        <div class="mb-6 border-b border-slate-100 pb-4">
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Edit Product</h1>
            <p class="text-sm text-slate-500 mt-0.5">Update details and manage gallery images</p>
        </div>

        @if ($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-lg mb-6 text-sm shadow-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent transition" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Description</label>
                <textarea name="description" rows="4" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent transition">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Amount (KSh)</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount', $product->amount) }}" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent transition" required>
            </div>

            <!-- Current Images Grid -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Current Gallery Images</label>
                @if($product->images->count() > 0)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($product->images as $img)
                            <div class="relative overflow-hidden rounded-lg border border-slate-200 aspect-square bg-slate-50">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="Product Image" class="object-cover w-full h-full">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-slate-400 italic">No images currently uploaded.</p>
                @endif
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Add More Images</label>
                <input type="file" name="images[]" multiple class="w-full border border-slate-300 rounded-lg p-2 text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-900 hover:file:bg-blue-100">
                <p class="text-xs text-slate-400 mt-1">Upload additional images to append to the gallery.</p>
            </div>

            <div class="flex justify-between items-center pt-2 border-t border-slate-100">
                <a href="{{ route('products.index') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Cancel</a>
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition duration-150 shadow-sm">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>