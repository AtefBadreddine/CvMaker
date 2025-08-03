@extends('auth.layout')

@section('PAGE_TITLE', 'إنشاء حساب')

@section('PAGE_CONTENT')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 rounded mt-5 p-3">
                <div class="card-header">
                    <h2 class="fw-bold mt-4 mb-2">إنشاء حساب</h2>
                    <h6 class="card-subtitle mb-2">مرحبا بك معنا</h6>
                </div>
                <div class="card-body">
                    @include('components.error-alert')
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput10" class="form-label fs-6 fw-bold">الإسم</label>
                            <input type="text" name="name" class="form-control form-control-lg rounded-pill" id="exampleFormControlInput10"
                                placeholder="إكتب إسمك هنا">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-6 fw-bold">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-pill" id="exampleFormControlInput1"
                                placeholder="إكتب بريدك الإلكتروني هنا">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label fs-6 fw-bold">كلمة المرور</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-pill" id="exampleFormControlInput2"
                                placeholder="إكتب كلمة المرور هنا">
                        </div>
                        <div class="mb-1">
                            <label for="exampleFormControlInput3" class="form-label fs-6 fw-bold">تأكيد كلمة المرور</label>
                            <input type="password" name="password-confirmation" class="form-control form-control-lg rounded-pill" id="exampleFormControlInput3"
                                placeholder="إكتب كلمة المرور هنا">
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
                    <div class="fw-bold">لديك حساب بالفعل؟ <a class="text-decoration-none" href="{{ route('login') }}">سجل دخول</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
