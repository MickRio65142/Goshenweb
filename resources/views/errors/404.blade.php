<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>404 - Page Not Found | Goshen Work Skill Association</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden min-h-screen flex flex-col">
    @include('partials.header')

    <main class="flex-grow flex items-center justify-center py-24">
        <div class="text-center max-w-lg mx-auto px-4">
            <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-[#c1121f]/10 flex items-center justify-center mx-auto mb-6">
                <i class="fa-solid fa-map text-3xl md:text-4xl text-[#c1121f]"></i>
            </div>
            <h1 class="font-serif text-7xl md:text-9xl font-black text-[#091c3d] mb-2">404</h1>
            <p class="text-gray-500 text-sm md:text-base mb-2">Oops! The page you're looking for doesn't exist.</p>
            <p class="text-[11px] md:text-xs text-gray-400 mb-8 break-words">It may have been moved, deleted, or the URL might be incorrect.</p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="/" class="bg-[#091c3d] hover:bg-[#c1121f] text-white px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider transition shadow-lg"><i class="fa-solid fa-house mr-2"></i>Go Home</a>
                <a href="/contact-us" class="bg-white border border-gray-200 hover:border-[#091c3d] text-gray-700 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider transition"><i class="fa-solid fa-envelope mr-2"></i>Contact Us</a>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>