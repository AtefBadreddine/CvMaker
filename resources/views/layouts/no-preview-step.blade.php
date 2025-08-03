@extends('layouts.abstract')

@section('PAGE_TITLE', 'إصنع سيرتك الذاتية')

@section('PAGE_CONTENT')
    <!-- Page Content-->
    <div class="container-fluid px-3 my-5">
        <div class="text-center mb-5">
            @yield('STEP_TITLE')
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <!-- Experience Section-->
                <section>
                    @if ($errors->any())
                        <div class="card border-0 rounded-4 mb-5">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class=" border-0 mb-5">
                        {{-- <div class="card-header bg-white border-0 py-3">
                            @include('components.steps-bar')
                        </div> --}}
                        @yield('STEP_CONTENT')
                        
                    </div>
                    @if(!request()->is('step/finish'))
                        <div class="d-grid gap-2">
                            {{-- <button type="submit" id="submitBtn" class="btn btn-primary btn-lg fw-bold">
                                {{__('labels.continue')}}
                                @if (app()->currentLocale() == "en")
                                <i class="bi bi-arrow-right-square fs-5 mx-2 my-1"></i>
                                @else
                                <i class="bi bi-arrow-left-square fs-5 mx-2"></i>
                                @endif
                            </button> --}}
                            @isset($cv)
                            <a href="#" id="saveAndFinish" class="btn btn-outline-warning btn-lg fw-bold">
                                {{__('labels.finishBtn')}}
                                @if (app()->currentLocale() == "ar")
                                <i class="bi bi-chevron-double-left fs-5 mx-2 my-1"></i>
                                @else
                                <i class="bi bi-chevron-double-right fs-5 mx-2"></i>
                                @endif
                            </a>
                            @endisset
                        </div>
                    @endif

                </section>
            </div>
            <div class="col-lg-10 col-sm-12 mt-4">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5058682780348010" crossorigin="anonymous"></script>
            <ins class="adsbygoogle"
                 style="display:block;"
                 data-ad-format="auto"
                 data-full-width-responsive="true"
                 data-ad-slot="4381091381"></ins>
            <script>
                 
                    (adsbygoogle = window.adsbygoogle || []).push({});
                
            </script>
        </div>

        </div>
    </div>
@endsection

@prepend('HEAD_BOTTOM')
    <link href="{{ asset('assets/css/bootstrap-toggle.css') }}" rel="stylesheet" />
    <style>
        .nav-link {
            color: #999;
        }
        
    </style>
@endprepend

@prepend('BODY_BOTTOM')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap-toggle.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.imgcheckbox.js') }}"></script>
    <script>
        $(function() {
            $("img.checkable").imgCheckbox({
                radio: true,
                canDeselect: true,
                "styles": {
                    "span.imgCheckbox.imgChked img": {
                        // This property will overwrite the default grayscaling, we need to add it back in
                        "filter": "blur(1px) grayscale(10%)",

                        // This is just css: remember compatibility
                        "-webkit-filter": "blur(1px) grayscale(10%)",

                        // Let's change the amount of scaling from the default of "0.8"
                        "transform": "scale(0.9)"
                    }
                },
                onclick: function(){
                    $("form#stepsForm").submit();
                }
            });
            $("#submitBtn").on("click", function(){
                $("form#stepsForm").submit();
            });
            
            $("#saveAndFinish").on("click", function(){
                $("form#stepsForm").attr('action', "{{route('autoSave')}}");
                $("form#stepsForm").submit();
            });
            
            
            
        });
    </script>
@endprepend
