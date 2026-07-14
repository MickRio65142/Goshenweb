<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pricing & Tuition | Goshen Work Skill Association</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    <!-- HEADER -->
    @include('partials.header')

    <!-- HERO BANNER -->
    <!-- Adjusted padding and border for mobile -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/pricing-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-80" alt="Pricing Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <a href="/packages" class="hover:text-white transition">Packages</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Pricing</span>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">Tuition & Plans</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed drop-shadow-md break-words">We believe premium education should be accessible. Explore our flexible payment options designed to fit your financial needs.</p>
        </div>
    </section>

    <!-- PRICING CONTENT -->
    <section class="py-16 md:py-24 bg-gray-50 relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Transparent Fees</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">Flexible Payment Options</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
            </div>
            
            <!-- FIXED: grid-cols-1 on mobile so they stack, md:grid-cols-3 on desktop -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                
                <!-- Single Payment -->
                <div class="bg-white p-6 md:p-10 rounded-2xl md:rounded-3xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-red-50 flex items-center justify-center mb-4 md:mb-6">
                        <i class="fa-solid fa-money-bill-wave text-xl md:text-2xl text-[#c1121f]"></i>
                    </div>
                    <h4 class="font-bold text-[#091c3d] text-xl md:text-2xl mb-2 md:mb-3 break-words">Pay in Full</h4>
                    <p class="text-xs md:text-sm text-gray-600 mb-4 md:mb-6 leading-relaxed break-words">Pay your entire tuition upfront and receive a special percentage discount on any Starter, Professional, or Premium package.</p>
                    <a href="/contact-us" class="text-xs md:text-sm font-bold text-[#c1121f] hover:text-[#091c3d] flex items-center gap-2 transition">Get Quote <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- Installments -->
                <div class="bg-[#091c3d] text-white p-6 md:p-10 rounded-2xl md:rounded-3xl shadow-xl border border-[#152e5a] hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-2xl transition duration-300 relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-[#f5a524]"></div>
                    <div class="absolute top-4 right-4 md:top-6 md:right-6 bg-[#c1121f] text-white text-[8px] md:text-[10px] font-bold uppercase tracking-widest px-2 py-1 md:px-3 md:py-1 rounded-full">Most Popular</div>

                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-white/10 flex items-center justify-center mb-4 md:mb-6">
                        <i class="fa-solid fa-calendar-days text-xl md:text-2xl text-[#f5a524]"></i>
                    </div>
                    <h4 class="font-bold text-white text-xl md:text-2xl mb-2 md:mb-3 break-words">Monthly Installments</h4>
                    <p class="text-xs md:text-sm text-gray-300 mb-4 md:mb-6 leading-relaxed break-words">Spread the cost of your education over 3 to 6 months with our flexible, 0% interest monthly payment plans designed for students.</p>
                    <a href="/contact-us" class="text-xs md:text-sm font-bold text-[#f5a524] hover:text-white flex items-center gap-2 transition">Apply for Plan <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- Corporate -->
                <div class="bg-white p-6 md:p-10 rounded-2xl md:rounded-3xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-blue-50 flex items-center justify-center mb-4 md:mb-6">
                        <i class="fa-solid fa-building-user text-xl md:text-2xl text-[#091c3d]"></i>
                    </div>
                    <h4 class="font-bold text-[#091c3d] text-xl md:text-2xl mb-2 md:mb-3 break-words">Corporate Sponsor</h4>
                    <p class="text-xs md:text-sm text-gray-600 mb-4 md:mb-6 leading-relaxed break-words">Many employers sponsor our students. Download our corporate prospectus to share with your HR department for company funding.</p>
                    <a href="/contact-us" class="text-xs md:text-sm font-bold text-[#c1121f] hover:text-[#091c3d] flex items-center gap-2 transition">Request Details <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER & WIDGETS -->
    @include('partials.footer')
    @include('partials.widgets')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>document.addEventListener('DOMContentLoaded', () => { if (typeof AOS !== 'undefined') { AOS.init({ once: true, offset: 50, duration: 1000, easing: 'ease-out-cubic' }); }});</script>
</body>
</html>
