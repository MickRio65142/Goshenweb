<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $package['title'] }} | Goshen Packages</title>
    <meta name="description" content="{{ $package['subtitle'] }} — {{ $package['price'] }}. Enroll today at Goshen Work Skill Association.">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .hover-image-elegant { transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1), filter 0.8s ease; }
        .group:hover .hover-image-elegant { transform: scale(1.08); }
    </style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 antialiased overflow-x-hidden selection:bg-[#c1121f] selection:text-white">
    @include('partials.header')

    <!-- HERO -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset($package['hero_image']) }}" onerror="this.src='https://placehold.co/1200x600/091c3d/ffffff?text=Goshen'" class="w-full h-full object-cover opacity-50" alt="{{ $package['title'] }}">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent"></div>
        <div class="relative z-10 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-left w-full" data-aos="fade-right">
            <div class="flex items-center gap-2 text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[8px]"></i></span>
                <a href="/packages" class="hover:text-white transition">Packages</a>
                <span><i class="fa-solid fa-chevron-right text-[8px]"></i></span>
                <span class="text-white">{{ $package['title'] }}</span>
            </div>
            <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#f5a524] mb-2 inline-block">{{ $slug === 'gold' ? 'Multi-Course Bundle' : ($slug === 'healthcare' ? 'Healthcare Bundle' : 'Service & Aviation Bundle') }}</span>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold text-white leading-tight mb-4 md:mb-6 break-words">{{ $package['title'] }}</h1>
            <p class="text-gray-200 text-sm md:text-lg max-w-2xl leading-relaxed break-words">{{ $package['subtitle'] }}</p>
            <div class="flex flex-wrap items-center gap-3 md:gap-4 mt-6 md:mt-8">
                <span class="text-3xl md:text-5xl font-black text-[#f5a524]">{{ $package['price'] }}</span>
                <span class="text-white/60 text-xs md:text-sm">|</span>
                <span class="text-white text-sm md:text-base font-medium"><i class="fa-regular fa-clock mr-1 md:mr-2"></i> {{ $package['duration'] }}</span>
            </div>
            @if($slug === 'gold')
            <div class="mt-8">
                <a href="#build" class="inline-block bg-[#f5a524] text-[#091c3d] px-8 py-4 rounded-xl font-black text-sm uppercase tracking-wider hover:bg-white hover:text-[#091c3d] transition-all shadow-xl pulse">Build Your Bundle Now &darr;</a>
            </div>
            @else
            <div class="mt-6 md:mt-8 flex flex-wrap gap-3 md:gap-4">
                <a href="/register/{{ $slug }}" class="inline-block bg-[#c1121f] text-white px-6 md:px-8 py-3.5 md:py-4 rounded-xl font-bold text-xs md:text-sm uppercase tracking-wider hover:bg-white hover:text-[#c1121f] transition-all shadow-xl">Enroll Now</a>
                <a href="/contact-us" class="inline-block border-2 border-white/40 text-white px-6 md:px-8 py-3.5 md:py-4 rounded-xl font-bold text-xs md:text-sm uppercase tracking-wider hover:bg-white hover:text-[#091c3d] transition">Request Info</a>
            </div>
            @endif
        </div>
    </section>

    <!-- PACKAGE OVERVIEW -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-start">
            <div data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Overview</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold mb-4 md:mb-6 break-words">What's Included</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mb-6 md:mb-8"></div>
                <div class="prose prose-sm md:prose-base max-w-none text-gray-600 mb-6 md:mb-8 leading-relaxed break-words">
                    {!! $package['description'] !!}
                </div>
                <div class="flex flex-wrap gap-3 md:gap-4">
                    @if(isset($package['highlights']))
                        @foreach($package['highlights'] as $h)
                            <span class="bg-[#091c3d]/5 text-[#091c3d] px-3 py-1.5 md:px-4 md:py-2 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider border border-[#091c3d]/10">{{ $h }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            @if(count($includedCourses))
            <div class="bg-gray-50 rounded-2xl md:rounded-3xl p-6 md:p-10 border border-gray-100" data-aos="fade-left">
                <h3 class="font-bold text-xl md:text-2xl text-[#091c3d] mb-6 md:mb-8 break-words"><i class="fa-solid fa-list-check text-[#c1121f] mr-2"></i> Courses in This Package</h3>
                <ul class="space-y-4 md:space-y-5">
                    @foreach($includedCourses as $course)
                    <li class="flex items-start gap-3 md:gap-4 pb-4 md:pb-5 border-b border-gray-200 last:border-b-0 last:pb-0">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#c1121f]/10 flex items-center justify-center shrink-0 mt-0.5">
                            <i class="fa-solid fa-book-open text-[10px] md:text-xs text-[#c1121f]"></i>
                        </div>
                        <div class="min-w-0">
                            <a href="/courses/{{ $course['slug'] }}" class="font-bold text-sm md:text-base text-[#091c3d] hover:text-[#c1121f] transition break-words">{{ $course['title'] }}</a>
                            <p class="text-[11px] md:text-xs text-gray-500 mt-0.5 break-words">{{ $course['duration'] ?? 'Accredited Program' }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </section>

    <!-- MODULES (non-Gold) -->
    @if($slug !== 'gold' && isset($package['modules']) && count($package['modules']))
    <section class="py-16 md:py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Curriculum</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">What You'll Learn</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @foreach($package['modules'] as $module)
                <div class="bg-white p-5 md:p-8 rounded-2xl border border-gray-100 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#091c3d] flex items-center justify-center mb-3 md:mb-4">
                        <i class="fa-solid {{ $module['icon'] ?? 'fa-book' }} text-[#f5a524] text-sm md:text-base"></i>
                    </div>
                    <h4 class="font-bold text-[#091c3d] text-base md:text-lg mb-2 break-words">{{ $module['title'] }}</h4>
                    <p class="text-[11px] md:text-sm text-gray-500 leading-relaxed break-words">{{ $module['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- KEY HIGHLIGHTS -->
    @if(isset($package['highlights']) && count($package['highlights']))
    <section class="py-16 md:py-24 bg-white border-t border-gray-100">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Why Choose This</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">Package Highlights</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @foreach($package['highlights'] as $pt)
                <div class="flex items-start gap-3 md:gap-4 p-4 md:p-6 bg-gray-50 rounded-xl md:rounded-2xl hover:bg-[#091c3d] hover:text-white transition-all duration-300 group cursor-default" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <i class="fa-solid fa-circle-check text-emerald-500 group-hover:text-emerald-300 mt-1 shrink-0"></i>
                    <span class="text-[11px] md:text-sm font-medium leading-relaxed break-words">{{ $pt }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- GOLD: Alpine.js COURSE SELECTOR -->
    @if($slug === 'gold')
    <section id="build" class="py-16 md:py-24 bg-gray-50 border-t border-gray-100" x-data="goldSelector()">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">Build Your Bundle</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">Select 6+ Courses</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
                <p class="text-gray-500 mt-4 md:mt-6 max-w-2xl mx-auto text-[11px] md:text-sm break-words">Choose at least 6 courses from the list below. You can mix across categories — the Gold bundle price covers them all.</p>
                <div class="mt-4 inline-block bg-[#091c3d] text-white px-6 py-3 rounded-xl font-black text-lg md:text-2xl">
                    <span x-text="selected.length"></span> / <span>6</span> courses selected
                    <template x-if="selected.length >= 6">
                        <span class="text-emerald-400 ml-2"><i class="fa-solid fa-check-circle"></i> Minimum met</span>
                    </template>
                    <template x-if="selected.length < 6">
                        <span class="text-[#f5a524] ml-2">(min. 6 required)</span>
                    </template>
                </div>
            </div>

            <!-- CATEGORY FILTER -->
            <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-8 md:mb-12">
                <template x-for="cat in categories" :key="cat">
                    <button @click="activeCategory = cat"
                            :class="activeCategory === cat ? 'bg-[#091c3d] text-white shadow-lg' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#091c3d]'"
                            class="px-4 py-2 md:px-6 md:py-2.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider transition-all duration-300"
                            x-text="cat === 'all' ? 'All Courses' : cat">
                    </button>
                </template>
            </div>

            <!-- COURSE GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <template x-for="course in filteredCourses" :key="course.slug">
                    <div @click="toggle(course.slug)"
                         :class="isSelected(course.slug) ? 'ring-2 ring-[#c1121f] bg-red-50 border-[#c1121f]' : 'bg-white border-gray-100 hover:border-[#091c3d] hover:shadow-md'"
                         class="p-4 md:p-6 rounded-xl md:rounded-2xl border cursor-pointer transition-all duration-200">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0 flex-1">
                                <h4 class="font-bold text-sm md:text-base text-[#091c3d] break-words" x-text="course.title"></h4>
                                <p class="text-[10px] md:text-xs text-gray-500 mt-1" x-text="course.duration || 'Accredited Program'"></p>
                                <p class="text-[10px] md:text-xs text-gray-400 mt-1 uppercase tracking-wider" x-text="course.category"></p>
                            </div>
                            <div class="shrink-0">
                                <template x-if="isSelected(course.slug)">
                                    <div class="w-6 h-6 md:w-7 md:h-7 rounded-full bg-[#c1121f] flex items-center justify-center text-white text-xs"><i class="fa-solid fa-check"></i></div>
                                </template>
                                <template x-if="!isSelected(course.slug)">
                                    <div class="w-6 h-6 md:w-7 md:h-7 rounded-full border-2 border-gray-300"></div>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="text-center mt-10 md:mt-16" data-aos="fade-up">
                <a :href="'/' + 'register/gold?courses=' + selected.join(',')"
                   @click.prevent="selected.length >= 6 ? (window.location.href = '/' + 'register/gold?courses=' + selected.join(',')) : alert('Please select at least 6 courses.')"
                   class="inline-block bg-[#f5a524] text-[#091c3d] px-10 py-4 md:px-14 md:py-5 rounded-xl font-black text-sm md:text-base uppercase tracking-wider hover:bg-[#c1121f] hover:text-white transition-all shadow-xl disabled:opacity-50">
                    Continue to Registration &rarr;
                </a>
                <p class="text-[10px] md:text-xs text-gray-400 mt-4">You'll confirm your course selections on the registration form.</p>
            </div>
        </div>

        <script>
            function goldSelector() {
                const allCourses = @json($allCoursesList);
                const urlParams = new URLSearchParams(window.location.search);
                const preselected = urlParams.get('courses') ? urlParams.get('courses').split(',') : [];

                return {
                    selected: preselected,
                    activeCategory: 'all',
                    get categories() {
                        const cats = ['all', ...new Set(allCourses.map(c => c.category || 'General'))];
                        return cats;
                    },
                    get filteredCourses() {
                        if (this.activeCategory === 'all') return allCourses;
                        return allCourses.filter(c => (c.category || 'General') === this.activeCategory);
                    },
                    isSelected(slug) {
                        return this.selected.includes(slug);
                    },
                    toggle(slug) {
                        const idx = this.selected.indexOf(slug);
                        if (idx > -1) {
                            this.selected.splice(idx, 1);
                        } else {
                            this.selected.push(slug);
                        }
                    }
                }
            }
        </script>
    </section>
    @endif

    <!-- CTA -->
    <section class="py-12 md:py-20 bg-[#091c3d] text-white text-center">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6" data-aos="zoom-in">
            <h2 class="font-serif text-3xl md:text-5xl font-bold mb-4 md:mb-6 break-words">Ready to Enroll?</h2>
            <p class="text-gray-300 max-w-2xl mx-auto mb-6 md:mb-10 text-sm md:text-base break-words">Take the next step toward your career transformation. Our admissions team is ready to help you get started.</p>
            <div class="flex flex-wrap justify-center gap-3 md:gap-6">
                @if($slug === 'gold')
                <a href="#build" class="inline-block bg-[#f5a524] text-[#091c3d] px-8 py-3.5 md:px-10 md:py-4 rounded-xl font-black text-xs md:text-sm uppercase tracking-wider hover:bg-white transition-all shadow-xl">Build Your Bundle</a>
                @else
                <a href="/register/{{ $slug }}" class="inline-block bg-[#c1121f] text-white px-8 py-3.5 md:px-10 md:py-4 rounded-xl font-black text-xs md:text-sm uppercase tracking-wider hover:bg-white hover:text-[#c1121f] transition-all shadow-xl">Enroll Now</a>
                @endif
                <a href="/contact-us" class="inline-block border-2 border-white/30 text-white px-8 py-3.5 md:px-10 md:py-4 rounded-xl font-bold text-xs md:text-sm uppercase tracking-wider hover:bg-white hover:text-[#091c3d] transition">Contact Us</a>
            </div>
            <div class="mt-6 md:mt-10 text-[11px] md:text-sm text-gray-400">
                <i class="fa-solid fa-phone mr-1 md:mr-2"></i> Call or WhatsApp: +237 678 672 998 / +237 696 681 163
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.widgets')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') { AOS.init({ once: true, offset: 50, duration: 1000, easing: 'ease-out-cubic' }); }
        });
    </script>
</body>
</html>