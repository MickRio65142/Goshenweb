<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Register - Goshen Silver Package | Goshen Work Skill Association</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#fcfcfc]">
    @include('partials.header')

    <section class="relative py-12 md:py-16 bg-gradient-to-r from-[#091c3d] to-[#0f172a] text-white overflow-hidden">
        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <span class="bg-[#c1121f] text-[10px] md:text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3 inline-block">Silver Package</span>
            <h1 class="font-serif text-2xl md:text-4xl font-bold mb-2">Goshen Silver Package</h1>
            <p class="text-gray-300 text-sm">You selected <strong>{{ count($selectedCourses) }} courses</strong>. Complete the form to activate your multi-course enrollment.</p>
        </div>
    </section>

    <section class="py-10 md:py-16">
        <div class="max-w-5xl mx-auto px-4 grid md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 md:p-8">
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 text-xs rounded-lg p-3 mb-6">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            Please fix the errors below and try again.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.silver.submit') }}">
                        @csrf
                        <input type="hidden" name="selected_courses" value="{{ implode(',', $selectedSlugs) }}">

                        <div class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-xl">
                            <h4 class="font-bold text-[#091c3d] text-sm mb-2"><i class="fa-solid fa-book-open text-[#c1121f] mr-2"></i> Selected Courses ({{ count($selectedCourses) }})</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($selectedCourses as $sc)
                                <span class="bg-white text-[11px] font-semibold text-[#091c3d] px-3 py-1.5 rounded-full border border-blue-200">{{ $sc['title'] }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <h3 class="font-bold text-[#091c3d] text-sm mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-user text-[#c1121f] mr-2"></i> Personal Information
                                </h3>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Full Name <span class="text-[#c1121f]">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Email Address <span class="text-[#c1121f]">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Phone Number <span class="text-[#c1121f]">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="e.g. 678672998"
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Date of Birth <span class="text-[#c1121f]">*</span></label>
                                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('date_of_birth') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Gender <span class="text-[#c1121f]">*</span></label>
                                        <select name="gender" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                            <option value="">Select gender</option>
                                            <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Nationality <span class="text-[#c1121f]">*</span></label>
                                        <input type="text" name="nationality" value="{{ old('nationality', 'Cameroonian') }}" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('nationality') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Address</label>
                                        <input type="text" name="address" value="{{ old('address') }}"
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Education Level</label>
                                        <select name="education_level"
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                            <option value="">Select</option>
                                            <option value="High School" {{ old('education_level') === 'High School' ? 'selected' : '' }}>High School</option>
                                            <option value="Diploma" {{ old('education_level') === 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                            <option value="Bachelor" {{ old('education_level') === 'Bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                                            <option value="Master" {{ old('education_level') === 'Master' ? 'selected' : '' }}>Master's Degree</option>
                                            <option value="Other" {{ old('education_level') === 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">How did you hear about us?</label>
                                        <select name="heard_about_us"
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                            <option value="">Select</option>
                                            <option value="Facebook" {{ old('heard_about_us') === 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                            <option value="WhatsApp" {{ old('heard_about_us') === 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                                            <option value="Friend" {{ old('heard_about_us') === 'Friend' ? 'selected' : '' }}>Friend/Family</option>
                                            <option value="Google" {{ old('heard_about_us') === 'Google' ? 'selected' : '' }}>Google Search</option>
                                            <option value="Other" {{ old('heard_about_us') === 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Campus <span class="text-[#c1121f]">*</span></label>
                                        <select name="campus" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                            <option value="">Select campus</option>
                                            <option value="douala" {{ old('campus') === 'douala' ? 'selected' : '' }}>Douala Main Campus</option>
                                            <option value="limbe" {{ old('campus') === 'limbe' ? 'selected' : '' }}>Limbe Campus</option>
                                        </select>
                                        @error('campus') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="font-bold text-[#091c3d] text-sm mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-lock text-[#c1121f] mr-2"></i> Account Security
                                </h3>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Password <span class="text-[#c1121f]">*</span></label>
                                        <input type="password" name="password" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Confirm Password <span class="text-[#c1121f]">*</span></label>
                                        <input type="password" name="password_confirmation" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="font-bold text-[#091c3d] text-sm mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-credit-card text-[#c1121f] mr-2"></i> Payment Details
                                </h3>
                                {{-- Payment section commented out for future use
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Payment Method <span class="text-[#c1121f]">*</span></label>
                                        <select name="payment_method" required
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                            <option value="">Select payment method</option>
                                            <option value="MTN_MoMo" {{ old('payment_method') === 'MTN_MoMo' ? 'selected' : '' }}>MTN MoMo</option>
                                            <option value="Orange_Money" {{ old('payment_method') === 'Orange_Money' ? 'selected' : '' }}>Orange Money</option>
                                            <option value="Bank_Transfer" {{ old('payment_method') === 'Bank_Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                        </select>
                                        @error('payment_method') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-700 mb-1">Transaction Reference <span class="text-[#c1121f]">*</span></label>
                                        <input type="text" name="transaction_reference" value="{{ old('transaction_reference') }}" required
                                            placeholder="Transaction ref from your payment"
                                            class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:border-[#c1121f] outline-none">
                                        @error('transaction_reference') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                --}}
                            </div>

                            <div class="flex items-start gap-3">
                                <input type="checkbox" name="terms_accepted" value="1" id="terms" {{ old('terms_accepted') ? 'checked' : '' }} required
                                    class="mt-1 w-4 h-4 text-[#c1121f] border-gray-300 rounded focus:ring-[#c1121f]">
                                <label for="terms" class="text-xs text-gray-600">
                                    I have read and agree to the
                                    <a href="/terms" target="_blank" class="text-[#c1121f] hover:underline">Terms &amp; Conditions</a>,
                                    <a href="/privacy" target="_blank" class="text-[#c1121f] hover:underline">Privacy Policy</a>, and
                                    <a href="/refunds" target="_blank" class="text-[#c1121f] hover:underline">Refund Policy</a>.
                                    <span class="text-[#c1121f]">*</span>
                                </label>
                            </div>
                            @error('terms_accepted') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                            <button type="submit" class="w-full bg-[#c1121f] hover:bg-[#091c3d] text-white font-bold py-3 px-6 rounded-lg transition shadow-lg text-sm">
                                <i class="fa-solid fa-paper-plane mr-2"></i> Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-6">
{{-- Subscription fee and payment info commented out for future use
                    <h3 class="font-bold text-[#091c3d] mb-3 text-sm">Subscription Fee</h3>
                    <div class="text-3xl font-black text-[#c1121f] mb-4">{{ number_format((float) $registrationFee, 0, ',', ' ') }} CFA</div>
--}}
                    <div class="border-t border-gray-100 pt-4 space-y-3 text-xs text-gray-600">
                        <div class="flex justify-between">
                            <span>Package</span>
                            <span class="font-bold text-[#091c3d] text-right">Goshen Silver</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Courses</span>
                            <span class="font-bold text-[#091c3d]">{{ count($selectedCourses) }} selected</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Price</span>
                            <span class="font-bold text-[#091c3d]">360,000 FCFA</span>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-[#091c3d]/5 rounded-lg">
                        <p class="text-xs text-gray-600">
                            <i class="fa-solid fa-shield-halved text-[#c1121f] mr-1"></i>
                            Your application will be reviewed by our admissions team.
                        </p>
                    </div>

                    {{-- Payment instructions commented out for future use
                    <div class="mt-4 border-t border-gray-100 pt-4">
                        <h4 class="font-bold text-[#091c3d] text-xs mb-3">Payment Instructions</h4>
                        <div class="space-y-3">
                            @foreach($paymentInstructions as $method => $instruction)
                            <div class="border border-gray-100 rounded-lg p-2.5">
                                <h5 class="font-semibold text-xs text-[#c1121f] mb-1">{{ $method }}</h5>
                                <p class="text-[10px] text-gray-600">{{ $instruction }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
