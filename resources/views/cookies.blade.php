<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>Cookie Policy | Goshen Work Skill Association</title>
    <meta name="description" content="Learn about how Goshen Work Skill Association uses cookies and tracking technologies to enhance your browsing experience.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://127.0.0.1:8000/cookies">

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

    <!-- Cookie Policy Hero Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/cookies-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="Cookie Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent z-10"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 w-full text-left">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">Legal Information</p>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 text-white break-words">Cookie Policy</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-base max-w-xl leading-relaxed break-words">Understanding how we use cookies to improve your experience on our website.</p>
        </div>
    </section>

    <!-- Cookie Policy Content -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                
                <!-- Last Updated -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 md:p-6 mb-8 md:mb-12" data-aos="fade-up">
                    <p class="text-xs md:text-sm text-gray-600 break-words"><strong>Last Updated:</strong> January 1, 2026</p>
                    <p class="text-xs md:text-sm text-gray-600 mt-2 break-words">This Cookie Policy explains how Goshen Work Skill Association uses cookies and similar technologies on our website.</p>
                </div>

                <!-- What Are Cookies -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">1. What Are Cookies?</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">Cookies are small text files that are stored on your device (computer, tablet, or mobile phone) when you visit our website. They allow us to recognize your device and remember certain information about your visit.</p>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">Cookies are widely used to make websites work more efficiently and to provide information to website owners. They help us improve your browsing experience by:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed mt-4 space-y-2 break-words">
                        <li>Remembering your login details and preferences</li>
                        <li>Understanding how you use our website</li>
                        <li>Providing personalized content and recommendations</li>
                        <li>Ensuring website security and preventing fraud</li>
                    </ul>
                </div>

                <!-- Types of Cookies We Use -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">2. Types of Cookies We Use</h2>
                    
                    <div class="space-y-4 md:space-y-6">
                        <!-- Essential Cookies -->
                        <div class="bg-gray-50 rounded-xl p-4 md:p-6 border border-gray-100">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#c1121f] flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-lock text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">Essential Cookies</h3>
                                    <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed mb-3 break-words">These cookies are necessary for the website to function properly. They enable basic functionality such as page navigation, access to secure areas, and maintaining your session.</p>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="bg-green-100 text-green-700 text-[10px] md:text-xs font-semibold px-2 py-1 md:px-3 rounded-full">Required</span>
                                        <span class="text-gray-500 text-[10px] md:text-xs">Cannot be disabled</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Performance Cookies -->
                        <div class="bg-gray-50 rounded-xl p-4 md:p-6 border border-gray-100">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-chart-line text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">Performance Cookies</h3>
                                    <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed mb-3 break-words">These cookies collect information about how visitors use our website, such as which pages are visited most often and if users receive error messages. This helps us improve website performance.</p>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="bg-blue-100 text-blue-700 text-[10px] md:text-xs font-semibold px-2 py-1 md:px-3 rounded-full">Optional</span>
                                        <span class="text-gray-500 text-[10px] md:text-xs">Can be disabled</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Functionality Cookies -->
                        <div class="bg-gray-50 rounded-xl p-4 md:p-6 border border-gray-100">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#f5a524] flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-cogs text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">Functionality Cookies</h3>
                                    <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed mb-3 break-words">These cookies remember your choices and preferences to provide enhanced features, such as remembering your language selection or login information.</p>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="bg-blue-100 text-blue-700 text-[10px] md:text-xs font-semibold px-2 py-1 md:px-3 rounded-full">Optional</span>
                                        <span class="text-gray-500 text-[10px] md:text-xs">Can be disabled</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Marketing Cookies -->
                        <div class="bg-gray-50 rounded-xl p-4 md:p-6 border border-gray-100">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#c1121f] flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-bullhorn text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">Marketing Cookies</h3>
                                    <p class="text-[11px] md:text-sm text-gray-600 leading-relaxed mb-3 break-words">These cookies track your online activity to help us deliver relevant advertisements and measure the effectiveness of our marketing campaigns.</p>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="bg-blue-100 text-blue-700 text-[10px] md:text-xs font-semibold px-2 py-1 md:px-3 rounded-full">Optional</span>
                                        <span class="text-gray-500 text-[10px] md:text-xs">Can be disabled</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third-Party Cookies -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">3. Third-Party Cookies</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">We may allow third-party service providers to place cookies on your device for the following purposes:</p>
                    
                    <!-- FIXED: grid-cols-1 on mobile, sm:grid-cols-2 on desktop to prevent squishing -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                        <div class="bg-white border border-gray-200 rounded-lg p-4 md:p-5">
                            <h4 class="font-semibold text-[#091c3d] text-sm md:text-base mb-1 md:mb-2 break-words">Google Analytics</h4>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Website analytics and performance tracking</p>
                        </div>
                        
                        <div class="bg-white border border-gray-200 rounded-lg p-4 md:p-5">
                            <h4 class="font-semibold text-[#091c3d] text-sm md:text-base mb-1 md:mb-2 break-words">Facebook Pixel</h4>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Social media advertising and conversion tracking</p>
                        </div>
                        
                        <div class="bg-white border border-gray-200 rounded-lg p-4 md:p-5">
                            <h4 class="font-semibold text-[#091c3d] text-sm md:text-base mb-1 md:mb-2 break-words">Payment Processors</h4>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Secure payment processing and fraud prevention</p>
                        </div>
                        
                        <div class="bg-white border border-gray-200 rounded-lg p-4 md:p-5">
                            <h4 class="font-semibold text-[#091c3d] text-sm md:text-base mb-1 md:mb-2 break-words">YouTube/Vimeo</h4>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Video content delivery and playback</p>
                        </div>
                    </div>
                </div>

                <!-- Managing Cookies -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">4. Managing Your Cookie Preferences</h2>
                    
                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Browser Settings</h3>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">You can control and manage cookies in various ways through your browser settings. Please note that removing or blocking cookies may impact your user experience and prevent certain features from working properly.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <i class="fa-brands fa-chrome text-lg md:text-2xl text-gray-700 mt-1 shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Google Chrome</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Settings > Privacy and Security > Cookies and other site data</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <i class="fa-brands fa-firefox text-lg md:text-2xl text-gray-700 mt-1 shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Mozilla Firefox</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Options > Privacy & Security > Cookies and Site Data</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <i class="fa-brands fa-safari text-lg md:text-2xl text-gray-700 mt-1 shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Safari</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Preferences > Privacy > Manage Website Data</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <i class="fa-brands fa-edge text-lg md:text-2xl text-gray-700 mt-1 shrink-0"></i>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Microsoft Edge</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Settings > Cookies and site permissions > Manage cookies</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cookie Consent Banner -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">5. Our Cookie Consent Banner</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">When you first visit our website, you will see a cookie consent banner that allows you to:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>Accept All Cookies:</strong> Enable all cookie types for the best experience</li>
                        <li><strong>Reject Non-Essential Cookies:</strong> Only allow essential cookies</li>
                        <li><strong>Customize Preferences:</strong> Choose which cookie categories to enable</li>
                        <li><strong>Change Settings Later:</strong> Update your cookie preferences at any time</li>
                    </ul>
                    
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mt-4 break-words">Your cookie preferences will be saved for future visits. You can change your preferences by clicking the "Cookie Settings" link in the footer of our website.</p>
                </div>

                <!-- Updates to This Policy -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">6. Updates to This Policy</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">We may update this Cookie Policy from time to time to reflect changes in our practices, technology, or legal requirements. We will notify you of any material changes by posting the updated policy on our website and updating the "Last Updated" date.</p>
                </div>

                <!-- Contact -->
                <div class="bg-[#091c3d] text-white rounded-xl md:rounded-2xl p-6 md:p-8" data-aos="fade-up">
                    <h2 class="font-serif text-xl md:text-2xl font-bold mb-3 md:mb-4 break-words">Contact Us</h2>
                    <p class="text-gray-300 text-xs md:text-sm leading-relaxed mb-4 md:mb-6 break-words">If you have any questions about our use of cookies or this Cookie Policy, please contact us:</p>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-[#f5a524]"></i>
                            <span class="text-xs md:text-sm break-all md:break-words">info@goshenworkskill.com</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-[#f5a524]"></i>
                            <span class="text-xs md:text-sm break-words">+237 678 672 998 / +237 696 681 163</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-location-dot text-[#f5a524]"></i>
                            <span class="text-xs md:text-sm break-words">Main Campus, Cameroon</span>
                        </div>
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
                    offset: 100
                });
            }
        });
    </script>
</body>
</html>
