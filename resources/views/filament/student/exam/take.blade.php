<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $exam->title }} | Goshen Work Skill Association</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50" x-data="{ timeLeft: {{ $timeRemaining }}, minutes: 0, seconds: 0, init() { this.updateDisplay(); setInterval(() => { this.timeLeft--; this.updateDisplay(); if(this.timeLeft <= 0) document.getElementById('exam-form').requestSubmit(); }, 1000); }, updateDisplay() { this.minutes = Math.floor(this.timeLeft / 60); this.seconds = this.timeLeft % 60; } }">

    <div class="max-w-4xl mx-auto px-4 py-6">
        <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
            <div>
                <h1 class="font-bold text-[#091c3d]">{{ $exam->title }}</h1>
                <p class="text-xs text-gray-500">Attempt {{ $attempt->attempt_number }} of {{ $exam->max_attempts }}</p>
            </div>
            <div class="text-center" :class="timeLeft < 60 ? 'text-red-600 animate-pulse' : 'text-[#091c3d]'">
                <div class="text-2xl font-bold" x-text="String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0')"></div>
                <div class="text-xs font-semibold">REMAINING</div>
            </div>
        </div>

        <form id="exam-form" action="{{ route('student.exam.submit', ['attemptId' => $attempt->id]) }}" method="POST">
            @csrf
            <div class="space-y-4">
                @foreach($questions as $index => $question)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-6">
                    <p class="font-semibold text-[#091c3d] mb-3">{{ $index + 1 }}. {{ $question->question_text }}</p>
                    <div class="space-y-2 ml-2">
                        @foreach(['a', 'b', 'c', 'd'] as $option)
                        @if(!empty($question['option_' . $option]))
                        <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-100 hover:border-[#c1121f] hover:bg-[#c1121f]/5 cursor-pointer transition">
                            <input type="radio" name="question_{{ $question->id }}" value="{{ $option }}" class="accent-[#c1121f]" required>
                            <span class="text-sm text-gray-700">{{ $question['option_' . $option] }}</span>
                        </label>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <button type="submit" class="bg-[#c1121f] hover:bg-[#091c3d] text-white font-bold py-3 px-10 rounded-lg transition shadow-lg">
                    <i class="fa-solid fa-check-circle mr-2"></i> Submit Exam
                </button>
            </div>
        </form>
    </div>
</body>
</html>
