<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Home</title>

    {!! HTML::style('http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900') !!}
    {!! HTML::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    {!! HTML::style('css/vendor.css') !!}
    {!! HTML::style('css/app.css') !!}

</head>
<body class="menubar-hoverable header-fixed">

    @include('layouts.partials.top-nav')

	<!-- BEGIN BASE-->
	<div id="base">

        @include('layouts.partials.offcanvas')

        <div id="content">
            <section>

                @include('layouts.partials.breadcrumbs')

                <div class="section-body contain-lg">
                    @yield('content')
                </div>

            </section>
        </div>

        @include('layouts.partials.member-side-nav')
	</div>
	<!-- END BASE -->
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp') !!}
    {!! HTML::script('js/vendor.js') !!}
    {!! HTML::script('js/gmap3.min.js') !!}
    {!! HTML::script('js/app.js') !!}

</body>
</html>