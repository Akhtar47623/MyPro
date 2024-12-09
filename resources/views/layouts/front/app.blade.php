<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

    <meta name="author" content="themefisher.com">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    @include('layouts.front.includes.links')
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset(getImage('favicon'))}}"> --}}
	{{-- @include('layouts.front.template.header') --}}

</head>
<body>
    @yield('content')
</body>
@include('layouts.front.includes.scripts')
</html>
