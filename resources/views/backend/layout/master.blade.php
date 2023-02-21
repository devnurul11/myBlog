@include('backend.includes.head')
    <body class="sb-nav-fixed">
        @include('backend.includes.header')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('backend.includes.sidebar')
                
            </div>
            <div id="layoutSidenav_content">
                <div class="container-fluid px-4">
                    <h1 class="mt-4"> @yield('page_title')</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"> Dashboard/@yield('page_title')/@yield('page_sub_title')</li>
                    </ol>
                </div>
               @yield('content')

               @include('backend.includes.footer')
               
              
            </div>
        </div>
       @include('backend.includes.scripts')
    </body>
</html>
