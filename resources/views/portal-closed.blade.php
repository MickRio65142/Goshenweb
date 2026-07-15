<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Registration Closed | Goshen Work Skill Association</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fcfcfc]">
    @include('partials.header')

    <section class="min-h-[70vh] flex items-center justify-center py-16">
        <div class="max-w-lg mx-auto px-4 text-center">
            <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fa-solid fa-clock text-4xl text-[#f5a524]"></i>
            </div>
            <h1 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold mb-4">Registration Currently Closed</h1>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-8">
                Online registration is not available at this time. Please check back later or contact us for more information.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/" class="bg-[#091c3d] hover:bg-[#c1121f] text-white px-6 py-3 rounded-lg font-bold text-xs uppercase tracking-wider transition shadow-lg">
                    Back to Home
                </a>
                <a href="/contact-us" class="bg-white border-2 border-[#091c3d] text-[#091c3d] hover:bg-[#091c3d] hover:text-white px-6 py-3 rounded-lg font-bold text-xs uppercase tracking-wider transition shadow-lg">
                    Contact Us
                </a>
            </div>
            <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-100">
                <p class="text-xs text-gray-500">
                    <i class="fa-solid fa-phone text-[#c1121f] mr-1"></i>
                    Call or WhatsApp: <strong>+237 678 672 998 / +237 696 681 163</strong>
                </p>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
