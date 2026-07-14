<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Gallery | Goshen Work Skill Association</title>

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

        /* 3D Floating Animations for Scattered Media */
        @keyframes drift-up-down {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        @keyframes drift-left-right {
            0%, 100% { transform: translateX(0px) rotate(0deg); }
            50% { transform: translateX(15px) rotate(-3deg); }
        }
        @keyframes drift-slow {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
            50% { transform: translateY(-10px) translateX(10px) rotate(-2deg); }
        }

        .animate-float-vertical { animation: drift-up-down 7s ease-in-out infinite; }
        .animate-float-diagonal { animation: drift-left-right 8.5s ease-in-out infinite; }
        .animate-float-slow { animation: drift-slow 10s ease-in-out infinite; }

        /* Continuous LTR & RTL Scrolling for Images */
        @keyframes scroll-img-ltr {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        @keyframes scroll-img-rtl {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee-ltr {
            display: flex;
            width: max-content;
            animation: scroll-img-ltr 45s linear infinite;
        }
        .animate-marquee-rtl {
            display: flex;
            width: max-content;
            animation: scroll-img-rtl 45s linear infinite;
        }
        .animate-marquee-ltr:hover, .animate-marquee-rtl:hover {
            animation-play-state: paused;
        }

        /* Mature Elegant Hover */
        .hover-image-elegant {
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s ease;
        }
        .group:hover .hover-image-elegant {
            transform: scale(1.08);
            filter: brightness(1.05) contrast(1.02);
        }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white" x-data="{ lightboxOpen: false, activeImage: '' }">

    <!-- CALLING YOUR SEPARATE HEADER PARTIAL -->
    @include('partials.header')

    <!-- GALLERY HERO BANNER -->
    <!-- Adjusted padding for mobile -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/gallery-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-85" alt="Gallery Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Media Gallery</span>
            </div>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 break-words">Our Journey in Shaping<br><span class="text-[#f5a524] italic">Tomorrow's Heroes</span></h1>
            <p class="text-gray-300 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed break-words">Explore the physical training environments, clinical simulations, and real-world skills labs that make Goshen Work Skill Association a premium destination for education.</p>
        </div>
    </section>

    <!-- 16 IMAGE BENTO-GRID (MASONRY STYLE) WITH LIGHTBOX -->
    <section class="py-16 md:py-24 bg-white relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Campus & Facilities</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">The Goshen Experience</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4 mb-4 md:mb-6"></div>
                <p class="text-gray-500 text-xs md:text-sm max-w-2xl mx-auto break-words">Click any image to enlarge and view our students performing clinical metrics, hospitality setups, and aviation drills.</p>
            </div>

            <!-- Bento Box Grid Layout -->
            <!-- FIXED: grid-flow-dense ensures no empty holes on mobile. auto-rows-[120px] prevents huge stretches on small screens -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 auto-rows-[120px] md:auto-rows-[250px] grid-flow-dense">
                
                <!-- Image 1 (Large Square) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-2 row-span-2 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in">
                    <img src="{{ asset('images/gal-1.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=800&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
                <!-- Image 2 (Standard) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/gal-2.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>
                <!-- Image 3 (Tall Vertical) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-2 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/gal-3.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=600&h=1200&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
                <!-- Image 4 (Standard) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('images/gal-4.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>

                <!-- ROW 3 & 4 -->
                <!-- Image 5 (Tall Vertical) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-2 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in">
                    <img src="{{ asset('images/gal-5.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=600&h=1200&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
                <!-- Image 6 (Wide Horizontal) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-2 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/gal-6.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
                <!-- Image 7 (Standard) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/gal-7.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>
                <!-- Image 8, 9, 10 (Three Standards) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="50">
                    <img src="{{ asset('images/gal-8.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="150">
                    <img src="{{ asset('images/gal-9.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="250">
                    <img src="{{ asset('images/gal-10.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>

                <!-- ROW 5 & 6 -->
                <!-- Image 11, 12 (Standards) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in">
                    <img src="{{ asset('images/gal-11.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-1 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/gal-12.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&w=600&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-base md:text-xl"></i></div>
                </div>
                <!-- Image 13 (Large Square) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-2 row-span-2 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('images/gal-13.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=800&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
                <!-- Image 14 (Wide Horizontal) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-2 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="50">
                    <img src="{{ asset('images/gal-14.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>

                <!-- ROW 7 -->
                <!-- Image 15 & 16 (Two Wides) -->
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-2 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in">
                    <img src="{{ asset('images/gal-15.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1616401784845-180882ba9ba8?auto=format&fit=crop&w=1200&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
                <div @click="lightboxOpen = true; activeImage = $el.querySelector('img').src" class="col-span-2 row-span-1 relative overflow-hidden rounded-xl md:rounded-3xl shadow-sm border border-gray-100 group cursor-pointer" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('images/gal-16.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80'" class="w-full h-full object-cover hover-image-elegant" alt="Gallery">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center"><i class="fa-solid fa-expand text-white text-xl md:text-3xl"></i></div>
                </div>
            </div>
        </div>

        <!-- THE POPUP LIGHTBOX -->
        <div x-show="lightboxOpen" x-cloak 
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-[#091c3d]/95 backdrop-blur-sm p-4">
            
            <button @click="lightboxOpen = false" class="absolute top-4 right-4 md:top-6 md:right-6 text-white hover:text-[#c1121f] transition transform hover:scale-110 z-50">
                <i class="fa-solid fa-xmark text-3xl md:text-4xl"></i>
            </button>
            
            <img :src="activeImage" class="max-w-full max-h-[90vh] object-contain rounded-xl shadow-2xl border-2 md:border-4 border-white/10" alt="Enlarged Gallery Image" @click.away="lightboxOpen = false">
        </div>
    </section>

    <!-- CONTENT & RANDOM SCATTERED IMAGES SECTION -->
    <section class="py-16 md:py-24 bg-[#091c3d] text-white overflow-hidden relative">
        <!-- FIXED: Stacks on mobile (flex-col), side-by-side on desktop (lg:flex-row) -->
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 relative z-10 flex flex-col lg:flex-row gap-10 md:gap-16 items-center">
            
            <!-- Content Block -->
            <div class="w-full lg:w-1/2 text-left" data-aos="fade-right">
                <h3 class="text-[#f5a524] font-bold uppercase tracking-widest text-[10px] md:text-xs mb-2 md:mb-3 break-words">A Legacy of Excellence</h3>
                <h2 class="font-serif text-3xl md:text-5xl font-bold leading-tight text-white mb-4 md:mb-6 break-words">Real Training.<br><span class="text-blue-400 italic">Real Impact.</span></h2>
                <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-4 md:mb-6 break-words">At Goshen Work Skill Association, we don't just rely on theoretical concepts. Our physical training hubs are equipped with industry-standard tools—from highly advanced CPR mannequins to simulated aviation ticketing desks.</p>
                <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-6 md:mb-8 break-words">Take a look at these random captured moments showing our students excelling in their rigorous practical exams, collaborating with their peers, and celebrating their graduation milestones.</p>
                
                <div class="flex items-center gap-4 md:gap-6">
                    <div class="flex -space-x-3 md:-space-x-4">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop" class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#091c3d] object-cover" alt="Student">
                        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?w=100&h=100&fit=crop" class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#091c3d] object-cover" alt="Student">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop" class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#091c3d] object-cover" alt="Student">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-[#091c3d] bg-[#c1121f] text-white flex items-center justify-center text-[10px] md:text-xs font-bold">+5k</div>
                    </div>
                    <p class="text-[11px] md:text-sm font-bold text-white break-words">Join Thousands of<br>Certified Professionals.</p>
                </div>
            </div>

            <!-- Scattered / Floating Random Images -->
            <!-- FIXED: Scaled down height and image widths for mobile so they don't block the screen -->
            <div class="w-full lg:w-1/2 h-[300px] md:h-[600px] relative mt-6 md:mt-0" data-aos="fade-left">
                <!-- Float 1 -->
                <div class="absolute top-0 left-2 md:left-4 w-20 h-20 md:w-40 md:h-40 rounded-full overflow-hidden border-2 md:border-4 border-white/20 shadow-2xl animate-float-vertical transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/gallery-float-1.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <!-- Float 2 -->
                <div class="absolute top-8 right-4 md:top-12 md:right-8 w-24 h-32 md:w-48 md:h-56 rounded-xl md:rounded-3xl overflow-hidden border-4 md:border-8 border-white/10 shadow-2xl animate-float-diagonal transition duration-500 cursor-pointer group rotate-3">
                    <img src="{{ asset('images/gallery-float-2.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <!-- Float 3 -->
                <div class="absolute top-1/2 left-1/3 -translate-x-1/2 w-20 h-20 md:w-44 md:h-44 rounded-full overflow-hidden border-2 md:border-4 border-[#f5a524]/40 shadow-2xl animate-float-slow transition duration-500 cursor-pointer z-20 group">
                    <img src="{{ asset('images/gallery-float-3.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <!-- Float 4 -->
                <div class="absolute bottom-8 right-1/4 w-16 h-16 md:w-36 md:h-36 rounded-lg md:rounded-2xl overflow-hidden border-2 md:border-4 border-white/20 shadow-2xl animate-float-vertical transition duration-500 cursor-pointer group -rotate-6">
                    <img src="{{ asset('images/gallery-float-4.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <!-- Float 5 -->
                <div class="absolute bottom-2 left-6 md:bottom-4 md:left-12 w-24 h-16 md:w-48 md:h-32 rounded-full overflow-hidden border-2 md:border-4 border-[#c1121f]/50 shadow-2xl animate-float-diagonal transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/gallery-float-5.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
                <!-- Float 6 -->
                <div class="absolute bottom-10 right-0 w-16 h-16 md:w-32 md:h-32 rounded-full overflow-hidden border-2 md:border-4 border-white/25 shadow-2xl animate-float-slow transition duration-500 cursor-pointer group">
                    <img src="{{ asset('images/gallery-float-6.jpg') }}" class="w-full h-full object-cover hover-image-elegant">
                </div>
            </div>

        </div>
    </section>

    <!-- CONTINUOUS SCROLLING MARQUEE (LTR & RTL) -->
    <section class="py-16 md:py-24 bg-[#fff7f2] border-t border-b border-gray-100 overflow-hidden relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 relative z-10">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">More Moments From Our Campus</h3>
                <div class="w-16 h-1 bg-[#c1121f] mx-auto mt-4"></div>
            </div>
            
            <div class="space-y-4 md:space-y-6">
                <!-- ROW 1: LTR (Left To Right) -->
                <div class="w-full overflow-hidden relative" data-aos="fade-up">
                    <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="animate-marquee-ltr">
                        <!-- Group 1 -->
                        <!-- FIXED: Reduced image sizes on mobile so multiple images fit gracefully -->
                        <div class="flex gap-3 md:gap-6 px-2 md:px-3">
                            <img src="{{ asset('images/marquee-ltr-1.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-ltr-2.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-ltr-3.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-ltr-4.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                        </div>
                        <!-- Group 1 (Cloned for seamless loop) -->
                        <div class="flex gap-3 md:gap-6 px-2 md:px-3">
                            <img src="{{ asset('images/marquee-ltr-1.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-ltr-2.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-ltr-3.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-ltr-4.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                        </div>
                    </div>
                </div>

                <!-- ROW 2: RTL (Right To Left) -->
                <div class="w-full overflow-hidden relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="animate-marquee-rtl">
                        <!-- Group 2 -->
                        <div class="flex gap-3 md:gap-6 px-2 md:px-3">
                            <img src="{{ asset('images/marquee-rtl-1.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-rtl-2.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-rtl-3.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-rtl-4.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                        </div>
                        <!-- Group 2 (Cloned for seamless loop) -->
                        <div class="flex gap-3 md:gap-6 px-2 md:px-3">
                            <img src="{{ asset('images/marquee-rtl-1.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-rtl-2.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-rtl-3.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                            <img src="{{ asset('images/marquee-rtl-4.jpg') }}" class="w-[150px] h-[100px] md:w-[300px] md:h-[200px] object-cover rounded-xl md:rounded-2xl shadow-md border border-gray-100 hover:-translate-y-1 md:hover:-translate-y-2 transition duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PREMIUM BOTTOM CALL TO ACTION GRID -->
    <section class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
        <!-- FIXED: Stacked CTA to protect email layout on small screens -->
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 items-center bg-[#fff7f5] p-6 md:p-10 rounded-2xl" data-aos="fade-up">
            <div class="text-center sm:text-left text-gray-800">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-1 md:mb-2 text-[#091c3d] break-words">Ready to start your journey?</h3>
                <p class="text-sm md:text-lg text-[#c1121f] font-bold break-all md:break-words">info&#64;goshenworkskill.com</p>
            </div>
            <div class="text-center sm:text-right">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-1 md:mb-2 text-[#091c3d] break-words">Call or WhatsApp:</h3>
                <p class="text-sm md:text-lg text-[#c1121f] font-bold break-words">+237 679 20 22 65</p>
            </div>
        </div>
    </section>

    <!-- CALLING YOUR SEPARATE FOOTER PARTIAL -->
    @include('partials.footer')

    <!-- CALLING YOUR SEPARATE WIDGET PARTIAL -->
    @include('partials.widgets')

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
