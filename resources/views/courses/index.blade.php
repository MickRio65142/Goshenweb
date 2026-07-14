<!-- resources/views/courses/index.blade.php -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>All Courses & Programs | Goshen Work Skill Association</title>
    <meta name="description" content="Explore all accredited vocational, healthcare, aviation, and safety courses offered by Goshen Work Skill Association in Cameroon.">

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

        /* MATURE ELEGANT HOVER EFFECT */
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
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    <!-- ============================================== -->
    <!-- CENTRALIZED HEADER PARTIAL INJECTED HERE       -->
    <!-- ============================================== -->
    @include('partials.header')

    <!-- UNIQUE ACADEMIC CATALOG HERO BANNER -->
    <!-- Adjusted padding for mobile -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/hero-courses.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-85" alt="Course Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>

        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <!-- Breadcrumbs -->
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Academic Catalog</span>
            </div>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">Explore Our Programs</h1>
            <p class="text-gray-300 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed drop-shadow-md break-words">Filter through our globally accredited vocational, safety, and hospitality pathways to find the perfect career match for your goals.</p>
        </div>
    </section>

    <!-- INTERACTIVE ALPINE.JS FILTER GRID (Unique Premium Feature for Courses Page) -->
    <section class="py-16 md:py-24 bg-[#fcfcfc]" x-data="{ filter: 'All' }">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            
            <!-- Category Filter Pills (Scaled down padding/text for mobile) -->
            <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-10 md:mb-16" data-aos="fade-up">
                <button @click="filter = 'All'" :class="filter === 'All' ? 'bg-[#091c3d] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#091c3d]'" class="px-4 py-2 md:px-6 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider transition-all">All Programs</button>
                <button @click="filter = 'Healthcare & Nursing'" :class="filter === 'Healthcare & Nursing' ? 'bg-[#c1121f] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#c1121f]'" class="px-4 py-2 md:px-6 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider transition-all">Healthcare</button>
                <button @click="filter = 'Hospitality & Tourism'" :class="filter === 'Hospitality & Tourism' ? 'bg-[#091c3d] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#091c3d]'" class="px-4 py-2 md:px-6 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider transition-all">Hospitality</button>
                <button @click="filter = 'Aviation & Travel'" :class="filter === 'Aviation & Travel' ? 'bg-[#c1121f] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#c1121f]'" class="px-4 py-2 md:px-6 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider transition-all">Aviation</button>
                <button @click="filter = 'Safety & Emergency'" :class="filter === 'Safety & Emergency' ? 'bg-[#091c3d] text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#091c3d]'" class="px-4 py-2 md:px-6 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider transition-all">Safety & Aid</button>
            </div>

            <!-- The Dynamic Grid (Maintained 2 columns on mobile, gap adjusted) -->
            <div class="grid grid-cols-3 gap-2 md:gap-4">
                
                @foreach($courses as $slug => $c)
                <!-- The x-show controls the Alpine filtering -->
                <div x-show="filter === 'All' || filter === '{{ $c['category'] }}'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group flex flex-col bg-white rounded-lg md:rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300 border border-gray-100">
                    
                    <a href="{{ route('courses.show', $slug) }}" class="w-full aspect-[4/3] overflow-hidden block relative">
                        <img src="{{ asset($c['sidebar_image']) }}" onerror="this.src='https://placehold.co/600x450/091c3d/ffffff?text=Course+Image'" class="w-full h-full object-cover hover-image-elegant" alt="{{ $c['title'] }}">
                        <div class="absolute top-1 right-1 md:top-4 md:right-4 bg-white/90 backdrop-blur text-[#091c3d] text-[6px] md:text-[10px] font-bold px-1.5 py-0.5 md:px-3 md:py-1.5 rounded-full uppercase tracking-wider shadow-md">{{ $c['category'] }}</div>
                    </a>
                    
                    <div class="p-2 md:p-4 flex flex-col justify-between flex-grow bg-slate-50/50">
                        <div>
                            <h3 class="font-serif text-[9px] md:text-base text-[#091c3d] font-bold mb-0.5 md:mb-1 leading-tight break-words">
                                <a href="{{ route('courses.show', $slug) }}" class="hover:text-[#c1121f] transition">{{ $c['title'] }}</a>
                            </h3>
                            <p class="text-gray-600 text-[7px] md:text-xs leading-relaxed mb-1 md:mb-3 line-clamp-2 hidden md:block">{{ $c['description'] }}</p>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-1 md:pt-3 mt-auto flex flex-col sm:flex-row items-start sm:items-center justify-between gap-0 md:gap-1">
                            <span class="text-[6px] md:text-[10px] text-gray-500 font-bold uppercase"><i class="fa-regular fa-clock text-[#c1121f] mr-0.5 md:mr-1"></i> {{ $c['summary']['duration'] ?? 'Flexible' }}</span>
                            <a href="{{ route('courses.show', $slug) }}" class="text-[#c1121f] hover:text-[#091c3d] font-bold text-[6px] md:text-xs uppercase tracking-wider transition flex items-center gap-0.5 md:gap-1">View <i class="fa-solid fa-arrow-right text-[6px] md:text-xs"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- NEW UNIQUE CONTENT: WHY CHOOSE GOSHEN -->
    <section class="py-16 md:py-24 bg-[#091c3d] text-white border-t-8 border-[#c1121f] overflow-hidden">
        <!-- FIXED: grid-cols-1 for mobile to prevent crushing, lg:grid-cols-2 for desktop -->
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">
            <div data-aos="fade-right">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#f5a524] mb-2 md:mb-3">The Goshen Advantage</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-white font-bold mb-4 md:mb-6 break-words">Equipping you with competencies that matter globally.</h2>
                <p class="text-gray-300 text-xs md:text-sm leading-relaxed mb-6 md:mb-8 break-words">Our courses aren't just lectures; they are intensive, career-defining pathways. We combine world-class curriculums with physical simulations to ensure you leave ready for immediate employment.</p>
                
                <div class="space-y-4 md:space-y-6">
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 flex items-center justify-center shrink-0"><i class="fa-solid fa-earth-americas text-[#f5a524] text-lg md:text-xl"></i></div>
                        <div>
                            <h4 class="font-bold text-sm md:text-lg text-white mb-1 break-words">Global Certifications</h4>
                            <p class="text-[11px] md:text-xs text-gray-400 break-words">Our certificates are mapped to international frameworks allowing you to work in the UAE, UK, and beyond.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 md:gap-4">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 flex items-center justify-center shrink-0"><i class="fa-solid fa-user-doctor text-[#f5a524] text-lg md:text-xl"></i></div>
                        <div>
                            <h4 class="font-bold text-sm md:text-lg text-white mb-1 break-words">Expert Field Instructors</h4>
                            <p class="text-[11px] md:text-xs text-gray-400 break-words">Learn directly from Registered Nurses, Safety Auditors, and Aviation experts with decades of field experience.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Beautiful Dual-Image Offset Layout (Scaled heights for mobile) -->
            <div class="relative h-[250px] md:h-[500px] mt-6 md:mt-0" data-aos="fade-left">
                <img src="{{ asset('images/about-decorative-courses-1.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=500&q=80'" class="absolute top-0 right-0 w-3/4 h-[180px] md:h-[400px] object-cover rounded-2xl md:rounded-3xl shadow-2xl border-2 md:border-4 border-white/10 hover-image-elegant">
                <img src="{{ asset('images/about-decorative-courses-2.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=400&q=80'" class="absolute bottom-0 left-0 w-2/3 h-[150px] md:h-[300px] object-cover rounded-2xl md:rounded-3xl shadow-2xl border-4 md:border-[8px] border-[#091c3d] z-10 hover-image-elegant">
            </div>
        </div>
    </section>

    <!-- PREMIUM BOTTOM CALL TO ACTION GRID -->
    <section class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
        <!-- FIXED: Single column on tiny screens, side-by-side on sm -->
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 items-center bg-[#fff7f5] p-6 md:p-10 rounded-2xl" data-aos="fade-up">
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
