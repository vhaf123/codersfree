<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171642679-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-171642679-1');
    </script>

    {{-- Adsense --}}
    <script data-ad-client="ca-pub-8456964757737909" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    {{-- Meta etiquetas --}}
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')"/>

    {{-- Open Graph --}}
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{request()->fullUrl()}}" />
    <meta property="og:site_name" content="CodersFree" />
    <meta property="og:image:width" content="828" />
    <meta property="og:image:height" content="450" />
    <meta property="fb:app_id" content="264847741428588" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('image')" />

    {{-- favicon --}}
    <link rel="icon" href="{{asset('img/layouts/favicon.ico')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>

    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    
    @yield('content')

    @include('layouts.partials.footer')

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    

    @if (session('info'))
        <script>
            toastr.info("{{session('info')}}")
        </script>
    @endif

    @yield('js')

</body>
</html>
