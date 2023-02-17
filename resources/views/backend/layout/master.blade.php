@include('backend.includes.head')
    <body class="sb-nav-fixed">
        @include('backend.includes.header')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('backend.includes.sidebar')
                
            </div>
            <div id="layoutSidenav_content">
              
               @yield('content')

               @include('backend.includes.footer')
               
              
            </div>
        </div>
       @include('backend.includes.scripts')
    </body>
</html>
