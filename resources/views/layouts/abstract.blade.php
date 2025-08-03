<!DOCTYPE html>
@php
$lang = app()->currentLocale();
@endphp
<html lang="{{ app()->currentLocale() }}" dir="{{ app()->currentLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PTKGNVKW');
    </script>

    <link rel="manifest" href="/manifest.json">
    <!-- End Google Tag Manager -->
    <meta name="robots" content="noindex">
    <link rel="canonical" href="https://www.getyourcv.net" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ __('general.title') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}?v={{ rand(1, 999) }}" rel="stylesheet" />
    @if (app()->currentLocale() == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/custom-rtl.css') . '?v=' . rand(1, 999) }}" />
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css" />
    <style>
        :root
        {
            --bs-border-radius: 0.8rem;
        }

        .nav-item {
            width: fit-content;
        }

        .nav-fill .nav-item .nav-link, .nav-justified .nav-item .nav-link {
            font-size: 13px;
            font-weight: 600;
            width: fit-content;
            color:#444;
            background-color: #f3f3f3;
            margin: 0 15px;
        }


        .nav-fill .nav-item .nav-link:focus, .nav-fill .nav-item .nav-link:hover,
        .nav-fill .nav-item .nav-link.active, .nav-pills .show>.nav-link {
            color: #0984e3;
            background-color: rgba(231, 243, 253, 1);
        }

        .dropdown-menu[data-bs-popper] {
            right: unset;
            left: 0px;
        }

        body {
            background-color: #fff;
        }

        .btn-primary {
            font-size: 14px;
            --bs-btn-color: #fff;
            --bs-btn-bg: #0984e3;
            --bs-btn-border-color: #0984e3;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #0984e3;
            --bs-btn-hover-border-color: #0984e3;
            --bs-btn-focus-shadow-rgb: 64, 79, 245;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0984e3;
            --bs-btn-active-border-color: #0984e3;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #0984e3;
            --bs-btn-disabled-border-color: #0984e3;
            padding-top: 7px !important;
            padding-bottom: 7px !important;
        }

        .btn-outline-primary {
            font-size: 14px;
            --bs-btn-color: #0984e3;
            --bs-btn-border-color: #0984e3;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #0984e3;
            --bs-btn-hover-border-color: #0984e3;
            --bs-btn-focus-shadow-rgb: 13, 110, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0984e3;
            --bs-btn-active-border-color: #0984e3;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #0984e3;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #0984e3;
            --bs-gradient: none;
            background: rgba(231, 243, 253, 1);
            border-width: 1.5px;
            padding-top: 7px !important;
    padding-bottom: 7px !important;
        }

        .form-control {
            background: #f5f5f5;
          	@if($lang == 'ar')
              text-align: right;
              direction: rtl;
            @endif
            font-size: 15px;
            padding: 10px 15px;
            border: 1px solid #eee;
        }

        .nav-pills .nav-link {
            background: #d1e7f9;
            color: #0d6efd;
            font-weight: 500;
        }


    </style>
    @stack('HEAD_BOTTOM')
</head>

<body class="d-flex flex-column h-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTKGNVKW" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <main class="flex-shrink-0">
        <!-- Navigation-->
        @include('components.navbar')

        @yield('PAGE_CONTENT')
    </main>

    <!-- cv maker -->
    <!-- Footer-->
    @include('components.footer')
    <!-- Bootstrap core JS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        var plus = document.getElementById('plus');

        function plusToggle() {
            plus.classList.toggle('plus--active');
        }

        plus?.addEventListener('click', plusToggle);
    </script>
    @stack('BODY_BOTTOM')
</body>

</html>
