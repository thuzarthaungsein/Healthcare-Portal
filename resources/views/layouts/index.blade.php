<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="col-md-10 offset-md-1 main-content" id="app">

    <header>
        @include('includes.header')
    </header>

    <div id="main" class="container-fluid main-wrapper">

            @yield('content')

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>