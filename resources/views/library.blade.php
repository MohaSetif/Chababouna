<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/img/android-chrome-512x512.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    <title>كتبنا</title>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <div class="relative mb-4">
                <input type="text" name="SearchBar" id="SearchBar" placeholder="ابحث..." class="w-full px-4 py-2 pr-10 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <button type="button" onclick="applyFilters()" class="absolute inset-y-0 right-0 px-3 flex items-center">
                    <i class="fas fa-search text-gray-400"></i>
                </button>
            </div>

            <div class="flex gap-4">
                <select id="FieldFilter" class="w-1/3 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">تصفية حسب التخصص</option>
                    @foreach($books as $book)
                        <option value="{{ $book->field }}">{{ $book->field }}</option>
                    @endforeach
                </select>
                <select id="WriterFilter" class="w-1/3 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">تصفية حسب الكاتب</option>
                    @foreach($books as $book)
                        <option value="{{ $book->writer_name }}">{{ $book->writer_name }}</option>
                    @endforeach
                </select>
                <select id="PublisherFilter" class="w-1/3 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">تصفية حسب دار النشر</option>
                    @foreach($books as $book)
                        <option value="{{ $book->publication }}">{{ $book->publication }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table id="userTable" class="w-full table-auto">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">الرقم</th>
                        <th class="px-4 py-2">تاريخ الإدخال</th>
                        <th class="px-4 py-2">التخصص</th>
                        <th class="px-4 py-2">العنوان</th>
                        <th class="px-4 py-2">المؤلف</th>
                        <th class="px-4 py-2">التحقيق</th>
                        <th class="px-4 py-2">التخريج</th>
                        <th class="px-4 py-2">دار النشر</th>
                        <th class="px-4 py-2">عدد الأجزاء</th>
                        <th class="px-4 py-2">الملاحظة</th>
                        <th class="px-4 py-2">عدد النسخ</th>
                        <th class="px-4 py-2">الصورة</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach($books as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at }}</td>
                        <td class="border px-4 py-2">{{ $item->field }}</td>
                        <td class="border px-4 py-2">{{ $item->title }}</td>
                        <td class="border px-4 py-2">{{ $item->writer_name }}</td>
                        <td class="border px-4 py-2">{{ $item->review }}</td>
                        <td class="border px-4 py-2">{{ $item->documentation }}</td>
                        <td class="border px-4 py-2">{{ $item->publication }}</td>
                        <td class="border px-4 py-2">{{ $item->parts }}</td>
                        <td class="border px-4 py-2">{{ $item->note }}</td>
                        <td class="border px-4 py-2">{{ $item->copies }}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="Book cover" class="w-16 h-auto object-cover">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function applyFilters() {
            const searchQuery = document.getElementById("SearchBar").value.toLowerCase();
            const fieldFilter = document.getElementById("FieldFilter").value.toLowerCase();
            const writerFilter = document.getElementById("WriterFilter").value.toLowerCase();
            const publisherFilter = document.getElementById("PublisherFilter").value.toLowerCase();
            
            const table = document.getElementById("userTable");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                const id = cells[0]?.innerText.toLowerCase();
                const field = cells[2]?.innerText.toLowerCase();
                const writer = cells[4]?.innerText.toLowerCase();
                const publisher = cells[7]?.innerText.toLowerCase();
                
                const matchesSearch = !searchQuery || Object.values(cells).some(cell => cell.innerText.toLowerCase().includes(searchQuery));
                const matchesField = !fieldFilter || field.includes(fieldFilter);
                const matchesWriter = !writerFilter || writer.includes(writerFilter);
                const matchesPublisher = !publisherFilter || publisher.includes(publisherFilter);

                rows[i].style.display = matchesSearch && matchesField && matchesPublisher && matchesDate ? "" : "none";
            }
        }

        // Reapply filters when dropdowns change
        document.getElementById("FieldFilter").addEventListener("change", applyFilters);
        document.getElementById("WriterFilter").addEventListener("change", applyFilters);
        document.getElementById("PublisherFilter").addEventListener("change", applyFilters);
    </script>
</body>
</html>
