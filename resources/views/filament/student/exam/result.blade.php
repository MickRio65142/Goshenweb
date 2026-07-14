<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Exam Result | Goshen Work Skill Association</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fcfcfc]">

    <section class="py-16 md:py-24">
        <div class="max-w-3xl mx-auto px-4">
            {{-- Score Card --}}
            <div class="bg-white rounded-2xl shadow-lg border p-8 md:p-12 text-center mb-8 {{ $attempt->passed ? 'border-emerald-100' : 'border-red-100' }}">
                @if($attempt->passed)
                <div class="w-20 h-20 mx-auto bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fa-solid fa-check text-emerald-600 text-4xl"></i>
                </div>
                <h1 class="font-serif text-3xl md:text-4xl font-bold text-[#091c3d] mb-2">Congratulations!</h1>
                <p class="text-gray-500 mb-4">You passed the exam.</p>
                @else
                <div class="w-20 h-20 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fa-solid fa-xmark text-red-600 text-4xl"></i>
                </div>
                <h1 class="font-serif text-3xl md:text-4xl font-bold text-[#091c3d] mb-2">Not This Time</h1>
                <p class="text-gray-500 mb-4">You didn't reach the passing score of {{ $exam->pass_score }}%.</p>
                @endif

                <div class="inline-flex items-center gap-3 px-6 py-3 rounded-full font-bold text-lg {{ $attempt->passed ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                    <span>Score: {{ number_format($attempt->score, 1) }}%</span>
                    <span class="text-gray-300">|</span>
                    <span>Pass Mark: {{ $exam->pass_score }}%</span>
                </div>

                @if(!$attempt->passed && $attempt->attempt_number < $exam->max_attempts)
                <div class="mt-6">
                    <p class="text-sm text-gray-500 mb-4">You have {{ $exam->max_attempts - $attempt->attempt_number }} attempt(s) remaining.</p>
                    <a href="{{ url('/student/exams/' . $exam->id . '/start') }}" class="inline-block bg-[#091c3d] hover:bg-[#c1121f] text-white font-bold py-3 px-8 rounded-lg transition shadow-lg">
                        <i class="fa-solid fa-rotate mr-2"></i> Retry Exam
                    </a>
                </div>
                @endif

                <div class="mt-6">
                    <a href="{{ url('/student/exams') }}" class="text-sm text-[#c1121f] hover:text-[#091c3d] font-semibold">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Back to Exams
                    </a>
                </div>
            </div>

            {{-- Reference Material --}}
            @if(!empty($referenceMaterial))
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 md:p-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 rounded-full bg-[#091c3d]/10 flex items-center justify-center">
                        <i class="fa-solid fa-book-open text-[#091c3d]"></i>
                    </div>
                    <h2 class="font-bold text-xl text-[#091c3d]">Study Reference</h2>
                </div>
                <div class="space-y-6">
                    @foreach($referenceMaterial as $item)
                    <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                        <p class="font-semibold text-[#091c3d] mb-2">{{ $item['question'] ?? '' }}</p>
                        @if(!empty($item['answers']))
                        <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                            @foreach($item['answers'] as $answer)
                            <li>{{ $answer }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
</body>
</html>
