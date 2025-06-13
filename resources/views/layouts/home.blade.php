<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/Winnicode-logo-removebg-preview.ico') }}">

    {{-- Style --}}
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>

<body class="bg-[#121212]">
    <div class="w-full">
        @include('includes.navbar')
        @yield('content')
        @include('includes.footer')
    </div>

</body>

</html>
