@extends('layouts.abstract')

@section('PAGE_TITLE', "صانع سير ذاتية")

@section('PAGE_CONTENT')
    <!-- Header-->
    @include('components.header')
    <!-- About Section-->
    <section class="bg-light py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">ما هي السيرة الذاتية</span></h2>
                        <p class="lead fw-light mb-4 lh-lg">توفر السيرة الذاتية الاحترافية ملخصًا ونظرة عامة جيدة على حياة شخص ما..</p>
                        <p class="text-muted">
                            تتضمن سيرتك الذاتية تعليمك (تعليماتك) ومؤهلاتك وخبرة العمل والمهارات والصفات المهمة. من خلال سيرتك الذاتية، سيتمكن صاحب العمل المحتمل من الحصول على صورة جيدة عن مهاراتك وخبرتك العملية ومعرفتك بسرعة، لتقييم ما إذا كنت مناسبًا للوظيفة أم لا، وبالتالي ما إذا كان سيعرض عليك مقابلة عمل.
                        </p>
                        <div class="d-flex justify-content-center fs-2 gap-4">
                            <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-facebook"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection