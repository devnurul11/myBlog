        @include('frontend/includes/head')
<body class="diag">
    

        @include('frontend/includes/nav')
           <!--HOME-->
       
        @include('frontend/includes/hero')
        <!--ABOUT-->
           
        
        @include('frontend/includes/about')
        <!--PORTFOLIO-->
        
        
        @include('frontend/includes/portfolio')
        <!-- BLOG -->
       
        @include('frontend/includes/blog')
        
        <!-- CONTACT -->
        
        @include('frontend/includes/contact')

    <footer>
   @include('frontend/includes/footer')
    </footer>
    
<!-- Javascripts -->
<script src="{{ asset('frontend/js/jquery-2.1.4.min.js') }}"></script><!-- jQuery library -->
<script src="{{ asset('frontend/js/smoothscroll.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/typed.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
    
    
 
</body>
</html>
