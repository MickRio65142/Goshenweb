<!-- resources/views/partials/footer.blade.php -->
<div wire:ignore class="w-full relative z-50">
    <footer class="bg-[#111212] text-gray-400 py-10 md:py-12 border-t border-white/5 w-full">
        <!-- FIXED: Changed to grid-cols-3 on mobile for a perfect 3x3 layout without empty gaps -->
        <div class="max-w-[1250px] mx-auto px-4 md:px-6 grid grid-cols-3 lg:grid-cols-5 gap-x-2 gap-y-8 md:gap-8 mb-8 md:mb-10">
            
            <!-- Logo & About (Forced to the left side, spans full width on mobile) -->
            <div class="col-span-3 lg:col-span-2 pr-0 md:pr-4 text-left flex flex-col items-start">
                <a href="/" class="block mb-4 w-max hover:opacity-80 transition duration-300">
    <!-- FIXED: Changed to root-relative path to bypass local URL resolution issues -->
    <div class="w-[160px] md:w-[210px] h-[60px] md:h-[80px] flex items-center justify-center overflow-hidden bg-white rounded-xl p-2 shadow-lg">
        <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/200x80/ffffff/091c3d?text=GWSA+LOGO'" class="w-full h-full object-contain scale-125" alt="Goshen Logo">
    </div>
</a>
                <span class="font-serif text-lg md:text-xl font-bold text-white mb-3 md:mb-4 block break-words">Goshen Work Skill<br><span class="text-[#c1121f] font-sans font-light text-xs md:text-sm">ASSOCIATION</span></span>
                <p class="mb-4 text-[11px] md:text-xs leading-relaxed max-w-sm break-words text-left">Empowering passionate individuals globally with premium vocational curricula in healthcare, hospitality, aviation, and safety.</p>
                <div class="flex gap-3 justify-start">
                    <a href="https://www.facebook.com/share/198T55UJdS/" target="_blank" class="w-7 h-7 md:w-8 md:h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#c1121f] hover:text-white transition"><i class="fa-brands fa-facebook-f text-[10px] md:text-xs"></i></a>
                    <a href="https://tiktok.com/@goshen.center.dou" target="_blank" class="w-7 h-7 md:w-8 md:h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#c1121f] hover:text-white transition"><i class="fa-brands fa-tiktok text-[10px] md:text-xs"></i></a>
                    <a href="mailto:info.goshenworkskill@gmail.com" class="w-7 h-7 md:w-8 md:h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#c1121f] hover:text-white transition"><i class="fa-solid fa-envelope text-[10px] md:text-xs"></i></a>
                    <a href="#" class="w-7 h-7 md:w-8 md:h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#c1121f] hover:text-white transition"><i class="fa-brands fa-linkedin-in text-[10px] md:text-xs"></i></a>
                </div>
            </div>
            
            <!-- Link Column 1 -->
            <div class="col-span-1">
                <h4 class="text-white font-serif text-xs md:text-sm mb-3">Company</h4>
                <ul class="space-y-2 text-[10px] md:text-[11px]">
                    <li><a href="/about-us" class="hover:text-[#c1121f] transition break-words">About Us</a></li>
                    <li><a href="/gallery" class="hover:text-[#c1121f] transition break-words">Gallery</a></li>
                    <li><a href="/trainers" class="hover:text-[#c1121f] transition break-words">Our Trainers</a></li>
                    <li><a href="/partners" class="hover:text-[#c1121f] transition break-words">Partners</a></li>
                    <li><a href="/careers" class="hover:text-[#c1121f] transition break-words">Careers & Jobs</a></li>
                </ul>
                <h4 class="text-white font-serif text-xs md:text-sm mt-5 md:mt-6 mb-3">Legal</h4>
                <ul class="space-y-2 text-[10px] md:text-[11px]">
                    <li><a href="/privacy" class="hover:text-[#c1121f] transition break-words">Privacy Policy</a></li>
                    <li><a href="/terms" class="hover:text-[#c1121f] transition break-words">Terms & Conditions</a></li>
                    <li><a href="/refunds" class="hover:text-[#c1121f] transition break-words">Refund Policy</a></li>
                    <li><a href="/cookies" class="hover:text-[#c1121f] transition break-words">Cookie Policy</a></li>
                </ul>
            </div>

            <!-- Link Column 2 -->
            <div class="col-span-1">
                <h4 class="text-white font-serif text-xs md:text-sm mb-3">Students</h4>
                <ul class="space-y-2 text-[10px] md:text-[11px]">
                    <li><a href="/student" class="hover:text-[#c1121f] transition break-words">Student Login</a></li>
                    <li><a href="/packages" class="hover:text-[#c1121f] transition break-words">Register Account</a></li>
                    <li><a href="/student" class="hover:text-[#c1121f] transition break-words">Student Dashboard</a></li>
                    <li><a href="/student" class="hover:text-[#c1121f] transition break-words">My Certificates</a></li>
                    <li><a href="/certificates/verify" class="hover:text-[#c1121f] transition break-words">Verify Certificate</a></li>
                </ul>
                <h4 class="text-white font-serif text-xs md:text-sm mt-5 md:mt-6 mb-3">Resources</h4>
                <ul class="space-y-2 text-[10px] md:text-[11px]">
                    <li><a href="/blog" class="hover:text-[#c1121f] transition break-words">Blog</a></li>
                    <li><a href="/career-guides" class="hover:text-[#c1121f] transition break-words">Career Guides</a></li>
                    <li><a href="/downloads" class="hover:text-[#c1121f] transition break-words">Download Centre</a></li>
                </ul>
            </div>

            <!-- Link Column 3 -->
            <div class="col-span-1">
                <h4 class="text-white font-serif text-xs md:text-sm mb-3">Courses</h4>
                <ul class="space-y-2 text-[10px] md:text-[11px]">
                    <li><a href="/courses" class="hover:text-[#c1121f] transition break-words">All Courses</a></li>
                    <li><a href="/packages" class="hover:text-[#c1121f] transition break-words">Course Packages</a></li>
                    <li><a href="/certifications" class="hover:text-[#c1121f] transition break-words">Certifications</a></li>
                    <li><a href="/events" class="hover:text-[#c1121f] transition break-words">Workshops</a></li>
                </ul>
                <h4 class="text-white font-serif text-xs md:text-sm mt-5 md:mt-6 mb-3">Support</h4>
                <ul class="space-y-2 text-[10px] md:text-[11px]">
                    <li><a href="/help" class="hover:text-[#c1121f] transition break-words">Help Center</a></li>
                    <li><a href="/faqs" class="hover:text-[#c1121f] transition break-words">FAQs</a></li>
                    <li><a href="/contact-us" class="hover:text-[#c1121f] transition break-words">Contact Support</a></li>
                    <li><a href="/ticket" class="hover:text-[#c1121f] transition break-words">Submit a Ticket</a></li>
                    <li><a href="#" class="hover:text-[#c1121f] transition break-words">Live Chat</a></li>
                </ul>
            </div>

        </div>
        
        <!-- Bottom Copyright Bar (Also aligned to the left on mobile) -->
        <div class="max-w-[1250px] mx-auto px-4 md:px-6 pt-5 md:pt-6 border-t border-white/5 text-[9px] md:text-[11px] flex flex-col md:flex-row justify-between items-start md:items-center gap-3 md:gap-4 text-left">
            <p class="break-words">&copy; {{ date('Y') }} Goshen Work Skill Association. All rights reserved.</p>
            <div class="flex flex-wrap justify-start md:justify-end gap-x-3 gap-y-1 md:gap-x-4">
                <a href="/admin/login" class="hover:text-white transition break-words text-[9px] md:text-[11px]">Admin Portal</a>
                <a href="mailto:Info@goshenworkskill.com" class="hover:text-white transition break-words text-[9px] md:text-[11px]">Info@goshenworkskill.com</a>
                <a href="mailto:Admin@goshenworkskill.com" class="hover:text-white transition break-words text-[9px] md:text-[11px]">Admin@goshenworkskill.com</a>
                <a href="mailto:Douala@goshenworkskill.com" class="hover:text-white transition break-words text-[9px] md:text-[11px]">Douala@goshenworkskill.com</a>
                <a href="mailto:Limbe@goshenworkskill.com" class="hover:text-white transition break-words text-[9px] md:text-[11px]">Limbe@goshenworkskill.com</a>
                <a href="mailto:Jobsabroad@goshenworkskill.com" class="hover:text-white transition break-words text-[9px] md:text-[11px]">Jobsabroad@goshenworkskill.com</a>
            </div>
        </div>
    </footer>
</div>