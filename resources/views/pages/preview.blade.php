@php
$cv = session()->get('cv');
@endphp
@extends('layouts.no-preview-step')

@section('PAGE_TITLE', 'إستعراض سيرتك الذاتية')

@section('STEP_TITLE')
    <h2 class="display-5 text-right fw-bolder mb-0">
        {{-- <span class="text-dark d-inline">
            {{ __('steps-bar.seven') }}
        </span> --}}
    </h2>
@endsection

@section('STEP_CONTENT')
    <div class="card border-0">
        <div class="card-body p-5">
            <h3 class="text-right fw-bolder mb-0">
                <span class="text-dark d-inline">
                    {{ __('steps-bar.seven') }}
                </span>
            </h3>
            <p class="lead">{{__('general.subTitle')}}</p>
            <div class="row">
                <div class="col-12 col-lg-5">
                    <iframe id="pdfPreview" src="{{ url('cv') }}" allowfullscreen scrolling="no" frameborder="0" width="100%" height="1000"></iframe>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="row mt-4 justify-content-center align-items-center">
                        <div class="col-md-5 col-sm-12">
                            <a class="btn btn-primary btn-lg fw-bold w-100 d-flex flex-column justify-content-evenly" style="margin-top: 10px; height:120px"
                                href="{{ asset('storage') . '/cvs/' . Session::get('fileName') . '1.pdf' }}" download="{{$cv->name}}">
                                <i class="bi bi-download mx-2 fs-2"></i>
                                {{ __('general.downloadBtn') }}
                            </a>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <a class="btn btn-outline-primary btn-lg fw-bold w-100 d-flex flex-column justify-content-evenly" style="margin-top: 10px; height:120px"
                                href="{{ asset('storage') . '/cvs/' . Session::get('fileName') . '1.pdf' }}" target="_blank">
                                <i class="bi bi-printer mx-2 fs-2"></i>
                                {{ __('general.printBtn') }}
                            </a>
                        </div>
                        <div class="col-12 mt-3">
                        <div class="d-lg-none d-sm-block w-100">
                            <ul class="list-group w-100" style="list-style:none">
                            <li><a class="list-group-item" href="{{route('step.one')}}"><i class="bi bi-file-earmark-person"></i> {{__('steps-bar.three')}}</a></li>
                            <li><a class="list-group-item" href="{{route('step.two')}}"><i class="bi bi-award-fill"></i> {{__('steps-bar.four')}}</a></li>
                            <li><a class="list-group-item" href="{{route('step.three')}}"><i class="bi bi-briefcase-fill"></i> {{__('steps-bar.five')}}</a></li>
                            <li><a class="list-group-item" href="{{route('step.four')}}"><i class="bi bi-bag-plus-fill"></i> {{__('steps-bar.six')}}</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center d-none d-lg-flex">
                        <div class="col-10">
                            <form id="stepsForm">
                                <div class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>{{__('general.fontSize')}}</strong>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_text_size" value="A-" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_text_size" value="A" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_text_size" value="A+" class="btn">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>{{__('general.cvColor')}}</strong>
                                        <div class="d-flex justify-content-center align-items-center colors">
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#c0392b" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#eea303" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#f1c40f" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#64bb5d" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#16a085" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#0e83cd" class="btn">
                                                </div>
                                            </div>
                                          	<div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#2d5294" class="btn">
                                                </div>
                                            </div>
                                            <div class='sup'>
                                                <div class='sub'>
                                                    <div class='point'></div><input type="submit" name="cv_color" value="#702fa8" class="btn">
                                                </div>
                                            </div>

                                        </div>
                                    </li>

                                    {{--<li class="list-group-item">
                                        <strong>{{__('steps-bar.two_dev')}}</strong>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-12 mb-1 p-1">
                                                <div class="card border-0 template-card text-center fw-bold">
                                                    <img src="{{ asset('assets/images/orbital.png') }}" class="card-img-top checkable mx-auto"
                                                        alt="قالب 1" />
                                                    <input type="hidden" name="orbital" id="orbitalInput"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 mb-1 p-1">
                                                <div class="card border-0 template-card text-center fw-bold">
                                                    <img src="{{ asset('assets/images/orbital-dev.png') }}" class="card-img-top checkable mx-auto"
                                                        alt="قالب 1" />
                                                    <input type="hidden" name="orbital-dev" id="orbitalDevInput" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 mb-1 p-1">
                                                <div class="card border-0 template-card text-center fw-bold">
                                                    <img src="{{ asset('assets/images/pillar.png') }}" class="card-img-top checkable mx-auto"
                                                        alt="قالب 2" />
                                                    <input type="hidden" name="pillar" id="pillarInput" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 mb-1 p-1">
                                                <div class="card border-0 template-card text-center fw-bold">
                                                    <img src="{{ asset('assets/images/pillar-dev.png') }}" class="card-img-top checkable mx-auto"
                                                        alt="قالب 2" />
                                                    <input type="hidden" name="pillar-dev" id="pillarDevInput" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 mb-1 p-1">
                                                <div class="card border-0 template-card text-center fw-bold">
                                                    <img src="{{ asset('assets/images/simple.jpg') }}" class="card-img-top checkable mx-auto"
                                                        alt="قالب 2" />
                                                    <input type="hidden" name="simple" id="simpleInput" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 mb-1 p-1">
                                                <div class="card border-0 template-card text-center fw-bold">
                                                    <img src="{{ asset('assets/images/simple-dev.jpg') }}" class="card-img-top checkable mx-auto"
                                                        alt="قالب 2" />
                                                    <input type="hidden" name="simple-dev" id="simpleDevInput" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('HEAD_BOTTOM')
    <style>
        .sup {
            padding: 5px;
            border-radius: 5px;
            margin-left:2px;
            margin-right: 2px;
        }

        .sup a, .sup input {
            width: 30px;
            height: 30px;
            font-weight: bold;
            border: 1px solid;
            display: block;
            padding: 0;
        }

        .colors .sup a, .colors .sup input
        {
            text-indent:-9999px;
            width: 20px;
            height: 20px;
            border: none;
            padding: inherit
        }

        .colors .sup:nth-child(1) {
            background-color: #c0392b;
        }

        .colors .sup:nth-child(2) {
            background-color: #eea303;
        }

        .colors .sup:nth-child(3) {
            background-color: #f1c40f;
        }

        .colors .sup:nth-child(4) {
            background-color: #64bb5d;
        }

        .colors .sup:nth-child(5) {
            background-color: #16a085;
        }

        .colors .sup:nth-child(6) {
            background-color: #0e83cd;
        }

      	.colors .sup:nth-child(7) {
            background-color: #2d5294;
        }

        .colors .sup:nth-child(8) {
            background-color: #702fa8;
        }

      	@media(max-width:800px)
        {
          .d-sm-none{display:none}
          iframe{height:500px}
      	}
    </style>
@endpush

@push('BODY_BOTTOM')
    <script>
        $(function() {
          $("#stepsForm").submit(e => {
            e.preventDefault();

            const color = $('input[name="cv_color"]:focus').val();
            let size = $('input[name="cv_text_size"]:focus').val();
            switch(size)
            {
              case "A-":
                {
                  	size = 10;
                	break;
                }
              case "A":
                {
                  	size = 14;
                	break;
                }
              case "A+":
                {
                  	size = 18;
                	break;
                }
            }
            $.ajax({
                url: '/autoSave',
                method: 'POST',
              	headers:{"X-CSRF-TOKEN":"{{csrf_token()}}"},
                data: {
                  cv_color: color,
                  cv_text_size:size
                },
                success: function(res)
                {
                    console.log(res);
                    $("#pdfPreview").attr('src', '/cv')
                },
              	error: err => console.log(err)
            });
          });
        });
    </script>
@endpush
