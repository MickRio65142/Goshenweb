<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Centralized database of your 9 Goshen Work Skill Association courses
    public function getCourses()
    {
        $internshipFacilities = 'Internship exposure includes Polyclinique de Potier Douala, Care Clinic Douala, Covenant Medical Centre Bamenda, Holy Family Hospital Mbouda, Trinity Medical Centre Limbe, and Mother and Child Hospital Kumba.';

        return [
            'social-care' => [
                'title' => 'Diploma in Social Care',
                'category' => 'Healthcare & Nursing',
                'description' => 'Master community and residential social care skills for a rewarding career helping vulnerable individuals. Learn ethical care, safeguarding, and communication.',
                'hero_image' => 'images/slide-social-care.jpg',
                'sidebar_image' => 'images/hero-course-social-care.jpg',
                'highlights' => [
                    'UK & Global Standard Alignment: Meets professional social care guidelines.',
                    'Practical Competence: Focuses on person-centered care methodologies.',
                    'Career Progression: Prepare for senior caregiver roles.'
                ],
                'modules' => [
                    'Communication inside Adult Social Care Settings',
                    'Safeguarding, Duty of Care & Risk Prevention',
                    'Person-Centered Planning & Cultural Inclusion',
                    'Mental Health & Dementia Care Basics'
                ],
                'structure' => 'Blended curriculum mapping theoretical units with direct practical demonstrations and community care assessments. ' . $internshipFacilities,
                'summary' => [
                    'requirements' => 'Minimum Age 18 years, High School Certificate, basic English.',
                    'duration' => '6 Months',
                    'certification' => 'Diploma in Social Care',
                    'fees' => 'Flexible payments with instalment models and MoMo options available.',
                    'extra_cost' => 'None. Registration and materials are covered.',
                    'suitability' => 'Perfect for entry-level caregivers seeking accredited care worker roles.',
                    'careers' => 'Adult Care Assistant, Residential Support Carer, Community Worker.',
                    'support' => 'Monthly academic coordinator catch-up sessions.',
                    'package_price' => '200,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'nursing-aid' => [
                'title' => 'Diploma in Nursing Aid',
                'category' => 'Healthcare & Nursing',
                'description' => 'Gain hands-on clinical experience, standard patient care techniques, and safety routines inside our high-tech medical simulation labs under Registered Nurse supervision.',
                'hero_image' => 'images/slide-nursing-aid.jpg',
                'sidebar_image' => 'images/hero-course-nursing-aid.jpg',
                'highlights' => [
                    'Advanced Training: Learn complex bedside care procedures.',
                    'Specialized Knowledge: Infection control, vitals, and ethical care.',
                    'Expert Guidance: Receive on-point tutoring from certified clinical coordinators.'
                ],
                'modules' => [
                    'Physiological Measurements & Vital Signs',
                    'Bedside Care & Patient Mobility Assistance',
                    'Surgical Dressing & Wound Management',
                    'Clinical Simulation Practice & Safe Ward Management'
                ],
                'structure' => 'Advanced theoretical assignments compiled on our online database combined with nurse-evaluated simulation exams. ' . $internshipFacilities,
                'summary' => [
                    'requirements' => 'Passport Copy, Minimum Age 18 years, basic English communication.',
                    'duration' => '6 to 9 Months',
                    'certification' => 'Diploma in Nursing Aid',
                    'fees' => 'Easy installments and MoMo payments are accepted through admissions.',
                    'extra_cost' => 'Standard manuals and scrub uniforms are included.',
                    'suitability' => 'Designed for those migrating abroad for healthcare assistant or clinical aid positions.',
                    'careers' => 'Clinical Assistant, Ward Helper, Care Companion, Resident Support Aide.',
                    'support' => 'Unlimited skills lab practice hours and on-site mock test runs.',
                    'package_price' => '250,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'health-safety' => [
                'title' => 'Certificate in Health and Safety',
                'category' => 'Safety & Emergency',
                'description' => 'Learn essential workplace safety, risk assessment, and industrial hazard prevention frameworks to ensure corporate and industrial compliance.',
                'hero_image' => 'images/slide-health-safety.jpg',
                'sidebar_image' => 'images/hero-course-health-safety.jpg',
                'highlights' => [
                    'Corporate Standards: Aligned with international occupational safety boards.',
                    'Risk Assessment: Master hazard identification and mitigation.',
                    'Industrial Application: Ideal for construction, oil/gas, and corporate sectors.'
                ],
                'modules' => [
                    'Introduction to Occupational Health and Safety',
                    'Risk Assessment and Hazard Control',
                    'Fire Safety and Emergency Evacuation Procedures',
                    'Workplace Ergonomics and Environmental Health'
                ],
                'structure' => 'Interactive lectures combined with practical site-inspection simulations and hazard reporting assignments.',
                'summary' => [
                    'requirements' => 'Open to all professionals and high school graduates.',
                    'duration' => '4 Weeks',
                    'certification' => 'Certificate in Health and Safety',
                    'fees' => 'Paid upfront, by two installments, or through approved MoMo payment.',
                    'extra_cost' => 'Certification exam fees included.',
                    'suitability' => 'For site safety managers, HR personnel, and industrial workers.',
                    'careers' => 'HSE Officer, Safety Supervisor, Site Inspector.',
                    'support' => 'Real-world case study analysis and portfolio building.',
                    'package_price' => '100,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'first-aid-cpr' => [
                'title' => 'Certificate in First Aid and CPR',
                'category' => 'Safety & Emergency',
                'description' => 'Discover the essentials of life-saving care and cardiopulmonary resuscitation in emergency scenarios. Gain vital competencies for any workplace or clinical setting.',
                'hero_image' => 'images/slide-first-aid-cpr.jpg',
                'sidebar_image' => 'images/hero-course-first-aid-cpr.jpg',
                'highlights' => [
                    'AHA Compliant: Uses international Heart Association frameworks.',
                    'Intensive Lab: Advanced cardiac mannequin practice.',
                    'Mandatory Competency: Crucial requirement for hospital and corporate workers.'
                ],
                'modules' => [
                    'Cardiopulmonary Resuscitation (CPR) Drills',
                    'Automatic External Defibrillator (AED) Operations',
                    'Choking Emergencies Management (Adult & Pediatric)',
                    'Minor Wound & Bleeding Control Procedures'
                ],
                'structure' => '100% on-site hands-on drills and physical skills checklists using high-fidelity medical mannequins. ' . $internshipFacilities,
                'summary' => [
                    'requirements' => 'No prior medical background required.',
                    'duration' => '3 Days (Intensive)',
                    'certification' => 'Certificate in First Aid and CPR',
                    'fees' => 'One-time payment with MoMo support available through admissions.',
                    'extra_cost' => 'None.',
                    'suitability' => 'Mandatory for nurses, teachers, nannies, and corporate safety wardens.',
                    'careers' => 'First Responder, Clinic Nurse, School Matron.',
                    'support' => 'Renewal reminders and fast-track booking.',
                    'package_price' => '75,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'hospitality-tourism' => [
                'title' => 'Diploma in Hospitality and Tourism',
                'category' => 'Hospitality & Tourism',
                'description' => 'Build professional skills in hotel operations, guest relations, front office service, food and beverage standards, and hospitality supervision.',
                'hero_image' => 'images/slide-hospitality.jpg',
                'sidebar_image' => 'images/hero-course-hospitality.jpg',
                'highlights' => [
                    'Global Standards: Learn 5-star hotel operational protocols.',
                    'Guest Relations: Master the art of elite customer satisfaction.',
                    'Career Ready: Direct pathways into international hotel chains and resorts.'
                ],
                'modules' => [
                    'Introduction to the Global Tourism Industry',
                    'Front Office & Hotel Operations Management',
                    'Food & Beverage Service Standards',
                    'Event Planning and Tourism Marketing'
                ],
                'structure' => 'Classroom theory combined with simulated front-desk operations and hospitality case studies.',
                'summary' => [
                    'requirements' => 'High School Certificate, excellent communication skills.',
                    'duration' => '6 Months',
                    'certification' => 'Diploma in Hospitality and Tourism',
                    'fees' => 'Flexible payment plans and MoMo options available.',
                    'extra_cost' => 'None.',
                    'suitability' => 'Ideal for individuals passionate about hospitality, guest service, and tourism operations.',
                    'careers' => 'Hotel Manager, Tour Coordinator, Event Planner, Guest Relations Executive.',
                    'support' => 'Interview coaching for top-tier hotel placements.',
                    'package_price' => '200,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'customer-service' => [
                'title' => 'Certificate in Customer Service and Computer Operations',
                'category' => 'Customer Service & Computer Operations',
                'description' => 'Learn expert communication skills combined with modern computer operations for corporate offices, reception desks, and client-facing roles.',
                'hero_image' => 'images/slide-customer-service.jpg',
                'sidebar_image' => 'images/hero-course-customer-service.jpg',
                'highlights' => [
                    'Dual Skillset: Combines soft skills (communication) with hard skills (IT).',
                    'Corporate Ready: Prepares you for modern office environments.',
                    'Practical Tech: Master Microsoft Office, email etiquette, and CRM basics.'
                ],
                'modules' => [
                    'Principles of Excellent Customer Service & Conflict Resolution',
                    'Professional Telephone & Email Etiquette',
                    'Microsoft Office Suite (Word, Excel, PowerPoint)',
                    'Basic Data Entry and CRM Navigation'
                ],
                'structure' => 'Interactive communication workshops mixed with practical computer lab assignments.',
                'summary' => [
                    'requirements' => 'Basic English reading and writing skills.',
                    'duration' => '8 Weeks',
                    'certification' => 'Certificate in Customer Service and Computer Operations',
                    'fees' => 'Affordable installments and MoMo payments available.',
                    'extra_cost' => 'None.',
                    'suitability' => 'Perfect for entry-level office workers, receptionists, and call center agents.',
                    'careers' => 'Receptionist, Call Center Agent, Administrative Assistant, Helpdesk Support.',
                    'support' => 'Typing speed improvement tools and communication mock tests.',
                    'package_price' => '120,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'travel-business' => [
                'title' => 'Diploma in Travel Business Operations',
                'category' => 'Aviation & Travel',
                'description' => 'Understand travel desk operations, itinerary planning, customer documentation, booking workflows, and tourism business administration.',
                'hero_image' => 'images/slide-travel-business.jpg',
                'sidebar_image' => 'images/hero-course-travel-business.jpg',
                'highlights' => [
                    'Operations Mastery: Learn how to coordinate travel service requests.',
                    'Business Acumen: Understand the financial and operational side of tourism.',
                    'Agency Operations: Step-by-step training on running a travel desk.'
                ],
                'modules' => [
                    'Geography and Travel Itinerary Planning',
                    'Travel Desk Operations & Management',
                    'Tour Packaging and Pricing Strategies',
                    'Client Documentation and Service Protocols'
                ],
                'structure' => 'Project-based learning where students build, price, and present responsible travel business service packages.',
                'summary' => [
                    'requirements' => 'High School Certificate, good geographical knowledge.',
                    'duration' => '6 Months',
                    'certification' => 'Diploma in Travel Business Operations',
                    'fees' => 'Installment plans and MoMo payments available across the semester.',
                    'extra_cost' => 'None.',
                    'suitability' => 'For aspiring travel agents, tour operators, and logistics coordinators.',
                    'careers' => 'Travel Agency Manager, Tour Operator, Corporate Travel Coordinator.',
                    'support' => 'Industry software simulation and networking events.',
                    'package_price' => '200,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'airline-ticketing' => [
                'title' => 'Certificate in Airline Ticketing and Reservation',
                'category' => 'Aviation & Travel',
                'description' => 'Get certified in GDS (Global Distribution Systems), flight reservations, fare calculations, and international aviation protocol.',
                'hero_image' => 'images/slide-airline-ticketing.jpg',
                'sidebar_image' => 'images/hero-course-airline-ticketing.jpg',
                'highlights' => [
                    'GDS Training: Hands-on practice with real airline booking software (Amadeus/Galileo).',
                    'Aviation Standards: Learn IATA geography and airline codes.',
                    'Fast-Track Career: Direct entry into airport ticketing desks and travel agencies.'
                ],
                'modules' => [
                    'Introduction to Aviation & IATA Codes',
                    'Global Distribution Systems (GDS) Operations',
                    'Fare Calculation and Ticketing Issuance',
                    'Passenger Handling and Airport Protocols'
                ],
                'structure' => 'Intensive computer lab sessions utilizing simulated airline booking terminals.',
                'summary' => [
                    'requirements' => 'Computer literacy and basic English.',
                    'duration' => '3 Months',
                    'certification' => 'Certificate in Airline Ticketing & Reservation',
                    'fees' => 'Two-part payment plans and MoMo payments accepted.',
                    'extra_cost' => 'None.',
                    'suitability' => 'Ideal for those wanting to work in airports or premier travel agencies.',
                    'careers' => 'Ticketing Agent, Reservation Executive, Airport Ground Staff.',
                    'support' => 'Direct training on industry-standard GDS software.',
                    'package_price' => '150,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
            'personal-support-worker' => [
                'title' => 'Diploma as Personal Support Worker (PSW)',
                'category' => 'Healthcare & Nursing',
                'description' => 'Prepare for personal support worker roles with hands-on caregiving, mobility support, elderly care, home assistance, and supervised clinical placement skills.',
                'hero_image' => 'images/slide-psw.jpg',
                'sidebar_image' => 'images/hero-course-psw.jpg',
                'highlights' => [
                    'Care-Focused Training: Learn practical support for elderly, disabled, and recovering clients.',
                    'Clinical Exposure: Build workplace readiness through supervised care routines.',
                    'Career Ready: Prepare for home care, hospital support, and international PSW pathways.'
                ],
                'modules' => [
                    'Personal Care, Hygiene, and Daily Living Assistance',
                    'Patient Mobility, Transfers, and Safe Body Mechanics',
                    'Elderly Care, Dementia Awareness, and Companionship',
                    'Home Support, Documentation, and Professional Ethics'
                ],
                'structure' => 'Blended classroom training with supervised practical demonstrations and internship exposure in partner healthcare facilities. ' . $internshipFacilities,
                'summary' => [
                    'requirements' => 'Minimum Age 18 years, basic English, and passion for care work.',
                    'duration' => '6 Months',
                    'certification' => 'Diploma as Personal Support Worker (PSW)',
                    'fees' => 'Flexible payments with MoMo options available through admissions.',
                    'extra_cost' => 'None.',
                    'suitability' => 'Ideal for learners pursuing caregiver, home support, and healthcare assistant roles.',
                    'careers' => 'Personal Support Worker, Home Care Assistant, Elderly Care Aide, Patient Support Assistant.',
                    'support' => 'Admissions guidance, practical coaching, and internship placement support.',
                    'package_price' => '250,000 CFA',
                    'payment_options' => 'MTN MoMo, Orange Money, Bank Transfer, Credit/Debit Card'
                ]
            ],
        ];
    }

    // THIS METHOD HANDLES THE GENERAL "/courses" PAGE
    public function index()
    {
        $courses = $this->getCourses();
        return view('courses.index', compact('courses'));
    }

    // THIS METHOD HANDLES SPECIFIC COURSE PAGES (e.g. "/courses/social-care")
    public function show($slug)
    {
        $courses = $this->getCourses();

        if (!array_key_exists($slug, $courses)) {
            abort(404);
        }

        $course = $courses[$slug];

        $related = collect($courses)->except($slug)->take(3);

        return view('courses.show', compact('course', 'related', 'slug'));
    }

    public function getPackages()
    {
        $allCourses = $this->getCourses();

        return [
            'healthcare' => [
                'title' => 'Goshen Healthcare Package',
                'subtitle' => 'Caregivers, Nursing Aid, CPR & First Aid',
                'price' => '260,000 FCFA',
                'duration' => '3 Months',
                'hero_image' => 'images/slide-nursing-aid.jpg',
                'description' => 'The Goshen Healthcare Package is designed for individuals seeking a fast-track career in healthcare assistance. This intensive 3-month program combines three critical courses — Social Care, Nursing Aid, and First Aid & CPR — giving you the foundational competencies needed for clinical and community care roles.',
                'highlights' => [
                    'Three globally aligned healthcare certifications in one bundle',
                    'Hands-on clinical simulation labs with Registered Nurse supervision',
                    'Career pathways into hospitals, care homes, and community health',
                    'Internship placement support across partner healthcare facilities',
                ],
                'modules' => [
                    ['icon' => 'fa-heart-pulse', 'title' => 'Patient Communication & Vital Signs', 'description' => 'Learn bedside communication, measuring vitals, and patient monitoring techniques.'],
                    ['icon' => 'fa-shield-halved', 'title' => 'Safeguarding & Risk Prevention', 'description' => 'Master duty of care, risk assessment, and safeguarding vulnerable individuals.'],
                    ['icon' => 'fa-truck-medical', 'title' => 'CPR & Emergency Wound Management', 'description' => 'Hands-on CPR drills, AED operation, choking emergencies, and bleeding control.'],
                    ['icon' => 'fa-hand-holding-heart', 'title' => 'Elderly Care & Mobility Support', 'description' => 'Person-centered elderly care, mobility assistance, and daily living support.'],
                ],
                'courses_included' => ['social-care', 'nursing-aid', 'first-aid-cpr'],
            ],
            'silver' => [
                'title' => 'Goshen Silver Package',
                'subtitle' => 'Hospitality & Tourism, Airline Ticketing, Customer Service & ICT',
                'price' => '360,000 FCFA',
                'duration' => '3 Months',
                'hero_image' => 'images/slide-hospitality.jpg',
                'description' => 'The Goshen Silver Package prepares you for the global service industry by bundling three high-demand programs: Hospitality & Tourism, Airline Ticketing & Reservation, and Customer Service & Computer Operations. Whether your goal is a hotel front desk, a travel agency, or a corporate office, this package delivers.',
                'highlights' => [
                    'Three industry-recognized certifications in hospitality, aviation, and ICT',
                    'Practical training in front office operations, GDS systems, and Microsoft Office',
                    'Direct entry pathways into hotels, airports, travel agencies, and corporate offices',
                    'Interview coaching and CV preparation support',
                ],
                'modules' => [
                    ['icon' => 'fa-hotel', 'title' => 'Front Office & Guest Relations', 'description' => 'Hotel operations, front desk management, F&B service standards, and event planning.'],
                    ['icon' => 'fa-globe', 'title' => 'GDS & Airline Ticketing', 'description' => 'Global Distribution Systems, fare calculation, IATA codes, and ticket issuance.'],
                    ['icon' => 'fa-headset', 'title' => 'Customer Service & CRM', 'description' => 'Professional communication, conflict resolution, email etiquette, and CRM navigation.'],
                    ['icon' => 'fa-suitcase-rolling', 'title' => 'Travel Planning & Booking', 'description' => 'Itinerary planning, tour packaging, pricing strategies, and client documentation.'],
                ],
                'courses_included' => ['hospitality-tourism', 'airline-ticketing', 'customer-service'],
            ],
            'gold' => [
                'title' => 'Goshen Gold Package',
                'subtitle' => 'Pick 6+ Courses — One Flat Price',
                'price' => '460,000 FCFA',
                'duration' => 'Flexible',
                'hero_image' => 'images/hero-home-packages.jpg',
                'description' => 'The Goshen Gold Package is our most flexible and comprehensive offer. Choose 6 or more courses from any category — Healthcare, Safety, Hospitality, Travel & Aviation — and pay a single flat fee. Build your own curriculum and study at your own pace.',
                'highlights' => [
                    'Choose 6 or more courses from our full catalog of 9 programs',
                    'Single flat price regardless of how many courses you select',
                    'Flexible study schedule — learn at your own pace',
                    'Ideal for career changers and those seeking multi-skilling',
                ],
                'modules' => [
                    ['icon' => 'fa-layer-group', 'title' => 'Multi-Discipline Curriculum', 'description' => 'Select courses across healthcare, safety, hospitality, and aviation.'],
                    ['icon' => 'fa-clock', 'title' => 'Flexible Self-Paced Study', 'description' => 'Learn on your own schedule with access to all course materials and labs.'],
                    ['icon' => 'fa-trophy', 'title' => 'Comprehensive Credentials', 'description' => 'Earn certificates in every selected course for maximum career flexibility.'],
                ],
                'courses_included' => [], // user selects on the detail page
            ],
        ];
    }

    // THIS METHOD HANDLES THE GENERAL "/packages" PAGE
    public function packagesIndex()
    {
        $packages = $this->getPackages();
        return view('packages.index', compact('packages'));
    }

    // THIS METHOD HANDLES PACKAGE DETAIL PAGES (e.g. "/packages/healthcare")
    public function showPackage($slug)
    {
        $packages = $this->getPackages();
        $allCourses = $this->getCourses();

        if (!array_key_exists($slug, $packages)) {
            abort(404);
        }

        $package = $packages[$slug];

        // Get the actual course data for included courses
        $includedCourses = [];
        foreach ($package['courses_included'] as $cSlug) {
            if (isset($allCourses[$cSlug])) {
                $course = $allCourses[$cSlug];
                $course['slug'] = $cSlug;
                $includedCourses[] = $course;
            }
        }

        // Convert allCourses to a flat indexed array for Alpine.js to iterate
        $allCoursesList = [];
        foreach ($allCourses as $cSlug => $course) {
            $course['slug'] = $cSlug;
            $allCoursesList[] = $course;
        }

        return view('packages.show', compact('package', 'includedCourses', 'slug', 'allCoursesList'));
    }
}
