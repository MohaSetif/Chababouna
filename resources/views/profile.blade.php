@php
    $statusTranslations = [
        'pending' => 'قيد الانتظار',
        'approved' => 'موافق عليه',
        'rejected' => 'مرفوض',
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  <title>حسابي الخاص</title>
  <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f6f9fc 0%, #e9f1f7 100%);
        }
  </style>
</head>
<body class="bg-gray-100 m-2">
  <div class="container mx-auto my-10 bg-white rounded-lg shadow-lg">
    <!-- Profile Header -->
    <div class="grid grid-cols-1 md:grid-cols-3 border-b border-gray-200">
      <!-- Profile Sidebar -->
      <div class="col-span-1 flex flex-col items-center py-6 border-r border-gray-200">
        <img class="w-32 h-32 rounded-full mb-4" src="/img/twitter-avi-gender-balanced-figure.png" alt="User Avatar">
        <h3 class="text-lg font-semibold">{{ Auth::user()->name }}</h3>
        <p class="text-gray-500 text-xs md:text-md">{{ Auth::user()->email }}</p>
      </div>
      <!-- Profile Details -->
      <div class="col-span-2 p-6 text-right">
        <h2 class="text-2xl font-bold mb-4">حسابي الخاص</h2>
        <div class="grid grid-cols-1 gap-4">
          <div>
            <label class="text-gray-500 font-medium block">الاسم</label>
            <input type="text" class="mt-1 bg-gray-100 rounded-md text-right px-4 py-2 w-full" value="{{ Auth::user()->name }}" disabled>
          </div>
        </div>
      </div>
    </div>
    <!-- Registration Sections -->
    <div class="p-6 text-right">
      <h2 class="text-2xl font-bold mb-4">تسجيلاتي</h2>
      <div class="space-y-8">
        <!-- Quran School Registrations -->
        <div>
          <h3 class="text-xl font-semibold text-gray-700 mb-2">التسجيل في التعليم القرآني</h3>
          <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-200">
              <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm font-semibold">
                  <th class="px-4 py-2 text-right">الحالة</th>
                  <th class="px-4 py-2 text-right">تاريخ التسجيل</th>
                </tr>
              </thead>
              <tbody>
                @foreach($school_regs as $school_reg)
                <tr class="border-b hover:bg-gray-50">
                  <td class="px-4 py-2 text-gray-500 text-right">{{ $statusTranslations[$school_reg->status] }}</td>
                  <td class="px-4 py-2 text-gray-500 text-right">{{ $school_reg->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- Membership Registrations -->
        <div>
          <h3 class="text-xl font-semibold text-gray-700 mb-2">التسجيل في العضوية</h3>
          <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-200">
              <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm font-semibold">
                  <th class="px-4 py-2 text-right">الحالة</th>
                  <th class="px-4 py-2 text-right">تاريخ التسجيل</th>
                </tr>
              </thead>
              <tbody>
                @foreach($membership_regs as $membership_reg)
                <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2 text-gray-500 text-right">{{ $statusTranslations[$membership_reg->status] }}</td>
                  <td class="px-4 py-2 text-gray-500 text-right">{{ $membership_reg->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
