<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Certifications | Goshen Work Skill Association</title>

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
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#f5a524]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/cert-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-80" alt="Certifications Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Global Recognition</span>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">Certifications</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed drop-shadow-md break-words">Graduating from Goshen Work Skill Association grants you globally recognized credentials, allowing you to seamlessly transition into the workforce in the UAE, UK, North America, and beyond.</p>
        </div>
    </section>

    <!-- CERTIFICATIONS CONTENT -->
    <section class="py-16 md:py-24 bg-white relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Your Qualifications</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">What You Will Earn</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
            </div>
            
            <!-- FIXED: grid-cols-1 on mobile so they stack, md:grid-cols-2 on desktop -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                
                <!-- Cert 1 -->
                <div class="flex items-start gap-4 md:gap-6 bg-gray-50 border border-gray-100 p-5 md:p-8 rounded-2xl md:rounded-3xl hover:shadow-lg hover:-translate-y-1 transition duration-300 group" data-aos="fade-up">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-orange-100 flex items-center justify-center shrink-0 group-hover:bg-[#f5a524] transition duration-300 mt-1 md:mt-0">
                        <i class="fa-solid fa-award text-2xl md:text-3xl text-[#f5a524] group-hover:text-white transition"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xl md:text-2xl text-[#091c3d] mb-2 md:mb-3 break-words">Vocational Diplomas</h4>
                        <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed break-words">Awarded upon successful completion of core programs including Nursing Aid, Social Care, Hospitality, and Travel Business Operations.</p>
                    </div>
                </div>

                <!-- Cert 2 -->
                <div class="flex items-start gap-4 md:gap-6 bg-gray-50 border border-gray-100 p-5 md:p-8 rounded-2xl md:rounded-3xl hover:shadow-lg hover:-translate-y-1 transition duration-300 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-red-100 flex items-center justify-center shrink-0 group-hover:bg-[#c1121f] transition duration-300 mt-1 md:mt-0">
                        <i class="fa-solid fa-certificate text-2xl md:text-3xl text-[#c1121f] group-hover:text-white transition"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xl md:text-2xl text-[#091c3d] mb-2 md:mb-3 break-words">Safety Certificates</h4>
                        <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed break-words">Internationally valid First Aid, Basic Life Support (BLS), CPR, and Industrial Health & Safety licenses required by global employers.</p>
                    </div>
                </div>

                <!-- Cert 3 -->
                <div class="flex items-start gap-4 md:gap-6 bg-gray-50 border border-gray-100 p-5 md:p-8 rounded-2xl md:rounded-3xl hover:shadow-lg hover:-translate-y-1 transition duration-300 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-blue-100 flex items-center justify-center shrink-0 group-hover:bg-blue-600 transition duration-300 mt-1 md:mt-0">
                        <i class="fa-solid fa-plane-departure text-2xl md:text-3xl text-blue-600 group-hover:text-white transition"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xl md:text-2xl text-[#091c3d] mb-2 md:mb-3 break-words">Aviation Credentials</h4>
                        <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed break-words">Industry-standard Airline Ticketing (GDS) & Customer Service certificates preparing you for roles in global travel agencies.</p>
                    </div>
                </div>

                <!-- Cert 4 -->
                <div class="flex items-start gap-4 md:gap-6 bg-gray-50 border border-gray-100 p-5 md:p-8 rounded-2xl md:rounded-3xl hover:shadow-lg hover:-translate-y-1 transition duration-300 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-emerald-100 flex items-center justify-center shrink-0 group-hover:bg-emerald-600 transition duration-300 mt-1 md:mt-0">
                        <i class="fa-solid fa-file-signature text-2xl md:text-3xl text-emerald-600 group-hover:text-white transition"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xl md:text-2xl text-[#091c3d] mb-2 md:mb-3 break-words">Clinical Practicum Letters</h4>
                        <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed break-words">Signed, official validation letters confirming your 3 to 6 months of physical hospital and clinical experience.</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 md:mt-16 text-center">
                <a href="/contact-us" class="inline-block bg-[#c1121f] text-white px-8 py-3.5 md:px-10 md:py-4 rounded-xl font-bold text-[10px] md:text-sm uppercase tracking-wider hover:bg-[#091c3d] transition shadow-lg hover:-translate-y-1">Contact Admissions</a>
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
