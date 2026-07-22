<!-- resources/views/courses/show.blade.php -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $course['title'] }} | Goshen Work Skill Association</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <!-- CALLING YOUR SEPARATE HEADER PARTIAL -->
    @include('partials.header')

    <!-- COURSE DETAIL HEADER -->
    <section class="relative py-16 md:py-24 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden flex items-center">
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset($course['hero_image']) }}" loading="lazy" class="w-full h-full object-cover opacity-85" alt="Course Hero Image">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/35 to-transparent z-10"></div>
        
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-left w-full">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">{{ $course['category'] }}</p>
            <h1 class="font-serif text-3xl md:text-5xl font-bold leading-tight mb-3 md:mb-4 drop-shadow-[0_2px_8px_rgba(0,0,0,0.85)] break-words">{{ $course['title'] }}</h1>
            <p class="text-gray-200 text-xs md:text-sm max-w-xl leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.65)] break-words">{{ $course['description'] }}</p>
        </div>
    </section>

    <!-- CORE CONTENTS LAYOUT SECTION -->
    <!-- FIXED: grid-cols-1 on mobile so sidebar drops below content, lg:grid-cols-3 for desktop -->
    <section class="py-12 md:py-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-3 gap-10 md:gap-12">
        
        <!-- Left Content Area (Syllabus & Clinical Specifications) -->
        <div class="lg:col-span-2 space-y-10 md:space-y-12">
            <div>
                <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-3 md:mb-4 break-words">{{ $course['title'] }} Detailed Overview</h2>
                <p class="text-gray-600 text-xs md:text-sm leading-relaxed mb-6 break-words">{{ $course['description'] }} Our program integrates highly structured theoretical classes with intensive physical skills training to prepare you for the workforce.</p>
            </div>

            <!-- Highlights -->
            <div>
                <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-semibold mb-3 md:mb-4 break-words">Course Highlights</h3>
                <ul class="space-y-3 md:space-y-4 text-xs md:text-sm text-gray-700 font-medium break-words">
                    @foreach($course['highlights'] as $highlight)
                    <li class="flex items-start gap-3 hover:translate-x-1 transition duration-300">
                        <i class="fa-solid fa-circle-arrow-right text-blue-600 mt-1 shrink-0"></i>
                        <span>{{ $highlight }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Modules -->
            @if(isset($course['modules']))
            <div>
                <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-semibold mb-3 md:mb-4 break-words">Modules and Practical Skills</h3>
                <p class="text-[11px] md:text-xs text-gray-500 mb-4 md:mb-6 font-semibold break-words">Below is a snapshot of the key topics you will explore:</p>
                <ul class="space-y-3 md:space-y-4 text-xs md:text-sm text-gray-700 font-medium break-words">
                    @foreach($course['modules'] as $module)
                    <li class="flex items-start gap-3 hover:translate-x-1 transition duration-300">
                        <i class="fa-solid fa-circle-check text-[#c1121f] mt-1 shrink-0"></i>
                        <span>{{ $module }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Assessment -->
            @if(isset($course['structure']))
            <div>
                <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-semibold mb-3 md:mb-4 break-words">Course Structure & Assessment</h3>
                <p class="text-gray-600 text-xs md:text-sm leading-relaxed break-words">{{ $course['structure'] }}</p>
            </div>
            @endif

            <!-- Course Summary Accordions -->
            <div>
                <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-semibold mb-4 md:mb-6 break-words">Course Summary</h3>
                <div x-data="{ active: 1 }" class="space-y-2">
                    
                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 1 ? null : 1" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Entry Requirements</span>
                            <i class="fa-solid shrink-0" :class="active === 1 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 1" x-collapse class="p-4 md:p-6 bg-white text-xs md:text-sm text-gray-600 space-y-2 break-words">
                            <p class="font-bold text-[11px] md:text-xs">Candidates must satisfy the following parameters:</p>
                            <ul class="list-disc pl-5 space-y-2 text-[11px] md:text-xs font-semibold">
                                <li>{{ $course['summary']['requirements'] }}</li>
                                <li>Pre-enrollment assessment interview</li>
                            </ul>
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 2 ? null : 2" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Duration of the course</span>
                            <i class="fa-solid shrink-0" :class="active === 2 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 2" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['duration'] }}
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 3 ? null : 3" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Certification</span>
                            <i class="fa-solid shrink-0" :class="active === 3 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 3" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['certification'] }}
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 4 ? null : 4" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Fees and Payment Options</span>
                            <i class="fa-solid shrink-0" :class="active === 4 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 4" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['fees'] }}
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 5 ? null : 5" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Extra Costs</span>
                            <i class="fa-solid shrink-0" :class="active === 5 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 5" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['extra_cost'] }}
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 6 ? null : 6" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Suitability</span>
                            <i class="fa-solid shrink-0" :class="active === 6 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 6" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['suitability'] }}
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 7 ? null : 7" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Career Opportunities</span>
                            <i class="fa-solid shrink-0" :class="active === 7 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 7" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['careers'] }}
                        </div>
                    </div>

                    <div class="border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                        <button x-on:click="active = active === 8 ? null : 8" class="w-full bg-slate-50 text-[#091c3d] px-4 md:px-6 py-3 md:py-4 font-bold text-left flex justify-between items-center text-xs md:text-sm transition-colors hover:bg-slate-100">
                            <span class="break-words pr-2">Learner Support</span>
                            <i class="fa-solid shrink-0" :class="active === 8 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                        <div x-show="active === 8" x-collapse class="p-4 md:p-6 bg-white text-[11px] md:text-xs font-semibold text-gray-600 break-words">
                            {{ $course['summary']['support'] }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Right Sidebar Area -->
        <div class="space-y-6 md:space-y-8 mt-8 lg:mt-0">
            
            <div class="w-full aspect-[16/10] overflow-hidden rounded-xl md:rounded-2xl shadow-sm border border-gray-100 group cursor-pointer">
                <img src="{{ asset($course['sidebar_image']) }}" class="w-full h-full object-cover hover-image-elegant" alt="Sidebar Image" onerror="this.src='https://placehold.co/600x400/091c3d/ffffff?text=Practical+Labs'">
            </div>

            <!-- Sidebar Inquiry Form WITH ALL 9 COURSES -->
            <div class="bg-[#fff7f5] border border-gray-100 shadow-xl rounded-2xl md:rounded-3xl p-5 md:p-8" id="sidebar-form">
                <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">Enquire Now</h3>
                <form method="POST" action="{{ route('enquiry.submit') }}" class="space-y-3 md:space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Name" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3.5 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]" required>
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Email" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3.5 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]" required>
                    </div>
                    <div>
                        <input type="tel" name="phone" placeholder="Mobile No" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]" required>
                    </div>
                    <div>
                        <select name="course" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3.5 text-[10px] md:text-xs focus:outline-none focus:border-[#091c3d] break-words">
                            <option>Diploma in Social Care</option>
                            <option>Diploma in Nursing Aid</option>
                            <option>Certificate in Health and Safety</option>
                            <option>Certificate in First Aid and CPR</option>
                            <option>Diploma in Hospitality and Tourism</option>
                            <option>Certificate in Customer Service & IT</option>
                            <option>Diploma in Travel Business Operations</option>
                            <option>Certificate in Airline Ticketing</option>
                            <option>Diploma as Personal Support Worker (PSW)</option>
                        </select>
                    </div>
                    <div>
                        <select name="campus" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3.5 text-[10px] md:text-xs focus:outline-none focus:border-[#091c3d] break-words" required>
                            <option value="" disabled selected>Campus *</option>
                            <option value="douala">Douala Main Campus</option>
                            <option value="limbe">Limbe Campus</option>
                        </select>
                    </div>
                    <div>
                        <input type="date" name="start_date" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3.5 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]" required>
                    </div>
                    <div>
                        <textarea name="message" rows="3" placeholder="Message" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 py-2.5 md:px-4 md:py-3 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#091c3d] text-white py-3 md:py-3.5 rounded-lg md:rounded-xl font-bold text-[11px] md:text-xs uppercase tracking-wider hover:bg-[#c1121f] transition">Submit</button>
                </form>
            </div>

            <!-- Follow Us Section -->
            <div class="text-center p-4 md:p-6 bg-gray-50 rounded-xl md:rounded-2xl border border-gray-100">
                <h4 class="text-[10px] md:text-xs font-bold uppercase tracking-wider text-gray-500 mb-3 md:mb-4">Follow Us On:</h4>
                <div class="flex justify-center gap-4 text-[#091c3d] text-base md:text-lg">
                    <a href="https://www.facebook.com/share/198T55UJdS/" target="_blank" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://tiktok.com/@goshen.center.dou" target="_blank" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="mailto:info.goshenworkskill@gmail.com" class="hover:text-[#c1121f] transition"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>

            <!-- Start Learning Now Pinned Card -->
            <div class="bg-white border border-gray-100 rounded-2xl md:rounded-3xl p-5 md:p-8 shadow-md">
                <h4 class="font-serif text-xl md:text-2xl text-[#091c3d] font-bold mb-3 md:mb-4 break-words">Start Learning Now</h4>
                <p class="text-[11px] md:text-xs text-gray-500 leading-relaxed mb-4 md:mb-6 break-words">Create an account or login to our Student Portal to configure your study schedule, access your results, and download notes.</p>
                <a href="{{ route('register.show', $slug) }}" class="block w-full text-center bg-[#c1121f] hover:bg-[#091c3d] text-white py-3 md:py-4 rounded-lg md:rounded-xl font-bold text-[10px] md:text-xs uppercase tracking-wider transition duration-300 shadow-md">
                    Register Now
                </a>
            </div>

            <!-- Side Related Ad Banners (Hanging Images style) -->
            <div class="relative flex items-center justify-center py-2 md:py-4">
                <div class="bg-white border border-gray-100 shadow-md rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer w-full relative z-10">
                    <div class="relative w-full aspect-[4/3] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/hero-course-social-care.jpg') }}" class="w-full h-full object-cover hover-image-elegant" alt="Social Care" onerror="this.style.display='none'">
                        <div class="absolute inset-0 flex flex-col justify-end p-4 md:p-6 text-left pointer-events-none">
                            <h5 class="font-serif text-base md:text-lg font-bold text-white mb-1 break-words">Social Care</h5>
                            <p class="text-[9px] md:text-[10px] text-gray-300 break-words">Fast-track childcare and caregiver pathways.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative flex items-center justify-center py-2 md:py-4">
                <div class="bg-white border border-gray-100 shadow-md rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer w-full relative z-10">
                    <div class="relative w-full aspect-[4/3] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/hero-course-hospitality.jpg') }}" class="w-full h-full object-cover hover-image-elegant" alt="Hospitality" onerror="this.style.display='none'">
                        <div class="absolute inset-0 flex flex-col justify-end p-4 md:p-6 text-left pointer-events-none">
                            <h5 class="font-serif text-base md:text-lg font-bold text-white mb-1 break-words">Hospitality</h5>
                            <p class="text-[9px] md:text-[10px] text-gray-300 break-words">Comprehensive Tourism and Hotel programs.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- RELATED COURSES (More Courses For You) -->
    <!-- FIXED: grid-cols-2 on mobile with safe padding to prevent squishing -->
    <section class="py-16 md:py-20 bg-gray-50 border-t border-b border-gray-100">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <h3 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-8 md:mb-12 text-center break-words">More Courses for You</h3>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
                @foreach($related as $slug => $related_course)
                <div class="group bg-white rounded-xl md:rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition border border-gray-100 flex flex-col justify-between">
                    <div class="relative w-full aspect-[16/9] bg-[#091c3d] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset($related_course['sidebar_image']) }}" class="w-full h-full object-cover hover-image-elegant opacity-70" alt="Course Image" onerror="this.style.display='none'">
                        <i class="fa-solid fa-graduation-cap text-white text-2xl md:text-4xl absolute"></i>
                    </div>
                    <div class="p-3 md:p-8 flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="font-serif text-sm md:text-xl font-bold text-[#091c3d] mb-1 md:mb-2 break-words leading-tight">{{ $related_course['title'] }}</h4>
                            <p class="text-gray-500 text-[9px] md:text-xs line-clamp-2 md:line-clamp-3 mb-3 md:mb-6">{{ $related_course['description'] }}</p>
                        </div>
                        <a href="{{ route('courses.show', $slug) }}" class="text-center bg-[#091c3d] hover:bg-[#c1121f] text-white py-2 md:py-3.5 rounded-lg md:rounded-xl font-bold text-[9px] md:text-xs uppercase tracking-wider transition">View Details &rarr;</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- DOUBLE ROW AUTOPLAY SLIDING TESTIMONIALS CAROUSEL -->
    <section class="py-16 md:py-24 bg-[#fff7f2] border-t border-gray-100 overflow-hidden relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 relative z-10">
            <div class="text-center mb-10 md:mb-16">
                <h2 class="text-[#c1121f] font-bold uppercase tracking-widest text-[10px] md:text-xs mb-2 md:mb-4">Reviews & Testimonials</h2>
                <h3 class="font-serif text-3xl md:text-5xl text-[#0f172a] mb-2 md:mb-4 break-words">How Our Students See Us:</h3>
                <div class="w-16 h-1 bg-[#c1121f] mx-auto mt-4"></div>
            </div>
            <div class="space-y-4 md:space-y-8">
                <!-- ROW 1: LTR -->
                <div class="w-full overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="animate-reviews-ltr">
                        <div class="flex gap-4 md:gap-8 px-2 md:px-4">
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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

                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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
                <div class="w-full overflow-hidden relative">
                    <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-[#fff7f2] to-transparent z-10 pointer-events-none"></div>
                    <div class="animate-reviews-rtl">
                        <div class="flex gap-4 md:gap-8 px-2 md:px-4">
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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

                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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
                            <div class="w-[280px] md:w-[380px] shrink-0 bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 flex flex-col justify-between hover:scale-[1.01] hover:shadow-xl transition">
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
        <!-- FIXED: Single column on tiny screens, side-by-side on sm -->
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 items-center bg-[#fff7f5] p-6 md:p-10 rounded-2xl">
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

</body>
</html>
