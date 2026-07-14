<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <!-- ADDED MAXIMUM-SCALE TO PREVENT MOBILE ZOOM BREAKING -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>Refund Policy | Goshen Work Skill Association</title>
    <meta name="description" content="Read our Refund Policy to understand the terms and conditions for course refunds and cancellations at Goshen Work Skill Association.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://127.0.0.1:8000/refunds">

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

    <!-- Refund Policy Hero Section -->
    <section class="relative py-16 md:py-24 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/refunds-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-100" alt="Refund Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent z-10"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 w-full text-left">
            <p class="text-[#f5a524] font-bold uppercase tracking-wider text-[10px] md:text-xs mb-2 md:mb-3">Financial Information</p>
            <h1 class="font-serif text-3xl md:text-5xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 text-white break-words">Refund Policy</h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-base max-w-xl leading-relaxed break-words">Our transparent refund policy designed to protect both students and the integrity of our educational programs.</p>
        </div>
    </section>

    <!-- Refund Policy Content -->
    <section class="py-12 md:py-20 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="max-w-4xl mx-auto">
                
                <!-- Last Updated -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 md:p-6 mb-8 md:mb-12" data-aos="fade-up">
                    <p class="text-xs md:text-sm text-gray-600 break-words"><strong>Last Updated:</strong> January 1, 2026</p>
                    <p class="text-xs md:text-sm text-gray-600 mt-2 break-words">This Refund Policy outlines the terms and conditions for course refunds and cancellations at Goshen Work Skill Association.</p>
                </div>

                <!-- General Policy -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">1. General Refund Policy</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">At Goshen Work Skill Association, we understand that circumstances may change. Our refund policy is designed to be fair while protecting the integrity of our educational programs and ensuring quality for all students.</p>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed break-words">All refund requests must be submitted in writing via email to info@goshenworkskill.com or through our student portal. Refunds are processed within 14-21 business days from approval.</p>
                </div>

                <!-- Refund Schedule -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">2. Refund Schedule</h2>
                    
                    <div class="space-y-4">
                        <!-- Before Course Start -->
                        <div class="bg-green-50 border-l-4 border-green-500 rounded-r-xl p-4 md:p-6">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-green-500 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-calendar-check text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">Before Course Commencement</h3>
                                    <p class="text-gray-600 text-[11px] md:text-sm leading-relaxed mb-2 break-words">Full refund of course fees, minus a 10% administrative fee.</p>
                                    <p class="text-green-700 text-[11px] md:text-sm font-semibold break-words">Refund: 90% of total fees</p>
                                </div>
                            </div>
                        </div>

                        <!-- Within First Week -->
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-r-xl p-4 md:p-6">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-yellow-500 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-clock text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">Within First Week of Course</h3>
                                    <p class="text-gray-600 text-[11px] md:text-sm leading-relaxed mb-2 break-words">75% refund of remaining course fees after administrative deduction.</p>
                                    <p class="text-yellow-700 text-[11px] md:text-sm font-semibold break-words">Refund: 75% of remaining fees</p>
                                </div>
                            </div>
                        </div>

                        <!-- After First Week -->
                        <div class="bg-red-50 border-l-4 border-red-500 rounded-r-xl p-4 md:p-6">
                            <div class="flex items-start gap-3 md:gap-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-red-500 flex items-center justify-center shrink-0 mt-1 md:mt-0">
                                    <i class="fa-solid fa-ban text-white text-sm md:text-base"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg md:text-xl text-[#091c3d] mb-1 md:mb-2 break-words">After First Week of Course</h3>
                                    <p class="text-gray-600 text-[11px] md:text-sm leading-relaxed mb-2 break-words">No refunds available as course materials and resources have been allocated.</p>
                                    <p class="text-red-700 text-[11px] md:text-sm font-semibold break-words">Refund: Not applicable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Cancellation -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">3. Course Cancellation by GWSA</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">In the unlikely event that Goshen Work Skill Association cancels a course:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>Full Refund:</strong> 100% of all fees paid will be refunded</li>
                        <li><strong>Alternative Options:</strong> Students may choose to transfer to another available course</li>
                        <li><strong>Notification:</strong> Students will be notified at least 7 days before the scheduled start date</li>
                        <li><strong>Processing Time:</strong> Refunds processed within 7-10 business days</li>
                    </ul>
                </div>

                <!-- Non-Refundable Items -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">4. Non-Refundable Items</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">The following items are non-refundable under any circumstances:</p>
                    
                    <!-- FIXED: grid-cols-1 for mobile, sm:grid-cols-2 for desktop to prevent squishing -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-file-invoice text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Application Fees</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">One-time registration and application processing fees</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-book text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Study Materials</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">Textbooks, course materials, and equipment already distributed</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-id-card text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Certification Fees</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">External examination and certification body fees</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 md:p-5 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-2 md:gap-3 mb-2">
                                <i class="fa-solid fa-user-tie text-[#c1121f]"></i>
                                <h4 class="font-semibold text-[#091c3d] text-sm md:text-base break-words">Administrative Costs</h4>
                            </div>
                            <p class="text-[11px] md:text-sm text-gray-600 break-words">10% administrative fee on all eligible refunds</p>
                        </div>
                    </div>
                </div>

                <!-- Refund Process -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">5. Refund Request Process</h2>
                    
                    <div class="space-y-5 md:space-y-6">
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0 text-white font-bold text-sm mt-1 md:mt-0">1</div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] mb-1 text-sm md:text-base break-words">Submit Written Request</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Send refund request to info@goshenworkskill.com with student ID, course name, and reason for withdrawal</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0 text-white font-bold text-sm mt-1 md:mt-0">2</div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] mb-1 text-sm md:text-base break-words">Review and Verification</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Our team reviews the request within 3-5 business days and verifies eligibility</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0 text-white font-bold text-sm mt-1 md:mt-0">3</div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] mb-1 text-sm md:text-base break-words">Approval Notification</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Student receives approval email with refund amount and processing timeline</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#091c3d] flex items-center justify-center shrink-0 text-white font-bold text-sm mt-1 md:mt-0">4</div>
                            <div>
                                <h4 class="font-semibold text-[#091c3d] mb-1 text-sm md:text-base break-words">Refund Processing</h4>
                                <p class="text-[11px] md:text-sm text-gray-600 break-words">Refund processed to original payment method within 14-21 business days</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Circumstances -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">6. Special Circumstances</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">We understand that exceptional situations may arise. The following circumstances may be considered for special refund consideration:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li><strong>Medical Emergencies:</strong> With valid medical documentation from a licensed physician</li>
                        <li><strong>Military Service:</strong> For students called to active military duty</li>
                        <li><strong>Death in Family:</strong> Bereavement requiring immediate attention</li>
                        <li><strong>Relocation:</strong> Moving to a location where course attendance is impossible</li>
                    </ul>
                    
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mt-4 break-words">Special circumstance requests must be accompanied by supporting documentation and are reviewed on a case-by-case basis.</p>
                </div>

                <!-- Payment Plan Refunds -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">7. Payment Plan Refunds</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">For students enrolled in payment plans:</p>
                    
                    <ul class="list-disc pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>Refund amount is calculated based on total amount paid to date</li>
                        <li>Outstanding payments are cancelled upon refund approval</li>
                        <li>Administrative fee applies to total course value, not just paid amount</li>
                        <li>Same refund schedule applies based on course start date</li>
                    </ul>
                </div>

                <!-- Dispute Resolution -->
                <div class="mb-10 md:mb-12" data-aos="fade-up">
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">8. Dispute Resolution</h2>
                    <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4 break-words">If you disagree with a refund decision:</p>
                    
                    <ol class="list-decimal pl-5 md:pl-6 text-xs md:text-sm text-gray-600 leading-relaxed space-y-2 break-words">
                        <li>Submit a written appeal to the Finance Department within 7 days of decision</li>
                        <li>Include all relevant documentation and additional information</li>
                        <li>Appeals are reviewed by senior management within 5-7 business days</li>
                        <li>Final decisions are communicated in writing and are binding</li>
                    </ol>
                </div>

                <!-- Contact -->
                <div class="bg-[#091c3d] text-white rounded-xl md:rounded-2xl p-6 md:p-8" data-aos="fade-up">
                    <h2 class="font-serif text-xl md:text-2xl font-bold mb-3 md:mb-4 break-words">Contact Us</h2>
                    <p class="text-gray-300 text-xs md:text-sm leading-relaxed mb-4 md:mb-6 break-words">If you have any questions about our Refund Policy or need to submit a refund request, please contact us:</p>
                    
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
                    duration: 800,
                    once: true,
                    offset: 100
                });
            }
        });
    </script>
</body>
</html>
