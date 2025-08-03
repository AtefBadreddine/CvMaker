@extends('auth.layout')

@section('PAGE_TITLE', 'تسجيل الدخول')

@section('PAGE_CONTENT')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 rounded mt-5 p-3">
                <div class="card-header">
                    <h2 class="fw-bold mt-4 mb-2">تسجيل الدخول</h2>
                    <h6 class="card-subtitle mb-2">مرحبا بك مجددا</h6>
                </div>
                <div class="card-body">
                    @include('components.error-alert')
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-6 fw-bold">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-pill" id="exampleFormControlInput1"
                                placeholder="إكتب بريدك الإلكتروني هنا">
                        </div>
                        <div class="mb-1">
                            <label for="exampleFormControlInput2" class="form-label fs-6 fw-bold">كلمة المرور</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-pill" id="exampleFormControlInput2"
                                placeholder="إكتب كلمة المرور هنا">
                        </div>
                        <div class="mb-3">
                            <a class="btn btn-link text-decoration-none fw-bold" href="{{ url('/forgot-password') }}">هل نسيت كلمة المرور؟</a>
                        </div>
                        <div class="mt-4 mb-2">
                            <button class="btn btn-primary btn-lg w-100 rounded-pill fw-bold fs-6 py-3" type="submit">تسجيل الدخول</button>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0 text-center" dir="rtl">
                            <a class="btn btn-light rounded-pill btn-lg fs-6 p-3" style="width:45%;font-weight: 500;">
                                <img width="26" src="{{asset('assets/dashboard/img/icons8-google.svg')}}" />
                                حساب قوقل
                            </a>
                            <a class="btn btn-light rounded-pill btn-lg fs-6 p-3" style="width:45%;font-weight: 500;">
                                <img width="26" src="{{asset('assets/dashboard/img/icons8-facebook.svg')}}" />
                                حساب فيسبوك
                            </a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="fw-bold">ليس لديك حساب؟ <a class="text-decoration-none" href="{{ route('register') }}">سجل الآن</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
