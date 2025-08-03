@extends('layouts.no-preview-step')

@section('STEP_TITLE')
    <h2 class="display-5 fw-bolder pb-3">
        {{-- <span class="text-gradient d-inline">
            {{ __('general.my_cvs_title') }}
        </span> --}}
    </h2>
    <p class="lead"></p>
@endsection

@section('STEP_CONTENT')
    <div class="card border-0">
        <div class="card-body p-1">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill active px-4 me-2" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">{{ __('general.my_cvs') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 me-2" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">رسائل الغلاف</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 me-2" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">الوظائف</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="d-flex">
                        {{-- <form method="POST" action="{{ route('step.setTemplate') }}" id="stepsForm">
                            @csrf --}}
                        @foreach ($cvs as $model)
                            <div>
                            <div class="card border-0 mx-2" style="height: 15rem;width: 11rem;">
                                <img data-pdf-thumbnail-file="{{ asset('storage/cvs/' . $model->path) }}"
                                    class="card-img-top w-100" alt="...">
                            </div>
                            <a href="{{url('/step/template') . '?model=' . $model->uuid}}" class="btn btn-link text-dark" style="text-decoration: none"><h6>CV {{$model->title}}</h6></a>
                            </div>
                        @endforeach
                        {{-- </form> --}}
                        <div onclick="window.location.href='{{ url('step/template') }}'" class="card addNew mx-2 d-flex justify-content-center align-items-center text-center"
                            style="height: 15rem;">
                            <i class="bi bi-plus"></i>
                            <span class="fs-6 fw-bold">إنشاء سيرة ذاتية جديدة</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                tabindex="0">...</div>
        </div>
        {{-- <form method="POST" action="{{ route('step.setTemplate') }}" id="stepsForm">

            @csrf
            <div class="row">
                    @foreach ($cvs as $model)
                        <div class="col-lg-4 col-sm-12 mb-5">
                            <div class="card template-card border-1 text-center fw-bold p-3">
                                <input type="hidden" name="orbital" id="orbitalInput" />
                                <a href="{{url('/step/template') . '?model=' . $model->uuid}}" class="btn btn-link" style="text-decoration: none"><h6>{{$model->title}}</h6></a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </form> --}}
    </div>
    </div>
@endsection

@push('HEAD_BOTTOM')
    <style>
        img.card-img,
        .card-img-top {
            width: 23vw;
        }

        @media (max-width:800px) {

            img.card-img,
            .card-img-top {
                width: 70vw;
            }
        }
    </style>
    <style>
        .card {
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.4);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #222;
            cursor: pointer;
        }

        .template-card:hover .overlay {
            opacity: 1;
        }

        .card.addNew {
            border: 2px dashed #0984e3;
            color: #0984e3;
            background-color: #e7f3fd;
            padding: 0 20px;
            width: 11rem;
            cursor:pointer
        }

        .card.addNew>i {
            font-size: 55px;
        }
    </style>
@endpush

@push('BODY_BOTTOM')
    <script src="{{ asset('assets/js/pdfThumbnails.js') }}"
        data-pdfjs-src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.5.207/pdf.js"></script>
@endpush
