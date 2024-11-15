<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التعليم القرآني</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkbox = document.getElementById('first_jquery_checkbox');
            const input1 = document.getElementById('first_jquery_input1');
            const input2 = document.getElementById('first_jquery_input2');

            checkbox.addEventListener('click', () => {
                const isDisabled = checkbox.checked;
                input1.disabled = isDisabled;
                input2.disabled = isDisabled;
            });
        });
    </script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Image Section -->
        <div class="lg:w-1/2 lg:fixed lg:left-0 h-64 lg:h-screen">
            <img src="/img/10051f000001gsrxu99A6.jpg" alt="التعليم القرآني" class="w-full h-full object-cover"/>
        </div>

        <!-- Form Section -->
        <div class="lg:w-1/2 p-8 lg:min-h-screen bg-white">
            <form action="/student_register" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto space-y-6">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">التعليم القرآني</h1>
                    <p class="text-gray-600">انضم إلى جمعيتنا اليوم</p>
                </div>

                <!-- Name and Surname -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">الاسم:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('name')
                            <p class="text-red-500 text-sm">نسيت ملء الاسم</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">اللقب:</label>
                        <input type="text" name="surname" value="{{ old('surname') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('surname')
                            <p class="text-red-500 text-sm">نسيت ملء اللقب</p>
                        @enderror
                    </div>
                </div>

                <!-- Job and Parent's Job -->
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">أقل من 18 سنة؟ فلا تكتب مهنتك إذن</label>
                    <input type="checkbox" id="first_jquery_checkbox" name="Over" class="form-checkbox h-5 w-5 text-blue-600">
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">المهنة:</label>
                    <input type="text" name="job" id="first_jquery_input1" value="{{ old('job') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                    @error('job')
                        <p class="text-red-500 text-sm">نسيت أن تضع مهنتك</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Additional Information -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">مهنة الولي:</label>
                        <input type="text" name="dad_job" value="{{ old('dad_job') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">مهنة الأم:</label>
                        <input type="text" name="mom_job" value="{{ old('mom_job') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                </div>

                <!-- Gender -->
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium mb-2">الجنس:</label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="sex" value="male" class="form-radio text-blue-600">
                            <span class="mr-2">ذكر</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="sex" value="female" class="form-radio text-blue-600">
                            <span class="mr-2">أنثى</span>
                        </label>
                    </div>
                    @error('sex')
                        <p class="text-red-500 text-sm">نسيت أن تضع جنسك</p>
                    @enderror
                </div>

                <!-- Birth Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">تاريخ الميلاد:</label>
                        <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('birthdate')
                            <p class="text-red-500 text-sm">نسيت ملء تاريخ الميلاد</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">مكان الميلاد:</label>
                        <input type="text" name="place" value="{{ old('place') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('place')
                            <p class="text-red-500 text-sm">نسيت ملء مكان الميلاد</p>
                        @enderror
                    </div>
                </div>

                <!-- Address -->                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">العنوان:</label>
                        <input type="text" name="residence" value="{{ old('residence') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('residence')
                            <p class="text-red-500 text-sm">نسيت ملء مكان الإقامة</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="block text-gray-700">المستوى الدراسي:</label>
                        <select name="scholar_year" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option>التمهيدي</option>
                            <option>التحضيري</option>
                            <option>الابتدائي</option>
                            <option>المتوسطي</option>
                            <option>الثانوي</option>
                            <option>الجامعي</option>
                            <option>خيار آخر</option>
                        </select>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">رقم الهاتف:</label>
                        <input type="text" name="tel" value="{{ old('tel') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('tel')
                            <p class="text-red-500 text-sm">نسيت ملء رقم الهاتف أو هو خاطئ</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">رقم هاتف الولي:</label>
                        <input type="text" name="dad_tel" value="{{ old('dad_tel') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                        @error('dad_tel')
                            <p class="text-red-500 text-sm">نسيت ملء رقم هاتف الولي أو هو خاطئ</p>
                        @enderror
                    </div>
                </div>

                <!-- Profile Picture -->
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">أدخل صورتك:</label>
                    <input type="file" name="photo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                    @error('photo')
                        <p class="text-red-500 text-sm">لم تدخل صورتك</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit" class="w-full bg-blue-600 text-white font-medium px-4 py-2 rounded-lg hover:bg-blue-700 transition">تسجيل</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
