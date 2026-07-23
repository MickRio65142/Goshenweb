<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Diploma in Social Care', 'code' => 'social-care', 'description' => 'Master community and residential social care skills for a rewarding career helping vulnerable individuals.'],
            ['name' => 'Diploma in Nursing Aid', 'code' => 'nursing-aid', 'description' => 'Learn patient care, vital signs, bedside support, and supervised clinical practice.'],
            ['name' => 'Certificate in Health and Safety', 'code' => 'health-safety', 'description' => 'Workplace safety, risk assessment, hazard control, and compliance skills.'],
            ['name' => 'Certificate in First Aid and CPR', 'code' => 'first-aid-cpr', 'description' => 'Hands-on emergency response, CPR drills, AED use, and wound care basics.'],
            ['name' => 'Diploma in Hospitality and Tourism', 'code' => 'hospitality-tourism', 'description' => 'Front office, guest service, food and beverage, and hotel operations.'],
            ['name' => 'Certificate in Customer Service and Computer Operations', 'code' => 'customer-service', 'description' => 'Office communication, Microsoft Office, email, and data entry skills.'],
            ['name' => 'Diploma in Travel Business Operations', 'code' => 'travel-business', 'description' => 'Itinerary planning, booking workflows, pricing, and travel desk administration.'],
            ['name' => 'Certificate in Airline Ticketing and Reservation', 'code' => 'airline-ticketing', 'description' => 'GDS practice, fare calculation, reservation workflows, and passenger support.'],
            ['name' => 'Diploma as Personal Support Worker (PSW)', 'code' => 'personal-support-worker', 'description' => 'Personal care, mobility support, elderly care, home support, and placement readiness.'],
        ];

        foreach ($courses as $course) {
            $course['title'] = $course['name'];
            $course['credit_hours'] = 3;
            Course::firstOrCreate(
                ['code' => $course['code']],
                $course
            );
        }
    }
}
