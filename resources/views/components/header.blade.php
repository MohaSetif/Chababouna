<header class="fixed z-50 w-full header">
    <div class="auth-links">
        @guest
            @if (Route::has('register'))
                <a href="{{ route('register') }}">سجل</a>
            @endif
            @if (Route::has('login'))
                <a href="{{ route('login') }}">أدخل</a>
            @endif
        @else
            <div class="dropdown">
                <button class="dropbtn">{{ Auth::user()->name }}</button>
                <div class="dropdown-content">
                    <a href="حسابي">حسابي</a>
                    <a href="الخيارات">صفحة التسجيلات</a>
                    <div class="divider h-px my-2 bg-red-800"></div>
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
        <hr>
        <div class="sign_action">
            @guest
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">سجل</a>
                @endif
                <br><br>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">أدخل</a>
                @endif
            @else
                <div class="dropdown">
                    <a href="حسابي">حسابي</a>
                    <br><br>
                    <a href="الخيارات">صفحة التسجيلات</a>
                    <br><br>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('أخرج') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>
    </nav>
    <div class="logo">
        <a href="/">
            <img src="/img/IMG_20220701_112957-removebg-preview.png" alt="Logo">
        </a>
    </div>
</header>

<script>
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

    function toggleDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    function toggleMenu() {
        const navbar = document.getElementById('navbar');
        navbar.classList.toggle('active');
    }

    document.querySelectorAll('nav > a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<style>
    .divider {
        height: 1px;
        margin: 0.5rem 0;
        background-color: #e2e8f0;
    }
</style>
