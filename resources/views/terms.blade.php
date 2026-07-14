<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>Terms & Conditions | Goshen Work Skill Association</title>
    <meta name="description" content="Read our Terms & Conditions to understand the rules and regulations governing your use of Goshen Work Skill Association's services.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://127.0.0.1:8000/terms">

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

    <!-- Terms & Conditions Hero Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/terms-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="Terms Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent z-10"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 w-full text-left">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">Legal Information</p>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 text-white break-words">Terms & Conditions</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-base max-w-xl leading-relaxed break-words">Please read these terms carefully before enrolling in our courses or using our services.</p>
        </div>
    </section>

    <!-- Terms & Conditions Content -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                
                <!-- Last Updated -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 md:p-6 mb-8 md:mb-12" data-aos="fade-up">
                    <p class="text-xs md:text-sm text-gray-600 break-words"><strong>Last Updated:</strong> January 1, 2026</p>
                    <p class="text-xs md:text-sm text-gray-600 mt-2 break-words">These Terms & Conditions govern your use of Goshen Work Skill Association's website, courses, and services.</p>
                </div>

                <!-- Acceptance of Terms -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">1. Acceptance of Terms</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">By accessing or using our website, enrolling in courses, or utilizing any services provided by Goshen Work Skill Association, you agree to be bound by these Terms & Conditions. If you do not agree with any part of these terms, you must not use our services.</p>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">We reserve the right to modify these terms at any time. Continued use of our services after changes constitutes acceptance of the updated terms.</p>
                </div>

                <!-- Enrollment & Registration -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">2. Enrollment & Registration</h2>
                    
                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Registration Requirements</h3>
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed mb-6 space-y-2 break-words">
                        <li>You must be at least 18 years old to enroll, or have parental/guardian consent</li>
                        <li>Provide accurate, complete, and current information during registration</li>
                        <li>Submit required documentation (ID, educational certificates, etc.)</li>
                        <li>Pay applicable course fees in full or according to payment plans</li>
                    </ul>

                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Course Placement</h3>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">Goshen Work Skill Association reserves the right to assess student eligibility and place students in appropriate course levels based on prior education and experience.</p>
                </div>

                <!-- Course Fees & Payment -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">3. Course Fees & Payment</h2>
                    
                    <!-- FIXED: grid-cols-1 for mobile so boxes don't squash, sm:grid-cols-2 for desktop -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mb-6">
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-money-bill-wave text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Payment Terms</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">All fees must be paid before course commencement unless a payment plan is approved in writing</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-shield-halved text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Secure Payments</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Payments are processed through secure third-party payment processors</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-percent text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Fee Changes</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">We reserve the right to modify course fees with reasonable notice</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-file-invoice-dollar text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Additional Costs</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Some courses may require additional materials, equipment, or examination fees</p>
                        </div>
                    </div>
                </div>

                <!-- Student Conduct -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">4. Student Conduct & Responsibilities</h2>
                    
                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Expected Behavior</h3>
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed mb-6 space-y-2 break-words">
                        <li>Attend all scheduled classes and practical sessions punctually</li>
                        <li>Maintain professional conduct towards instructors, staff, and fellow students</li>
                        <li>Respect all equipment, facilities, and learning materials</li>
                        <li>Complete assignments and assessments on time</li>
                        <li>Adhere to the institution's code of ethics and professional standards</li>
                    </ul>

                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-3 md:mb-4 break-words">Prohibited Actions</h3>
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>Academic dishonesty, plagiarism, or cheating on examinations</li>
                        <li>Disruptive behavior that interferes with the learning environment</li>
                        <li>Unauthorized use or reproduction of course materials</li>
                        <li>Harassment, discrimination, or any form of misconduct</li>
                    </ul>
                </div>

                <!-- Attendance & Completion -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">5. Attendance & Course Completion</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">Students are required to maintain minimum attendance requirements as specified for each course:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>Theory Classes:</strong> Minimum 75% attendance required</li>
                        <li><strong>Practical Sessions:</strong> Minimum 85% attendance required</li>
                        <li><strong>Clinical/Field Training:</strong> 100% attendance mandatory</li>
                    </ul>
                    
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mt-4 break-words">Failure to meet attendance requirements may result in course termination without refund. Certificates are only awarded upon successful completion of all course requirements.</p>
                </div>

                <!-- Certification -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">6. Certification & Accreditation</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-certificate text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Certificate Issuance</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Certificates are awarded upon successful completion of all course components, including examinations and practical assessments</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-award text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Accreditation</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Our courses are accredited by relevant professional bodies. Accreditation status may vary by program and location</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                <i class="fa-solid fa-check-double text-[#c1121f] text-sm md:text-base"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Verification</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Certificates may be verified by employers and institutions through our official verification system</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Refund Policy -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">7. Refund Policy</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">Our refund policy is designed to be fair while protecting the integrity of our educational programs:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>Before Course Start:</strong> Full refund minus 10% administrative fee</li>
                        <li><strong>Within First Week:</strong> 75% refund of remaining course fees</li>
                        <li><strong>After First Week:</strong> No refunds available</li>
                        <li><strong>Course Cancellation:</strong> Full refund if we cancel the course</li>
                    </ul>
                    
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mt-4 break-words">For detailed information, please refer to our <a href="/refunds" class="text-[#c1121f] hover:underline font-semibold">Refund Policy</a>.</p>
                </div>

                <!-- Intellectual Property -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">8. Intellectual Property</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">All course materials, including but not limited to textbooks, lecture notes, videos, presentations, and assessments, are the intellectual property of Goshen Work Skill Association.</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>Materials are provided for personal educational use only</li>
                        <li>Reproduction, distribution, or commercial use is strictly prohibited</li>
                        <li>Unauthorized sharing may result in legal action and course termination</li>
                    </ul>
                </div>

                <!-- Limitation of Liability -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">9. Limitation of Liability</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">Goshen Work Skill Association shall not be liable for any indirect, incidental, special, or consequential damages arising from:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>Use or inability to use our services</li>
                        <li>Course cancellations or schedule changes</li>
                        <li>Loss of data or information</li>
                        <li>Third-party actions or events beyond our control</li>
                    </ul>
                </div>

                <!-- Governing Law -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">10. Governing Law</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">These Terms & Conditions shall be governed by and construed in accordance with the laws of Cameroon. Any disputes arising under these terms shall be subject to the exclusive jurisdiction of the courts of Cameroon.</p>
                </div>

                <!-- Contact -->
                <div class="bg-[#091c3d] text-white rounded-xl md:rounded-2xl p-6 md:p-8" data-aos="fade-up">
                    <h2 class="font-serif text-xl md:text-2xl font-bold mb-3 md:mb-4 break-words">Contact Us</h2>
                    <p class="text-gray-300 text-xs md:text-sm leading-relaxed mb-4 md:mb-6 break-words">If you have any questions about these Terms & Conditions, please contact us:</p>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-[#f5a524]"></i>
                            <span class="text-xs md:text-sm break-all md:break-words">info@goshenworkskill.com</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-[#f5a524]"></i>
                            <span class="text-xs md:text-sm break-words">+237 679 20 22 65</span>
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
