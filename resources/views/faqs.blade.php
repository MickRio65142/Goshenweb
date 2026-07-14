<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING ON SEARCH INPUT -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>FAQs | Goshen Work Skill Association</title>
    <meta name="description" content="Find answers to frequently asked questions about Goshen Work Skill Association's courses, enrollment, certifications, and more.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://127.0.0.1:8000/faqs">

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
        
        :root {
            --color-navy: #091c3d;
            --color-crimson: #c1121f;
            --color-gold: #f5a524;
        }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    @include('partials.header')

    <!-- FAQs Hero Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/faqs-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="FAQs Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent z-10"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 w-full text-left">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">Help Center</p>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 text-white break-words">Frequently Asked Questions</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-base max-w-xl leading-relaxed break-words">Find answers to common questions about our courses, enrollment process, and certifications.</p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="py-8 md:py-12 bg-white border-b border-gray-100">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="max-w-2xl mx-auto" data-aos="fade-up">
                <div class="relative">
                    <input type="text" x-data="{ search: '' }" x-model="search" placeholder="Search for answers..." class="w-full px-5 py-3 md:px-6 md:py-4 rounded-full border-2 border-gray-200 focus:border-[#c1121f] focus:outline-none text-gray-800 text-xs md:text-sm transition duration-300 pl-12 md:pl-14">
                    <i class="fa-solid fa-search absolute left-4 md:left-5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs Content -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                
                <!-- General Questions -->
                <div class="mb-12 md:mb-16" data-aos="fade-up">
                    <div class="flex items-center gap-3 md:gap-4 mb-6 md:mb-8">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#c1121f] flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-question text-white text-sm md:text-base"></i>
                        </div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold break-words">General Questions</h2>
                    </div>
                    
                    <div x-data="{ activeItem: null }" class="space-y-3 md:space-y-4">
                        <!-- FAQ Item 1 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 1 ? null : 1" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">What is Goshen Work Skill Association?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 1 }"></i>
                            </button>
                            <div x-show="activeItem === 1" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Goshen Work Skill Association is a premier vocational training institute in Cameroon offering accredited diploma and certificate programs in healthcare, hospitality, aviation, and safety. We combine theoretical knowledge with practical hands-on training to prepare students for successful careers in their chosen fields.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 2 ? null : 2" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Where are your campuses located?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 2 }"></i>
                            </button>
                            <div x-show="activeItem === 2" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Our main campus is located in Douala, Cameroon. We also have training centers and partnerships across various regions. Contact us for specific location details and to find the nearest training facility to you.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 3 ? null : 3" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Are your courses accredited?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 3 }"></i>
                            </button>
                            <div x-show="activeItem === 3" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Yes, our courses are accredited by relevant professional bodies and educational authorities. Our certifications are recognized nationally and internationally, enabling our graduates to pursue careers globally. Specific accreditation details vary by program.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enrollment & Admissions -->
                <div class="mb-12 md:mb-16" data-aos="fade-up">
                    <div class="flex items-center gap-3 md:gap-4 mb-6 md:mb-8">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-plus text-white text-sm md:text-base"></i>
                        </div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold break-words">Enrollment & Admissions</h2>
                    </div>
                    
                    <div x-data="{ activeItem: null }" class="space-y-3 md:space-y-4">
                        <!-- FAQ Item 4 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 4 ? null : 4" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">What are the admission requirements?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 4 }"></i>
                            </button>
                            <div x-show="activeItem === 4" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Admission requirements vary by program. Generally, you need: (1) Minimum high school diploma or equivalent, (2) Valid government-issued ID, (3) Completed application form, (4) Application fee payment. Some advanced programs may require prior experience or additional certifications.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 5 ? null : 5" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">How do I apply for a course?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 5 }"></i>
                            </button>
                            <div x-show="activeItem === 5" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">You can apply online through our website by visiting the course page and clicking "Enroll Now." Alternatively, visit our campus admissions office with your documents. The process includes filling out an application form, submitting required documents, and paying the application fee.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 6 ? null : 6" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Is there an age limit for enrollment?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 6 }"></i>
                            </button>
                            <div x-show="activeItem === 6" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">You must be at least 18 years old to enroll. For students between 16-18 years, parental or guardian consent is required. There is no upper age limit - we welcome adult learners of all ages who are passionate about advancing their careers.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Information -->
                <div class="mb-12 md:mb-16" data-aos="fade-up">
                    <div class="flex items-center gap-3 md:gap-4 mb-6 md:mb-8">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#f5a524] flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-book-open text-white text-sm md:text-base"></i>
                        </div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold break-words">Course Information</h2>
                    </div>
                    
                    <div x-data="{ activeItem: null }" class="space-y-3 md:space-y-4">
                        <!-- FAQ Item 7 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 7 ? null : 7" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">How long do the courses take?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 7 }"></i>
                            </button>
                            <div x-show="activeItem === 7" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Course duration varies by program: Certificate programs typically take 3-6 months, Diploma programs take 6-12 months, and specialized certifications may be completed in 2-4 weeks. Specific duration details are available on each course page.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 8 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 8 ? null : 8" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">What is the class schedule?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 8 }"></i>
                            </button>
                            <div x-show="activeItem === 8" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">We offer flexible scheduling options including morning, afternoon, and evening classes. Weekend classes are also available for working professionals. Some courses offer online/hybrid options. Contact us to find a schedule that fits your needs.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 9 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 9 ? null : 9" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Do you offer online courses?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 9 }"></i>
                            </button>
                            <div x-show="activeItem === 9" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Yes, we offer online and hybrid learning options for select courses. These include virtual lectures, digital resources, and remote assessments. However, practical components and clinical training require in-person attendance at our facilities.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fees & Payment -->
                <div class="mb-12 md:mb-16" data-aos="fade-up">
                    <div class="flex items-center gap-3 md:gap-4 mb-6 md:mb-8">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#c1121f] flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-credit-card text-white text-sm md:text-base"></i>
                        </div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold break-words">Fees & Payment</h2>
                    </div>
                    
                    <div x-data="{ activeItem: null }" class="space-y-3 md:space-y-4">
                        <!-- FAQ Item 10 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 10 ? null : 10" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">What payment methods do you accept?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 10 }"></i>
                            </button>
                            <div x-show="activeItem === 10" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">We accept cash, bank transfers, mobile money (Orange Money, MTN Mobile Money), credit/debit cards, and bank checks. Payment plans are available for eligible students. All payments must be made in XAF (Central African CFA Franc).</p>
                            </div>
                        </div>

                        <!-- FAQ Item 11 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 11 ? null : 11" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Do you offer payment plans?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 11 }"></i>
                            </button>
                            <div x-show="activeItem === 11" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Yes, we offer flexible payment plans allowing you to pay in installments throughout the course duration. A deposit is required to secure your enrollment. Contact our finance office to discuss payment plan options that suit your budget.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 12 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 12 ? null : 12" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">What is your refund policy?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 12 }"></i>
                            </button>
                            <div x-show="activeItem === 12" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Our refund policy allows full refunds (minus 10% admin fee) before course start, 75% refund within the first week, and no refunds after the first week. For detailed information, please refer to our <a href="/refunds" class="text-[#c1121f] hover:underline font-semibold">Refund Policy</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certification & Careers -->
                <div class="mb-12 md:mb-16" data-aos="fade-up">
                    <div class="flex items-center gap-3 md:gap-4 mb-6 md:mb-8">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-certificate text-white text-sm md:text-base"></i>
                        </div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold break-words">Certification & Careers</h2>
                    </div>
                    
                    <div x-data="{ activeItem: null }" class="space-y-3 md:space-y-4">
                        <!-- FAQ Item 13 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 13 ? null : 13" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Will I receive a certificate upon completion?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 13 }"></i>
                            </button>
                            <div x-show="activeItem === 13" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Yes, upon successful completion of all course requirements including exams and practical assessments, you will receive an accredited certificate or diploma. Certificates can be verified by employers through our official verification system.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 14 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 14 ? null : 14" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Do you provide job placement assistance?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 14 }"></i>
                            </button>
                            <div x-show="activeItem === 14" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">We provide career guidance, resume building workshops, and interview preparation. While we don't guarantee job placement, we maintain partnerships with various employers and share job opportunities with our graduates. Our career services team supports you in your job search.</p>
                            </div>
                        </div>

                        <!-- FAQ Item 15 -->
                        <div class="border border-gray-200 rounded-xl md:rounded-2xl overflow-hidden shadow-sm">
                            <button @click="activeItem = activeItem === 15 ? null : 15" class="w-full px-4 py-4 md:px-6 md:py-5 flex items-center justify-between gap-3 bg-white hover:bg-gray-50 transition duration-300">
                                <span class="font-semibold text-[#091c3d] text-left text-xs md:text-base whitespace-normal break-words">Are the certificates recognized internationally?</span>
                                <i class="fa-solid fa-chevron-down text-[10px] md:text-xs text-[#c1121f] transition-transform duration-300 shrink-0" :class="{ 'rotate-180': activeItem === 15 }"></i>
                            </button>
                            <div x-show="activeItem === 15" x-collapse class="px-4 py-4 md:px-6 md:py-5 bg-gray-50 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed text-[11px] md:text-sm break-words">Many of our certifications are recognized internationally, particularly in healthcare and safety sectors. However, recognition may vary by country and industry. We recommend checking with relevant authorities in your target country for specific requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Still Have Questions CTA -->
                <!-- FIXED: Made buttons stack correctly on mobile -->
                <div class="bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white rounded-2xl p-6 md:p-10 text-center shadow-lg" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl font-bold mb-3 md:mb-4 break-words">Still Have Questions?</h2>
                    <p class="text-gray-300 text-xs md:text-sm mb-6 md:mb-8 max-w-xl mx-auto break-words">Can't find the answer you're looking for? Our team is here to help you with any questions about our courses, enrollment, or services.</p>
                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
                        <a href="/contact-us" class="inline-block bg-[#c1121f] hover:bg-white hover:text-[#091c3d] px-6 py-3.5 md:px-8 md:py-4 rounded-lg md:rounded-xl font-bold text-[10px] md:text-xs uppercase tracking-wider transition duration-300 shadow-md">
                            Contact Us
                        </a>
                        <a href="tel:+237679202265" class="inline-block bg-white/10 hover:bg-white/20 px-6 py-3.5 md:px-8 md:py-4 rounded-lg md:rounded-xl font-bold text-[10px] md:text-xs uppercase tracking-wider transition duration-300 border border-white/20">
                            Call Us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('partials.footer')

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 50
                });
            }
        });
    </script>
</body>
</html>
