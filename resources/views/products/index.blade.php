<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List - Sheffield Africa Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-sm border border-slate-200">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Product Inventory</h1>
                <p class="text-sm text-slate-500 mt-0.5">Manage your commercial items and equipment catalog</p>
            </div>
            <a href="{{ route('products.create') }}" class="bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition duration-150 shadow-sm flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Product
            </a>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg mb-6 text-sm flex items-center gap-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Section -->
        <div class="overflow-x-auto rounded-lg border border-slate-200">
            <table class="w-full border-collapse text-left text-sm text-slate-600">
                <thead class="bg-slate-900 text-white uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3 font-semibold w-20">Image</th>
                        <th class="px-6 py-3 font-semibold">Name</th>
                        <th class="px-6 py-3 font-semibold">Amount</th>
                        <th class="px-6 py-3 font-semibold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($products as $product)
                        <tr class="hover:bg-slate-50 transition duration-100">
                            <td class="px-6 py-3">
                                @if($product->images->count() > 0)
                                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="Thumbnail" class="w-10 h-10 object-cover rounded-md border border-slate-200">
                                @else
                                    <div class="w-10 h-10 bg-slate-100 rounded-md border border-slate-200 flex items-center justify-center text-slate-400 text-xs">
                                        N/A
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 font-semibold text-blue-900">KSh {{ number_format($product->amount, 2) }}</td>
                            <td class="px-6 py-4 text-center space-x-3">
                                <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="text-amber-600 hover:text-amber-800 font-medium">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-slate-400">No products found in the catalog.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</body>
</html>