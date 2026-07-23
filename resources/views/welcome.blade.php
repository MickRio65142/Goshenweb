<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- ========================================== -->
    <!-- ADVANCED ENTERPRISE SEO, GEO & AEO MODULE   -->
    <!-- ========================================== -->
    <title>Goshen Work Skill Association | Professional Certification Programs</title>
    <meta name="description" content="Enroll in Goshen Work Skill Association. We offer 9 diplomas and certificates in Social Care, Nursing Aid, PSW, Hospitality, Travel Business, Airline Ticketing, Customer Service, First Aid, and Safety.">
    <meta name="keywords" content="Goshen Work Skill Association, Nursing Aid, Social Care Diploma, Personal Support Worker PSW, Travel Business Operations, Airline Ticketing, Customer Service Computer Operations, First Aid CPR, Health and Safety">
    <meta name="author" content="Goshen Work Skill Association">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://127.0.0.1:8000">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://127.0.0.1:8000">
    <meta property="og:title" content="Goshen Work Skill Association">
    <meta property="og:description" content="Earn globally recognized vocational and clinical certifications under expert coordinators.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=80">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Goshen Work Skill Association">
    <meta name="twitter:description" content="Accredited education combining virtual lectures with hands-on skills labs.">
    <meta name="twitter:image" content="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=80">

    <!-- Educational Organization Schema (SEO & AEO) -->
    <script type="application/ld+json">
    {
      "{{ '@context' }}": "https://schema.org",
      "{{ '@type' }}": "EducationalOrganization",
      "name": "Goshen Work Skill Association",
      "url": "http://127.0.0.1:8000",
      "logo": "https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=200&q=80",
      "description": "Accredited educational institute offering 9 certified vocational training packages in healthcare, hospitality, customer service, travel business, aviation, safety, and PSW.",
      "address": {
        "{{ '@type' }}": "PostalAddress",
        "streetAddress": "Main Campus",
        "addressLocality": "Douala",
        "addressCountry": "CM"
      },
      "telephone": "+237 678 672 998",
      "email": "info@goshenworkskill.com"
    }
    </script>
    <!-- ========================================== -->

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

    <!-- NEW INTERACTIVE FLAT MAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css" />

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        
        :root {
            --color-navy: #091c3d; /* Goshen deep blue */
            --color-crimson: #c1121f; /* Goshen red */
            --color-gold: #f5a524;
        }

        /* Continuous Left to Right Scrolling Reviews Marquee */
        @keyframes scroll-reviews-ltr {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        .animate-reviews-ltr {
            display: flex;
            width: max-content;
            animation: scroll-reviews-ltr 50s linear infinite;
        }
        .animate-reviews-ltr:hover {
            animation-play-state: paused;
        }

        /* Continuous Right to Left Scrolling Reviews Marquee */
        @keyframes scroll-reviews-rtl {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-reviews-rtl {
            display: flex;
            width: max-content;
            animation: scroll-reviews-rtl 50s linear infinite;
        }
        .animate-reviews-rtl:hover {
            animation-play-state: paused;
        }

        /* Course Carousel - Left to Right */
        @keyframes scroll-courses-ltr {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-courses-ltr {
            display: flex;
            width: max-content;
            animation: scroll-courses-ltr 40s linear infinite;
        }
        .animate-courses-ltr:hover {
            animation-play-state: paused;
        }

        /* Course Carousel - Right to Left */
        @keyframes scroll-courses-rtl {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        .animate-courses-rtl {
            display: flex;
            width: max-content;
            animation: scroll-courses-rtl 40s linear infinite;
        }
        .animate-courses-rtl:hover {
            animation-play-state: paused;
        }

        /* Internship Carousel - Left to Right (Desktop) */
        @keyframes scroll-internship-ltr {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-internship-ltr {
            display: flex;
            width: max-content;
            animation: scroll-internship-ltr 60s linear infinite;
        }
        .animate-internship-ltr:hover {
            animation-play-state: paused;
        }

        /* 3D Floating Animations for Scattered Media */
        @keyframes drift-up-down {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }
        @keyframes drift-left-right {
            0%, 100% { transform: translateX(0px) rotate(0deg); }
            50% { transform: translateX(12px) rotate(-3deg); }
        }

        .animate-float-vertical { animation: drift-up-down 7s ease-in-out infinite; }
        .animate-float-diagonal { animation: drift-left-right 8.5s ease-in-out infinite; }

        /* ========================================================
           MATURE ELEGANT HOVER EFFECT (Replaced the Shake)
           ======================================================== */
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

        /* Customizing the new Map Tooltip to match your brand */
        .jvm-tooltip {
            background-color: #091c3d !important;
            color: #ffffff !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            font-size: 12px !important;
            font-weight: bold !important;
            padding: 8px 12px !important;
            border-radius: 8px !important;
            border: 1px solid rgba(255,255,255,0.2) !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5) !important;
        }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    <!-- CALLING YOUR SEPARATE HEADER PARTIAL -->
    @include('partials.header')

    <!-- 1. HIGH-PERFORMANCE HERO SLIDESHOW -->
    <section x-data="{ 
                activeSlide: 0, 
                displayText: '',
                charIndex: 0,
                isDeleting: false,
                typingSpeed: 60,
                deletingSpeed: 25,
                holdDelay: 3000,
                slides: [
                    {
                        img: '{{ asset("images/hero-home-limbe.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Goshen Work Skill Association',
                        accent: 'Excellence in Vocational Training',
                        desc: 'Empowering careers through accredited programs in healthcare, hospitality, aviation, and safety. Visit our Limbe office for admissions and guidance.'
                    },
                    {
                        img: '{{ asset("images/hero-home-douala.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Premium Education for All',
                        accent: '9 Accredited Programs • Flexible Payment',
                        desc: 'Our Douala office offers course counselling, enrollment, and flexible payment via MTN MoMo, Orange Money, or bank transfer.'
                    },
                    {
                        img: '{{ asset("images/slide-social-care.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Diploma in Social Care',
                        accent: 'Community Care • Safeguarding • Support',
                        desc: 'Master community and residential social care skills for a rewarding career helping vulnerable individuals.'
                    },
                    {
                        img: '{{ asset("images/slide-nursing-aid.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Diploma in Nursing Aid',
                        accent: 'Patient Care • Clinical Skills • Placement',
                        desc: 'Gain hands-on clinical experience and patient care techniques inside high-tech medical simulation labs.'
                    },
                    {
                        img: '{{ asset("images/slide-health-safety.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Certificate in Health and Safety',
                        accent: 'Workplace Safety • Risk Assessment',
                        desc: 'Learn essential workplace safety, risk assessment, and industrial hazard prevention frameworks.'
                    },
                    {
                        img: '{{ asset("images/slide-first-aid-cpr.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Certificate in First Aid and CPR',
                        accent: 'Life-Saving • Emergency Response',
                        desc: 'Discover the essentials of life-saving care and cardiopulmonary resuscitation in emergency scenarios.'
                    },
                    {
                        img: '{{ asset("images/slide-hospitality.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Diploma in Hospitality and Tourism',
                        accent: 'Hotel Ops • Tourism • Guest Relations',
                        desc: 'Step into the vibrant world of tourism management, hotel operations, and global guest relations.'
                    },
                    {
                        img: '{{ asset("images/slide-customer-service.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1552581234-26160f608093?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Certificate in Customer Service',
                        accent: 'Communication • Computer Operations',
                        desc: 'Learn expert communication skills combined with modern computer operations for corporate offices.'
                    },
                    {
                        img: '{{ asset("images/slide-travel-business.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Diploma in Travel Business Operations',
                        accent: 'Itinerary Planning • Booking • Admin',
                        desc: 'Understand travel desk operations, itinerary planning, booking workflows, and tourism business administration.'
                    },
                    {
                        img: '{{ asset("images/slide-airline-ticketing.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Certificate in Airline Ticketing',
                        accent: 'GDS Systems • Reservations • Aviation',
                        desc: 'Get certified in GDS systems, flight reservations, and international aviation protocol.'
                    },
                    {
                        img: '{{ asset("images/slide-psw.jpg") }}',
                        fallback: 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=1600&h=700&q=80',
                        title: 'Diploma as Personal Support Worker',
                        accent: 'Elderly Care • Home Support • Placement',
                        desc: 'Prepare for personal support worker roles with caregiving, elderly care, and supervised clinical placement skills.'
                    }
                ],
                init() { this.type(); },
                type() {
                    let currentSlide = this.slides[this.activeSlide];
                    let fullText = currentSlide.accent;
                    
                    if (!this.isDeleting && this.charIndex < fullText.length) {
                        this.displayText += fullText.charAt(this.charIndex);
                        this.charIndex++;
                        setTimeout(() => this.type(), this.typingSpeed);
                    } else if (this.isDeleting && this.charIndex > 0) {
                        this.displayText = fullText.substring(0, this.charIndex - 1);
                        this.charIndex--;
                        setTimeout(() => this.type(), this.deletingSpeed);
                    } else if (!this.isDeleting && this.charIndex === fullText.length) {
                        setTimeout(() => {
                            this.isDeleting = true;
                            this.type();
                        }, this.holdDelay);
                    } else if (this.isDeleting && this.charIndex === 0) {
                        this.isDeleting = false;
                        this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                        setTimeout(() => this.type(), 500);
                    }
                }
             }" 
             class="relative h-[80vh] w-full bg-black overflow-hidden flex items-center shadow-2xl">
        
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" 
                 x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                 x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
                 class="absolute inset-0 z-0">
                <img :src="slide.img" loading="lazy" class="w-full h-full object-cover opacity-95" alt="Slider BG">
            </div>
        </template>
        
        <div class="absolute inset-0 bg-gradient-to-r from-black/40 via-black/20 to-transparent z-10"></div>

        <div class="relative z-20 w-full max-w-[90rem] mx-auto px-6 md:px-12 text-left h-full flex flex-col justify-center">
            <h3 class="text-white font-serif text-xl md:text-2xl lg:text-3xl font-semibold mb-1 drop-shadow-[0_2px_8px_rgba(0,0,0,0.75)] break-words" x-text="slides[activeSlide].title"></h3>
            
            <h2 class="font-serif text-2xl md:text-3xl lg:text-4xl text-[#f5a524] font-bold leading-tight min-h-[60px] drop-shadow-[0_4px_12px_rgba(0,0,0,0.75)] mb-4 select-none break-words">
                <span x-text="displayText"></span><span class="animate-pulse text-[#f5a524]">|</span>
            </h2>

            <p x-show="!isDeleting" x-transition.opacity.duration.500ms class="text-gray-200 text-sm md:text-base max-w-xl leading-relaxed mb-6 drop-shadow-[0_2px_4px_rgba(0,0,0,0.4)]" x-text="slides[activeSlide].desc"></p>
            
            <div class="flex gap-4">
                <a href="/packages" class="bg-[#c1121f] hover:bg-[#091c3d] text-white px-5 md:px-6 py-2.5 rounded-lg font-bold text-xs uppercase tracking-wider transition duration-300 shadow-lg">Enroll Now</a>
                <a href="/courses" class="bg-white/10 hover:bg-white hover:text-[#091c3d] text-white px-5 md:px-6 py-2.5 rounded-lg font-bold text-xs uppercase tracking-wider transition duration-300 shadow-lg border border-white/30">View 9 Courses</a>
            </div>
        </div>
    </section>

    <!-- 2. "ROPE CURVE" CAMPUS LAB GALLERY -->
    <section class="py-16 md:py-24 bg-white border-b border-gray-100 overflow-hidden">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Our Campus Vibe</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold">Inside Goshen Training Labs</h2>
                <div class="w-16 h-1 bg-[#c1121f] mx-auto mt-4"></div>
            </div>

            <!-- Mobile: 2-col staggered grid / Desktop: 4-col even row -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-5 pt-4 md:pt-10 pb-8 md:pb-16">
                
                <div class="relative overflow-hidden rounded-2xl shadow-md border border-gray-100 aspect-[4/3] cursor-pointer mt-10 md:mt-14 group" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('images/campus-1.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Nursing Simulation">
                    <div class="absolute bottom-2 left-2 md:bottom-4 md:left-4 bg-black/70 backdrop-blur text-white text-[9px] md:text-xs px-2 md:px-3 py-1 rounded-lg border border-white/20">Clinicals Training</div>
                </div>

                <div class="relative overflow-hidden rounded-2xl shadow-md border border-gray-100 aspect-[4/3] cursor-pointer mt-4 md:mt-0 group" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('images/campus-2.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Interactive Classroom">
                    <div class="absolute bottom-2 left-2 md:bottom-4 md:left-4 bg-black/70 backdrop-blur text-white text-[9px] md:text-xs px-2 md:px-3 py-1 rounded-lg border border-white/20">Lecture Hall</div>
                </div>

                <div class="relative overflow-hidden rounded-2xl shadow-md border border-gray-100 aspect-[4/3] cursor-pointer -mt-1 md:mt-6 group" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('images/campus-3.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Simulation practice">
                    <div class="absolute bottom-2 left-2 md:bottom-4 md:left-4 bg-black/70 backdrop-blur text-white text-[9px] md:text-xs px-2 md:px-3 py-1 rounded-lg border border-white/20">Simulation Lab</div>
                </div>

                <div class="relative overflow-hidden rounded-2xl shadow-md border border-gray-100 aspect-[4/3] cursor-pointer mt-6 md:mt-12 group" data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('images/campus-4.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Aviation">
                    <div class="absolute bottom-2 left-2 md:bottom-4 md:left-4 bg-black/70 backdrop-blur text-white text-[9px] md:text-xs px-2 md:px-3 py-1 rounded-lg border border-white/20">Aviation Skills</div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. AUTO-SCROLLING COURSES CAROUSEL -->
    <section id="courses-carousel" class="py-16 md:py-24 bg-[#fcfcfc] overflow-hidden">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 mb-10 md:mb-14 text-center" data-aos="fade-up">
            <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Our Academic Catalog</h3>
            <h2 class="font-serif text-3xl md:text-5xl text-[#091c3d] font-bold">ALL 9 COURSES</h2>
            <div class="w-16 h-1 bg-[#c1121f] mx-auto mt-4"></div>
        </div>

        <!-- Row 1 - Left to Right -->
        <div class="relative mb-6 md:mb-8">
            <div class="animate-courses-ltr gap-2 md:gap-6 px-2">
                <!-- Courses 1-5 repeated -->
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/social-care" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-social-care.jpg') }}" onerror="this.src='https://placehold.co/400x300/091c3d/ffffff?text=Social+Care'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Social Care">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/social-care" class="hover:text-[#c1121f] transition">Diploma in Social Care</a></h3>
                        <a href="/courses/social-care" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/nursing-aid" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-nursing-aid.jpg') }}" onerror="this.src='https://placehold.co/400x300/c1121f/ffffff?text=Nursing+Aid'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Nursing Aid">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/nursing-aid" class="hover:text-[#c1121f] transition">Diploma in Nursing Aid</a></h3>
                        <a href="/courses/nursing-aid" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/health-safety" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-health-safety.jpg') }}" onerror="this.src='https://placehold.co/400x300/475569/ffffff?text=Health+Safety'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Health and Safety">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/health-safety" class="hover:text-[#c1121f] transition">Cert. Health & Safety</a></h3>
                        <a href="/courses/health-safety" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/first-aid-cpr" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-first-aid-cpr.jpg') }}" onerror="this.src='https://placehold.co/400x300/f5a524/ffffff?text=First+Aid+CPR'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="First Aid CPR">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/first-aid-cpr" class="hover:text-[#c1121f] transition">Cert. First Aid & CPR</a></h3>
                        <a href="/courses/first-aid-cpr" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/hospitality-tourism" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-hospitality.jpg') }}" onerror="this.src='https://placehold.co/400x300/091c3d/ffffff?text=Hospitality'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Hospitality">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/hospitality-tourism" class="hover:text-[#c1121f] transition">Dip. Hospitality & Tourism</a></h3>
                        <a href="/courses/hospitality-tourism" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <!-- Duplicate set for seamless loop -->
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/social-care" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-social-care.jpg') }}" onerror="this.src='https://placehold.co/400x300/091c3d/ffffff?text=Social+Care'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Social Care">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/social-care" class="hover:text-[#c1121f] transition">Diploma in Social Care</a></h3>
                        <a href="/courses/social-care" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/nursing-aid" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-nursing-aid.jpg') }}" onerror="this.src='https://placehold.co/400x300/c1121f/ffffff?text=Nursing+Aid'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Nursing Aid">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/nursing-aid" class="hover:text-[#c1121f] transition">Diploma in Nursing Aid</a></h3>
                        <a href="/courses/nursing-aid" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/health-safety" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-health-safety.jpg') }}" onerror="this.src='https://placehold.co/400x300/475569/ffffff?text=Health+Safety'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Health and Safety">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/health-safety" class="hover:text-[#c1121f] transition">Cert. Health & Safety</a></h3>
                        <a href="/courses/health-safety" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/first-aid-cpr" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-first-aid-cpr.jpg') }}" onerror="this.src='https://placehold.co/400x300/f5a524/ffffff?text=First+Aid+CPR'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="First Aid CPR">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/first-aid-cpr" class="hover:text-[#c1121f] transition">Cert. First Aid & CPR</a></h3>
                        <a href="/courses/first-aid-cpr" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/hospitality-tourism" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-hospitality.jpg') }}" onerror="this.src='https://placehold.co/400x300/091c3d/ffffff?text=Hospitality'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Hospitality">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/hospitality-tourism" class="hover:text-[#c1121f] transition">Dip. Hospitality & Tourism</a></h3>
                        <a href="/courses/hospitality-tourism" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2 - Right to Left -->
        <div class="relative">
            <div class="animate-courses-rtl gap-2 md:gap-6 px-2">
                <!-- Courses 6-9 including PSW repeated -->
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/customer-service" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-customer-service.jpg') }}" onerror="this.src='https://placehold.co/400x300/1e293b/ffffff?text=Customer+Service'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Customer Service">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/customer-service" class="hover:text-[#c1121f] transition">Cert. Customer Service & Comp. Ops</a></h3>
                        <a href="/courses/customer-service" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/travel-business" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-travel-business.jpg') }}" onerror="this.src='https://placehold.co/400x300/475569/ffffff?text=Travel+Business'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Travel Business">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/travel-business" class="hover:text-[#c1121f] transition">Dip. Travel Business Ops</a></h3>
                        <a href="/courses/travel-business" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/airline-ticketing" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-airline-ticketing.jpg') }}" onerror="this.src='https://placehold.co/400x300/c1121f/ffffff?text=Airline+Ticketing'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Airline Ticketing">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/airline-ticketing" class="hover:text-[#c1121f] transition">Cert. Airline Ticketing & Reservation</a></h3>
                        <a href="/courses/airline-ticketing" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/personal-support-worker" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-psw.jpg') }}" onerror="this.src='https://placehold.co/400x300/091c3d/ffffff?text=PSW'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="PSW">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/personal-support-worker" class="hover:text-[#c1121f] transition">Dip. Personal Support Worker</a></h3>
                        <a href="/courses/personal-support-worker" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <!-- Duplicate set for seamless loop -->
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/customer-service" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-customer-service.jpg') }}" onerror="this.src='https://placehold.co/400x300/1e293b/ffffff?text=Customer+Service'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Customer Service">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/customer-service" class="hover:text-[#c1121f] transition">Cert. Customer Service & Comp. Ops</a></h3>
                        <a href="/courses/customer-service" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/travel-business" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-travel-business.jpg') }}" onerror="this.src='https://placehold.co/400x300/475569/ffffff?text=Travel+Business'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Travel Business">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/travel-business" class="hover:text-[#c1121f] transition">Dip. Travel Business Ops</a></h3>
                        <a href="/courses/travel-business" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/airline-ticketing" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-airline-ticketing.jpg') }}" onerror="this.src='https://placehold.co/400x300/c1121f/ffffff?text=Airline+Ticketing'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Airline Ticketing">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/airline-ticketing" class="hover:text-[#c1121f] transition">Cert. Airline Ticketing & Reservation</a></h3>
                        <a href="/courses/airline-ticketing" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
                <div class="group w-[120px] md:w-[280px] shrink-0 bg-white rounded-lg md:rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100">
                    <a href="/courses/personal-support-worker" class="block aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('images/hero-course-psw.jpg') }}" onerror="this.src='https://placehold.co/400x300/091c3d/ffffff?text=PSW'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="PSW">
                    </a>
                    <div class="p-1.5 md:p-4">
                        <h3 class="font-serif text-[8px] md:text-sm text-[#091c3d] font-bold leading-tight"><a href="/courses/personal-support-worker" class="hover:text-[#c1121f] transition">Dip. Personal Support Worker</a></h3>
                        <a href="/courses/personal-support-worker" class="inline-block mt-1 md:mt-2 text-[#c1121f] text-[6px] md:text-[10px] font-bold uppercase tracking-wider hover:text-[#091c3d] transition">View &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. GEOGRAPHICAL SCALE METRIC & INTERACTIVE FLAT MAP -->
    <section class="py-16 md:py-24 bg-[#091c3d] text-white relative overflow-hidden">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 text-center flex flex-col items-center">
            <h2 class="font-serif text-3xl md:text-5xl mb-3 md:mb-4 break-words" data-aos="fade-up">Limbe and Douala Office Hubs</h2>
            <p class="text-gray-400 text-sm md:text-lg mb-8 md:mb-12 max-w-2xl mx-auto break-words" data-aos="fade-up" data-aos-delay="150">Students can visit our Limbe or Douala offices for admissions, package booking, and MoMo payment guidance.</p>
            
            <div class="w-full max-w-[1000px] h-[250px] md:h-[500px] relative rounded-2xl md:rounded-3xl overflow-hidden border border-white/10 shadow-[0_10px_40px_rgba(0,0,0,0.5)] bg-[#051126]" data-aos="zoom-in" data-aos-delay="300">
                <div id="interactive-map" class="w-full h-full cursor-grab active:cursor-grabbing"></div>
            </div>

            <a class="inline-block bg-[#c1121f] hover:bg-white hover:text-[#091c3d] px-6 md:px-10 py-4 md:py-5 rounded-full font-bold text-[10px] md:text-base transition shadow-lg hover:scale-105 duration-300 mt-8 md:mt-10" href="/courses">
                Find the Right Course for You &rarr;
            </a>
        </div>
    </section>

    <!-- 5. INTERNSHIP GALLERY — STAGGERED OFFSET STYLE -->
    <section class="py-16 md:py-24 bg-[#091c3d] text-white overflow-hidden">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-14" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#f5a524] mb-2">Internship Placement</h3>
                <h2 class="font-serif text-3xl md:text-5xl font-bold">Our Partner Facilities</h2>
                <div class="w-16 h-1 bg-[#c1121f] mx-auto mt-4"></div>
                <p class="text-gray-400 text-sm md:text-base mt-4 max-w-2xl mx-auto">Students gain real-world clinical placement at these partner hospitals and clinics across Cameroon.</p>
            </div>

            <!-- Desktop: auto-scrolling endless carousel -->
            <div class="hidden lg:flex flex-row overflow-hidden items-start pt-4 md:pt-10 pb-8 md:pb-16" data-aos="fade-up">
                <div class="animate-internship-ltr gap-4">
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-16 group">
                        <img src="{{ asset('images/internship-care-clinic.jpg') }}" onerror="this.src='https://placehold.co/600x450/c1121f/ffffff?text=Care+Clinic'" class="w-full h-full object-cover hover-image-elegant" alt="Care Clinic Douala">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Care Clinic</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Douala</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-6 group">
                        <img src="{{ asset('images/internship-polyclinique.jpg') }}" onerror="this.src='https://placehold.co/600x450/f5a524/091c3d?text=Polyclinique+Potier'" class="w-full h-full object-cover hover-image-elegant" alt="Polyclinique de Potier Douala">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Polyclinique de Potier</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Douala</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer -mt-4 group">
                        <img src="{{ asset('images/internship-covenant.jpg') }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Covenant+Medical'" class="w-full h-full object-cover hover-image-elegant" alt="Covenant Medical Centre Bamenda">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Covenant Medical Centre</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Bamenda</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-24 group">
                        <img src="{{ asset('images/internship-holy-family.jpg') }}" onerror="this.src='https://placehold.co/600x450/c1121f/ffffff?text=Holy+Family+Hospital'" class="w-full h-full object-cover hover-image-elegant" alt="Holy Family Hospital Mbouda">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Holy Family Hospital</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Mbouda</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-10 group">
                        <img src="{{ asset('images/internship-trinity.jpg') }}" onerror="this.src='https://placehold.co/600x450/f5a524/091c3d?text=Trinity+Medical'" class="w-full h-full object-cover hover-image-elegant" alt="Trinity Medical Centre Limbe">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Trinity Medical Centre</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Limbe</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-2 group">
                        <img src="{{ asset('images/internship-mother-child.jpg') }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Mother+Child+Hospital'" class="w-full h-full object-cover hover-image-elegant" alt="Mother and Child Hospital Kumba">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Mother & Child Hospital</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Kumba</p>
                        </div>
                    </div>
                    <!-- Duplicate set for seamless loop -->
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-16 group">
                        <img src="{{ asset('images/internship-care-clinic.jpg') }}" onerror="this.src='https://placehold.co/600x450/c1121f/ffffff?text=Care+Clinic'" class="w-full h-full object-cover hover-image-elegant" alt="Care Clinic Douala">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Care Clinic</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Douala</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-6 group">
                        <img src="{{ asset('images/internship-polyclinique.jpg') }}" onerror="this.src='https://placehold.co/600x450/f5a524/091c3d?text=Polyclinique+Potier'" class="w-full h-full object-cover hover-image-elegant" alt="Polyclinique de Potier Douala">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Polyclinique de Potier</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Douala</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer -mt-4 group">
                        <img src="{{ asset('images/internship-covenant.jpg') }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Covenant+Medical'" class="w-full h-full object-cover hover-image-elegant" alt="Covenant Medical Centre Bamenda">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Covenant Medical Centre</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Bamenda</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-24 group">
                        <img src="{{ asset('images/internship-holy-family.jpg') }}" onerror="this.src='https://placehold.co/600x450/c1121f/ffffff?text=Holy+Family+Hospital'" class="w-full h-full object-cover hover-image-elegant" alt="Holy Family Hospital Mbouda">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Holy Family Hospital</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Mbouda</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-10 group">
                        <img src="{{ asset('images/internship-trinity.jpg') }}" onerror="this.src='https://placehold.co/600x450/f5a524/091c3d?text=Trinity+Medical'" class="w-full h-full object-cover hover-image-elegant" alt="Trinity Medical Centre Limbe">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Trinity Medical Centre</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Limbe</p>
                        </div>
                    </div>
                    <div class="w-[16.666%] shrink-0 relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-2 group">
                        <img src="{{ asset('images/internship-mother-child.jpg') }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Mother+Child+Hospital'" class="w-full h-full object-cover hover-image-elegant" alt="Mother and Child Hospital Kumba">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                            <h4 class="font-serif text-xs md:text-sm font-bold">Mother & Child Hospital</h4>
                            <p class="text-[9px] md:text-[10px] text-gray-300">Kumba</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: static staggered grid (no scroll) -->
            <div class="grid grid-cols-2 lg:hidden gap-3 pt-4 pb-8" data-aos="fade-up">
                <div class="relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-10 group">
                    <img src="{{ asset('images/internship-care-clinic.jpg') }}" onerror="this.src='https://placehold.co/600x450/c1121f/ffffff?text=Care+Clinic'" class="w-full h-full object-cover hover-image-elegant" alt="Care Clinic Douala">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                        <h4 class="font-serif text-xs md:text-sm font-bold">Care Clinic</h4>
                        <p class="text-[9px] md:text-[10px] text-gray-300">Douala</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-4 group">
                    <img src="{{ asset('images/internship-polyclinique.jpg') }}" onerror="this.src='https://placehold.co/600x450/f5a524/091c3d?text=Polyclinique+Potier'" class="w-full h-full object-cover hover-image-elegant" alt="Polyclinique de Potier Douala">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                        <h4 class="font-serif text-xs md:text-sm font-bold">Polyclinique de Potier</h4>
                        <p class="text-[9px] md:text-[10px] text-gray-300">Douala</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer -mt-2 group">
                    <img src="{{ asset('images/internship-covenant.jpg') }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Covenant+Medical'" class="w-full h-full object-cover hover-image-elegant" alt="Covenant Medical Centre Bamenda">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                        <h4 class="font-serif text-xs md:text-sm font-bold">Covenant Medical Centre</h4>
                        <p class="text-[9px] md:text-[10px] text-gray-300">Bamenda</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-8 group">
                    <img src="{{ asset('images/internship-holy-family.jpg') }}" onerror="this.src='https://placehold.co/600x450/c1121f/ffffff?text=Holy+Family+Hospital'" class="w-full h-full object-cover hover-image-elegant" alt="Holy Family Hospital Mbouda">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                        <h4 class="font-serif text-xs md:text-sm font-bold">Holy Family Hospital</h4>
                        <p class="text-[9px] md:text-[10px] text-gray-300">Mbouda</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-5 group">
                    <img src="{{ asset('images/internship-trinity.jpg') }}" onerror="this.src='https://placehold.co/600x450/f5a524/091c3d?text=Trinity+Medical'" class="w-full h-full object-cover hover-image-elegant" alt="Trinity Medical Centre Limbe">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                        <h4 class="font-serif text-xs md:text-sm font-bold">Trinity Medical Centre</h4>
                        <p class="text-[9px] md:text-[10px] text-gray-300">Limbe</p>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-2xl shadow-lg border border-white/10 aspect-[4/3] cursor-pointer mt-1 group">
                    <img src="{{ asset('images/internship-mother-child.jpg') }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Mother+Child+Hospital'" class="w-full h-full object-cover hover-image-elegant" alt="Mother and Child Hospital Kumba">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-3 md:p-4">
                        <h4 class="font-serif text-xs md:text-sm font-bold">Mother & Child Hospital</h4>
                        <p class="text-[9px] md:text-[10px] text-gray-300">Kumba</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. ABOUT SECTION -->
    <section id="about" class="py-16 md:py-32 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="font-serif text-3xl md:text-4xl text-[#0a1f41] mb-4 md:mb-6 break-words">Discover Optimal Educational Courses with Goshen Work Skill.</h2>
                <p class="text-gray-600 text-sm md:text-base mb-4 md:mb-6 leading-relaxed">Are you looking to Launch, change or advance your career with one of the best Training Institutes?</p>
                <p class="text-gray-600 text-sm md:text-base mb-6 md:mb-8 leading-relaxed">We offer Awards, Certificates, and Diploma level courses across the 9 approved programs: Social Care, Nursing Aid, Health and Safety, First Aid and CPR, Hospitality and Tourism, Customer Service and Computer Operations, Travel Business Operations, Airline Ticketing and Reservation, and Personal Support Worker (PSW).</p>
                <a href="/about-us" class="inline-block w-full text-center md:w-auto bg-[#c1121f] hover:bg-[#091c3d] text-white px-6 md:px-8 py-3 md:py-4 rounded-md font-bold text-[10px] md:text-sm tracking-wider uppercase transition shadow-lg hover:scale-105 duration-300">Know Some More About Us</a>
            </div>

            <!-- Changed to 2-columns on mobile -->
            <div class="grid grid-cols-2 gap-3 md:gap-4" data-aos="fade-left">
                <div class="w-full aspect-[3/4] overflow-hidden rounded-2xl md:rounded-3xl shadow-md border border-gray-100 hover:scale-[1.02] transition duration-500 group">
                    <img src="{{ asset('images/about-homepage-1.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Instructor">
                </div>
                <div class="w-full aspect-[3/4] overflow-hidden rounded-2xl md:rounded-3xl shadow-md mt-6 md:mt-10 border border-gray-100 hover:scale-[1.02] transition duration-500 group">
                    <img src="{{ asset('images/about-homepage-2.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Classroom">
                </div>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE 3D DRIFTING VISUAL LAB GALLERY -->
    <section id="gallery" class="py-16 md:py-32 bg-[#050914] text-white overflow-hidden relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 relative z-10 flex flex-col lg:flex-row gap-10 md:gap-16 items-center">
            
            <div class="w-full lg:w-1/3 text-center lg:text-left" data-aos="fade-right">
                <h3 class="text-[#f5a524] font-bold uppercase tracking-widest text-[10px] md:text-xs mb-2 md:mb-3">Visual Showcase</h3>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4 md:mb-6 break-words">Interactive Behind<br><span class="text-blue-400 italic">the Scenes</span></h2>
                <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-6 md:mb-8">Hover over these interactive floating media frames. See our students performing nursing assistant practice, emergency safety routines, hospitality tasks, and aviation skills inside our labs.</p>
                <a href="/contact-us" class="inline-block w-full md:w-auto bg-[#c1121f] hover:bg-white hover:text-black text-white px-6 md:px-8 py-3 md:py-3.5 rounded-md font-bold text-[10px] md:text-xs uppercase tracking-wider transition">Book Course Counselling</a>
            </div>

            <!-- Shrunk 3D visual height on mobile -->
            <div class="w-full lg:w-2/3 h-[300px] md:h-[600px] relative mt-10 lg:mt-0" data-aos="fade-left">
                <div class="absolute top-2 left-2 md:top-4 md:left-6 w-20 h-20 md:w-36 md:h-36 rounded-full overflow-hidden border-2 md:border-4 border-white/20 shadow-2xl animate-float-vertical transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/bubble-1.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <div class="absolute top-8 right-6 md:top-16 md:right-12 w-24 h-24 md:w-48 md:h-48 rounded-full overflow-hidden border-4 md:border-8 border-white/10 shadow-2xl animate-float-diagonal transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/bubble-2.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <div class="absolute top-1/2 left-1/3 -translate-x-1/2 w-16 h-16 md:w-32 md:h-32 rounded-full overflow-hidden border-2 md:border-4 border-white/15 shadow-2xl animate-drift-lateral transition duration-500 cursor-pointer z-20 group">
                    <img src="{{ asset('images/bubble-3.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <div class="absolute bottom-1/4 right-1/4 w-20 h-24 md:w-40 md:h-48 rounded-full overflow-hidden border-2 md:border-4 border-white/20 shadow-2xl animate-float-vertical transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/bubble-4.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <div class="absolute bottom-4 left-8 md:bottom-8 md:left-16 w-16 h-16 md:w-40 md:h-40 rounded-full overflow-hidden border-2 md:border-4 border-white/15 shadow-2xl animate-drift-lateral transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/bubble-5.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <div class="absolute bottom-8 right-2 md:bottom-16 md:right-4 w-24 h-24 md:w-44 md:h-44 rounded-full overflow-hidden border-2 md:border-4 border-white/25 shadow-2xl animate-float-diagonal transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/bubble-6.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
            </div>

        </div>
    </section>

    <!-- FOUR VERTICAL PILLARS (Changed to 2-columns on mobile) -->
    <section class="py-16 md:py-24 bg-[#fff7f5] border-t border-b border-gray-100">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-8">
            <div class="bg-white p-4 md:p-8 rounded-xl md:rounded-3xl border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-xl transition duration-300 shadow-sm text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-[#091c3d] mb-3 md:mb-6 flex justify-center"><i class="fa-solid fa-book-open-reader text-2xl md:text-4xl"></i></div>
                <h3 class="font-serif text-[11px] md:text-xl font-bold text-[#0a1f41] mb-1 md:mb-2 break-words">Experienced Trainers</h3>
            </div>
            <div class="bg-white p-4 md:p-8 rounded-xl md:rounded-3xl border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-xl transition duration-300 shadow-sm text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-[#091c3d] mb-3 md:mb-6 flex justify-center"><i class="fa-solid fa-chalkboard-user text-2xl md:text-4xl"></i></div>
                <h3 class="font-serif text-[11px] md:text-xl font-bold text-[#0a1f41] mb-1 md:mb-2 break-words">Inspiring Webinars</h3>
            </div>
            <div class="bg-white p-4 md:p-8 rounded-xl md:rounded-3xl border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-xl transition duration-300 shadow-sm text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-[#091c3d] mb-3 md:mb-6 flex justify-center"><i class="fa-solid fa-handshake-simple text-2xl md:text-4xl"></i></div>
                <h3 class="font-serif text-[11px] md:text-xl font-bold text-[#0a1f41] mb-1 md:mb-2 break-words">Interactive Assessments</h3>
            </div>
            <div class="bg-white p-4 md:p-8 rounded-xl md:rounded-3xl border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 hover:shadow-xl transition duration-300 shadow-sm text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="text-[#091c3d] mb-3 md:mb-6 flex justify-center"><i class="fa-solid fa-thumbs-up text-2xl md:text-4xl"></i></div>
                <h3 class="font-serif text-[11px] md:text-xl font-bold text-[#0a1f41] mb-1 md:mb-2 break-words">Certified Programs</h3>
            </div>
        </div>
    </section>

    <!-- LEARNING STANDARDS & BEST PRACTICES -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 text-center">
            <h2 class="font-serif text-3xl md:text-4xl text-[#0a1f41] font-bold mb-2 break-words" data-aos="fade-up">LEARNING STANDARDS & BEST PRACTICES</h2>
            <p class="text-gray-500 text-xs md:text-sm mb-8 md:mb-12 max-w-2xl mx-auto" data-aos="fade-up">Our curriculum is informed by internationally recognized frameworks and publicly available guidance from the following organizations.</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 items-stretch" data-aos="zoom-in">
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

    <!-- PREMIUM BOTTOM CALL TO ACTION GRID -->
    <section class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
        <!-- Changed to single column on tiny screens to protect the long email, but side-by-side on sm screens and up -->
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 items-center bg-[#fff7f5] p-6 md:p-10 rounded-2xl" data-aos="fade-up">
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

    <!-- CALLING YOUR SEPARATE FOOTER PARTIAL -->
    @include('partials.footer')

    <!-- CALLING YOUR SEPARATE WIDGET PARTIAL -->
    @include('partials.widgets')

    <!-- NEW INTERACTIVE FLAT MAP SCRIPTS (JSVectorMap) -->
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mapContainer = document.getElementById('interactive-map');
            if(mapContainer) {
                new jsVectorMap({
                    selector: '#interactive-map',
                    map: 'world',
                    zoomOnScroll: false,
                    backgroundColor: 'transparent',
                    regionStyle: {
                        initial: {
                            fill: 'rgba(255, 255, 255, 0.15)', 
                            stroke: 'rgba(255, 255, 255, 0.05)',
                            strokeWidth: 0.5,
                            fillOpacity: 1
                        },
                        hover: {
                            fill: 'rgba(245, 165, 36, 0.8)',
                            cursor: 'pointer'
                        }
                    },
                    markers: [
                        { name: "Douala Office", coords: [4.0511, 9.7679] },
                        { name: "Limbe Office", coords: [4.0242, 9.2149] }
                    ],
                    markerStyle: {
                        initial: {
                            fill: '#c1121f', 
                            stroke: '#ffffff',
                            strokeWidth: 2,
                            r: 7 
                        },
                        hover: {
                            fill: '#f5a524',
                            stroke: '#ffffff',
                            strokeWidth: 2
                        }
                    }
                });
            }
        });
    </script>
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
