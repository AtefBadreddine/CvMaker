@extends('layouts.abstract')

@section('PAGE_TITLE', 'إصنع سيرتك الذاتية')

@section('PAGE_CONTENT')
    <!-- Page Content-->
    <div class="container px-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xs-12 my-5">
              <div class="text-left mb-4">
                  @yield('STEP_TITLE')
              </div>
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
                          <div class="row justify-content-between align-items-center">
                            <div class="col-xs-12 col-lg-3 text-center order-lg-first order-sm-last">
                              <a
                                 @switch(request()->route()->getName())
                                      @case('step.one')
                                          href="{{route('step.template')}}"
                                          @break

                                      @case('step.two')
                                          href="{{route('step.one')}}"
                                          @break

                                	@case('step.three')
                                          href="{{route('step.two')}}"
                                          @break

                                	@case('step.four')
                                          href="{{route('step.three')}}"
                                          @break

                                	@case('step.finish')
                                          href="{{route('step.four')}}"
                                          @break

                                      @default
                                          href="{{route('step.template')}}"
                                  @endswitch
                                 class="btn btn-outline-primary w-100 fw-bold rounded-pill border-0" id="prevBtn">
                                  {{__('labels.prev')}}
                                  {{-- @if (app()->currentLocale() == "ar")
                                  <i class="bi bi-arrow-right-square fs-5 mx-2 my-1"></i>
                                  @else
                                  <i class="bi bi-arrow-left-square fs-5 mx-2"></i>
                                  @endif --}}
                              </a>
                            </div>
                            <div class="col-xs-12 col-lg-3 text-center order-lg-last order-sm-first">
                              <button type="submit" id="submitBtn" class="btn btn-primary w-100 fw-bold rounded-pill">
                                  {{__('labels.continue')}}
                                  {{-- @if (app()->currentLocale() == "ar")
                                  <i class="bi bi-arrow-left-square fs-5 mx-2 my-1"></i>
                                  @else
                                  <i class="bi bi-arrow-right-square fs-5 mx-2"></i>
                                  @endif --}}
                              </button>
                            </div>
                          </div>
                            @isset($cv)
                            {{--<a href="#" id="saveAndFinish" class="btn btn-outline-warning btn-lg fw-bold">
                                {{__('labels.finishBtn')}}
                                @if (app()->currentLocale() == "ar")
                                <i class="bi bi-chevron-double-left fs-5 mx-2 my-1"></i>
                                @else
                                <i class="bi bi-chevron-double-right fs-5 mx-2"></i>
                                @endif
                            </a>--}}
                            @endisset
                        </div>
                    @endif

                </section>
            </div>
          	<div class="col-lg-4 d-sm-none mt-5 d-md-block text-center">
            <div class="dropdown mt-5">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-translate"></i>
                  {{ __('steps-bar.one') }}
              </button>
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
            </div>
                <iframe id="pdfPreview" class="rounded" height="100%" style="height:115vh"></iframe>

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <style>
        .nav-link {
            color: #999;
        }

      @media(max-width:800px)
      {
        .iframe
        {
        	margin-top:20px;
          	visibility: hidden;
        }

        iframe
        {
        	height:800px
        }
        .order-sm-first
        {
        	order:-1 !important;
        }

        .d-sm-none
        {
        	display:none
        }

        #prevBtn,
        #saveAndFinish,
        #submitBtn
        {
          height:3.2em;
          margin-bottom:15px
        }
      }

      @media(min-width:900px)
      {
        .iframe
        {
            z-index: 999;
    		opacity: 0.3;
          	bottom:50px;
          @if (app()->currentLocale() == "ar")
            position: fixed;left: 11%;
          @else
            position: fixed;right: 11%;
          @endif
        }

        iframe
        {
          @if (app()->currentLocale() == "ar")
            top: 167px;  left: 10%;
          @else
            top: 167px; right: 10%;
          @endif
        }
      }

      @media(min-width:1400px)
      {
        @if (app()->currentLocale() == "ar")
            left: 25%;
          @else
            right: 25%;
          @endif
      }

    </style>
@endprepend

@prepend('BODY_BOTTOM')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap-toggle.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.imgcheckbox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.word-and-character-counter.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        function addBullet(btn) {
            var textarea = btn.nextElementSibling;
            var selectionStart = textarea.selectionStart;
            var selectionEnd = textarea.selectionEnd;
            var beforeSelection = textarea.value.substring(0, selectionStart);
            var selection = textarea.value.substring(selectionStart, selectionEnd);
            var afterSelection = textarea.value.substring(selectionEnd);

            // Determine if we need a newline before the bullet
            var needsNewline = beforeSelection.length > 0 && !beforeSelection.endsWith('\n');
            var bulletLine = (needsNewline ? '\n' : '') + '• ' + selection;

            // Update textarea value
            textarea.value = beforeSelection + bulletLine + afterSelection;

            // Move cursor to end of inserted bullet
            const newCursorPos = beforeSelection.length + bulletLine.length;
            textarea.setSelectionRange(newCursorPos, newCursorPos);
            textarea.focus();

            return false;
        }


        $('body').on('click','.addBullet', function(event){addBullet(event.target)});

          $(window).scroll(function(){
              $("iframe").css("top", Math.max(0, 167 - $(this).scrollTop()));
              $(".iframe").css("bottom", Math.max(10, 10 - $(this).scrollTop()));
          });
          const applyOrder = () => {
          	const educations = $('.educations .accordion-item');
            educations.each((index, educationBox) => {
              console.log("educationBox ",educationBox)
              $(educationBox).find('.form-control').each((i, input) => {
                input.name = input.name.replace(/\[\d*\]/, `[${index+1}]`);
              });
              $(educationBox).find('.hashNumber').each((i, span) => {
                span.innerHTML = $(educationBox).find('#inputDegree').val() ?? index+1;
              });
            });
            const jobs = $('.jobs .accordion-item');
            jobs.each((index, jobBox) => {
              $(jobBox).find('.form-control').each((i, input) => {
                input.name = input.name.replace(/\[\d*\]/, `[${index+1}]`);
              });
              $(jobBox).find('.hashNumber').each((i, span) => {
                span.innerHTML = $(jobBox).find('#inputJobTitle').val() ?? index+1;
              });
            });
          }
          const autoPreview = () => {
            applyOrder();
        	$.ajax({
                url: '/autoSave',
                method: 'POST',
              	headers:{"X-CSRF-TOKEN":"{{csrf_token()}}"},
                processData: false,
              	contentType:false,
                data: new FormData(document.getElementById('stepsForm')),
                success: function(res)
                {
                    console.log("success")
                    console.log(res);
                    $("#pdfPreview").attr('src', '/cv')

                },
                error : function (res) {
                    console.log(res)
                    console.log(res.responseJSON)
                    const errors = res.responseJSON.errors;
                    if (errors?.picture) {
                        $('#picture-error').text(errors.picture[0]);
                    }
                }

                }
            );
        }
          autoPreview();
          $("body").on("change", ".form-control, .form-select, input[type='file']",autoPreview);
          $(document).on("click", ".removeElement",autoPreview);

            $("#submitBtn").on("click", function(){
              	applyOrder();
                $("form#stepsForm").submit();
            });

            $("#saveAndFinish").on("click", function(){
              	applyOrder();
                $("form#stepsForm").attr('action', "{{route('autoSave')}}");
                $("form#stepsForm").submit();
            });

            let detectTap = false;

            $('body').on('touchstart', '#sortableList input, #sortableList select', () => {
              detectTap = true;
            });
            $('body').on('touchmove', '#sortableList input, #sortableList select', () => {
              detectTap = false;
            });
            $('body').on('touchend', '#sortableList input, #sortableList select', (e) => {
              if (detectTap) $(e.target).focus();
            });

          let detectCollapse = false;

            $('body').on('touchstart', '#sortableList .accordion-button', () => {
              detectCollapse = true;
            });
            $('body').on('touchmove', '#sortableList .accordion-button', () => {
              detectCollapse = false;
            });
            $('body').on('touchend', '#sortableList .accordion-button', (e) => {
              if (detectCollapse) $(e.target).click();
            });


    </script>
@endprepend
