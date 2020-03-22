<!DOCTYPE html>
<html>

<head>

    @include('layouts.partials.header')
    @yield('stylesheets')

</head>

<body>
    <div id="wrapper">
        @include('layouts.partials.l-sidebar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('layouts.partials.navbar')
            </div>


            <div class="wrapper wrapper-content">
                @yield('content')
            </div>

            @include('layouts.partials.footer')

        </div>

        @include('layouts.partials.r-sidebar')
    </div>

    @include('layouts.partials.scripts')
    @yield('scripts')

</body>
</html>
