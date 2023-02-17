{{-- head  --}}
@include('frontend.includes.head')
<body class="diag">
    
<!-- LOADER -->
   
@include('frontend.includes.nav')

        <!--HOME-->
        @include('frontend.includes.hero')

        <!--ABOUT-->
        @include('frontend.includes.about')  
        
        <!--PORTFOLIO-->
        @include('frontend.includes.portfolio')

        <!-- BLOG -->
        @include('frontend.includes.blog')
        
        <!-- CONTACT -->
        @include('frontend.includes.contact')
 
        <!-- footer -->
        @include('frontend.includes.footer')
    
<!-- Javascripts -->
        @include('frontend.includes.scripts')
    
    
 
</body>
</html>
