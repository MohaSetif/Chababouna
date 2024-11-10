<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الانخراط</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Image Section -->
        <div class="lg:w-1/2 lg:fixed lg:left-0 h-64 lg:h-screen">
            <img src="/img/243d2509f1657c6addbddbdba212492e.jpg" alt="Membership" class="w-full h-full object-cover"/>
        </div>

        <!-- Form Section -->
        <div class="lg:w-1/2 p-8 lg:min-h-screen bg-white">
            <form action="/member_register" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto space-y-6">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">الانـــخــراط</h1>
                    <p class="text-gray-600">انضم إلى جمعيتنا اليوم</p>
                </div>

                <!-- Personal Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">الاسم:</label>
                        <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        @error('name')
                            <p class="text-red-500 text-sm">نسيت ملء الاسم</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">اللقب:</label>
                        <input type="text" name="surname" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        @error('surname')
                            <p class="text-red-500 text-sm">نسيت ملء اللقب</p>
                        @enderror
                    </div>
                </div>

                <!-- Job -->
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">المهنة:</label>
                    <input type="text" name="job" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
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
                </div>

                <!-- Birth Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">تاريخ الميلاد:</label>
                        <input type="date" name="birthdate" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">مكان الميلاد:</label>
                        <input type="text" name="place" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                </div>

                <!-- Address and Contact -->
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">العنوان:</label>
                    <input type="text" name="residence" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">الهواية:</label>
                    <input type="text" name="hobby" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium">ماذا يمكن أن تقدم للجمعية؟</label>
                    <textarea name="help" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">رقم الهاتف:</label>
                        <input type="tel" name="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">الصورة الشخصية:</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-lg border-2 border-dashed border-gray-300 cursor-pointer hover:bg-gray-50">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="mt-2 text-sm text-gray-600">اختر صورة</span>
                                <input type="file" name="photo" class="hidden">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-8">
                    <button type="submit" class="px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        انضم الآن
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>