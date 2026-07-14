<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Console\Command;

class SeedExams extends Command
{
    protected $signature = 'seed:exams';
    protected $description = 'Seed Caregiver and Nursing Assistant exams with questions';

    public function handle()
    {
        // Ensure courses exist
        $nursingCourse = Course::firstOrCreate(
            ['code' => 'nursing-aid'],
            ['name' => 'Diploma in Nursing Aid', 'title' => 'Diploma in Nursing Aid', 'description' => 'Nursing Assistant certification program']
        );

        $caregiverCourse = Course::firstOrCreate(
            ['code' => 'caregiver'],
            ['name' => 'Caregiver', 'title' => 'Caregiver Certification', 'description' => 'Professional Caregiver certification program']
        );

        // ==========================================
        // NURSING ASSISTANT EXAM
        // ==========================================
        $this->seedNursingAssistantExam($nursingCourse->id);

        // ==========================================
        // CAREGIVER EXAM
        // ==========================================
        $this->seedCaregiverExam($caregiverCourse->id);

        $this->info('Exams seeded successfully!');
        $this->info('Nursing Assistant exam -> Course: ' . $nursingCourse->name);
        $this->info('Caregiver exam -> Course: ' . $caregiverCourse->name);

        return Command::SUCCESS;
    }

    private function seedNursingAssistantExam(int $courseId): void
    {
        Exam::where('course_id', $courseId)->delete();

        $exam = Exam::create([
            'title' => 'Nursing Assistant Certification Exam',
            'course_id' => $courseId,
            'duration_minutes' => 90,
            'pass_score' => 50,
            'max_attempts' => 3,
            'shuffle_questions' => true,
            'is_active' => true,
            'reference_material' => [
                [
                    'question' => '16. List five vital signs.',
                    'answers' => ['Temperature', 'Pulse', 'Respiration', 'Blood Pressure', 'Oxygen Saturation'],
                ],
                [
                    'question' => '17. Mention five rights of medication administration.',
                    'answers' => ['Right Patient', 'Right Medication', 'Right Dose', 'Right Time', 'Right Route'],
                ],
                [
                    'question' => '18. Give four signs of dehydration.',
                    'answers' => ['Dry mouth', 'Thirst', 'Dark urine', 'Dizziness'],
                ],
                [
                    'question' => '19. Name four ways to prevent infection.',
                    'answers' => ['Hand washing', 'Wearing PPE', 'Proper waste disposal', 'Cleaning and disinfecting equipment'],
                ],
                [
                    'question' => '20. Mention four responsibilities of a Nursing Assistant.',
                    'answers' => ['Assist with personal hygiene', 'Feed patients', 'Take vital signs', 'Report changes in patient condition'],
                ],
                [
                    'question' => '21. A patient suddenly becomes unconscious. What should you do first?',
                    'answers' => ['Call for help immediately.', 'Check responsiveness and breathing.', 'Notify the nurse or emergency response team.', 'Begin CPR if trained and if indicated.'],
                ],
                [
                    'question' => '22. A patient refuses to eat. What should you do?',
                    'answers' => ['Encourage the patient gently.', 'Ask the reason for refusing.', 'Report the refusal to the supervising nurse.', 'Document the incident.'],
                ],
                [
                    'question' => '23. A patient falls while walking. What should you do?',
                    'answers' => ['Do not move the patient immediately.', 'Call for assistance.', 'Assess for injuries.', 'Report the incident.'],
                ],
                [
                    'question' => '24. Why is documentation important?',
                    'answers' => ['It provides an accurate record of patient care, ensures continuity of care, supports communication among healthcare providers, and serves as a legal document.'],
                ],
                [
                    'question' => '25. What should you do after removing gloves?',
                    'answers' => ['Wash or sanitize your hands immediately.'],
                ],
                [
                    'question' => '26. What is the normal adult blood pressure?',
                    'answers' => ['Approximately 120/80 mmHg'],
                ],
                [
                    'question' => '27. What does CPR stand for?',
                    'answers' => ['Cardiopulmonary Resuscitation'],
                ],
                [
                    'question' => '28. Which side should an unconscious breathing patient be placed on?',
                    'answers' => ['Recovery (side-lying) position, unless spinal injury is suspected.'],
                ],
                [
                    'question' => '29. What is the purpose of oxygen saturation?',
                    'answers' => ['To measure the percentage of oxygen carried by the blood.'],
                ],
                [
                    'question' => '30. Why should bed rails be used carefully?',
                    'answers' => ['To reduce the risk of falls while ensuring they are used appropriately and according to facility policy, without unnecessarily restricting a patient\'s movement.'],
                ],
            ],
        ]);

        // MCQ Questions 1-10
        $questions = [
            ['question_text' => 'What is the normal body temperature of an adult?', 'a' => '35°C', 'b' => '37°C', 'c' => '39°C', 'd' => '40°C', 'correct' => 'b'],
            ['question_text' => 'Which of the following is the normal pulse rate for an adult?', 'a' => '30–50 beats/min', 'b' => '60–100 beats/min', 'c' => '120–140 beats/min', 'd' => '150–180 beats/min', 'correct' => 'b'],
            ['question_text' => 'Hand washing is the best way to:', 'a' => 'Make patients happy', 'b' => 'Save time', 'c' => 'Prevent the spread of infection', 'd' => 'Increase appetite', 'correct' => 'c'],
            ['question_text' => 'Before assisting a patient with feeding, you should:', 'a' => 'Give medication', 'b' => 'Wash your hands', 'c' => 'Open the windows', 'd' => 'Turn off the lights', 'correct' => 'b'],
            ['question_text' => 'A Nursing Assistant should report immediately if a patient:', 'a' => 'Is sleeping', 'b' => 'Is reading', 'c' => 'Has difficulty breathing', 'd' => 'Is watching television', 'correct' => 'c'],
            ['question_text' => 'Which position helps prevent choking during feeding?', 'a' => 'Flat on the bed', 'b' => 'Side-lying', 'c' => 'Sitting upright (High Fowler\'s position)', 'd' => 'Prone', 'correct' => 'c'],
            ['question_text' => 'Which PPE should be worn when there is a risk of contact with body fluids?', 'a' => 'Hat', 'b' => 'Shoes', 'c' => 'Gloves', 'd' => 'Watch', 'correct' => 'c'],
            ['question_text' => 'The first step before entering a patient\'s room is to:', 'a' => 'Sit down', 'b' => 'Knock and introduce yourself', 'c' => 'Open the curtains', 'd' => 'Give medication', 'correct' => 'b'],
            ['question_text' => 'Which nutrient helps build and repair body tissues?', 'a' => 'Vitamins', 'b' => 'Fats', 'c' => 'Proteins', 'd' => 'Water', 'correct' => 'c'],
            ['question_text' => 'A patient who cannot move independently is at risk for:', 'a' => 'Headache', 'b' => 'Tooth decay', 'c' => 'Pressure sores', 'd' => 'Ear infection', 'correct' => 'c'],
        ];

        // True/False Questions 11-15 (as A=True, B=False)
        $tfQuestions = [
            ['question_text' => 'Nursing assistants are allowed to prescribe medications.', 'a' => 'True', 'b' => 'False', 'c' => '', 'd' => '', 'correct' => 'b'],
            ['question_text' => 'Patient information should remain confidential.', 'a' => 'True', 'b' => 'False', 'c' => '', 'd' => '', 'correct' => 'a'],
            ['question_text' => 'Gloves replace the need for hand washing.', 'a' => 'True', 'b' => 'False', 'c' => '', 'd' => '', 'correct' => 'b'],
            ['question_text' => 'Elderly patients are more likely to fall.', 'a' => 'True', 'b' => 'False', 'c' => '', 'd' => '', 'correct' => 'a'],
            ['question_text' => 'You should always identify a patient before providing care.', 'a' => 'True', 'b' => 'False', 'c' => '', 'd' => '', 'correct' => 'a'],
        ];

        $sortOrder = 0;
        foreach (array_merge($questions, $tfQuestions) as $q) {
            ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_text' => $q['question_text'],
                'option_a' => $q['a'],
                'option_b' => $q['b'],
                'option_c' => $q['c'],
                'option_d' => $q['d'],
                'correct_option' => $q['correct'],
                'sort_order' => $sortOrder++,
            ]);
        }

        $this->info('Nursing Assistant Exam created with ' . $sortOrder . ' auto-graded questions.');
    }

    private function seedCaregiverExam(int $courseId): void
    {
        Exam::where('course_id', $courseId)->delete();

        $exam = Exam::create([
            'title' => 'Caregiver Certification Exam',
            'course_id' => $courseId,
            'duration_minutes' => 90,
            'pass_score' => 50,
            'max_attempts' => 3,
            'shuffle_questions' => true,
            'is_active' => true,
            'reference_material' => [
                [
                    'question' => '31. List five vital signs.',
                    'answers' => ['Temperature', 'Pulse', 'Respiration', 'Blood Pressure', 'Oxygen Saturation'],
                ],
                [
                    'question' => '32. Mention five qualities of a good caregiver.',
                    'answers' => ['Compassion', 'Patience', 'Honesty', 'Respect', 'Good communication skills'],
                ],
                [
                    'question' => '33. List five activities of daily living (ADLs).',
                    'answers' => ['Bathing', 'Dressing', 'Eating', 'Toileting', 'Mobility/Walking'],
                ],
                [
                    'question' => '34. Mention four signs of infection.',
                    'answers' => ['Fever', 'Redness', 'Swelling', 'Pain or warmth'],
                ],
                [
                    'question' => '35. State four ways to prevent falls.',
                    'answers' => ['Keep floors dry and free of clutter.', 'Ensure good lighting.', 'Use mobility aids correctly.', 'Help clients when walking or transferring.'],
                ],
                [
                    'question' => '36. A client suddenly complains of chest pain. What should you do?',
                    'answers' => ['Stay with the client.', 'Call for immediate medical assistance.', 'Help the client rest in a comfortable position unless instructed otherwise.', 'Monitor the client\'s condition.', 'Report the incident promptly.'],
                ],
                [
                    'question' => '37. A client refuses to take a meal. What should you do?',
                    'answers' => ['Encourage the client respectfully.', 'Ask why they are refusing.', 'Do not force the client to eat.', 'Report the refusal to the supervising nurse.', 'Document the incident.'],
                ],
                [
                    'question' => '38. A client falls while walking. What should you do?',
                    'answers' => ['Stay calm.', 'Do not move the client unless there is immediate danger.', 'Call for help.', 'Check for injuries if trained to do so.', 'Report and document the incident.'],
                ],
                [
                    'question' => '39. How can a caregiver protect a client\'s privacy?',
                    'answers' => ['Keep personal information confidential.', 'Close doors or curtains during personal care.', 'Obtain permission before exposing the client\'s body.', 'Discuss client information only with authorized healthcare team members.'],
                ],
                [
                    'question' => '40. Why is documentation important in caregiving?',
                    'answers' => ['Documentation provides an accurate record of care, supports communication among healthcare providers, helps ensure continuity of care, and serves as a legal record.'],
                ],
            ],
        ]);

        // MCQ Questions 1-20 (from user's list)
        $mcqQuestions = [
            ['q' => 'The main responsibility of a caregiver is to:', 'a' => 'Prescribe medication', 'b' => 'Diagnose diseases', 'c' => 'Assist clients with daily living activities', 'd' => 'Perform surgery', 'correct' => 'c'],
            ['q' => 'Which of the following is the best way to prevent infection?', 'a' => 'Wearing perfume', 'b' => 'Washing hands regularly', 'c' => 'Wearing jewelry', 'd' => 'Closing the windows', 'correct' => 'b'],
            ['q' => 'Before providing care, a caregiver should first:', 'a' => 'Give medication', 'b' => 'Introduce themselves and identify the client', 'c' => 'Watch television', 'd' => 'Make the bed', 'correct' => 'b'],
            ['q' => 'Which personal protective equipment (PPE) protects the hands?', 'a' => 'Mask', 'b' => 'Goggles', 'c' => 'Gloves', 'd' => 'Apron', 'correct' => 'c'],
            ['q' => 'What is the normal adult body temperature?', 'a' => '35°C', 'b' => '37°C', 'c' => '39°C', 'd' => '40°C', 'correct' => 'b'],
            ['q' => 'Which position is safest for feeding a client?', 'a' => 'Lying flat', 'b' => 'Side-lying', 'c' => 'Sitting upright', 'd' => 'Prone', 'correct' => 'c'],
            ['q' => 'Which nutrient helps repair body tissues?', 'a' => 'Carbohydrates', 'b' => 'Vitamins', 'c' => 'Proteins', 'd' => 'Minerals', 'correct' => 'c'],
            ['q' => 'Which vital sign measures heartbeats?', 'a' => 'Temperature', 'b' => 'Respiration', 'c' => 'Pulse', 'd' => 'Oxygen', 'correct' => 'c'],
            ['q' => 'A caregiver should report:', 'a' => 'Changes in the client\'s condition', 'b' => 'Abuse or neglect', 'c' => 'Falls or injuries', 'd' => 'All of the above', 'correct' => 'd'],
            ['q' => 'Which of the following is a sign of dehydration?', 'a' => 'Moist skin', 'b' => 'Clear urine', 'c' => 'Dry mouth', 'd' => 'Slow pulse', 'correct' => 'c'],
            ['q' => 'Pressure sores are caused mainly by:', 'a' => 'Excessive eating', 'b' => 'Prolonged pressure on the skin', 'c' => 'Drinking too much water', 'd' => 'Walking often', 'correct' => 'b'],
            ['q' => 'Elderly people are at high risk of:', 'a' => 'Growing taller', 'b' => 'Falls', 'c' => 'Tooth growth', 'd' => 'Faster running', 'correct' => 'b'],
            ['q' => 'Confidentiality means:', 'a' => 'Sharing information with everyone', 'b' => 'Keeping client information private', 'c' => 'Posting client photos online', 'd' => 'Discussing clients in public', 'correct' => 'b'],
            ['q' => 'The first step in an emergency is to:', 'a' => 'Panic', 'b' => 'Run away', 'c' => 'Ensure safety and call for help', 'd' => 'Ignore the situation', 'correct' => 'c'],
            ['q' => 'Which device measures blood pressure?', 'a' => 'Thermometer', 'b' => 'Pulse oximeter', 'c' => 'Sphygmomanometer', 'd' => 'Stethoscope alone', 'correct' => 'c'],
            ['q' => 'Oxygen saturation is measured using a:', 'a' => 'Thermometer', 'b' => 'Blood pressure cuff', 'c' => 'Pulse oximeter', 'd' => 'Weighing scale', 'correct' => 'c'],
            ['q' => 'The best way to transfer a patient safely is to:', 'a' => 'Pull the patient quickly', 'b' => 'Lift alone', 'c' => 'Use proper body mechanics and assistive devices if needed', 'd' => 'Drag the patient', 'correct' => 'c'],
            ['q' => 'Which food is rich in protein?', 'a' => 'Rice', 'b' => 'Bread', 'c' => 'Eggs', 'd' => 'Sugar', 'correct' => 'c'],
            ['q' => 'Bed rails are mainly used to:', 'a' => 'Decorate the bed', 'b' => 'Help reduce the risk of falls', 'c' => 'Tie patients down', 'd' => 'Hang clothes', 'correct' => 'b'],
            ['q' => 'After removing gloves, a caregiver should:', 'a' => 'Eat immediately', 'b' => 'Touch their face', 'c' => 'Wash or sanitize their hands', 'd' => 'Leave the room', 'correct' => 'c'],
        ];

        // True/False Questions 21-30 (as A=True, B=False)
        $tfQuestions = [
            ['q' => 'Caregivers should respect the dignity of every client.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
            ['q' => 'Hand hygiene is unnecessary if gloves are worn.', 'a' => 'True', 'b' => 'False', 'correct' => 'b'],
            ['q' => 'A caregiver can prescribe medication.', 'a' => 'True', 'b' => 'False', 'correct' => 'b'],
            ['q' => 'Falls should always be reported.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
            ['q' => 'Elderly clients often require assistance with activities of daily living.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
            ['q' => 'A caregiver should knock before entering a client\'s room.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
            ['q' => 'Client records should be accurate and complete.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
            ['q' => 'Pressure ulcers can be prevented by repositioning clients regularly.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
            ['q' => 'It is acceptable to ignore changes in a client\'s condition.', 'a' => 'True', 'b' => 'False', 'correct' => 'b'],
            ['q' => 'Good communication improves the quality of care.', 'a' => 'True', 'b' => 'False', 'correct' => 'a'],
        ];

        $sortOrder = 0;
        foreach ($mcqQuestions as $q) {
            ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_text' => $q['q'],
                'option_a' => $q['a'],
                'option_b' => $q['b'],
                'option_c' => $q['c'],
                'option_d' => $q['d'],
                'correct_option' => $q['correct'],
                'sort_order' => $sortOrder++,
            ]);
        }

        foreach ($tfQuestions as $q) {
            ExamQuestion::create([
                'exam_id' => $exam->id,
                'question_text' => $q['q'],
                'option_a' => $q['a'],
                'option_b' => $q['b'],
                'option_c' => '',
                'option_d' => '',
                'correct_option' => $q['correct'],
                'sort_order' => $sortOrder++,
            ]);
        }

        $this->info('Caregiver Exam created with ' . $sortOrder . ' auto-graded questions.');
    }
}
