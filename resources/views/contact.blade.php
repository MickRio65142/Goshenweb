<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Contact Us | Goshen Work Skill Association</title>

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
        .animate-reviews-ltr:hover { animation-play-state: paused; }

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
        .animate-reviews-rtl:hover { animation-play-state: paused; }

        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">

    <!-- CALLING YOUR SEPARATE HEADER PARTIAL -->
    @include('partials.header')

    <!-- CONTACT HERO BANNER (Bright & perfectly visible!) -->
    <!-- Adjusted padding and text size for mobile -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/contact-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-85" alt="Contact Us Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Contact Us</span>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">Get In Touch</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed drop-shadow-md break-words">Have a question about our courses, admissions, or corporate training packages? Reach out to our dedicated coordinators today.</p>
        </div>
    </section>

    <!-- 2-COLUMN CONTACT INFO & ENQUIRY FORM -->
    <!-- FIXED: grid-cols-1 on mobile, lg:grid-cols-2 on desktop -->
    <section class="py-16 md:py-24 bg-[#fcfcfc] relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-start">
            
            <!-- LEFT COLUMN: Contact Information -->
            <div data-aos="fade-right">
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold mb-6 md:mb-8 break-words">We're Always Eager to Hear From You!</h2>
                
                <div class="space-y-8 md:space-y-10">
                    <!-- Addresses -->
                    <div>
                        <h4 class="font-bold text-[#091c3d] text-lg md:text-xl mb-3 md:mb-4 border-b border-gray-200 pb-2"><i class="fa-solid fa-location-dot text-[#c1121f] mr-2"></i>Our Campuses</h4>

                        <div class="mb-5 md:mb-6">
                            <h5 class="font-bold text-[#091c3d] text-sm md:text-base mb-1 md:mb-2">Douala Main Campus</h5>
                            <p class="text-gray-600 text-xs md:text-sm leading-relaxed break-words">
                                First Floor, BB incubator House<br>
                                Beside UBA BANK, Accienne road, Bonaberi
                            </p>
                            <a href="mailto:Douala@goshenworkskill.com" class="text-xs md:text-sm text-[#c1121f] font-medium hover:underline inline-flex items-center gap-1 mt-1">
                                <i class="fa-solid fa-envelope text-[10px]"></i> Douala@goshenworkskill.com
                            </a>
                        </div>

                        <div>
                            <h5 class="font-bold text-[#091c3d] text-sm md:text-base mb-1 md:mb-2">Limbe Campus</h5>
                            <p class="text-gray-600 text-xs md:text-sm leading-relaxed break-words">
                                First Floor, Suite 101, Royal Detriot Building<br>
                                by Soccer City, off Amber Bay Gardens, Limbe
                            </p>
                            <a href="mailto:Limbe@goshenworkskill.com" class="text-xs md:text-sm text-[#c1121f] font-medium hover:underline inline-flex items-center gap-1 mt-1">
                                <i class="fa-solid fa-envelope text-[10px]"></i> Limbe@goshenworkskill.com
                            </a>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <h4 class="font-bold text-[#091c3d] text-lg md:text-xl mb-2 md:mb-3 border-b border-gray-200 pb-2">Phone</h4>
                        <div class="flex flex-col gap-3">
                            <a href="tel:+237678672998" class="flex items-center gap-3 md:gap-4 group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-blue-50 flex items-center justify-center shrink-0 group-hover:bg-[#091c3d] transition">
                                    <i class="fa-solid fa-phone text-[#091c3d] text-lg md:text-xl group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs md:text-sm font-medium group-hover:text-[#c1121f] transition break-words">+237 678 672 998</span>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=237696681163" target="_blank" class="flex items-center gap-3 md:gap-4 group">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-emerald-50 flex items-center justify-center shrink-0 group-hover:bg-[#06d755] transition">
                                    <i class="fa-brands fa-whatsapp text-emerald-600 text-lg md:text-xl group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs md:text-sm font-medium group-hover:text-[#06d755] transition break-words">WhatsApp: +237 696 681 163</span>
                            </a>
                        </div>
                    </div>

                    <!-- Email Addresses -->
                    <div>
                        <h4 class="font-bold text-[#091c3d] text-lg md:text-xl mb-3 md:mb-4 border-b border-gray-200 pb-2"><i class="fa-solid fa-envelope text-[#f5a524] mr-2"></i>Email Addresses</h4>
                        <div class="space-y-3">
                            <a href="mailto:Info@goshenworkskill.com" class="flex items-center gap-3 group">
                                <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center shrink-0 group-hover:bg-[#f5a524] transition">
                                    <i class="fa-solid fa-envelope text-[#f5a524] text-xs group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs font-medium group-hover:text-[#c1121f] transition">Info@goshenworkskill.com</span>
                                <span class="text-[9px] text-gray-400 hidden sm:inline">— General Enquiries</span>
                            </a>
                            <a href="mailto:Admin@goshenworkskill.com" class="flex items-center gap-3 group">
                                <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center shrink-0 group-hover:bg-[#f5a524] transition">
                                    <i class="fa-solid fa-envelope text-[#f5a524] text-xs group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs font-medium group-hover:text-[#c1121f] transition">Admin@goshenworkskill.com</span>
                                <span class="text-[9px] text-gray-400 hidden sm:inline">— Administration</span>
                            </a>
                            <a href="mailto:Douala@goshenworkskill.com" class="flex items-center gap-3 group">
                                <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center shrink-0 group-hover:bg-[#f5a524] transition">
                                    <i class="fa-solid fa-envelope text-[#f5a524] text-xs group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs font-medium group-hover:text-[#c1121f] transition">Douala@goshenworkskill.com</span>
                                <span class="text-[9px] text-gray-400 hidden sm:inline">— Douala Campus</span>
                            </a>
                            <a href="mailto:Limbe@goshenworkskill.com" class="flex items-center gap-3 group">
                                <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center shrink-0 group-hover:bg-[#f5a524] transition">
                                    <i class="fa-solid fa-envelope text-[#f5a524] text-xs group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs font-medium group-hover:text-[#c1121f] transition">Limbe@goshenworkskill.com</span>
                                <span class="text-[9px] text-gray-400 hidden sm:inline">— Limbe Campus</span>
                            </a>
                            <a href="mailto:Jobsabroad@goshenworkskill.com" class="flex items-center gap-3 group">
                                <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center shrink-0 group-hover:bg-[#f5a524] transition">
                                    <i class="fa-solid fa-envelope text-[#f5a524] text-xs group-hover:text-white transition"></i>
                                </div>
                                <span class="text-gray-600 text-xs font-medium group-hover:text-[#c1121f] transition">Jobsabroad@goshenworkskill.com</span>
                                <span class="text-[9px] text-gray-400 hidden sm:inline">— Jobs Abroad</span>
                            </a>
                        </div>
                    </div>

                    <!-- Social Follow -->
                    <div>
                        <h4 class="font-bold text-[#091c3d] text-lg md:text-xl mb-3 md:mb-4 border-b border-gray-200 pb-2">Follow Us</h4>
                        <div class="flex gap-3 md:gap-4">
                            <a href="https://www.facebook.com/share/198T55UJdS/" target="_blank" class="w-10 h-10 rounded-full bg-[#091c3d] text-white flex items-center justify-center hover:bg-[#c1121f] hover:-translate-y-1 transition duration-300 shadow-md"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-[#091c3d] text-white flex items-center justify-center hover:bg-[#c1121f] hover:-translate-y-1 transition duration-300 shadow-md"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-[#091c3d] text-white flex items-center justify-center hover:bg-[#c1121f] hover:-translate-y-1 transition duration-300 shadow-md"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="https://tiktok.com/@goshen.center.dou" target="_blank" class="w-10 h-10 rounded-full bg-[#091c3d] text-white flex items-center justify-center hover:bg-[#c1121f] hover:-translate-y-1 transition duration-300 shadow-md"><i class="fa-brands fa-tiktok"></i></a>
                            <a href="mailto:info.goshenworkskill@gmail.com" class="w-10 h-10 rounded-full bg-[#091c3d] text-white flex items-center justify-center hover:bg-[#c1121f] hover:-translate-y-1 transition duration-300 shadow-md"><i class="fa-solid fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: The Form -->
            <div data-aos="fade-left">
                <!-- Reduced padding on mobile -->
                <div class="bg-white rounded-2xl md:rounded-3xl p-6 md:p-10 border border-gray-100 shadow-[0_10px_40px_rgba(0,0,0,0.04)]">
                    <h3 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-2 break-words">Enquire Now</h3>
                    <p class="text-gray-500 text-xs md:text-sm mb-6 md:mb-8 break-words">Fill out this form to book a consultant advising session.</p>

                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4 md:space-y-5">
                        @csrf
                        <!-- Name -->
                        <div>
                            <input type="text" name="name" placeholder="Full Name *" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition" required>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <input type="email" name="email" placeholder="Email Address *" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition" required>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <input type="tel" name="phone" placeholder="Mobile No *" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition" required>
                        </div>
                        
                        <!-- Course OR Package Selection -->
                        <div>
                            <select name="course" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition text-gray-600 break-words" required>
                                <option value="" disabled selected>Choose Package or Course *</option>
                                
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

                        <!-- Campus Selection -->
                        <div>
                            <select name="campus" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition text-gray-600 break-words" required>
                                <option value="" disabled selected>Select Campus *</option>
                                <option value="general">General Enquiry</option>
                                <option value="douala">Douala Main Campus</option>
                                <option value="limbe">Limbe Campus</option>
                            </select>
                        </div>

                        <!-- Date Picker -->
                        <div>
                            <div class="relative">
                                <input type="text" name="start_date" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Expected Start Date *" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition text-gray-600" required>
                            </div>
                            <p class="text-[9px] md:text-[10px] text-gray-400 mt-1 md:mt-1.5 ml-2">dd-mm-yyyy</p>
                        </div>

                        <!-- Message -->
                        <div>
                            <textarea name="message" rows="4" placeholder="Message / Questions *" class="w-full bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl px-4 py-3 md:px-5 md:py-3.5 text-xs md:text-sm focus:outline-none focus:border-[#c1121f] focus:ring-1 focus:ring-[#c1121f] transition resize-none" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-[#091c3d] text-white py-3.5 md:py-4 rounded-lg md:rounded-xl font-bold text-xs md:text-sm uppercase tracking-wider hover:bg-[#c1121f] transition duration-300 shadow-lg hover:shadow-xl">
                            Send Enquiry
                        </button>
                    </form>

                    <!-- Bottom Social Strip -->
                    <div class="flex justify-end gap-3 mt-4 md:mt-6 pt-4 md:pt-6 border-t border-gray-100">
                        <a href="https://www.facebook.com/share/198T55UJdS/" target="_blank" class="text-[#091c3d] hover:text-[#c1121f] transition text-base md:text-lg"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-[#091c3d] hover:text-[#c1121f] transition text-base md:text-lg"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-[#091c3d] hover:text-[#c1121f] transition text-base md:text-lg"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://tiktok.com/@goshen.center.dou" target="_blank" class="text-[#091c3d] hover:text-[#c1121f] transition text-base md:text-lg"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="mailto:info.goshenworkskill@gmail.com" class="text-[#091c3d] hover:text-[#c1121f] transition text-base md:text-lg"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- LIVE GOOGLE MAP SECTION -->
    <section class="py-8 md:py-12 bg-[#fcfcfc]">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6" data-aos="zoom-in">
            <!-- Adjusted height for mobile to prevent scroll trapping -->
            <div class="w-full h-[300px] md:h-[500px] rounded-2xl md:rounded-3xl overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.1)] border-2 md:border-4 border-white relative group">
                <!-- Embedded Google Map of Douala to Limbe -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d159038!2d9.43861167164934!3d4.047923153407743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x1061128be2e1f6c1%3A0x92011c10fa36d1d6!2sDouala%2C%20Cameroon!3m2!1d4.04827!2d9.70428!4m5!1s0x10605e7a5f7d9d4f%3A0x6b7c5a5b5e5f5d5c!2sLimbe%2C%20Cameroon!3m2!1d4.0242!2d9.2149!5e0!3m2!1sen!2sus" class="w-full h-full border-0 grayscale-[20%] contrast-[1.1] group-hover:grayscale-0 transition duration-700" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
                <!-- Floating Info Overlays on Map -->
                <div class="absolute bottom-4 left-4 md:bottom-6 md:left-6 bg-white p-3 md:p-4 rounded-xl md:rounded-2xl shadow-xl w-44 md:w-56 border border-gray-100 hidden sm:block">
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-2 h-2 rounded-full bg-[#c1121f] shrink-0"></div>
                        <span class="font-bold text-[10px] md:text-[11px] text-[#091c3d]">Douala Main Campus</span>
                    </div>
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-tight mb-1">BB incubator House, Bonaberi</p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=4.089743,9.66298" target="_blank" class="text-[#c1121f] text-[9px] md:text-[10px] font-bold hover:underline">Get Directions <i class="fa-solid fa-arrow-up-right-from-square text-[7px]"></i></a>
                </div>
                <div class="absolute top-4 right-4 md:top-6 md:right-6 bg-white p-3 md:p-4 rounded-xl md:rounded-2xl shadow-xl w-44 md:w-56 border border-gray-100 hidden sm:block">
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-2 h-2 rounded-full bg-[#f5a524] shrink-0"></div>
                        <span class="font-bold text-[10px] md:text-[11px] text-[#091c3d]">Limbe Campus</span>
                    </div>
                    <p class="text-[9px] md:text-[10px] text-gray-500 leading-tight mb-1">Royal Detriot Bldg, by Soccer City</p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=4.0242,9.2149" target="_blank" class="text-[#c1121f] text-[9px] md:text-[10px] font-bold hover:underline">Get Directions <i class="fa-solid fa-arrow-up-right-from-square text-[7px]"></i></a>
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

    <!-- PREMIUM BOTTOM CALL TO ACTION GRID -->
    <section class="py-8 md:py-12 bg-gray-100 border-t border-b border-gray-200">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 items-center bg-[#fff7f5] p-6 md:p-10 rounded-2xl" data-aos="fade-up">
            <div class="text-center md:text-left text-gray-800">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-2 md:mb-3 text-[#091c3d] break-words">Get In Touch:</h3>
                <div class="space-y-1">
                    <p class="text-xs md:text-sm text-[#c1121f] font-bold break-all md:break-words">Info&#64;goshenworkskill.com</p>
                    <p class="text-xs md:text-sm text-[#c1121f] font-bold break-all md:break-words">Admin&#64;goshenworkskill.com</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <h3 class="font-serif text-xl md:text-3xl font-bold mb-2 md:mb-3 text-[#091c3d] break-words">Call or WhatsApp:</h3>
                <p class="text-xs md:text-sm text-[#c1121f] font-bold break-words">+237 678 672 998 / +237 696 681 163</p>
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
                AOS.init({ once: true, offset: 50, duration: 1000, easing: 'ease-out-cubic' });
            }
        });
    </script>
</body>
</html>
