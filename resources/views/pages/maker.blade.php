@extends('layouts.abstract')

@section('PAGE_TITLE', 'إصنع سيرتك الذاتية')

@section('PAGE_CONTENT')
    <!-- Page Content-->
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">السيرة الذاتية</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-12">
                <!-- Experience Section-->
                <section>
                    <!-- Experience Card 1-->
                    <div class="card mb-5">
                        <div class="card-body p-5">
                            <form id="demo" class="wizard">
                                <div class="wizard-header">
                                    <nav class="nav nav-pills flex-column flex-sm-row fw-bold fs-6">
                                        <a role="presentation"
                                            class="flex-sm-fill text-sm-center nav-link active wizard-step-indicator"
                                            aria-current="page" href="#start">عام</a>
                                        <a role="presentation"
                                            class="flex-sm-fill text-sm-center nav-link wizard-step-indicator"
                                            href="#profile">البيانات الشخصية والتواصل</a>
                                        <a role="presentation"
                                            class="flex-sm-fill text-sm-center nav-link wizard-step-indicator"
                                            href="#messages">التعليم</a>
                                        <a role="presentation"
                                            class="flex-sm-fill text-sm-center nav-link wizard-step-indicator"
                                            href="#messages">الخبرات الوظيفية</a>
                                        <a role="presentation"
                                            class="flex-sm-fill text-sm-center nav-link wizard-step-indicator"
                                            href="#finish">finish</a>
                                    </nav>
                                </div>
                                <div class="wizard-content">
                                    <div id="start" class="wizard-step">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">الإعداد العام</h5>
                                                <hr />
                                                <div class="form-group">
                                                    <label>لغة السيرة الذاتية</label>
                                                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                                    data-offstyle="danger" data-on="عربي"
                                                    data-off="English" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <button type="button" class="wizard-next my-2 btn btn-primary">Start</button>
                                            <button type="button" class="wizard-goto btn btn-warning" value="3">Go to
                                                last</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="profile" class="wizard-step">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control required" />
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="wizard-prev my-2 btn btn-outline-secondary">Previous</button>
                                            <button type="button" class="wizard-next my-2 btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                    <div id="messages" class="wizard-step">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" class="form-control required"></textarea>
                                        </div>
                                        <button type="button"
                                            class="wizard-prev my-2 btn btn-outline-secondary">Previous</button>
                                        <button type="button" class="wizard-next my-2 btn btn-primary">Next</button>
                                    </div>
                                    <div id="finish" class="wizard-step">
                                        <button type="button"
                                            class="wizard-prev my-2 btn btn-outline-secondary">Previous</button>
                                        <button type="button" class="wizard-finish btn btn-success">Finish</button>
                                        <button type="button" class="wizard-goto btn btn-warning" value="0">Go to
                                            first</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('HEAD_BOTTOM')
    <link href="{{ asset('assets/css/wizard.css') . '?v=' . rand(1, 999) }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-toggle.css') }}" rel="stylesheet" />
@endpush

@push('BODY_BOTTOM')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/wizard.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-toggle.js') }}"></script>
    <script>
        $(function() {
            $("#demo").simpleWizard();
            $('input[type="checkbox"]').bootstrapToggle();

        });
    </script>
@endpush
