@extends('layouts.no-preview-step')

@section('STEP_TITLE')
    <h2 class="display-5 fw-bolder mb-0">
        {{-- <span class="text-dark d-inline">
            {{ __('general.title') }}
        </span> --}}
    </h2>
    <p class="lead"></p>
@endsection

@section('STEP_CONTENT')
    <div class="card border-0">
        <div class="card-body p-4">
            <div class="d-flex flex-column justify-content-evenly align-items-center">
                <a href="{{ url('step/readymade') }}"
                    class="btn btn-lg btn-outline-primary d-flex align-items-center justify-content-center w-75 my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-backpack-fill mx-3" viewBox="0 0 16 16">
                        <path d="M5 13v-3h4v.5a.5.5 0 0 0 1 0V10h1v3z" />
                        <path
                            d="M6 2v.341C3.67 3.165 2 5.388 2 8v5.5A2.5 2.5 0 0 0 4.5 16h7a2.5 2.5 0 0 0 2.5-2.5V8a6 6 0 0 0-4-5.659V2a2 2 0 1 0-4 0m2-1a1 1 0 0 1 1 1v.083a6 6 0 0 0-2 0V2a1 1 0 0 1 1-1m0 3a4 4 0 0 1 3.96 3.43.5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14A4 4 0 0 1 8 4M4.5 9h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5" />
                    </svg>
                    {{ __('general.rmcvBtn') }}
                </a>
                <a href="{{ url('step/template') }}"
                    class="btn btn-lg btn-outline-primary d-flex align-items-center justify-content-center w-75 my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-file-earmark-text-fill mx-3" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                    </svg>
                    {{ __('general.blankBtn') }}
                </a>
            </div>
        </div>
    </div>
@endsection
