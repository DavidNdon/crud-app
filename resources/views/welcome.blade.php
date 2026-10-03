<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheffield Africa - Product Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-between font-sans antialiased text-slate-800">

    <!-- Top Navigation / Brand Header -->
    <header class="w-full bg-white border-b border-slate-200 py-4 px-6 sm:px-10 flex justify-between items-center shadow-sm">
        <div class="flex items-center space-x-3">
            <div class="bg-blue-900 text-white font-extrabold text-lg px-3 py-1.5 rounded-lg tracking-wider">
                SA
            </div>
            <span class="text-xl font-bold text-slate-900 tracking-tight">Sheffield Africa</span>
        </div>
        <div>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-blue-900 hover:text-blue-700 transition">
                Manage Inventory &rarr;
            </a>
        </div>
    </header>

    <!-- Hero Main Section -->
    <main class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="max-w-3xl mx-auto text-center bg-white p-10 sm:p-14 rounded-2xl shadow-sm border border-slate-200">
            <span class="inline-block bg-blue-50 text-blue-900 text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-4 border border-blue-100">
                Enterprise Catalog System
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                Product Management & Gallery
            </h1>
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl mx-auto mb-8">
                Welcome to the official internal portal for Sheffield Africa products. Streamline, organize, and manage your commercial kitchen appliances and inventory with precision.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('products.index') }}" class="w-full sm:w-auto bg-blue-900 hover:bg-blue-800 text-white font-semibold text-base px-8 py-3.5 rounded-xl shadow-md transition duration-150 flex items-center justify-center space-x-2">
                    <span>View Products Catalog</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} Sheffield Africa. All rights reserved. Built with Laravel & Tailwind CSS.
    </footer>

</body>
</html>