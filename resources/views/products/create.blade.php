<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Sheffield Africa Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 p-6">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-200">
        <!-- Header Section -->
        <div class="mb-6 border-b border-slate-100 pb-4">
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Add New Product</h1>
            <p class="text-sm text-slate-500 mt-0.5">Enter details and upload product gallery images</p>
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

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent transition" placeholder="e.g. Commercial Oven" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Description</label>
                <textarea name="description" rows="4" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent transition" placeholder="Provide details about the product specifications...">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Amount (KSh)</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent transition" placeholder="0.00" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Product Gallery Images</label>
                <input type="file" name="images[]" multiple class="w-full border border-slate-300 rounded-lg p-2 text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-900 hover:file:bg-blue-100">
                <p class="text-xs text-slate-400 mt-1">You can select multiple images (JPEG, PNG, JPG, WEBP).</p>
            </div>

            <div class="flex justify-between items-center pt-2 border-t border-slate-100">
                <a href="{{ route('products.index') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Cancel</a>
                <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition duration-150 shadow-sm">Save Product</button>
            </div>
        </form>
    </div>
</body>
</html>