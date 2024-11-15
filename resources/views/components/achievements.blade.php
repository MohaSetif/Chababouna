<section id="achievements" class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">إنجازاتنا</h2>
        <p class="text-lg text-gray-700 mb-6 leading-relaxed">
            نحن فخورون بإنجازاتنا المتعددة في خدمة المجتمع. سنقوم بتحديث هذا القسم قريبًا لعرض أبرز إنجازاتنا وتأثيرنا على المجتمع.
        </p>
    </div>

    <div class="relative max-w-4xl mx-auto">
        @php
            $images = [
                ['src' => '/img/achievements/DOC001-1.png'],
                ['src' => '/img/achievements/DOC002-1.png'],
                ['src' => '/img/achievements/DOC003-1.png'],
                ['src' => '/img/achievements/DOC004-1.png'],
                ['src' => '/img/achievements/DOC005-1.png'],
                ['src' => '/img/achievements/DOC006-1.png'],
                ['src' => '/img/achievements/DOC007-1.png'],
                ['src' => '/img/achievements/DOC008-1.png'],
                ['src' => '/img/achievements/DOC009-1.png'],
                ['src' => '/img/achievements/DOC010-1.png'],
                ['src' => '/img/achievements/DOC011-1.png'],
            ];
        @endphp

        @foreach ($images as $index => $image)
            <div class="mySlides fade flex justify-center">
                <div class="numbertext absolute top-0 left-0 mt-2 ml-2 text-white bg-green-800 px-2 py-1 rounded">{{ $index + 1 }} / {{ count($images) }}</div>
                <img src="{{ $image['src'] }}" class="w-96 rounded-lg shadow-lg mx-auto">
                <div class="text-center text-green-800 text-xl mt-4">الصورة {{ $index }}</div>
            </div>
        @endforeach

        <a class="prev absolute top-1/2 transform -translate-y-1/2 left-0 text-green-800 text-4xl font-bold p-2 cursor-pointer" onclick="plusSlides(1)">&#10095;</a>
        <a class="next absolute top-1/2 transform -translate-y-1/2 right-0 text-green-800 text-4xl font-bold p-2 cursor-pointer" onclick="plusSlides(-1)">&#10094;</a>
    </div>

    <div class="text-center mt-4">
        @foreach ($images as $index => $image)
            <span class="dot h-3 w-3 bg-gray-400 rounded-full inline-block mx-1 cursor-pointer transition-all duration-300 ease-in-out" data-slide="{{ $index + 1 }}"></span>
        @endforeach
    </div>
</section>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].classList.remove("bg-green-800");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].classList.add("bg-green-800");
    }

    document.querySelectorAll('.dot').forEach(dot => {
        dot.addEventListener('click', function() {
            currentSlide(parseInt(this.getAttribute('data-slide')));
        });
    });
</script>
