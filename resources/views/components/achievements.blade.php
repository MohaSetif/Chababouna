<section id="achievements" class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-green-800 mb-6 text-center">إنجازاتنا</h2>
        <p class="text-lg text-gray-700 mb-6 leading-relaxed">
            نحن فخورون بإنجازاتنا المتعددة في خدمة المجتمع. سنقوم بتحديث هذا القسم قريبًا لعرض أبرز إنجازاتنا وتأثيرنا على المجتمع.
        </p>
    </div>
    <div class="slideshow-container">
        @php
            $images = [
                ['src' => '/img/pdf2png/DOC001/DOC001-1.png', 'caption' => 'Caption 1'],
                ['src' => '/img/pdf2png/DOC002/DOC002-1.png', 'caption' => 'Caption 2'],
                ['src' => '/img/pdf2png/DOC003/DOC003-1.png', 'caption' => 'Caption 3'],
                ['src' => '/img/pdf2png/DOC004/DOC004-1.png', 'caption' => 'Caption 4'],
                ['src' => '/img/pdf2png/DOC005/DOC005-1.png', 'caption' => 'Caption 5'],
                ['src' => '/img/pdf2png/DOC006/DOC006-1.png', 'caption' => 'Caption 6'],
                ['src' => '/img/pdf2png/DOC007/DOC007-1.png', 'caption' => 'Caption 7'],
                ['src' => '/img/pdf2png/DOC008/DOC008-1.png', 'caption' => 'Caption 8'],
                ['src' => '/img/pdf2png/DOC009/DOC009-1.png', 'caption' => 'Caption 9'],
                ['src' => '/img/pdf2png/DOC010/DOC010-1.png', 'caption' => 'Caption 10'],
                ['src' => '/img/pdf2png/DOC011/DOC011-1.png', 'caption' => 'Caption 11'],
            ];
        @endphp

        @foreach ($images as $index => $image)
            <div class="mySlides fade">
                <div class="numbertext">{{ $index + 1 }} / {{ count($images) }}</div>
                <img src="{{ $image['src'] }}" style="width:25%">
                <div class="text">{{ $image['caption'] }}</div>
            </div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div style="text-align:center">
        @foreach ($images as $index => $image)
            <span class="dot" data-slide="{{ $index + 1 }}"></span>
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
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }

    // Adding event listeners to the dots
    document.querySelectorAll('.dot').forEach(dot => {
        dot.addEventListener('click', function() {
            currentSlide(parseInt(this.getAttribute('data-slide')));
        });
    });
</script>