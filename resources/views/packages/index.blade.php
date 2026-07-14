<!-- resources/views/packages/index.blade.php -->
@php
    $coursePackages = [
        ['slug' => 'social-care', 'title' => 'Diploma in Social Care', 'category' => 'Healthcare', 'duration' => '6 Months', 'image' => 'images/hero-course-social-care.jpg', 'desc' => 'Book the Social Care package for community care, safeguarding, communication, and practical care readiness.'],
        ['slug' => 'nursing-aid', 'title' => 'Diploma in Nursing Aid', 'category' => 'Healthcare', 'duration' => '6 to 9 Months', 'image' => 'images/hero-course-nursing-aid.jpg', 'desc' => 'Book the Nursing Aid package for patient care, vital signs, bedside support, and supervised clinical practice.'],
        ['slug' => 'health-safety', 'title' => 'Certificate in Health and Safety', 'category' => 'Safety', 'duration' => '4 Weeks', 'image' => 'images/hero-course-health-safety.jpg', 'desc' => 'Book the Health and Safety package for workplace safety, risk assessment, hazard control, and compliance skills.'],
        ['slug' => 'first-aid-cpr', 'title' => 'Certificate in First Aid and CPR', 'category' => 'Emergency Care', 'duration' => '3 Days Intensive', 'image' => 'images/hero-course-first-aid-cpr.jpg', 'desc' => 'Book the First Aid and CPR package for hands-on emergency response, CPR drills, AED use, and wound care basics.'],
        ['slug' => 'hospitality-tourism', 'title' => 'Diploma in Hospitality and Tourism', 'category' => 'Hospitality', 'duration' => '6 Months', 'image' => 'images/hero-course-hospitality.jpg', 'desc' => 'Book the Hospitality and Tourism package for front office, guest service, food and beverage, and hotel operations.'],
        ['slug' => 'customer-service', 'title' => 'Certificate in Customer Service and Computer Operations', 'category' => 'Office Skills', 'duration' => '8 Weeks', 'image' => 'images/hero-course-customer-service.jpg', 'desc' => 'Book the Customer Service and Computer Operations package for office communication, Microsoft Office, email, and data entry skills.'],
        ['slug' => 'travel-business', 'title' => 'Diploma in Travel Business Operations', 'category' => 'Travel Business', 'duration' => '6 Months', 'image' => 'images/hero-course-travel-business.jpg', 'desc' => 'Book the Travel Business Operations package for itinerary planning, booking workflows, pricing, and travel desk administration.'],
        ['slug' => 'airline-ticketing', 'title' => 'Certificate in Airline Ticketing and Reservation', 'category' => 'Aviation', 'duration' => '3 Months', 'image' => 'images/hero-course-airline-ticketing.jpg', 'desc' => 'Book the Airline Ticketing and Reservation package for GDS practice, fare calculation, reservation workflows, and passenger support.'],
        ['slug' => 'personal-support-worker', 'title' => 'Diploma as Personal Support Worker (PSW)', 'category' => 'Healthcare', 'duration' => '6 Months', 'image' => 'images/hero-course-psw.jpg', 'desc' => 'Book the PSW package for personal care, mobility support, elderly care, home support, and supervised placement readiness.'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Course Packages & Pricing | Goshen Work Skill Association</title>
    <meta name="description" content="Explore our bundled certification packages: Starter, Professional, Premium, and Corporate training options.">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animations (AOS) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* MATURE ELEGANT HOVER EFFECT */
        .hover-image-elegant {
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s ease;
        }
        .group:hover .hover-image-elegant, 
        .hover-image-elegant:hover {
            transform: scale(1.08);
            filter: brightness(1.05) contrast(1.02);
        }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    <!-- ============================================== -->
    <!-- CENTRALIZED HEADER PARTIAL INJECTED HERE       -->
    <!-- ============================================== -->
    @include('partials.header')

    <!-- 1. PACKAGES HERO BANNER -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#f5a524]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/hero-packages.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="Packages Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-black/10 z-10"></div>
        
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-left w-full" data-aos="fade-right">
            <div class="flex items-center gap-2 text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[8px]"></i></span>
                <span class="text-white">Packages & Pricing</span>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">9 Bookable Packages</h1>
            <p class="text-gray-200 text-sm md:text-lg max-w-2xl leading-relaxed drop-shadow-md break-words">Choose any of our 9 approved course packages, book with admissions, and complete payment through supported MoMo options.</p>
        </div>
    </section>

    <!-- 2. PRICING & PACKAGES GRID -->
    <section id="bundles" class="py-16 md:py-24 bg-white relative z-10">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            
            <div class="text-center mb-12 md:mb-20" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">MoMo Supported Booking</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">Choose One of the 9 Course Packages</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
                <p class="text-gray-500 mt-4 md:mt-6 max-w-2xl mx-auto text-[11px] md:text-sm break-words">Each package is tied to one approved Goshen program and can be booked through the website before payment confirmation by MTN MoMo or Orange Money.</p>
            </div>

            <div class="grid grid-cols-3 gap-3 md:gap-6 max-w-[90rem] mx-auto">
                @foreach($coursePackages as $index => $package)
                <div class="group bg-white rounded-lg md:rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all duration-300 relative" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <a href="/packages/{{ $package['slug'] }}" class="block aspect-[4/3] overflow-hidden bg-[#091c3d]">
                        <img src="{{ asset($package['image']) }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Goshen+Package'" class="w-full h-full object-cover hover-image-elegant opacity-90" alt="{{ $package['title'] }}">
                    </a>
                    <div class="p-2 md:p-5">
                        <div class="flex items-center justify-between gap-1 mb-1 md:mb-2">
                            <p class="text-[#c1121f] text-[7px] md:text-[10px] font-bold uppercase tracking-wider truncate">{{ $package['category'] }}</p>
                            <span class="text-[7px] md:text-[9px] text-[#091c3d] font-bold bg-[#091c3d]/5 px-1.5 md:px-2 py-0.5 rounded-full shrink-0">{{ $package['duration'] }}</span>
                        </div>
                        <h3 class="font-serif text-[10px] md:text-lg text-[#091c3d] font-bold mb-1 md:mb-2 break-words leading-tight">
                            <a href="/packages/{{ $package['slug'] }}" class="hover:text-[#c1121f] transition">{{ $package['title'] }}</a>
                        </h3>
                        <p class="text-gray-500 text-[10px] md:text-xs mb-3 leading-relaxed break-words hidden md:block">{{ $package['desc'] }}</p>
                        <ul class="space-y-1.5 mb-3 text-[10px] md:text-xs text-gray-700 font-medium break-words hidden md:block">
                            <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-emerald-500 mt-0.5 shrink-0"></i> Course package booking</li>
                            <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-emerald-500 mt-0.5 shrink-0"></i> Admissions follow-up</li>
                            <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-emerald-500 mt-0.5 shrink-0"></i> MoMo payment support</li>
                        </ul>
                        <a href="/packages/{{ $package['slug'] }}" class="block w-full py-1 md:py-3 rounded text-center font-bold text-[7px] md:text-xs bg-[#091c3d] text-white border border-[#091c3d] group-hover:bg-[#c1121f] group-hover:border-[#c1121f] transition-all duration-500">
                            Book & Pay via MoMo
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. CORPORATE TRAINING SECTION -->
    <!-- FIXED: Stacked layout for mobile, reduced padding -->
    <section id="corporate" class="py-16 md:py-32 bg-[#fff7f5] border-t border-b border-red-50 overflow-hidden">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
            
            <div data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 md:px-4 md:py-2 rounded-full bg-[#091c3d]/5 text-[#091c3d] text-[9px] md:text-[10px] font-bold uppercase tracking-widest w-max mb-4 md:mb-6 border border-[#091c3d]/10 shadow-sm">
                    <i class="fa-solid fa-building"></i> B2B / Enterprise
                </div>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-[#091c3d] font-bold mb-4 md:mb-6 leading-tight break-words">Corporate Training Solutions</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mb-4 md:mb-6"></div>
                <p class="text-gray-600 leading-relaxed text-[11px] md:text-base mb-6 md:mb-8 break-words">Looking to upskill your entire workforce? Goshen offers highly customized group training packages for hospitals, hotels, airlines, and corporate offices. We can train your staff at our campus or send elite instructors directly to your facility.</p>
                
                <!-- FIXED: grid-cols-1 for tiny mobile, sm:grid-cols-2 for regular mobile -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mb-8 md:mb-10 text-[11px] md:text-sm text-gray-700 font-semibold">
                    <div class="flex items-center gap-3 bg-white px-3 md:px-4 py-2.5 md:py-3 rounded-xl border border-gray-100 shadow-sm break-words"><i class="fa-solid fa-clipboard-check text-[#c1121f] shrink-0"></i> Customized Curriculums</div>
                    <div class="flex items-center gap-3 bg-white px-3 md:px-4 py-2.5 md:py-3 rounded-xl border border-gray-100 shadow-sm break-words"><i class="fa-solid fa-users-rectangle text-[#c1121f] shrink-0"></i> Bulk Enrollment Discounts</div>
                    <div class="flex items-center gap-3 bg-white px-3 md:px-4 py-2.5 md:py-3 rounded-xl border border-gray-100 shadow-sm break-words"><i class="fa-solid fa-hard-hat text-[#c1121f] shrink-0"></i> On-site Safety Audits</div>
                    <div class="flex items-center gap-3 bg-white px-3 md:px-4 py-2.5 md:py-3 rounded-xl border border-gray-100 shadow-sm break-words"><i class="fa-solid fa-certificate text-[#c1121f] shrink-0"></i> Corporate Certifications</div>
                </div>

                <a href="/contact-us" class="bg-[#091c3d] hover:bg-[#c1121f] text-white px-6 py-3.5 md:px-8 md:py-4 rounded-xl font-bold text-[10px] md:text-sm tracking-wider uppercase transition-all duration-300 shadow-lg hover:-translate-y-1 w-full text-center sm:w-max flex justify-center items-center gap-2 md:gap-3">
                    Request a Custom Quote <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- 5-Image Scattered Collage (Scaled specifically for mobile) -->
            <div class="relative h-[300px] md:h-[650px] w-full mt-6 md:mt-0" data-aos="fade-left">
                <div class="absolute inset-2 md:inset-4 bg-white rounded-2xl md:rounded-[3rem] border border-gray-100 shadow-inner"></div>
                
                <div class="absolute top-4 left-0 md:top-8 w-24 md:w-56 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl -rotate-6 hover:rotate-0 transition-all duration-500 border-2 md:border-4 border-white cursor-pointer z-10 hover:z-50 group">
                    <img src="{{ asset('images/about-decorative-packages-1.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=500&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Corporate Training 1">
                </div>
                
                <div class="absolute top-8 right-2 md:top-16 md:right-0 w-20 md:w-52 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl rotate-12 hover:rotate-0 transition-all duration-500 border-2 md:border-[6px] border-white cursor-pointer z-20 hover:z-50 group">
                    <img src="{{ asset('images/about-decorative-packages-2.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=500&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Corporate Training 2">
                </div>
                
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 md:w-72 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-2xl -rotate-3 hover:rotate-0 transition-all duration-500 border-4 md:border-8 border-white cursor-pointer z-30 hover:z-50 group">
                    <img src="{{ asset('images/about-decorative-packages-3.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Corporate Training 3">
                </div>

                <div class="absolute bottom-6 left-2 md:bottom-16 md:left-4 w-24 md:w-56 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl rotate-6 hover:rotate-0 transition-all duration-500 border-2 md:border-4 border-white cursor-pointer z-20 hover:z-50 group">
                    <img src="{{ asset('images/about-decorative-packages-4.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Corporate Training 4">
                </div>

                <div class="absolute bottom-2 right-4 md:bottom-6 md:right-8 w-28 md:w-60 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl -rotate-12 hover:rotate-0 transition-all duration-500 border-[3px] md:border-[6px] border-white cursor-pointer z-10 hover:z-50 group">
                    <img src="{{ asset('images/about-decorative-packages-5.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Corporate Training 5">
                </div>
            </div>
        </div>
    </section>

    <!-- 4. NEW PRICING & PAYMENT PLANS SECTION -->
    <section id="pricing" class="py-16 md:py-24 bg-gray-50 border-b border-gray-200">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Tuition & Fees</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">Transparent Pricing & Plans</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
                <p class="text-gray-500 mt-4 md:mt-6 max-w-2xl mx-auto text-[11px] md:text-sm break-words">We believe premium education should be accessible. Contact our admissions team for exact quotes on your chosen package, and explore our flexible payment options below.</p>
            </div>
            
            <!-- FIXED: Stacks safely on mobile -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
                <!-- Single Payment -->
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl shadow-sm border border-gray-100 hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-red-50 flex items-center justify-center mb-4 md:mb-6">
                        <i class="fa-solid fa-money-bill-wave text-xl md:text-2xl text-[#c1121f]"></i>
                    </div>
                    <h4 class="font-bold text-[#091c3d] text-xl mb-2 md:mb-3 break-words">Pay in Full</h4>
                    <p class="text-[11px] md:text-sm text-gray-600 mb-2 md:mb-4 leading-relaxed break-words">Pay your entire tuition upfront and receive a special percentage discount on any Starter, Professional, or Premium package.</p>
                </div>
                
                <!-- Installments -->
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl shadow-sm border border-gray-100 hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-orange-50 flex items-center justify-center mb-4 md:mb-6">
                        <i class="fa-solid fa-calendar-days text-xl md:text-2xl text-[#f5a524]"></i>
                    </div>
                    <h4 class="font-bold text-[#091c3d] text-xl mb-2 md:mb-3 break-words">Monthly Installments</h4>
                    <p class="text-[11px] md:text-sm text-gray-600 mb-2 md:mb-4 leading-relaxed break-words">Spread the cost of your education over 3 to 6 months with our flexible, 0% interest monthly payment plans designed for students.</p>
                </div>
                
                <!-- Corporate -->
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl shadow-sm border border-gray-100 hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-blue-50 flex items-center justify-center mb-4 md:mb-6">
                        <i class="fa-solid fa-building-user text-xl md:text-2xl text-[#091c3d]"></i>
                    </div>
                    <h4 class="font-bold text-[#091c3d] text-xl mb-2 md:mb-3 break-words">Corporate Sponsorship</h4>
                    <p class="text-[11px] md:text-sm text-gray-600 mb-2 md:mb-4 leading-relaxed break-words">Many employers sponsor our students. Download our corporate prospectus to share with your HR department for company funding.</p>
                </div>
            </div>
            
            <div class="mt-8 md:mt-12 text-center" data-aos="zoom-in">
                <a href="/contact-us" class="inline-block bg-[#091c3d] text-white px-8 py-3.5 md:px-10 md:py-4 rounded-xl font-bold text-[10px] md:text-sm uppercase tracking-wider hover:bg-[#c1121f] transition shadow-lg hover:-translate-y-1">Request Exact Pricing</a>
            </div>
        </div>
    </section>

    <!-- 5. NEW CERTIFICATIONS SECTION -->
    <!-- FIXED: Stacks on tiny screens (grid-cols-1), side-by-side on sm (grid-cols-2), and 4 cols on desktop -->
    <section id="certifications" class="py-16 md:py-24 bg-[#091c3d] text-white overflow-hidden relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 relative z-10">
             <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#f5a524] mb-2">Global Recognition</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-white font-bold break-words">Your Certifications</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
                <p class="text-gray-300 mt-4 md:mt-6 max-w-2xl mx-auto text-[11px] md:text-sm leading-relaxed break-words">Graduating from Goshen Work Skill Association grants you globally recognized credentials, allowing you to seamlessly transition into the workforce in the UAE, UK, North America, and beyond.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- Cert 1 -->
                <div class="bg-white/5 border border-white/10 p-6 md:p-8 rounded-2xl md:rounded-3xl backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition duration-300 group" data-aos="fade-up" data-aos-delay="100">
                    <i class="fa-solid fa-award text-3xl md:text-4xl text-[#f5a524] mb-4 md:mb-6 group-hover:scale-110 transition"></i>
                    <h4 class="font-bold text-lg md:text-xl mb-2 md:mb-3 break-words">Vocational Diplomas</h4>
                    <p class="text-[11px] md:text-sm text-gray-400 leading-relaxed break-words">Awarded for Nursing Aid, Social Care, Hospitality, and Travel Business Operations.</p>
                </div>
                <!-- Cert 2 -->
                <div class="bg-white/5 border border-white/10 p-6 md:p-8 rounded-2xl md:rounded-3xl backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition duration-300 group" data-aos="fade-up" data-aos-delay="200">
                    <i class="fa-solid fa-certificate text-3xl md:text-4xl text-[#c1121f] mb-4 md:mb-6 group-hover:scale-110 transition"></i>
                    <h4 class="font-bold text-lg md:text-xl mb-2 md:mb-3 break-words">Safety Certificates</h4>
                    <p class="text-[11px] md:text-sm text-gray-400 leading-relaxed break-words">Internationally valid First Aid, CPR, and Industrial Health & Safety licenses.</p>
                </div>
                <!-- Cert 3 -->
                <div class="bg-white/5 border border-white/10 p-6 md:p-8 rounded-2xl md:rounded-3xl backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition duration-300 group" data-aos="fade-up" data-aos-delay="300">
                    <i class="fa-solid fa-plane-departure text-3xl md:text-4xl text-blue-400 mb-4 md:mb-6 group-hover:scale-110 transition"></i>
                    <h4 class="font-bold text-lg md:text-xl mb-2 md:mb-3 break-words">Aviation Credentials</h4>
                    <p class="text-[11px] md:text-sm text-gray-400 leading-relaxed break-words">Industry-standard Airline Ticketing & Customer Service certificates for global travel agencies.</p>
                </div>
                <!-- Cert 4 -->
                <div class="bg-white/5 border border-white/10 p-6 md:p-8 rounded-2xl md:rounded-3xl backdrop-blur hover:bg-white/10 hover:-translate-y-2 transition duration-300 group" data-aos="fade-up" data-aos-delay="400">
                    <i class="fa-solid fa-file-signature text-3xl md:text-4xl text-emerald-400 mb-4 md:mb-6 group-hover:scale-110 transition"></i>
                    <h4 class="font-bold text-lg md:text-xl mb-2 md:mb-3 break-words">Clinical Practicums</h4>
                    <p class="text-[11px] md:text-sm text-gray-400 leading-relaxed break-words">Signed validation letters confirming your 3-6 months of physical hospital and clinical experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PREMIUM BOTTOM CALL TO ACTION GRID -->
    <!-- FIXED: Stacks on mobile -->
    <section class="py-8 md:py-12 bg-gray-100 border-b border-gray-200">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 items-center bg-white p-6 md:p-10 rounded-2xl shadow-sm" data-aos="fade-up">
            <div class="text-center sm:text-left text-gray-800">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-1 md:mb-2 text-[#091c3d] break-words">Get In Touch:</h3>
                <p class="text-sm md:text-lg text-[#c1121f] font-bold break-all md:break-words">info&#64;goshenworkskill.com</p>
            </div>
            <div class="text-center sm:text-right">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-1 md:mb-2 text-[#091c3d] break-words">Call or WhatsApp:</h3>
                <p class="text-sm md:text-lg text-[#c1121f] font-bold break-words">+237 679 20 22 65</p>
            </div>
        </div>
    </section>

    <!-- ============================================== -->
    <!-- CENTRALIZED FOOTER & WIDGETS INJECTED HERE     -->
    <!-- ============================================== -->
    @include('partials.footer')
    @include('partials.widgets')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') { AOS.init({ once: true, offset: 50, duration: 1000, easing: 'ease-out-cubic' }); }
        });
    </script>
</body>
</html>
