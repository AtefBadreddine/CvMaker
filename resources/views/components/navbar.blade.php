<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h1 class="fs-3 fw-bolder text-primary"><img src="{{ asset('assets/images/Logo.png') }}" width="120px" /></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" style="justify-content: space-between;" id="navbarSupportedContent">
            @include('components.steps-bar')
            <ul class="navbar-nav mb-2 mb-lg-0 small fw-bolder fs-6">
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle @if (request()->is('/')) active @endif" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (session()->has('selectedLang'))
                            @switch(session()->get('selectedLang'))
                                @case('ar')
                                    <i class="fi fi-sa"></i>
                                @break

                                @case('en')
                                    <i class="fi fi-us"></i>
                                @break

                                @case('el')
                                    <i class="fi fi-gr"></i>
                                @break

                                @case('uk-UA')
                                    <i class="fi fi-ua"></i>
                                @break

                                @case('sv')
                                    <i class="fi fi-se"></i>
                                @break

                                @case('da')
                                    <i class="fi fi-dk"></i>
                                @break

                                @case('cs')
                                    <i class="fi fi-cz"></i>
                                @break

                                @default
                                    <i class="fi fi-{{ session()->get('selectedLang') }}"></i>
                            @endswitch
                        @else
                            <i class="bi bi-translate"></i>
                        @endif
                        {{ __('steps-bar.one') }}
                    </a> 
                     <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=ar">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/uae.png') }}" class="mx-1" width="25" height="25"> العربية
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=en">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/usa.png') }}" class="mx-1" width="25" height="25"> English
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=fr">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/france.png') }}" class="mx-1" width="25" height="25"> Français
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=de">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/germany.png') }}" class="mx-1" width="25" height="25"> Deutsch
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=pt">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/portugal.png') }}" class="mx-1" width="25" height="25"> Português
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=es">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/spain.png') }}" class="mx-1" width="25" height="25"> Español
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=tr">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/turkey.png') }}" class="mx-1" width="25" height="25"> Türkçe
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=it">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/italy.png') }}" class="mx-1" width="25" height="25"> italiano
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=nl">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/netherlands.png') }}" class="mx-1" width="25" height="25"> Nederlands
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=pl">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/poland.png') }}" class="mx-1" width="25" height="25"> Polski
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=ro">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/romania.png') }}" class="mx-1" width="25" height="25"> Română
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=el">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/greece.png') }}" class="mx-1" width="25" height="25"> Ελληνικά
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=uk-UA">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/ukraine.png') }}" class="mx-1" width="25" height="25"> українська мова
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=id">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/indonesia.png') }}" class="mx-1" width="25" height="25"> Bahasa Indonesia
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=hu">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/hungary.png') }}" class="mx-1" width="25" height="25"> Magyar
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=no">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/norway.png') }}" class="mx-1" width="25" height="25"> Norsk
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=sv">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/sweden.png') }}" class="mx-1" width="25" height="25"> Svenska
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=da">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/denmark.png') }}" class="mx-1" width="25" height="25"> Dansk
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=fi">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/finland.png') }}" class="mx-1" width="25" height="25"> Suomi
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url()->current()}}?lang=cs">
                            <div class="d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/czech.png') }}" class="mx-1" width="25" height="25"> Čeština
                            </div>
                        </a>
                    </li>
                </ul> 
                {{--@auth
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person fs-5"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.myCVs') }}"><i
                            class="bi bi-receipt-cutoff mx-2"></i>{{ auth()->user()->name }}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="#"
                                    onclick="document.getElementById('logoutForm').submit()">
                                    <i class="bi bi-x-circle-fill mx-2"></i>
                                    {{ __('general.logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person fs-5"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.myCVs') }}"><i
                            class="bi bi-receipt-cutoff mx-2"></i>{{ __('general.my_cvs') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-key-fill mx-2"></i>
                            {{ __('general.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-plus-fill mx-2"></i>
                            {{ __('general.register') }}</a></li>
                        </ul>
                    </div>
                @endauth--}}
                </li>
            </ul>
        </div>

    </div>
</nav>
