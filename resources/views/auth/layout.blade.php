<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('PAGE_TITLE')</title>
    <link href="{{ asset('assets/dashboard/css/styles.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .card-footer,
        .card-header {
            background-color: unset;
            border: unset;
        }

        .text-right {
            text-align: right !important;
        }

        * {
            font-family: "Tajawal", sans-serif;
        }

        .form-control {
            background: #f5f5f5;
            text-align: right;
            font-size: 15px;
            padding: 15px 20px;
            direction: rtl;
        }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body
    style="background: rgb(207,231,250);background: linear-gradient(0deg, rgba(207,231,250,1) 0%, rgba(237,246,253,1) 100%);">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container text-right">
                    <nav class="navbar fixed-top bg-body-tertiary" dir="rtl">
                        <div class="container">
                            <a class="navbar-brand" href="#">
                                <img src="{{asset('assets/images/Logo.png')}}" alt="Bootstrap" 
                                    height="24">
                            </a>
                        </div>
                    </nav>
                    @yield('PAGE_CONTENT')
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>
</body>

</html>
