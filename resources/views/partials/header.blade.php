<header wire:ignore x-data="{ mobileMenuOpen: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 50)"
        :class="scrolled ? 'fixed top-0 left-0 w-full shadow-md z-[100]' : 'relative z-40'"
        class="w-full flex flex-col shadow-sm bg-white transition-all duration-300">
    
    <!-- CSS to hide scrollbars for custom swipeable elements -->
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    
    <!-- Top Contact Bar (Now Optimized for both Desktop and Mobile!) -->
    <div x-show="!scrolled" x-cloak x-transition:leave="transition ease-in duration-300" class="flex w-full bg-white text-gray-700 text-[10px] sm:text-xs py-2 px-4 lg:px-8 justify-between items-center border-b border-gray-100 min-h-[35px] lg:h-[50px] overflow-x-auto hide-scrollbar whitespace-nowrap gap-4 relative z-50">
        <div class="flex items-center gap-4 sm:gap-6 shrink-0">
            <span class="flex items-center gap-2 font-semibold text-[#091c3d]"><i class="fa-solid fa-phone text-[#c1121f]"></i> +237 678 672 998 / +237 696 681 163</span>
            <!-- Address is hidden on standard phones, shows on tablets and desktops to prevent clutter -->
            <span class="text-gray-400 font-medium hidden sm:inline">Main Campus, Cameroon</span>
        </div>
        <div class="flex items-center gap-4 sm:gap-6 font-semibold shrink-0">
            <a href="mailto:info@goshenworkskill.com" class="flex items-center gap-2 text-gray-600 hover:text-[#c1121f] transition"><i class="fa-solid fa-envelope text-[#c1121f]"></i> info@goshenworkskill.com</a>
            <div class="flex items-center gap-2.5 border-l border-gray-200 pl-3 text-gray-500 shrink-0">
                <a href="https://www.facebook.com/share/198T55UJdS/" target="_blank" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://tiktok.com/@goshen.center.dou" target="_blank" class="hover:text-[#c1121f] transition"><i class="fa-brands fa-tiktok"></i></a>
                <a href="mailto:info.goshenworkskill@gmail.com" class="hover:text-[#c1121f] transition"><i class="fa-solid fa-envelope"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="w-full bg-white py-3 lg:py-4 border-b border-gray-100 relative z-50">
        <div class="max-w-[90rem] mx-auto px-2 lg:px-6 flex justify-start lg:justify-between items-center gap-1 lg:gap-3">
            
            <!-- Logo -->
            <a href="/" class="flex items-center shrink-0 z-50">
                <!-- FIXED: Explicit height classes on mobile prevent container collapse, and root-relative path used -->
                <div class="w-[65px] sm:w-[140px] lg:w-[210px] h-[30px] sm:h-[55px] lg:h-[80px] flex items-center justify-center overflow-hidden bg-white transition">
                    <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/200x80/ffffff/091c3d?text=GWSA+LOGO'" class="w-full h-full object-contain scale-125" alt="Goshen Logo">
                </div>
            </a>

            <!-- Inline Mobile Links (Middle of screen - swipeable horizontally) -->
            <div class="flex lg:hidden flex-1 min-w-0 items-center gap-3 sm:gap-4 text-[10px] sm:text-[11px] font-bold text-gray-600 whitespace-nowrap z-[110] overflow-x-auto hide-scrollbar px-2 mx-1 border-x border-gray-50">
                <a href="/" class="hover:text-[#c1121f] transition {{ request()->is('/') ? 'text-[#c1121f]' : '' }}">Home</a>
                <a href="/about-us" class="hover:text-[#c1121f] transition {{ request()->is('about-us') ? 'text-[#c1121f]' : '' }}">About</a>
                
                <!-- INLINE MOBILE DROPDOWN FOR COURSES -->
                <div x-data="{ inlineCourseOpen: false }">
                    <button @click="inlineCourseOpen = !inlineCourseOpen" @click.outside="inlineCourseOpen = false" class="flex items-center gap-1 shrink-0 hover:text-[#c1121f] transition focus:outline-none {{ request()->is('courses*') ? 'text-[#c1121f]' : '' }}">
                        Courses <i class="fa-solid fa-chevron-down text-[8px] transition-transform duration-300" :class="inlineCourseOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <!-- Centered fixed popup menu -->
                    <div x-show="inlineCourseOpen" x-transition x-cloak class="fixed top-[65px] left-1/2 -translate-x-1/2 w-[90vw] max-w-sm bg-white border border-gray-100 shadow-2xl rounded-xl flex flex-col p-3 gap-2 z-[120]">
                        <a href="/courses" class="text-[11px] font-bold text-[#091c3d] border-b border-gray-100 pb-2 hover:text-[#c1121f] transition text-center">View All Courses &rarr;</a>
                        <div class="grid grid-cols-2 gap-2 pt-1">
                            <a href="/courses/social-care" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Social Care</a>
                            <a href="/courses/nursing-aid" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Nursing Aid</a>
                            <a href="/courses/health-safety" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Health & Safety</a>
                            <a href="/courses/first-aid-cpr" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">First Aid & CPR</a>
                            <a href="/courses/hospitality-tourism" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Hospitality</a>
                            <a href="/courses/customer-service" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Customer & Computer Ops</a>
                            <a href="/courses/travel-business" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Travel Business</a>
                            <a href="/courses/airline-ticketing" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Airline Ticketing</a>
                            <a href="/courses/personal-support-worker" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">PSW Diploma</a>
                        </div>
                    </div>
                </div>

                <!-- INLINE MOBILE DROPDOWN FOR PACKAGES -->
                <div x-data="{ inlinePackageOpen: false }">
                    <button @click="inlinePackageOpen = !inlinePackageOpen" @click.outside="inlinePackageOpen = false" class="flex items-center gap-1 shrink-0 hover:text-[#c1121f] transition focus:outline-none {{ request()->is('packages*') || request()->is('pricing') ? 'text-[#c1121f]' : '' }}">
                        Packages <i class="fa-solid fa-chevron-down text-[8px] transition-transform duration-300" :class="inlinePackageOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <!-- Fixed popup menu -->
                    <div x-show="inlinePackageOpen" x-transition x-cloak class="fixed top-[65px] left-1/2 -translate-x-1/2 w-[90vw] max-w-sm bg-white border border-gray-100 shadow-2xl rounded-xl flex flex-col p-3 gap-2.5 z-[120]">
                        <a href="/packages" class="text-[11px] font-bold text-[#091c3d] border-b border-gray-100 pb-2 hover:text-[#c1121f] transition text-center">View All Packages &rarr;</a>
                        <div class="grid grid-cols-2 gap-2 pt-1">
                            <a href="/packages/healthcare" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Healthcare Bundle</a>
                            <a href="/packages/silver" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Silver Bundle</a>
                            <a href="/packages/gold" class="text-[10px] font-semibold text-gray-600 hover:text-[#c1121f] transition">Gold Bundle</a>
                        </div>
                    </div>
                </div>

                <a href="/events" class="shrink-0 hover:text-[#c1121f] transition {{ request()->is('events') ? 'text-[#c1121f]' : '' }}">Events</a>
                <a href="/gallery" class="shrink-0 hover:text-[#c1121f] transition {{ request()->is('gallery') ? 'text-[#c1121f]' : '' }}">Gallery</a>
                <a href="/contact-us" class="shrink-0 hover:text-[#c1121f] transition {{ request()->is('contact-us') ? 'text-[#c1121f]' : '' }}">Contact Us</a>
            </div>

            <!-- Mobile Quick Actions -->
            <div class="flex items-center gap-2 sm:gap-4 lg:hidden z-50 shrink-0 ml-auto">
                <!-- Quick Login Icon -->
                <a href="/student/login" class="flex items-center text-[#091c3d] hover:text-[#c1121f] transition">
                    <i class="fa-regular fa-circle-user text-[22px] sm:text-[26px]"></i>
                </a>
                <!-- Quick Enroll Button -->
                <a href="/packages" class="px-3 py-1.5 sm:px-4 sm:py-2 bg-[#c1121f] text-white text-[10px] sm:text-xs font-bold rounded-md shadow-md hover:bg-[#091c3d] transition whitespace-nowrap">
                    Enroll
                </a>
                <!-- Hamburger Menu Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-[#091c3d] text-[22px] sm:text-[26px] focus:outline-none ml-0.5 border-l border-gray-200 pl-2 sm:pl-3">
                    <i class="fa-solid fa-bars" x-show="!mobileMenuOpen"></i>
                    <i class="fa-solid fa-xmark" x-show="mobileMenuOpen" x-cloak></i>
                </button>
            </div>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden lg:flex items-center space-x-4 bg-gray-50 border border-gray-100 px-5 py-2.5 rounded-full text-gray-800 whitespace-nowrap">
                <a href="/" class="text-[13px] font-semibold pb-1 transition {{ request()->is('/') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">Home</a>
                <a href="/about-us" class="text-[13px] font-semibold pb-1 transition {{ request()->is('about-us') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">About Us</a>
                
                <div class="relative group">
                    <a href="/courses" class="flex items-center gap-1 text-[13px] font-semibold pb-1 transition cursor-pointer {{ request()->is('courses*') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">
                        Courses <i class="fa-solid fa-chevron-down text-[9px] ml-1 transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="absolute top-full left-0 mt-4 w-80 bg-white text-gray-900 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-5 border border-gray-100 z-50 flex flex-col gap-2.5">
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5">Healthcare</div>
                        <a href="/courses/social-care" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Diploma in Social Care</a>
                        <a href="/courses/nursing-aid" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Diploma in Nursing Aid</a>
                        <a href="/courses/personal-support-worker" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Diploma as Personal Support Worker (PSW)</a>
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5 mt-2">Safety & Security</div>
                        <a href="/courses/health-safety" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Cert. in Health & Safety</a>
                        <a href="/courses/first-aid-cpr" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Cert. in First Aid & CPR</a>
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5 mt-2">Hospitality & Service</div>
                        <a href="/courses/hospitality-tourism" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Diploma in Hospitality and Tourism</a>
                        <a href="/courses/customer-service" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Cert. in Customer Service and Computer Operations</a>
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5 mt-2">Travel & Aviation</div>
                        <a href="/courses/travel-business" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Diploma in Travel Business Operations</a>
                        <a href="/courses/airline-ticketing" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Cert. in Airline Ticketing and Reservation</a>
                    </div>
                </div>

                <div class="relative group">
                    <a href="/packages" class="flex items-center gap-1 text-[13px] font-semibold pb-1 transition cursor-pointer {{ request()->is('packages*') || request()->is('pricing') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">
                        Packages <i class="fa-solid fa-chevron-down text-[9px] ml-1 transition-transform group-hover:rotate-180"></i>
                    </a>
                    <div class="absolute top-full left-0 mt-4 min-w-[220px] bg-white text-gray-900 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-4 border border-gray-100 z-50 flex flex-col gap-3">
                        <a href="/packages" class="text-xs font-bold text-[#091c3d] hover:text-[#c1121f] transition border-b border-gray-100 pb-2">View All Packages &rarr;</a>
                        <a href="/packages/healthcare" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Healthcare Bundle</a>
                        <a href="/packages/silver" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Silver Bundle</a>
                        <a href="/packages/gold" class="text-xs font-semibold text-gray-600 hover:text-[#c1121f] transition">Gold Bundle</a>
                        <a href="/contact-us" class="text-xs font-bold text-[#c1121f] hover:text-[#091c3d] transition mt-1 pt-2 border-t border-gray-100">Request Custom Pricing &rarr;</a>
                    </div>
                </div>

                <a href="/events" class="text-[13px] font-semibold pb-1 transition {{ request()->is('events') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">Events</a>
                <a href="/gallery" class="text-[13px] font-semibold pb-1 transition {{ request()->is('gallery') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">Gallery</a>
                <a href="/contact-us" class="text-[13px] font-semibold pb-1 transition {{ request()->is('contact-us') ? 'text-[#c1121f] border-b-2 border-[#c1121f]' : 'border-b-2 border-transparent hover:text-[#c1121f]' }}">Contact Us</a>
            </div>

            <!-- CTA Buttons (Desktop) -->
            <div class="hidden lg:flex items-center gap-3 shrink-0">
                <a href="/student/login" class="text-[#091c3d] hover:text-[#c1121f] transition">
                    <i class="fa-regular fa-circle-user text-3xl"></i>
                </a>
                <a href="/packages" class="px-4 py-2.5 rounded-lg text-xs font-bold transition duration-300 shadow-md bg-[#c1121f] hover:bg-[#091c3d] text-white whitespace-nowrap">Enroll Now</a>
            </div>
        </div>

        <!-- MOBILE MENU OVERLAY (Hamburger Dropdown) -->
        <div x-show="mobileMenuOpen" x-collapse x-cloak class="lg:hidden absolute top-full left-0 w-full bg-white shadow-2xl border-t border-gray-100 flex flex-col z-[100] max-h-[85vh] overflow-y-auto">
            <div class="flex flex-col px-6 py-6 space-y-4">
                <a href="/" class="text-sm font-bold text-[#091c3d] border-b border-gray-50 pb-3">Home</a>
                <a href="/about-us" class="text-sm font-bold text-[#091c3d] border-b border-gray-50 pb-3">About Us</a>
                
                <!-- HAMBURGER ACCORDION: COURSES -->
                <div x-data="{ openCourses: false }" class="border-b border-gray-50 pb-3">
                    <button @click="openCourses = !openCourses" class="flex justify-between items-center w-full text-sm font-bold text-[#091c3d]">
                        All Courses <i class="fa-solid fa-chevron-down transition-transform text-xs" :class="openCourses ? 'rotate-180 text-[#c1121f]' : ''"></i>
                    </button>
                    <div x-show="openCourses" x-collapse class="flex flex-col gap-3 pl-4 pt-4">
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5">Healthcare</div>
                        <a href="/courses/social-care" class="text-xs text-gray-600 hover:text-[#c1121f]">Diploma in Social Care</a>
                        <a href="/courses/nursing-aid" class="text-xs text-gray-600 hover:text-[#c1121f]">Diploma in Nursing Aid</a>
                        <a href="/courses/personal-support-worker" class="text-xs text-gray-600 hover:text-[#c1121f]">Diploma as Personal Support Worker (PSW)</a>
                        
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5 mt-2">Safety & Security</div>
                        <a href="/courses/health-safety" class="text-xs text-gray-600 hover:text-[#c1121f]">Cert. in Health & Safety</a>
                        <a href="/courses/first-aid-cpr" class="text-xs text-gray-600 hover:text-[#c1121f]">Cert. in First Aid & CPR</a>
                        
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5 mt-2">Hospitality & Service</div>
                        <a href="/courses/hospitality-tourism" class="text-xs text-gray-600 hover:text-[#c1121f]">Diploma in Hospitality and Tourism</a>
                        <a href="/courses/customer-service" class="text-xs text-gray-600 hover:text-[#c1121f]">Cert. in Customer Service and Computer Operations</a>
                        
                        <div class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-0.5 mt-2">Travel & Aviation</div>
                        <a href="/courses/travel-business" class="text-xs text-gray-600 hover:text-[#c1121f]">Diploma in Travel Business Operations</a>
                        <a href="/courses/airline-ticketing" class="text-xs text-gray-600 hover:text-[#c1121f]">Cert. in Airline Ticketing and Reservation</a>
                    </div>
                </div>

                <!-- HAMBURGER ACCORDION: PACKAGES -->
                <div x-data="{ openPackages: false }" class="border-b border-gray-50 pb-3">
                    <button @click="openPackages = !openPackages" class="flex justify-between items-center w-full text-sm font-bold text-[#091c3d]">
                        Packages <i class="fa-solid fa-chevron-down transition-transform text-xs" :class="openPackages ? 'rotate-180 text-[#c1121f]' : ''"></i>
                    </button>
                    <div x-show="openPackages" x-collapse class="flex flex-col gap-3 pl-4 pt-4">
                        <a href="/packages" class="text-xs font-bold text-[#091c3d] hover:text-[#c1121f]">View All Packages &rarr;</a>
                        <a href="/packages/healthcare" class="text-xs text-gray-600 hover:text-[#c1121f]">Healthcare Bundle</a>
                        <a href="/packages/silver" class="text-xs text-gray-600 hover:text-[#c1121f]">Silver Bundle</a>
                        <a href="/packages/gold" class="text-xs text-gray-600 hover:text-[#c1121f]">Gold Bundle</a>
                        <a href="/contact-us" class="text-xs font-bold text-[#c1121f] hover:text-[#091c3d]">Request Custom Pricing &rarr;</a>
                    </div>
                </div>

                <a href="/events" class="text-sm font-bold text-[#091c3d] border-b border-gray-50 pb-3">Events</a>
                <a href="/gallery" class="text-sm font-bold text-[#091c3d] border-b border-gray-50 pb-3">Gallery</a>
                <a href="/contact-us" class="text-sm font-bold text-[#091c3d] pb-2">Contact Us</a>
            </div>
        </div>
    </nav>
</header>
