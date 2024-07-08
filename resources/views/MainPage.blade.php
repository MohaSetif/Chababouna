<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية | جمعية شبابنا العلمية الثقافية</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="icon" type="image/x-icon" href="/img/android-chrome-512x512.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
<body class="gradient-bg">
  <header class="fixed z-50 w-full header">
      <div class="auth-links">
          @guest
              @if (Route::has('register'))
                  <a href="{{route('register')}}">سجل</a>
              @endif
              @if (Route::has('login'))
                  <a href="{{route('login')}}">أدخل</a>
              @endif
          @else
              <div class="dropdown">
                  <button class="dropbtn">{{ Auth::user()->name }}</button>
                  <div class="dropdown-content">
                      <a href="حسابي">حسابي</a>
                      <a href="الخيارات">صفحة التسجيلات</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          {{ __('أخرج') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </div>
          @endguest
      </div>
      <div class="menu-icon" onclick="toggleMenu()">☰</div>
      <nav id="navbar">
          <a id="section" onclick="change()" href="#main" class="nav-btn">صفحتنا</a>
          <a id="section" onclick="change()" href="#library" class="nav-btn">مكتبتنا</a>
          <a id="section" onclick="change()" href="#committies" class="nav-btn">لجاننا</a>
          <a id="section" onclick="change()" href="#activities" class="nav-btn">نشاطاتنا</a>
          <a id="section" onclick="change()" href="#achievements" class="nav-btn">إنجازاتنا</a>
      </nav>
      <div class="logo">
          <img src="/img/IMG_20220701_112957-removebg-preview.png" alt="Logo">
      </div>
  </header>

  <main>
    <section id="welcome" class="h-screen w-full flex items-center justify-center relative overflow-hidden">
      <img src="/img/Setif.jpeg" alt="Welcome Image" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-black bg-opacity-60"></div>
      <h1 class="welcome text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-6xl font-bold text-white text-center z-10 px-4 leading-10">
        <span class="block mb-2 text-green-400">مرحبا بكم في</span>
        <span class="block text-5xl sm:text-4xl md:text-5xl lg:text-7xl xl:text-8xl mb-4">جمـعــية شبــابـنـا</span>
        <span class="block text-5xl sm:text-3xl md:text-4xl lg:text-7xl xl:text-8xl">العــلــمــية الثــقــافيـــة</span>
      </h1>
    </section>

        <section id="main" class="py-16 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-bold text-green-800 mb-8 text-center">صـفحــتـنا</h2>
                <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                    جمعية شبابنا هي جمعية علمية ثقافية، اعتمدت سنة 2013م تحت رقم 2013/40م من بلدية سطيف و بمعية مديرية الثقافة لولاية سطيف. شهدت الجمعية تغيرا في القانون الأساسي بتاريخ 2016/07/06م و تغييرا ثان في مهام أعضاء المكتب التنفيذي مرتين الأول بتاريخ 2018/12/29م و الثاني بتاريخ 2019/07/17م. كل هذا من أجل السير الحسن للجمعية. لها أهداف هي:
                </p>
                <ol class="list-decimal list-inside space-y-2 text-gray-700 mb-8 pr-6">
                    <li>تربية الجيل على العلم و الأخلاق و الوطنية.</li>
                    <li>فتح آفاق جديدة أمام الشباب على حقائق العلم و المعرفة و الثقافة.</li>
                    <li>إحياء المناسبات الدينية و الوطنية.</li>
                    <li>ترسيخ حب الوطن في الناشئة.</li>
                    <li>إقامة نشاطات ترفيهية تعليمية تربوية ثقافية.</li>
                    <li>إقامة ملتقيات فكرية ثقافية، أدبية، تاريخية.</li>
                    <li>توعية الشباب حول مخاطر الآفات الاجتماعية.</li>
                    <li>تنظيم رحلات استكشافية سياحية.</li>
                    <li>إنتاج عروض مسرحية.</li>
                    <li>فتح ناد لتعليم اللغة العربية و اللغات الحية.</li>
                    <li>الاهتمام بالمجال السمعي البصري.</li>
                    <li>تنظيم حفلات فنية إنشادية.</li>
                </ol>
                <p class="text-lg text-gray-700 leading-relaxed">
                    يسهر على هذه الأهداف لجان سخروا أوقاتهم و جهودهم لتحقيقها و هي كما جاءت في المادة 23 من القانون الأساسي للجمعية.
                </p>
            </div>
        </section>

        <section id="library" class="py-16 bg-gray-100">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">مكــتبـتـنـا</h2>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    جمعيتنا مهتمة بجمع الكتب، و كلما ساهم الناس بالتبرع بالكتب كلما كبرت مكتبتنا، و الكتب التي نمتلكها من مختلف التخصصات. يمكنكم أن تتبرعوا بأية كتب أو استلامها خلال شهر، و أن يترك المستلم رقم هاتفه. للمزيد من المعلومات حول مكتبتنا اضغطوا الزر الذي في الأسفل.
                </p>
                <div class="text-center">
                    <a href="/مكتبتنا" class="inline-block bg-green-600 text-white font-bold py-3 px-6 rounded hover:bg-green-700 transition duration-300">كتــبـنــا</a>
                </div>
            </div>
        </section>

        <section id="committies" class="py-16 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">لــجـانـنـا</h2>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    تساعد الجمعية العامة لجان دائمة، مكلفة بدراسة المسائل المتعلقة بأهداف الجمعية. اللجان الدائمة هي ثلاثة:
                </p>

                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-semibold text-green-700 mb-4">لجنة التربية و التعليم و هي تضم:</h3>
                        
                        <div class="mb-6">
                            <h4 class="text-xl font-semibold text-green-600 mb-2">خلية التعليم القرآني و فيها أربع أقسام:</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 pr-6">
                                <li>قسم تحفيظ القرآن الكريم.</li>
                                <li>قسم مراجعة القرآن الكريم.</li>
                                <li>قسم تصحيح التلاوة.</li>
                                <li>قسم الإجازات القرآنية.</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-xl font-semibold text-green-600 mb-2">خلية اللغة العربية و اللغات الحية:</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 pr-6">
                                <li>قسم اللغة العربية.</li>
                                <li>قسم اللغة الفرنسية.</li>
                                <li>قسم اللغة الانجليزية.</li>
                            </ul>
                        </div>

                        <p class="text-lg text-gray-700 mb-4">خلية تعليم الإعلام الآلي.</p>

                        <div class="mb-6">
                            <h4 class="text-xl font-semibold text-green-600 mb-2">خلية المسرح و الفنون التشكيلية و التربية المدنية:</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 pr-6">
                                <li>قسم المسرح.</li>
                                <li>قسم الرسم و الفنون التشكيلية.</li>
                                <li>قسم التربية المدنية.</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-xl font-semibold text-green-600 mb-2">خلية الاستشارات النفسية:</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 pr-6">
                                <li>قسم الاستشارات النفسية.</li>
                                <li>قسم الأرطفوني.</li>
                                <li>قسم الاستشارات الأسرية و تربية الأطفال.</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-xl font-semibold text-green-600 mb-2">خلية المسرح و الفنون التشكيلية و التربية المدنية:</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 pr-6">
                                <li>قسم الإرشاد الديني.</li>
                                <li>قسم الاستشارات القانونية.</li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-2xl font-semibold text-green-700">لجنة الإعلام و الاتصال</p>
                    <p class="text-2xl font-semibold text-green-700">لجنة التجهيز و الصيانة و الوسائل</p>
                </div>
            </div>
        </section>

        <section id="activities" class="py-16 bg-gray-100">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">نـشــاطــاتــنـا</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="/img/MG_2262.png" alt="نشاطات دائمة" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-4">نشاطات دائمة</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>التعليم القرآني</li>
                                <li>أحكام الترتيل</li>
                                <li>القسم التحضيري</li>
                                <li>محو الأمية</li>
                                <li>المكتبة</li>
                                </ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="/img/184954225_2290659561067963_6053501625868536699_n.jpg" alt="نشاطات دائمة أخرى" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-4">نشاطات دائمة أخرى</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>قفة شهرية</li>
                                <li>تغسيل الموتى و تجهيزهم</li>
                                <li>الجنائز</li>
                                <li>الأفراح و الأعراس</li>
                                <li>تجهيزات و وسائل (طاولات، كراسي، صحون...)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="/img/280550530_2607785796022003_3738530076327582304_n.jpg" alt="نشاطات دائمة إضافية" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-4">نشاطات دائمة إضافية</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>سيارة إسعاف</li>
                                <li>توزيع الماء يوميا</li>
                                <li>تقديم وجبتي الغداء و العشاء بالمستشفى</li>
                                <li>إمداد المعدات: كراسي، أسرة، قارورات أوكسجين، مولدات أوكسجين</li>
                                <li>ورشة للرسم و الفنون التشكيلية</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="/img/_MG_2976.png" alt="نشاطات موسمية" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-4">نشاطات موسمية</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>دورات في تحفيظ القرآن</li>
                                <li>دورات في تحفيظ الأربعين النووية</li>
                                <li>دورات في أحكام الترتيل</li>
                                <li>تكوين الحجاج</li>
                                <li>مخيمات صيفية</li>
                                <li>إحياء المناسبات الدينية</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="/img/received_2247674025457714.jpeg" alt="نشاطات موسمية أخرى" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-4">نشاطات موسمية أخرى</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>مركز الإفطار</li>
                                <li>قفة شهر رمضان</li>
                                <li>كسوة العيد</li>
                                <li>كبش العيد</li>
                                <li>تجهيز العرائس</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="/img/279383055_2593709427429640_5527744589639820437_n.jpg" alt="نشاطات موسمية إضافية" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-4">نشاطات موسمية إضافية</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>تقديم وجبات ساخنة محمولة طيلة شهر رمضان</li>
                                <li>تجهيز المستشفى</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="achievements" class="py-16 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">إنجازاتنا</h2>
                <!-- Add content for achievements here -->
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    نحن فخورون بإنجازاتنا المتعددة في خدمة المجتمع. سنقوم بتحديث هذا القسم قريبًا لعرض أبرز إنجازاتنا وتأثيرنا على المجتمع.
                </p>
            </div>
        </section>
    </main>

    <footer class="bg-green-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-4">جمعية شبابنا العلمية الثقافية</h3>
                    <p>نعمل معًا لبناء مجتمع أفضل من خلال العلم والثقافة.</p>
                </div>
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-4">روابط سريعة</h3>
                    <ul class="space-y-2">
                        <li><a href="#main" class="hover:text-green-300">الرئيسية</a></li>
                        <li><a href="#library" class="hover:text-green-300">المكتبة</a></li>
                        <li><a href="#committees" class="hover:text-green-300">اللجان</a></li>
                        <li><a href="#activities" class="hover:text-green-300">النشاطات</a></li>
                        <li><a href="#achievements" class="hover:text-green-300">الإنجازات</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3">
                    <h3 class="text-xl font-bold mb-4">تواصل معنا</h3>
                    <p>العنوان: سطيف، الجزائر</p>
                    <p>البريد الإلكتروني: info@shababuna.org</p>
                    <p>الهاتف: +213 XX XX XX XX</p>
                </div>
            </div>
            <div class="mt-8 text-center">
                <p>&copy; 2024 جمعية شبابنا العلمية الثقافية. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleMenu() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('active');
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

      document.addEventListener('DOMContentLoaded', function() {
        var header = document.querySelector('header');
        var scrollThreshold = 100;
      
        window.addEventListener('scroll', function() {
          if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
          } else {
            header.classList.remove('scrolled');
          }
        });
      });
    </script>
</body>
</html>


    <!-- <div class="content">
        <h1>نشاطاتنـا</h1>
        <div class="cards">
         <div class="row">

         
          <div class="Sec1">
          <span>العلمية</span>
          <div class="card">
          <div class="card_img"><img src="/img/_MG_2262.jpg"></div>
            <div class="card_content">
                <h3>دائمة</h3>
                  <li>التعليم القرآني</li>
                  <li>أحكام الترتيل</li>
                  <li>القسم التحضيري</li>
                  <li>محو الأمية</li>
                  <li>المكتبة</li>
            </div>
          </div>  

          <div class="card">
          <div class="card_img"><img src="/img/_MG_2976.jpg"></div>
            <div class="card_content">
              <h3>موسمية</h3>
                <li>دورات في تحفيظ القرآن</li>
                <li>دورات في تحفيظ الأربعين النووية</li>
                <li>دورات في أحكام الترتيل</li>
                <li>تكوين الحجاج</li>
                <li>مخيمات صيفية</li>
                <li>إحياء المناسبات الدينية</li>
            </div>
          </div>
        </div>

        <div class="Sec2">
        <span>الاجتماعية</span>
        <div class="card">
          <div class="card_img"><img src="/img/184954225_2290659561067963_6053501625868536699_n.jpg"></div>
            <div class="card_content">
                <h3>دائمة</h3>
                  <li>قفة شهرية</li>
                  <li>تغسيل الموتى و تجهيزهم</li>
                  <li>الجنائز</li>
                  <li>الأفراح و الأعراس</li>
                  <li>تجهيزات و وسائل (طاولات، كراسي، صحون...)</li>
          </div>
        </div>  

        <div class="card">
          <div class="card_img"><img src="/img/received_2247674025457714.jpeg"></div>
            <div class="card_content">
              <h3>موسمية</h3>
                <li>مركز الإفطار</li>
                <li>قفة شهر رمضان</li>
                <li>كسوة العيد</li>
                <li>كبش العيد</li>
                <li>تجهيز العرائس</li>
            </div>
          </div>
        </div>


        <div class="Sec3">
        <span>الصحية</span>
          <div class="card">
          <div class="card_img"><img src="/img/280550530_2607785796022003_3738530076327582304_n.jpg"></div>
            <div class="card_content">
                <h3>دائمة</h3>
                  <li>سيارة إسعاف</li>
                  <li>توزيع الماء يوميا</li>
                  <li>تقديم وجبتي الغداء و العشاء بالمستشفى</li>
                  <li>إمداد المعدات: كراسي، أسرة، قارورات أوكسجين، مولدات أوكسجين</li>
                  <li>ورشة للرسم و الفنون التشكيلية</li>
            </div>
          </div>  

          <div class="card">
          <div class="card_img"><img src="/img/279383055_2593709427429640_5527744589639820437_n.jpg"></div>
            <div class="card_content">
              <h3>موسمية</h3>
                <li>تقديم وجبات ساخنة محمولة طيلة شهر رمضان</li>
                <li>تجهيز المستشفى</li>
            </div>
          </div>
        </div>

          </div>
        </div>           
      </div> -->


    <script>
        function toggleMenu() {
            var navbar = document.getElementById("navbar");
            navbar.classList.toggle("show");
        }

        function change() {
          var section = document.getElementById("section");
          section.classList.add("active");
        }

        document.getElementById("cards").onmousemove = e => {
        for(const card of document.getElementsByClassName("card")) {
          const rect = card.getBoundingClientRect(),
                x = e.clientX - rect.left,
                y = e.clientY - rect.top;

          card.style.setProperty("--mouse-x", `${x}px`);
          card.style.setProperty("--mouse-y", `${y}px`);
        };
      }

      document.addEventListener('DOMContentLoaded', function() {
        var header = document.querySelector('header');
        var scrollThreshold = 100;
      
        window.addEventListener('scroll', function() {
          if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
          } else {
            header.classList.remove('scrolled');
          }
        });
      });
    </script>
</body>
</html>

<!-- <!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية | جمعية شبابنا العلمية الثقافية</title>
    <link rel="icon" type="image/x-icon" href="/img/android-chrome-512x512.png">
    <link rel="stylesheet" href="/css/StyleSlide.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <header>
      <div class="Logo"><img src="/img/IMG_20220701_112957-removebg-preview.png"></div>
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
        @guest
          @if (Route::has('register'))
          <a href="{{route('register')}}">سجل</a>
          @endif
          @if (Route::has('login'))
          <a href="{{route('login')}}">أدخل</a>
          @endif
          @else
          <div class="dropdown">
            <button class="dropbtn">{{ Auth::user()->name }}</button>
            <div class="dropdown-content">
            <a href="حسابي">حسابي</a>
              <a href="الخيارات">صفحة التسجيلات</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('أخرج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
          </div>
        @endguest
        </div>
      </div>
    </header>



    <section class="mt-[4rem]" class="home">
      <video class="video-slide" src="/vid/production ID_4755514.mp4" autoplay muted loop></video>
      <video class="video-slide" src="/vid/pexels-cottonbro-9290078.mp4" autoplay muted loop></video>
      <video class="video-slide" src="/vid/pexels-assad-tanoli-5788681.mp4" autoplay muted loop></video>
      <video class="video-slide" src="/vid/Video Inside A Library.mp4" autoplay muted loop></video>
      <video class="video-slide active" src="/vid/214180c8.mp4" autoplay muted loop></video>
      <div class="content">
        <h1>من إنجازاتنا</h1>
        <div class="Ijaza">
          <div class="block">
        <img src="/img/pdf2png/DOC001/DOC001-1.png">
        <img src="/img/pdf2png/DOC002/DOC002-1.png">
        <img src="/img/pdf2png/DOC003/DOC003-1.png">
        </div>
        <div class="block">
        <img src="/img/pdf2png/DOC004/DOC004-1.png">
        <img src="/img/pdf2png/DOC005/DOC005-1.png">
        <img src="/img/pdf2png/DOC006/DOC006-1.png">
        </div>
        <div class="block">
        <img src="/img/pdf2png/DOC007/DOC007-1.png">
        <img src="/img/pdf2png/DOC008/DOC008-1.png">
        <img src="/img/pdf2png/DOC009/DOC009-1.png">
        </div>
        <div class="block">
        <img src="/img/pdf2png/DOC010/DOC010-1.png">
        <img src="/img/pdf2png/DOC011/DOC011-1.png">
        </div>
        </div>
      </div>
      <div class="content">
        <h1>نشاطاتنـا</h1>
        <div class="cards">
         <div class="row">

         
          <div class="Sec1">
          <span>العلمية</span>
          <div class="card">
          <div class="card_img"><img src="/img/_MG_2262.jpg"></div>
            <div class="card_content">
                <h3>دائمة</h3>
                  <li>التعليم القرآني</li>
                  <li>أحكام الترتيل</li>
                  <li>القسم التحضيري</li>
                  <li>محو الأمية</li>
                  <li>المكتبة</li>
            </div>
          </div>  

          <div class="card">
          <div class="card_img"><img src="/img/_MG_2976.jpg"></div>
            <div class="card_content">
              <h3>موسمية</h3>
                <li>دورات في تحفيظ القرآن</li>
                <li>دورات في تحفيظ الأربعين النووية</li>
                <li>دورات في أحكام الترتيل</li>
                <li>تكوين الحجاج</li>
                <li>مخيمات صيفية</li>
                <li>إحياء المناسبات الدينية</li>
            </div>
          </div>
        </div>

        <div class="Sec2">
        <span>الاجتماعية</span>
        <div class="card">
          <div class="card_img"><img src="/img/184954225_2290659561067963_6053501625868536699_n.jpg"></div>
            <div class="card_content">
                <h3>دائمة</h3>
                  <li>قفة شهرية</li>
                  <li>تغسيل الموتى و تجهيزهم</li>
                  <li>الجنائز</li>
                  <li>الأفراح و الأعراس</li>
                  <li>تجهيزات و وسائل (طاولات، كراسي، صحون...)</li>
          </div>
        </div>  

        <div class="card">
          <div class="card_img"><img src="/img/received_2247674025457714.jpeg"></div>
            <div class="card_content">
              <h3>موسمية</h3>
                <li>مركز الإفطار</li>
                <li>قفة شهر رمضان</li>
                <li>كسوة العيد</li>
                <li>كبش العيد</li>
                <li>تجهيز العرائس</li>
            </div>
          </div>
        </div>


        <div class="Sec3">
        <span>الصحية</span>
          <div class="card">
          <div class="card_img"><img src="/img/280550530_2607785796022003_3738530076327582304_n.jpg"></div>
            <div class="card_content">
                <h3>دائمة</h3>
                  <li>سيارة إسعاف</li>
                  <li>توزيع الماء يوميا</li>
                  <li>تقديم وجبتي الغداء و العشاء بالمستشفى</li>
                  <li>إمداد المعدات: كراسي، أسرة، قارورات أوكسجين، مولدات أوكسجين</li>
                  <li>ورشة للرسم و الفنون التشكيلية</li>
            </div>
          </div>  

          <div class="card">
          <div class="card_img"><img src="/img/279383055_2593709427429640_5527744589639820437_n.jpg"></div>
            <div class="card_content">
              <h3>موسمية</h3>
                <li>تقديم وجبات ساخنة محمولة طيلة شهر رمضان</li>
                <li>تجهيز المستشفى</li>
            </div>
          </div>
        </div>

          </div>
        </div>           
      </div>

      <div class="content">
        <h1>لــجـانـنـا</h1>
        <p>تساعد الجمعية العامة لجان دائمة، مكلفة بدراسة المسائل المتعلقة بأهداف الجمعية. اللجان الدائمة هي ثلاثة:</p>
        <p>لجنة التربية و التعليم و هي تضم:</p>
        <p>خلية التعليم القرآني و فيها أربع أقسام:</p>
        <ol>
          <li>1. قسم تحفيظ القرآن الكريم.</li>
          <li>2. قسم مراجعة القرآن الكريم.</li>
          <li>3. قسم تصحيح التلاوة.</li>
          <li>4. قسم الإجازات القرآنية.</li>
        </ol>

        <p>خلية اللغة العربية و اللغات الحية:</p>
        <ol>
          <li>1. قسم اللغة العربية.</li>
          <li>2. قسم اللغة الفرنسية.</li>
          <li>3. قسم اللغة الانجليزية.</li>
        </ol>

        <p>خلية تعليم الإعلام الآلي.</p>

        <p>خلية المسرح و الفنون التشكيلية و التربية المدنية:</p>
        <ol>
          <li>1. قسم المسرح.</li>
          <li>2. قسم الرسم و الفنون التشكيلية.</li>
          <li>3. قسم التربية المدنية.</li>
        </ol>

        <p>خلية الاستشارات النفسية:</p>
        <ol>
          <li>1. قسم الاستشارات النفسية.</li>
          <li>2. قسم الأرطفوني.</li>
          <li>3. قسم الاستشارات الأسرية و تربية الأطفال.</li>
        </ol>

        <p>خلية المسرح و الفنون التشكيلية و التربية المدنية:</p>
        <ol>
          <li>1. قسم الإرشاد الديني.</li>
          <li>2. قسم الاستشارات القانونية.</li>
        </ol>

        <p>لجنة الإعلام و الاتصال</p>

        <p>لجنة التجهيز و الصيانة و الوسائل</p>

      </div>
      <div class="content">
        <h1>مكــتبـتـنـا</h1>
        <p>جمعيتنا مهتمة بجمع الكتب، و كلما ساهم الناس بالتبرع بالكتب كلما كبرت مكتبتنا، و الكتب التي نمتلكها من مختلف التخصصات. يمكنكم أن تتبرعوا بأية كتب أو استلامها خلال شهر، و أن يترك المستلم رقم هاتفه. للمزيد من المعلومات حول مكتبتنا اضغطوا الزر الذي في الأسفل.</p>
        <a href="/مكتبتنا">كتــبـنــا</a>
      </div>
      <div class="content active">
        <h1>صـفحــتـنا</h1>
        <p>
          جمعية شبابنا هي جمعية علمية ثقافية، اعتمدت سنة 2013م تحت رقم 2013/40م من بلدية سطيف و بمعية مديرية الثقافة لولاية سطيف. شهدت الجمعية تغيرا في القانون الأساسي بتاريخ 2016/07/06م و تغييرا ثان في مهام أعضاء المكتب التنفيذي مرتين الأول بتاريخ 2018/12/29م و الثاني بتاريخ 2019/07/17م. كل هذا من أجل السير الحسن للجمعية. لها أهداف هي:
        </p>
        <ol>
          <li>1. تربية الجيل على العلم و الأخلاق و الوطنية.</li>
          <li>2. فتح آفاق جديدة أمام الشباب على حقائق العلم و المعرفة و الثقافة.</li>
          <li>3. إجياء المناسبات الدينية و الوطنية.</li>
          <li>4. ترسيخ حب الوطن في الناشئة.</li>
          <li>5. إقامة نشاطات ترفيهية تعليمية تربوية ثقافية.</li>
          <li>6. إقامة ملتقيات فكرية ثقافية، أدبية، تاريخية.</li>
          <li>7. توعية الشباب حول مخاطر الآفات الاجتماعية.</li>
          <li>8. تنظيم رحلات استكشافية سياحية.</li>
          <li>9. إنتاج عروض مسرحية.</li>
          <li>10. فتح ناد لتعليم اللغة العربية و اللغات الحية.</li>
          <li>11. الاهتمام بالمجال السمعي البصري.</li>
          <li>12. تنظيم حفلات فنية إنشادية.</li>
        </ol>
        <p>
          يسهر على هذه الأهداف لجان سخروا أوقاتهم و جهودهم لتحقيقها و هي كما جاءت في المادة 23 من القانون الأساسي للجمعية.
        </p>
      </div>
      <div class="media-icons">
        <a href="https://www.facebook.com/chababouna.setif" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/chababouna_setif_19/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.youtube.com/@---ul6zf" target="_blank"><i class="fab fa-youtube"></i></a>
      </div>
      <div class="user-icons">
        <a href="https://www.google.com/maps/place/%D9%85%D9%82%D8%B1+%D8%AC%D9%85%D8%B9%D9%8A%D8%A9+%D8%B4%D8%A8%D8%A7%D8%A8%D9%86%D8%A7+%D8%B3%D8%B7%D9%8A%D9%81%E2%80%AD/@36.202689,5.4121435,17z/data=!3m1!4b1!4m5!3m4!1s0x12f315958517f2e7:0x9a592b6588f73c9b!8m2!3d36.2026847!4d5.4143322" target="_blank"><i class='fa fa-map-marker'></i></a>
        <a href="tel:+213661667501" aria-label="Call" data-hover="0661 66 75 01 / 0770 75 72 77" class="hoveritem"><i class="fa fa-phone"></i></a>
      </div>


      <div class="slider-navigation">
        <a class="nav-btn">إنجازاتنا</a>
        <a class="nav-btn">نشاطاتنا</a>
        <a class="nav-btn">لجاننا</a>
        <a class="nav-btn">مكتبتنا</a>
        <a class="nav-btn active">صفحتنا</a>
      </div>

    </section>
    

    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });

    //Javacript for video slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    const contents = document.querySelectorAll(".content");

    var sliderNav = function(manual){
      btns.forEach((btn) => {
        btn.classList.remove("active");
      });

      slides.forEach((slide) => {
        slide.classList.remove("active");
      });

      contents.forEach((content) => {
        content.classList.remove("active");
      });

      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        sliderNav(i);
      });
    });
    </script>

  </body>
</html> -->
