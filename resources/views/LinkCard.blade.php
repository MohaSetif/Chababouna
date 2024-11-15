<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
  <title>ماذا تريد أن تسجل؟</title>
  <link rel="icon" type="image/x-icon" href="/img/android-chrome-512x512.png">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
    }
    .gradient-bg {
      background: linear-gradient(135deg, #f6f9fc 0%, #e9f1f7 100%);
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6 text-center">
    <h1 class="text-3xl font-bold mb-6">ماذا تريد أن تسجل؟</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="registration-options"></div>
  </div>

  <script>
    const registrationOptions = [
      {
        title: "التعليم القرآني",
        description: "فالحق و الحق يقال، خيرنا من تعلم القرآن و علمه.",
        imageUrl: "/img/Quran.jpg",
        link: "التسجيل-في-المدرسة-القرآنية"
      },
      {
        title: "الانخراط إلى الجمعية",
        description: "انخرط الآن و ساهم بكل ما تملكه من مواهب و قدرات تساعد على تطوير الجمعية و مساندة الناس.",
        imageUrl: "/img/295959593_2674637409336841_7736524670648697173_n.jpg",
        link: "الانضمام-إلى-الجمعية"
      }
    ];

    const container = document.getElementById('registration-options');
    registrationOptions.forEach(option => {
      const card = document.createElement('div');
      card.className = "relative overflow-hidden rounded-lg shadow-lg transform hover:-translate-y-1 hover:scale-105 transition duration-300";
      card.innerHTML = `
        <a href="${option.link}">
          <img src="${option.imageUrl}" class="object-cover w-full h-48" alt="${option.title}" />
          <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 opacity-70 transition duration-300 hover:opacity-90">
            <div class="absolute top-0 right-0 p-4 flex items-center justify-between">
              <h3 class="text-white font-bold text-2xl">${option.title}</h3>
            </div>
            <p class="text-white absolute text-right bottom-0 right-0 left-0 p-4 mt-auto">${option.description}</p>
          </div>
        </a>
      `;
      container.appendChild(card);
    });
  </script>
</body>
</html>
