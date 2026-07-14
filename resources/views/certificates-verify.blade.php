<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Certificate Verification | Goshen Work Skill Association</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">
    @include('partials.header')

    <!-- HERO BANNER -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#f5a524]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/cert-verify-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-80" alt="Certificate Verification">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Certificate Verification</span>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">Verify a<br><span class="text-[#f5a524] italic">Certificate</span></h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed drop-shadow-md break-words">Enter a certificate number to verify its authenticity. Employers and institutions can confirm the credentials of any Goshen graduate.</p>
        </div>
    </section>

    <!-- VERIFICATION FORM -->
    <section class="py-16 md:py-24 bg-white relative">
        <div class="max-w-2xl mx-auto px-4 md:px-6">
            <div class="bg-gray-50 p-6 md:p-10 rounded-2xl md:rounded-3xl border border-gray-100 shadow-sm" data-aos="fade-up">
                <form method="GET" action="/certificates/verify" class="flex flex-col sm:flex-row gap-3 md:gap-4">
                    <div class="flex-1">
                        <label for="certificate_number" class="block text-[10px] md:text-xs font-bold text-[#091c3d] uppercase tracking-wider mb-2">Certificate Number</label>
                        <input type="text" id="certificate_number" name="certificate_number" value="{{ request('certificate_number') }}" placeholder="e.g., GOS-2026-0001" class="w-full px-4 py-3 md:px-5 md:py-3.5 border border-gray-200 rounded-xl text-xs md:text-sm focus:ring-2 focus:ring-[#c1121f] focus:border-transparent outline-none transition">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full sm:w-auto px-6 py-3 md:px-8 md:py-3.5 bg-[#091c3d] hover:bg-[#c1121f] text-white text-xs md:text-sm font-bold rounded-xl transition shadow-md whitespace-nowrap">
                            <i class="fa-solid fa-search mr-2"></i> Verify
                        </button>
                    </div>
                </form>
            </div>

            <!-- RESULT -->
            @if($searched)
                <div class="mt-8 md:mt-10" data-aos="fade-up">
                    @if($certificate)
                        <div class="bg-green-50 border border-green-200 rounded-2xl md:rounded-3xl p-6 md:p-10 text-center">
                            <div class="w-16 h-16 md:w-20 md:h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4 md:mb-6">
                                <i class="fa-solid fa-check-circle text-3xl md:text-4xl text-green-600"></i>
                            </div>
                            <h2 class="font-serif text-xl md:text-3xl font-bold text-green-800 mb-2">Certificate Verified</h2>
                            <p class="text-green-600 text-xs md:text-sm mb-6 md:mb-8">This certificate is authentic and issued by Goshen Work Skill Association.</p>
                            <div class="max-w-md mx-auto space-y-3 md:space-y-4 text-left bg-white rounded-xl md:rounded-2xl p-4 md:p-6 border border-green-100">
                                <div class="flex justify-between items-center py-2 border-b border-gray-50">
                                    <span class="text-[10px] md:text-xs font-bold text-gray-500 uppercase">Student Name</span>
                                    <span class="text-xs md:text-sm font-bold text-[#091c3d]">{{ $certificate->user->name }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-50">
                                    <span class="text-[10px] md:text-xs font-bold text-gray-500 uppercase">Course</span>
                                    <span class="text-xs md:text-sm font-bold text-[#091c3d]">{{ $certificate->course->title ?? $certificate->course->name }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-50">
                                    <span class="text-[10px] md:text-xs font-bold text-gray-500 uppercase">Certificate No.</span>
                                    <span class="text-xs md:text-sm font-bold text-[#091c3d]">{{ $certificate->certificate_number }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-[10px] md:text-xs font-bold text-gray-500 uppercase">Issue Date</span>
                                    <span class="text-xs md:text-sm font-bold text-[#091c3d]">{{ $certificate->issue_date->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <div class="mt-6 md:mt-8 flex items-center justify-center gap-2 text-[10px] md:text-xs text-gray-400">
                                <i class="fa-solid fa-shield-halved text-green-600"></i>
                                <span>Verified by Goshen Work Skill Association &mdash; {{ now()->format('M d, Y') }}</span>
                            </div>
                        </div>
                    @else
                        <div class="bg-red-50 border border-red-200 rounded-2xl md:rounded-3xl p-6 md:p-10 text-center">
                            <div class="w-16 h-16 md:w-20 md:h-20 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4 md:mb-6">
                                <i class="fa-solid fa-xmark-circle text-3xl md:text-4xl text-red-600"></i>
                            </div>
                            <h2 class="font-serif text-xl md:text-2xl font-bold text-red-800 mb-2">Certificate Not Found</h2>
                            <p class="text-red-600 text-xs md:text-sm max-w-md mx-auto break-words">No matching certificate was found. Please check the certificate number and try again. If the issue persists, contact our admissions office.</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- INFO SECTION -->
    <section class="py-16 md:py-20 bg-[#fff7f2] border-t border-gray-100">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 text-center" data-aos="fade-up">
                    <div class="w-12 h-12 md:w-14 md:h-14 mx-auto bg-[#091c3d] rounded-full flex items-center justify-center mb-4">
                        <i class="fa-solid fa-shield text-white text-lg md:text-xl"></i>
                    </div>
                    <h3 class="font-serif text-base md:text-lg font-bold text-[#091c3d] mb-2">Secure Verification</h3>
                    <p class="text-gray-500 text-[11px] md:text-xs leading-relaxed break-words">Each certificate has a unique number that can be verified instantly by employers and institutions worldwide.</p>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 md:w-14 md:h-14 mx-auto bg-[#c1121f] rounded-full flex items-center justify-center mb-4">
                        <i class="fa-solid fa-award text-white text-lg md:text-xl"></i>
                    </div>
                    <h3 class="font-serif text-base md:text-lg font-bold text-[#091c3d] mb-2">Globally Recognized</h3>
                    <p class="text-gray-500 text-[11px] md:text-xs leading-relaxed break-words">Our CPD-certified programs ensure your credentials meet international education and employment standards.</p>
                </div>
                <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 md:w-14 md:h-14 mx-auto bg-[#f5a524] rounded-full flex items-center justify-center mb-4">
                        <i class="fa-solid fa-download text-white text-lg md:text-xl"></i>
                    </div>
                    <h3 class="font-serif text-base md:text-lg font-bold text-[#091c3d] mb-2">Student Download</h3>
                    <p class="text-gray-500 text-[11px] md:text-xs leading-relaxed break-words">Students can download their certificates directly from the student dashboard after logging into their account.</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
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
