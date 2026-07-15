<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>Privacy Policy | Goshen Work Skill Association</title>
    <meta name="description" content="Read our Privacy Policy to understand how Goshen Work Skill Association collects, uses, and protects your personal information.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://127.0.0.1:8000/privacy">

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

    <!-- Privacy Policy Hero Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/privacy-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="Privacy Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent z-10"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 w-full text-left">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">Legal Information</p>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 text-white break-words">Privacy Policy</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-base max-w-xl leading-relaxed break-words">Your privacy matters to us. Learn how we collect, use, and protect your personal information.</p>
        </div>
    </section>

    <!-- Privacy Policy Content -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                
                <!-- Last Updated -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 md:p-6 mb-8 md:mb-12" data-aos="fade-up">
                    <p class="text-xs md:text-sm text-gray-600 break-words"><strong>Last Updated:</strong> January 1, 2026</p>
                    <p class="text-xs md:text-sm text-gray-600 mt-2 break-words">This Privacy Policy outlines how Goshen Work Skill Association collects, uses, and protects your personal information.</p>
                </div>

                <!-- Introduction -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">1. Introduction</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">Goshen Work Skill Association ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website, enroll in our courses, or interact with our services.</p>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">By using our services, you agree to the collection and use of information in accordance with this policy.</p>
                </div>

                <!-- Information We Collect -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">2. Information We Collect</h2>
                    
                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Personal Information</h3>
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed mb-6 space-y-2 break-words">
                        <li>Full name, date of birth, and contact details (email, phone, address)</li>
                        <li>Educational background and employment history</li>
                        <li>Payment information (processed securely through third-party payment processors)</li>
                        <li>Government-issued identification for certification purposes</li>
                        <li>Academic records and transcripts</li>
                    </ul>

                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Technical Information</h3>
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>IP address and browser type</li>
                        <li>Device information and operating system</li>
                        <li>Pages visited and time spent on our website</li>
                        <li>Cookies and similar tracking technologies</li>
                    </ul>
                </div>

                <!-- How We Use Your Information -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">3. How We Use Your Information</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 md:mb-6 break-words">We use your information for the following purposes:</p>
                    
                    <!-- FIXED: grid-cols-1 on mobile, sm:grid-cols-2 on desktop -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-user-graduate text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Educational Services</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Processing enrollments, managing course registrations, and issuing certificates</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-credit-card text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Payment Processing</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Processing payments and issuing receipts for course fees</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-envelope text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Communication</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Sending course updates, schedules, and important announcements</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-chart-line text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Service Improvement</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Analyzing usage patterns to improve our educational programs</p>
                        </div>
                    </div>
                </div>

                <!-- Data Sharing -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">4. Data Sharing & Disclosure</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">We do not sell your personal information. We may share your data only in the following circumstances:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>With Service Providers:</strong> Third-party companies that assist us in operating our platform (payment processors, email services, etc.)</li>
                        <li><strong>For Legal Compliance:</strong> When required by law, court order, or government regulation</li>
                        <li><strong>Certification Bodies:</strong> With accredited organizations for certification verification purposes</li>
                        <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of assets</li>
                    </ul>
                </div>

                <!-- Data Security -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">5. Data Security</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">We implement industry-standard security measures to protect your information:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>SSL/TLS encryption for data transmission</li>
                        <li>Secure password hashing and storage</li>
                        <li>Regular security audits and vulnerability assessments</li>
                        <li>Restricted access to personal data on a need-to-know basis</li>
                        <li>Secure backup systems and disaster recovery protocols</li>
                    </ul>
                </div>

                <!-- Your Rights -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">6. Your Privacy Rights</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">You have the following rights regarding your personal information:</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-eye text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Right to Access</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Request a copy of your personal data we hold</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-eraser text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Right to Delete</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Request deletion of your personal data (subject to legal obligations)</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-pen text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Right to Correct</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Update or correct inaccurate personal information</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-ban text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Right to Opt-Out</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Opt-out of marketing communications at any time</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cookies -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">7. Cookies & Tracking</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">We use cookies and similar technologies to enhance your browsing experience:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>Essential Cookies:</strong> Required for basic website functionality</li>
                        <li><strong>Analytics Cookies:</strong> Help us understand how visitors use our website</li>
                        <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements</li>
                    </ul>
                    
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mt-4 break-words">You can manage your cookie preferences through your browser settings. For detailed information, please refer to our <a href="/cookies" class="text-[#c1121f] hover:underline font-semibold">Cookie Policy</a>.</p>
                </div>

                <!-- Contact -->
                <div class="bg-[#091c3d] text-white rounded-xl md:rounded-2xl p-6 md:p-8" data-aos="fade-up">
                    <h2 class="font-serif text-xl md:text-2xl font-bold mb-3 md:mb-4 break-words">Contact Us</h2>
                    <p class="text-gray-300 text-xs md:text-sm leading-relaxed mb-4 md:mb-6 break-words">If you have any questions about this Privacy Policy or your personal information, please contact us:</p>
                    
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
