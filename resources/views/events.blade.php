<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Events | Goshen Work Skill Association</title>
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

    <!-- HERO BANNER -->
    <section class="relative py-16 md:py-28 bg-[#091c3d] text-white overflow-hidden flex items-center border-b-4 md:border-b-8 border-[#c1121f]">
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/events-hero.jpg') }}" loading="lazy" class="w-full h-full object-cover opacity-80" alt="Events Banner">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-transparent z-10"></div>
        <div class="relative z-20 max-w-[90rem] mx-auto px-4 md:px-6 lg:px-12 text-center w-full" data-aos="fade-up">
            <div class="flex justify-center items-center gap-2 text-[9px] md:text-[10px] uppercase tracking-widest text-[#f5a524] font-bold mb-4 md:mb-6">
                <a href="/" class="hover:text-white transition">Home</a>
                <span><i class="fa-solid fa-chevron-right text-[7px] md:text-[8px]"></i></span>
                <span class="text-white">Events & Workshops</span>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-7xl font-bold leading-tight mb-4 md:mb-6 drop-shadow-md break-words">Events &<br><span class="text-[#f5a524] italic">Workshops</span></h1>
            <p class="text-gray-200 text-xs md:text-sm lg:text-lg max-w-2xl mx-auto leading-relaxed drop-shadow-md break-words">Stay connected with upcoming training sessions, workshops, exams, and academic events at Goshen Work Skill Association.</p>
        </div>
    </section>

    <!-- UPCOMING EVENTS -->
    <section class="py-16 md:py-24 bg-white relative">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6">
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#c1121f] mb-2">What's Happening</h3>
                <h2 class="font-serif text-3xl md:text-4xl text-[#091c3d] font-bold break-words">Upcoming Events</h2>
                <div class="w-12 md:w-16 h-1 bg-[#c1121f] mx-auto mt-3 md:mt-4"></div>
            </div>

            @if($upcomingEvents->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($upcomingEvents as $event)
                        <div class="bg-white rounded-2xl md:rounded-3xl shadow-md hover:shadow-xl border border-gray-100 overflow-hidden transition duration-300 group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="p-6 md:p-8">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 bg-[#091c3d] rounded-xl flex flex-col items-center justify-center text-white">
                                        <span class="text-lg md:text-2xl font-bold leading-none">{{ $event->event_date->format('d') }}</span>
                                        <span class="text-[9px] md:text-[10px] uppercase font-semibold">{{ $event->event_date->format('M') }}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-[9px] md:text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full
                                                @switch($event->event_type)
                                                    @case('exam') bg-red-100 text-red-700 @break
                                                    @case('academic') bg-blue-100 text-blue-700 @break
                                                    @case('workshop') bg-green-100 text-green-700 @break
                                                    @case('holiday') bg-yellow-100 text-yellow-700 @break
                                                    @case('graduation') bg-purple-100 text-purple-700 @break
                                                    @default bg-gray-100 text-gray-700
                                                @endswitch
                                            ">{{ ucfirst($event->event_type) }}</span>
                                        </div>
                                        <h3 class="font-serif text-base md:text-lg font-bold text-[#091c3d] break-words">{{ $event->title }}</h3>
                                        @if($event->location)
                                            <p class="text-[10px] md:text-xs text-gray-500 mt-1"><i class="fa-solid fa-location-dot mr-1 text-[#c1121f]"></i> {{ $event->location }}</p>
                                        @endif
                                        <p class="text-[10px] md:text-xs text-gray-400 mt-1"><i class="fa-regular fa-clock mr-1"></i> {{ $event->event_date->format('g:i A') }}</p>
                                    </div>
                                </div>
                                @if($event->description)
                                    <div class="mt-4 pt-4 border-t border-gray-50 text-gray-600 text-[11px] md:text-sm leading-relaxed break-words">{!! $event->description !!}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 md:py-20" data-aos="fade-up">
                    <div class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fa-regular fa-calendar text-3xl md:text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="font-serif text-xl md:text-2xl text-[#091c3d] font-bold mb-2">No Upcoming Events</h3>
                    <p class="text-gray-500 text-xs md:text-sm">Check back soon for new workshops, exams, and academic events.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- PAST EVENTS -->
    @if($pastEvents->count() > 0)
        <section class="py-16 md:py-20 bg-[#fff7f2] border-t border-gray-100">
            <div class="max-w-[90rem] mx-auto px-4 md:px-6">
                <div class="text-center mb-10 md:mb-14" data-aos="fade-up">
                    <h3 class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Previously</h3>
                    <h2 class="font-serif text-2xl md:text-3xl text-[#091c3d] font-bold break-words">Past Events</h2>
                </div>
                <div class="max-w-3xl mx-auto space-y-4">
                    @foreach($pastEvents as $event)
                        <div class="bg-white p-4 md:p-6 rounded-xl md:rounded-2xl border border-gray-100 flex items-center gap-4" data-aos="fade-up">
                            <div class="flex-shrink-0 w-12 h-12 md:w-14 md:h-14 bg-gray-100 rounded-lg flex flex-col items-center justify-center text-gray-500">
                                <span class="text-sm md:text-lg font-bold leading-none">{{ $event->event_date->format('d') }}</span>
                                <span class="text-[8px] md:text-[9px] uppercase font-semibold">{{ $event->event_date->format('M') }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs md:text-sm font-bold text-gray-700 break-words">{{ $event->title }}</h4>
                                <span class="text-[9px] md:text-[10px] text-gray-400">{{ ucfirst($event->event_type) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA -->
    <section class="py-12 md:py-16 bg-[#091c3d] text-white">
        <div class="max-w-[90rem] mx-auto px-4 md:px-6 text-center" data-aos="fade-up">
            <h2 class="font-serif text-2xl md:text-4xl font-bold mb-3 md:mb-4 break-words">Don't Miss Out on<br class="md:hidden"> Our Next Event</h2>
            <p class="text-gray-300 text-xs md:text-sm max-w-xl mx-auto mb-6 md:mb-8 break-words">Subscribe to our newsletter to receive updates about upcoming workshops, exam schedules, and academic deadlines.</p>
            <a href="/packages" class="inline-block px-8 py-3 md:px-10 md:py-4 bg-[#c1121f] hover:bg-[#f5a524] text-white text-xs md:text-sm font-bold rounded-xl transition shadow-lg">Enroll Now &rarr;</a>
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
