<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $course['title'] }} Package | Goshen Work Skill Association</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .hover-image-elegant { transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s ease; }
        .group:hover .hover-image-elegant { transform: scale(1.08); filter: brightness(1.05) contrast(1.02); }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    @include('partials.header')

    <!-- PACKAGE HERO BANNER -->
    <section class="relative py-16 md:py-24 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset($course['hero_image']) }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="{{ $course['title'] }}">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-black/20 z-10"></div>
        
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-left w-full" data-aos="fade-right">
            <div class="flex flex-wrap items-center gap-1 md:gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <a href="/packages" class="hover:text-white transition">Packages</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Package Details</span>
            </div>
            
            <span class="bg-[#c1121f] text-white text-[10px] md:text-xs font-bold uppercase tracking-wider px-3 md:px-4 py-1 md:py-1.5 rounded-full mb-3 md:mb-4 inline-block shadow-lg">{{ $course['category'] }}</span>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 drop-shadow-md capitalize break-words">{{ $course['title'] }} Package</h1>
            <p class="text-gray-300 text-xs md:text-sm lg:text-lg max-w-2xl leading-relaxed drop-shadow-md break-words">{{ $course['description'] }} Book this package and pay via MTN MoMo, Orange Money, bank transfer, or credit/debit card.</p>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="py-12 md:py-20 bg-[#fcfcfc] relative z-10">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start">
            
            <!-- LEFT COLUMN: Course Details -->
            <div class="lg:col-span-8 space-y-8 md:space-y-10" x-data="{ tab: 'overview' }" data-aos="fade-up">
                
                <div class="flex flex-wrap gap-1 md:gap-2 border-b border-gray-200 pb-px">
                    <button @click="tab = 'overview'" :class="tab === 'overview' ? 'border-[#c1121f] text-[#091c3d]' : 'border-transparent text-gray-500 hover:text-[#091c3d] hover:border-gray-300'" class="px-4 py-2 md:px-6 md:py-3 border-b-2 font-bold text-[10px] md:text-sm uppercase tracking-wider transition-all duration-300">Overview</button>
                    <button @click="tab = 'highlights'" :class="tab === 'highlights' ? 'border-[#c1121f] text-[#091c3d]' : 'border-transparent text-gray-500 hover:text-[#091c3d] hover:border-gray-300'" class="px-4 py-2 md:px-6 md:py-3 border-b-2 font-bold text-[10px] md:text-sm uppercase tracking-wider transition-all duration-300">Highlights</button>
                    <button @click="tab = 'modules'" :class="tab === 'modules' ? 'border-[#c1121f] text-[#091c3d]' : 'border-transparent text-gray-500 hover:text-[#091c3d] hover:border-gray-300'" class="px-4 py-2 md:px-6 md:py-3 border-b-2 font-bold text-[10px] md:text-sm uppercase tracking-wider transition-all duration-300">Modules</button>
                </div>

                <!-- OVERVIEW TAB -->
                <div x-show="tab === 'overview'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6 md:space-y-8">
                    <div>
                        <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-3 md:mb-4 break-words">About This Package</h2>
                        <div class="w-12 h-1 bg-[#f5a524] mb-4 md:mb-6"></div>
                        <p class="text-gray-600 text-xs md:text-sm leading-relaxed mb-3 md:mb-4 break-words">{{ $course['description'] }}</p>
                        <p class="text-gray-600 text-xs md:text-sm leading-relaxed break-words">{{ $course['structure'] }}</p>
                    </div>

                    <div class="bg-gray-50 rounded-2xl md:rounded-3xl p-5 md:p-8 border border-gray-100 shadow-inner">
                        <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">Package Inclusions</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 text-xs md:text-sm text-gray-700 font-medium">
                            <div class="flex items-start gap-3"><div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0"><i class="fa-solid fa-book-open"></i></div> <span class="mt-1.5 break-words">Full course curriculum and study materials</span></div>
                            <div class="flex items-start gap-3"><div class="w-8 h-8 rounded-full bg-blue-100 text-[#091c3d] flex items-center justify-center shrink-0"><i class="fa-solid fa-certificate"></i></div> <span class="mt-1.5 break-words">Certificate upon completion</span></div>
                            <div class="flex items-start gap-3"><div class="w-8 h-8 rounded-full bg-red-100 text-[#c1121f] flex items-center justify-center shrink-0"><i class="fa-solid fa-user-tie"></i></div> <span class="mt-1.5 break-words">Expert instructor guidance</span></div>
                            <div class="flex items-start gap-3"><div class="w-8 h-8 rounded-full bg-orange-100 text-[#f5a524] flex items-center justify-center shrink-0"><i class="fa-solid fa-phone"></i></div> <span class="mt-1.5 break-words">Admissions support and MoMo payment assistance</span></div>
                        </div>
                    </div>
                </div>

                <!-- HIGHLIGHTS TAB -->
                <div x-show="tab === 'highlights'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-5 md:space-y-6">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-2 break-words">Course Highlights</h2>
                    <p class="text-gray-500 text-[11px] md:text-sm mb-4 md:mb-6 break-words">What makes this program stand out:</p>

                    <ul class="space-y-4 text-xs md:text-sm text-gray-700 font-medium">
                        @foreach($course['highlights'] as $highlight)
                        <li class="flex items-start gap-3 p-4 bg-white border border-gray-100 rounded-xl hover:shadow-md transition">
                            <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5 shrink-0"></i>
                            <span class="break-words">{{ $highlight }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- MODULES TAB -->
                <div x-show="tab === 'modules'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-5 md:space-y-6">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-2 break-words">Modules & Practical Skills</h2>
                    <p class="text-gray-500 text-[11px] md:text-sm mb-4 md:mb-6 break-words">Below is a snapshot of the key topics you will explore:</p>

                    <ul class="space-y-3 text-xs md:text-sm text-gray-700 font-medium">
                        @foreach($course['modules'] as $module)
                        <li class="flex items-start gap-3 p-3 md:p-4 bg-white border border-gray-100 rounded-xl hover:shadow-md transition">
                            <i class="fa-solid fa-circle-arrow-right text-[#c1121f] mt-0.5 shrink-0"></i>
                            <span class="break-words">{{ $module }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <!-- RIGHT COLUMN: Sticky Pricing & Enrollment Sidebar -->
            <div class="lg:col-span-4 lg:sticky lg:top-28" data-aos="fade-left">
                <div class="bg-white rounded-2xl md:rounded-3xl border border-gray-100 shadow-[0_20px_50px_rgba(9,28,61,0.08)] overflow-hidden">
                    <div class="bg-[#091c3d] text-center py-4 md:py-6 px-6 md:px-8 relative">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-[#c1121f]"></div>
                        <h3 class="text-white font-serif text-xl md:text-2xl font-bold break-words">{{ $course['title'] }}</h3>
                    </div>

                    <div class="p-6 md:p-8">
                        <div class="flex flex-col items-center mb-4 md:mb-6">
                            <span class="text-3xl md:text-4xl font-black text-[#091c3d] break-words">{{ $course['summary']['package_price'] }}</span>
                            <span class="text-gray-400 text-xs md:text-sm font-medium break-words">Full package price</span>
                        </div>

                        <a href="{{ route('register.show', $slug) }}" class="block w-full py-3.5 md:py-4 rounded-xl text-center font-bold text-[11px] md:text-sm bg-[#c1121f] text-white shadow-lg hover:shadow-xl hover:-translate-y-1 hover:bg-[#091c3d] transition-all duration-300 mb-5 md:mb-6 uppercase tracking-wider">
                            Register Now — 25,000 CFA
                        </a>

                        <div class="space-y-3 md:space-y-4 border-t border-gray-100 pt-5 md:pt-6">
                            <div class="flex items-center justify-between text-xs md:text-sm">
                                <span class="text-gray-500 font-medium flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-[#c1121f]"></i> Duration</span>
                                <span class="font-bold text-[#091c3d]">{{ $course['summary']['duration'] }}</span>
                            </div>
                            <div class="flex items-center justify-between text-xs md:text-sm">
                                <span class="text-gray-500 font-medium flex items-center gap-2"><i class="fa-solid fa-money-bill-wave w-4 text-[#c1121f]"></i> Payment</span>
                                <span class="font-bold text-[#091c3d] text-right break-words">{{ $course['summary']['payment_options'] }}</span>
                            </div>
                            <div class="flex items-center justify-between text-xs md:text-sm">
                                <span class="text-gray-500 font-medium flex items-center gap-2"><i class="fa-solid fa-award w-4 text-[#c1121f]"></i> Certification</span>
                                <span class="font-bold text-[#091c3d] text-right break-words">{{ $course['summary']['certification'] }}</span>
                            </div>
                        </div>
                        
                        <!-- Sidebar Enquiry Form -->
                        <div class="mt-6 md:mt-8 border-t border-gray-100 pt-5 md:pt-6" id="sidebar-form">
                            <h4 class="font-serif text-base md:text-lg text-[#091c3d] font-bold mb-3 md:mb-4 text-center break-words">Quick Enquiry</h4>
                            <form class="space-y-3">
                                <div><input type="text" placeholder="Name *" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 md:px-4 py-2.5 md:py-3 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]" required></div>
                                <div><input type="email" placeholder="Email *" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 md:px-4 py-2.5 md:py-3 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d]" required></div>
                                
                                <div>
                                    <select class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 md:px-4 py-3 md:py-3.5 text-[10px] md:text-xs focus:outline-none focus:border-[#091c3d] break-words" required>
                                        <option value="" disabled selected>Choose a Course *</option>
                                        <option value="social-care">Diploma in Social Care</option>
                                        <option value="nursing-aid">Diploma in Nursing Aid</option>
                                        <option value="health-safety">Certificate in Health and Safety</option>
                                        <option value="first-aid-cpr">Certificate in First Aid and CPR</option>
                                        <option value="hospitality-tourism">Diploma in Hospitality and Tourism</option>
                                        <option value="customer-service">Certificate in Customer Service and Computer Operations</option>
                                        <option value="travel-business">Diploma in Travel Business Operations</option>
                                        <option value="airline-ticketing">Certificate in Airline Ticketing and Reservation</option>
                                        <option value="personal-support-worker">Diploma as Personal Support Worker (PSW)</option>
                                    </select>
                                </div>

                                <div><textarea rows="3" placeholder="Message / Questions *" class="w-full bg-white border border-gray-200 rounded-lg md:rounded-xl px-3 md:px-4 py-2.5 md:py-3 text-[11px] md:text-xs focus:outline-none focus:border-[#091c3d] resize-none" required></textarea></div>
                                <button type="submit" class="w-full bg-[#091c3d] text-white py-2.5 md:py-3 rounded-lg md:rounded-xl font-bold text-[11px] md:text-xs uppercase tracking-wider hover:bg-[#c1121f] transition">Send Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BOTTOM CTA -->
    <section class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
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

    <!-- FOOTER & WIDGETS -->
    @include('partials.footer')
    @include('partials.widgets')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>document.addEventListener('DOMContentLoaded', () => { if (typeof AOS !== 'undefined') { AOS.init({ once: true, offset: 50, duration: 1000, easing: 'ease-out-cubic' }); }});</script>
</body>
</html>