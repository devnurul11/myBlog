<nav>
    <div class="row">
        <div class="container">
            <div class="logo">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="">
            </div>
            <div class="responsive"><i data-icon="m" class="icon"></i></div>
            <ul class="nav-menu">
                <li><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="#about" class="smoothScroll">About</a></li>
                <li><a href="#portfolio" class="smoothScroll">Portfolio</a></li>
                <li><a href="#blog" class="smoothScroll">Blog</a></li>
                <li><a href="#contact" class="smoothScroll">Contact</a></li>
                <li><a href="{{ route('login') }}" class="smoothScroll">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

