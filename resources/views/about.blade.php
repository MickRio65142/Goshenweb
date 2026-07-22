<!-- resources/views/about.blade.php -->
<!doctype html>
<html lang="en-US" class="no-js" itemtype="https://schema.org/WebPage" itemscope>
<head>
	<meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

	<title>About Us | Goshen Work Skill Association</title>
	<meta name="description" content="Learn more about Goshen Work Skill Association. We are a premier vocational training center delivering globally accredited professional healthcare, aviation, and hospitality courses." />
	<link rel="canonical" href="http://127.0.0.1:8000/about-us/" />

    <!-- Tailwind CSS & FontAwesome CDNs -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animations (AOS) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes scroll-reviews-ltr {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        .animate-reviews-ltr {
            display: flex;
            width: max-content;
            animation: scroll-reviews-ltr 45s linear infinite;
        }
        .animate-reviews-ltr:hover {
            animation-play-state: paused;
        }

        @keyframes scroll-reviews-rtl {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-reviews-rtl {
            display: flex;
            width: max-content;
            animation: scroll-reviews-rtl 45s linear infinite;
        }
        .animate-reviews-rtl:hover {
            animation-play-state: paused;
        }

        .hover-image-elegant {
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s ease;
        }
        .group:hover .hover-image-elegant, 
        .hover-image-elegant:hover {
            transform: scale(1.08);
            filter: brightness(1.05) contrast(1.02);
        }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-[#fcfcfc]">
<div>
    
    @include('partials.header')

    <!-- ABOUT HERO HEADER BANNER -->
    <section class="relative py-16 md:py-20 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/about-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="About Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-black/10"></div>
        <!-- Adjusted padding for mobile -->
        <div class="relative z-10 max-w-[1250px] mx-auto px-6 md:px-12">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">Training Academy</p>
            <h1 class="font-serif text-4xl md:text-5xl font-bold leading-tight mb-3 md:mb-4 text-white break-words">About Us</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-base max-w-xl leading-relaxed break-words">Shape your future with our holistic clinical caregiving, hospitality, aviation, and safety programs.</p>
        </div>
    </section>

    <!-- DYNAMIC ASYMMETRICAL ABOUT PORTION WITH TILTED 5-IMAGE COLLAGE -->
    <section class="py-16 md:py-24 bg-white overflow-hidden">
        <!-- FIXED: Stacks on mobile (grid-cols-1), Side-by-side on desktop (lg:grid-cols-2) -->
        <div class="max-w-[1250px] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">
            
            <div class="space-y-4 md:space-y-6">
                <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f]">Our Academy Overview</span>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">ABOUT US</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mb-4 md:mb-6"></div>
                <p class="text-gray-600 leading-relaxed text-xs md:text-sm break-words">Goshen Work Skill Association offers Awards, Certificates, and Diploma level courses in over 9 different subject areas including healthcare, hospitality, safety, and aviation programs. This is the place where you can find the right course you are ambitious for. Hundreds of students enroll in our courses every year.</p>
                <p class="text-gray-600 leading-relaxed text-xs md:text-sm break-words">Students are equipped with competencies that enhance their employability and augment their worth to potential employers. The Institute actively engages with employers through its robust industry connections.</p>
                <p class="text-gray-600 leading-relaxed text-xs md:text-sm break-words">Currently, Goshen Work Skill Association offers exciting careers and lifestyle focused courses to a wide range of learners regardless of their location or prior experience and education.</p>
            </div>

            <!-- Highly Custom 5-Image Scattered Collage (Scaled for Mobile) -->
            <div class="relative h-[350px] md:h-[650px] w-full bg-gray-50 rounded-2xl md:rounded-3xl p-4 md:p-8 border border-gray-100 shadow-inner overflow-hidden" data-aos="fade-left">
                
                <div class="absolute top-2 left-2 md:top-4 md:left-4 w-28 md:w-56 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl -rotate-6 hover:rotate-0 transition-all duration-500 border-2 md:border-4 border-white cursor-pointer z-10 hover:z-50 group">
                    <img src="{{ asset('images/about-1.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=500&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Healthcare Practice">
                </div>
                
                <div class="absolute top-6 right-2 md:top-10 md:right-4 w-24 md:w-52 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl rotate-12 hover:rotate-0 transition-all duration-500 border-2 md:border-[6px] border-white cursor-pointer z-20 hover:z-50 group">
                    <img src="{{ asset('images/about-2.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=500&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Childcare Support">
                </div>
                
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-40 md:w-72 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-2xl -rotate-2 hover:rotate-0 transition-all duration-500 border-4 md:border-8 border-white cursor-pointer z-30 hover:z-50 group">
                    <img src="{{ asset('images/about-3.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Skills Lab">
                </div>

                <div class="absolute bottom-6 left-4 md:bottom-12 md:left-8 w-28 md:w-56 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl rotate-6 hover:rotate-0 transition-all duration-500 border-2 md:border-4 border-white cursor-pointer z-20 hover:z-50 group">
                    <img src="{{ asset('images/about-4.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="CPR Lab">
                </div>

                <div class="absolute bottom-2 right-4 md:bottom-4 md:right-8 w-32 md:w-60 aspect-[4/3] rounded-xl md:rounded-3xl overflow-hidden shadow-xl -rotate-12 hover:rotate-0 transition-all duration-500 border-2 md:border-[6px] border-white cursor-pointer z-10 hover:z-50 group">
                    <img src="{{ asset('images/about-5.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Medical Exam">
                </div>

            </div>
        </div>
    </section>

    <!-- VISION, MISSION, SCOPE & CORE VALUES GRID CARDS -->
    <section class="py-16 md:py-32 bg-[#fcfcfc] overflow-hidden">
        <!-- FIXED: Stacks on mobile, 2 cols on desktop to prevent text crushing -->
        <div class="max-w-[1250px] mx-auto px-2 md:px-6 grid grid-cols-2 gap-y-10 md:gap-y-24 gap-x-3 md:gap-x-12">
            
            <div class="relative flex items-center justify-center p-2 md:p-4" data-aos="fade-up">
                <img src="{{ asset('images/about-card-vision-1.jpg') }}" class="absolute -left-1 md:-left-8 top-0 w-16 h-16 md:w-28 md:h-28 object-cover rounded-lg md:rounded-xl shadow-xl -rotate-12 hover:rotate-0 transition duration-300 z-0 border-2 md:border-4 border-white hover-image-elegant">
                <img src="{{ asset('images/about-card-vision-2.jpg') }}" class="absolute -right-1 md:-right-6 bottom-4 w-14 h-14 md:w-24 md:h-24 object-cover rounded-lg md:rounded-xl shadow-xl rotate-6 hover:rotate-0 transition duration-300 z-0 border-2 border-white hover-image-elegant">
                
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-1 md:hover:-translate-y-2 transition duration-500 relative z-10 w-full md:w-5/6 text-center">
                    <div class="w-10 h-10 md:w-14 md:h-14 mx-auto bg-[#091c3d] text-white rounded-full flex items-center justify-center text-lg md:text-2xl mb-3 md:mb-4 shadow-lg"><i class="fa-solid fa-brain"></i></div>
                    <h3 class="font-serif text-lg md:text-2xl text-[#091c3d] font-bold mb-2 md:mb-3">Vision</h3>
                    <p class="text-gray-600 text-[11px] md:text-sm leading-relaxed break-words">Our Vision is to cultivate a community of educators, healthcare professionals, safety specialists, and technical experts who are catalysts for positive change in their industries and communities. Together, we strive to build a safer, healthier world.</p>
                </div>
            </div>

            <div class="relative flex items-center justify-center p-2 md:p-4" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('images/about-card-mission-1.jpg') }}" class="absolute -left-1 md:-left-8 bottom-0 w-14 h-14 md:w-24 md:h-24 object-cover rounded-lg md:rounded-xl shadow-xl rotate-6 hover:rotate-0 transition duration-300 z-0 border-2 border-white hover-image-elegant">
                <img src="{{ asset('images/about-card-mission-2.jpg') }}" class="absolute -right-1 md:-right-8 top-4 w-20 h-20 md:w-32 md:h-32 object-cover rounded-lg md:rounded-xl shadow-xl -rotate-6 hover:rotate-0 transition duration-300 z-0 border-2 md:border-4 border-white hover-image-elegant">
                
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-1 md:hover:-translate-y-2 transition duration-500 relative z-10 w-full md:w-5/6 text-center">
                    <div class="w-10 h-10 md:w-14 md:h-14 mx-auto bg-[#091c3d] text-white rounded-full flex items-center justify-center text-lg md:text-2xl mb-3 md:mb-4 shadow-lg"><i class="fa-solid fa-rocket"></i></div>
                    <h3 class="font-serif text-lg md:text-2xl text-[#091c3d] font-bold mb-2 md:mb-3">Mission</h3>
                    <p class="text-gray-600 text-[11px] md:text-sm leading-relaxed break-words">The mission of Goshen Work Skill Association is to provide comprehensive, high-quality education and skills development training in diverse disciplines across the globe, empowering passionate individuals to realize their absolute potential.</p>
                </div>
            </div>

            <div class="relative flex items-center justify-center p-2 md:p-4" data-aos="fade-up">
                <img src="{{ asset('images/about-card-scope-1.jpg') }}" class="absolute -left-1 md:-left-6 top-8 w-16 h-16 md:w-28 md:h-28 object-cover rounded-lg md:rounded-xl shadow-xl -rotate-6 hover:rotate-0 transition duration-300 z-0 border-2 md:border-4 border-white hover-image-elegant">
                <img src="{{ asset('images/about-card-scope-2.jpg') }}" class="absolute -right-1 md:-right-6 bottom-0 w-14 h-14 md:w-24 md:h-24 object-cover rounded-lg md:rounded-xl shadow-xl rotate-12 hover:rotate-0 transition duration-300 z-0 border-2 border-white hover-image-elegant">
                
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-1 md:hover:-translate-y-2 transition duration-500 relative z-10 w-full md:w-5/6 text-center">
                    <div class="w-10 h-10 md:w-14 md:h-14 mx-auto bg-[#091c3d] text-white rounded-full flex items-center justify-center text-lg md:text-2xl mb-3 md:mb-4 shadow-lg"><i class="fa-solid fa-users-viewfinder"></i></div>
                    <h3 class="font-serif text-lg md:text-2xl text-[#091c3d] font-bold mb-2 md:mb-3">Scope</h3>
                    <p class="text-gray-600 text-[11px] md:text-sm leading-relaxed break-words">Our training scope encompasses specialized solutions tailored to meet First Aid, Nursing Aid, Social Care, Health & Safety, Aviation, and Hospitality standards. Additionally, we offer comprehensive Travel Business Operations training.</p>
                </div>
            </div>

            <div class="relative flex items-center justify-center p-2 md:p-4" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('images/about-card-values-1.jpg') }}" class="absolute -left-1 md:-left-10 bottom-6 w-16 h-16 md:w-28 md:h-28 object-cover rounded-lg md:rounded-xl shadow-xl rotate-6 hover:rotate-0 transition duration-300 z-0 border-2 md:border-4 border-white hover-image-elegant">
                <img src="{{ asset('images/about-card-values-2.jpg') }}" class="absolute -right-1 md:-right-4 top-2 w-14 h-14 md:w-24 md:h-24 object-cover rounded-lg md:rounded-xl shadow-xl -rotate-6 hover:rotate-0 transition duration-300 z-0 border-2 border-white hover-image-elegant">
                
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-1 md:hover:-translate-y-2 transition duration-500 relative z-10 w-full md:w-5/6 text-center">
                    <div class="w-10 h-10 md:w-14 md:h-14 mx-auto bg-[#091c3d] text-white rounded-full flex items-center justify-center text-lg md:text-2xl mb-3 md:mb-4 shadow-lg"><i class="fa-solid fa-gem"></i></div>
                    <h3 class="font-serif text-lg md:text-2xl text-[#091c3d] font-bold mb-2 md:mb-3">Core Values</h3>
                    <ul class="flex flex-col gap-2 text-[11px] md:text-sm text-gray-700 font-semibold w-fit mx-auto text-left break-words">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Commitment & Novelty</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Accountability</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Transparency & Integrity</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- LEARNING STANDARDS & BEST PRACTICES -->
    <section class="py-16 md:py-24 bg-white border-b border-gray-100">
        <div class="max-w-[1250px] mx-auto px-4 md:px-6 text-center">
            <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold mb-2 break-words">LEARNING STANDARDS & BEST PRACTICES</h2>
            <p class="text-gray-500 text-xs md:text-sm mb-8 md:mb-12 max-w-2xl mx-auto">Our curriculum is informed by internationally recognized frameworks and publicly available guidance from the following organizations.</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 items-stretch">
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-who.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="World Health Organization">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">Our healthcare programs reference publicly available WHO health and patient safety guidance.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-ilo.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="International Labour Organization">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">Workplace safety and employment concepts are informed by ILO guidance.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-red-cross.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="Red Cross">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">First aid instruction is informed by internationally recognized first aid principles.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-icao.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="ICAO">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">Aviation topics reference internationally recognized civil aviation standards.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-osha.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="OSHA">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">Safety modules incorporate internationally recognized workplace safety concepts.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-iso.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="ISO">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">We encourage quality management and continuous improvement principles inspired by ISO standards.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-unesco.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="UNESCO">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">Our mission supports lifelong learning and skills development.</p>
                </div>
                <div class="group bg-gray-50 p-4 md:p-5 rounded-xl md:rounded-2xl border border-gray-100 flex flex-col items-center text-center transition hover:shadow-md hover:border-gray-200">
                    <img src="{{ asset('images/logo-unicef.png') }}" class="h-12 md:h-16 object-contain mb-3" alt="UNICEF">
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-relaxed">Social care modules reference child welfare and protection guidance where appropriate.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW INTERACTIVE FAQ SECTION WITH ACCORDIONS -->
    <section class="py-16 md:py-24 bg-white border-b border-gray-100 overflow-hidden">
        <!-- FIXED: Removed broken md:grid-cols-32, properly stacked on mobile, 12-col grid on desktop -->
        <div class="max-w-[1250px] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-16">
            
            <!-- Left Sticky Sidebar Header Info -->
            <div class="lg:col-span-4 space-y-3 md:space-y-4 lg:sticky lg:top-24 h-fit">
                <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f]">Got Questions?</span>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold leading-tight break-words">Frequently Asked Questions</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mb-4 md:mb-6"></div>
                <p class="text-gray-600 text-xs md:text-sm leading-relaxed break-words">Here are detailed answers to the most common questions regarding our caregiver training, certifications, payment structures, and international career paths.</p>
                <div class="bg-gray-50 p-4 md:p-6 rounded-xl md:rounded-2xl border border-gray-100 space-y-2 md:space-y-3">
                    <p class="text-[10px] md:text-xs font-bold text-[#091c3d] uppercase tracking-wider">Still need help?</p>
                    <p class="text-[11px] md:text-xs text-gray-500 leading-relaxed break-words">Our Admissions Office is here to assist with your enrollment payments and registration.</p>
                    <a href="tel:+237678672998" class="inline-flex items-center gap-2 text-[11px] md:text-xs font-bold text-[#c1121f] hover:text-[#091c3d] transition">
                        <i class="fa-solid fa-phone"></i> +237 678 672 998 / +237 696 681 163
                    </a>
                </div>
            </div>

            <!-- Right Column Accordions controlled via Alpine.js -->
            <div class="lg:col-span-8" x-data="{ activeFAQ: null }">
                <div class="space-y-3 md:space-y-4">
                    
                    <!-- Question 1 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <!-- Added whitespace-normal to ensure long questions wrap properly on mobile -->
                        <button @click="activeFAQ = activeFAQ === 1 ? null : 1" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 1 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">1. What is the name of your organisation?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 1 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 1" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Goshen Workskill Caregivers Association
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 2 ? null : 2" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 2 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">2. Is your certificate recognised abroad?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 2 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 2" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Yes. We are a CPD-certified and accredited institute, and our certificates are globally recognised.
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 3 ? null : 3" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 3 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">3. How long is the training?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 3 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 3" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Our program consists of:
                            <ul class="list-disc list-inside mt-2 space-y-1 font-medium">
                                <li><strong>2 weeks</strong> of intensive theory classes</li>
                                <li><strong>3 months</strong> of practical hands-on training in hospitals</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 4 ? null : 4" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 4 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">4. Do you have a branch in Yaoundé?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 4 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 4" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            No. We currently have campuses in Limbe and Douala only.
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 5 ? null : 5" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 5 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">5. How much is the total payment?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 5 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 5" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            The total payment is <strong>200,000 CFA</strong>. Please note that this amount excludes study materials, uniform, and practical equipment.
                        </div>
                    </div>

                    <!-- Question 6 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 6 ? null : 6" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 6 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">6. Can a student pay in installments?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 6 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 6" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Yes. Payments can be made in <strong>2 or 3 installments</strong>, but must be fully completed before final hospital practicals begin.
                        </div>
                    </div>

                    <!-- Question 7 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 7 ? null : 7" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 7 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">7. Can someone secure a job abroad after training?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 7 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 7" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Yes. We guide our students on:
                            <ul class="list-disc list-inside mt-2 space-y-1 font-semibold">
                                <li>Migration opportunities</li>
                                <li>Available caregiver jobs abroad</li>
                                <li>Best caregiver pathways</li>
                            </ul>
                            <div class="mt-4 p-3 md:p-4 bg-red-50 text-[#c1121f] rounded-lg md:rounded-xl text-[10px] md:text-xs font-semibold leading-relaxed border border-red-100 break-words">
                                <i class="fa-solid fa-circle-info mr-1"></i> Note: Goshen Workskill is a training, consulting, and empowerment organisation, not a travel agency.
                            </div>
                        </div>
                    </div>

                    <!-- Question 8 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 8 ? null : 8" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 8 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">8. Can I join the training online?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 8 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 8" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Yes, partially.
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>Theory classes can be taken online.</li>
                                <li>Practical skills (such as vital signs, CPR, hygiene care, and First Aid) require physical attendance.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Question 9 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 9 ? null : 9" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 9 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">9. What are the requirements for registration?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 9 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 9" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            The basic requirement is the ability to read and write.
                        </div>
                    </div>

                    <!-- Question 10 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 10 ? null : 10" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 10 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">10. What certificate will I be issued?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 10 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 10" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Upon graduation, students receive:
                            <ul class="list-disc list-inside mt-2 space-y-1 font-semibold text-gray-700">
                                <li>Diploma in Nursing Assistant</li>
                                <li>Diploma in Caregiving</li>
                                <li>First Aid & CPR Certificate</li>
                                <li>BLS (Basic Life Support) Certificate</li>
                                <li>Dementia Management Certificate</li>
                                <li>Elderly Care Certificate</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Question 11 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 11 ? null : 11" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 11 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">11. Do I still need this training if I am a nurse?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 11 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 11" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Yes. Caregiving training is more specialized and practical. It also adds value for international job opportunities and visa processes.
                        </div>
                    </div>

                    <!-- Question 12 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 12 ? null : 12" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 12 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">12. How much is the admission form?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 12 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 12" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            The admission form is <strong>10,000 FCFA</strong> only.
                        </div>
                    </div>

                    <!-- Question 13 -->
                    <div class="border border-gray-100 rounded-xl md:rounded-2xl bg-white shadow-sm hover:shadow transition duration-300 overflow-hidden">
                        <button @click="activeFAQ = activeFAQ === 13 ? null : 13" class="w-full flex justify-between items-center p-4 md:p-6 text-left font-semibold text-[#091c3d] transition-colors duration-300" :class="activeFAQ === 13 ? 'bg-gray-50' : ''">
                            <span class="text-xs md:text-base pr-4 whitespace-normal break-words">13. Can I pay for the admission form via Mobile Money (MoMo)?</span>
                            <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 flex-shrink-0" :class="activeFAQ === 13 ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="activeFAQ === 13" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-4 md:p-6 pt-0 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed bg-gray-50/50 break-words">
                            Yes. Kindly contact the office on <strong>678 672 998</strong> for payment details.<br>
                            <span class="text-[10px] md:text-xs text-[#091c3d] font-bold mt-2 block break-words">Goshen WorldSkill & Caregivers Association</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- HOW OUR STUDENTS SEE US -->
    <section class="py-16 md:py-24 bg-[#fff7f2] border-t border-gray-100 overflow-hidden relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 relative z-10">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h2 class="text-[#c1121f] font-bold uppercase tracking-widest text-[10px] md:text-xs mb-2 md:mb-4">Reviews & Testimonials</h2>
                <h3 class="font-serif text-3xl md:text-5xl text-[#0f172a] mb-2 md:mb-4 break-words">How Our Students See Us:</h3>
                <div class="w-16 h-1 bg-[#c1121f] mx-auto mt-4"></div>
            </div>
            <div class="space-y-4 md:space-y-8">
                <!-- ROW 1: LTR -->
                <div class="w-full overflow-hidden relative" data-aos="fade-up">
                    <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="animate-reviews-ltr">
                        <div class="flex gap-4 md:gap-8 px-2 md:px-4">
                            <!-- Adjusted width for mobile -->
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-vertical">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-1.jpg') }}" class="w-full h-full object-cover" alt="Annalisa Zervoulakos">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">Annalisa Zervoulakos</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"Im so happy with this class, im so appreciate my teacher she is so nice to teach and to explain everything,about the subject, my classmate so kind and polite even we are always joking..."</p>
                            </div>

                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-diagonal">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-2.jpg') }}" class="w-full h-full object-cover" alt="Mnko Mankow">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">Mnko Mankow</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"Congratulations to us classmates 🎓👏 this Training institute high recommended for Us.. GodBless 🙏"</p>
                            </div>
                        </div>

                        <!-- Seamless Loop clone -->
                        <div class="flex gap-4 md:gap-8 px-2 md:px-4">
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-vertical">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-1.jpg') }}" class="w-full h-full object-cover" alt="Annalisa Zervoulakos">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">Annalisa Zervoulakos</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"Im so happy with this class, im so appreciate my teacher she is so nice to teach and to explain everything,about the subject..."</p>
                            </div>
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-diagonal">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-2.jpg') }}" class="w-full h-full object-cover" alt="Mnko Mankow">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">Mnko Mankow</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"Congratulations to us classmates 🎓👏 this Training institute high recommended for Us.. GodBless 🙏"</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ROW 2: RTL -->
                <div class="w-full overflow-hidden relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    
                    <div class="animate-reviews-rtl">
                        <div class="flex gap-4 md:gap-8 px-2 md:px-4">
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-vertical">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-3.jpg') }}" class="w-full h-full object-cover" alt="Apple Jutar">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">Apple Jutar</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"High recommended this Training institute also my teacher 😊 godbless us🙏"</p>
                            </div>

                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-diagonal">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-4.jpg') }}" class="w-full h-full object-cover" alt="DJ MIX26">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">DJ MIX26</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-[#091c3d] px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"Friendly and accommodating staff. Valuable education content. Special mention to great instructor - warm and hospitable"</p>
                            </div>
                        </div>

                        <!-- Seamless Loop clone -->
                        <div class="flex gap-4 md:gap-8 px-2 md:px-4">
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-vertical">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-3.jpg') }}" class="w-full h-full object-cover" alt="Apple Jutar">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">Apple Jutar</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"High recommended this Training institute also my teacher 😊 godbless us🙏"</p>
                            </div>
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition animate-float-diagonal">
                                <div class="flex items-start gap-3 md:gap-4">
                                    <div class="w-10 h-10 md:w-14 md:h-14 rounded-full overflow-hidden border-2 border-white shadow-sm relative flex-shrink-0">
                                        <img src="{{ asset('images/review-4.jpg') }}" class="w-full h-full object-cover" alt="DJ MIX26">
                                        <span class="absolute bottom-0 right-0 bg-white border border-gray-100 px-1 py-0.5 rounded-full shadow-sm text-[7px] md:text-[9px] font-black text-red-500">G</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-[#0f172a] text-xs md:text-sm break-words">DJ MIX26</h4>
                                        <p class="text-[9px] md:text-[10px] text-gray-400 font-semibold mb-1">2024</p>
                                        <div class="flex items-center gap-1.5 text-[10px] md:text-xs text-[#f5a524] font-bold">
                                            <span>★★★★★</span>
                                            <span class="text-[7px] md:text-[9px] bg-sky-100 text-[#091c3d] px-2 py-0.5 rounded-full flex items-center gap-1"><i class="fa-solid fa-circle-check text-sky-600"></i> Verified</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-[10px] md:text-xs italic leading-relaxed mt-4 md:mt-6 break-words">"Friendly and accommodating staff. Valuable education content. Special mention to great instructor - warm and hospitable"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GLOBAL CTA GET TRAINED BANNER -->
    <section class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
        <!-- FIXED: Single column on small screens to prevent email cut off -->
        <div class="max-w-[1250px] mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 items-center bg-[#fff7f5] p-6 md:p-10 rounded-2xl">
            <div class="text-center sm:text-left text-gray-800">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-1 md:mb-2 text-[#091c3d] break-words">Get In Touch:</h3>
                <p class="text-sm md:text-lg text-[#c1121f] font-bold break-all md:break-words">info&#64;goshenworkskill.com</p>
            </div>
            <div class="text-center sm:text-right">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-1 md:mb-2 text-[#091c3d] break-words">Call or WhatsApp:</h3>
                <p class="text-sm md:text-lg text-[#c1121f] font-bold break-words">+237 678 672 998 / +237 696 681 163</p>
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.widgets')

</div>

<!-- Scripts for Animations -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                once: true,
                offset: 50,
                duration: 1000,
                easing: 'ease-out-cubic'
            });
        }
    });
</script>

</body>
</html>
