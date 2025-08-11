@php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
@endphp

@extends('layouts.cv')


@section('styles')
    <style>

        .sidebar {
            background: {{ $cv->cv_color ?? '#2e5395' }} !important;
        }
        @media print {
            .sidebar {
                background: {{ $cv->cv_color ?? '#2e5395' }}  !important;
            }

            /* Hide sidebar content on pages after first */
            .sidebar::after {
                background: {{ $cv->cv_color ?? '#2e5395' }}  !important;
            }
        }
        /* Table styling */
        table {
            border-spacing: 1;
            border-collapse: collapse;
            overflow: wrap;
            width: 100%;
            margin: 0 auto;
            position: relative;

        }

        table * {
            position: relative;
        }

        td, th {
            padding: 20px;
            vertical-align: top;
        }

        table td,
        table th {
            font-size: {{ $cv->cv_text_size ?? '14' }}px;
            text-align: {{ $currentLocale == 'ar' ? 'right' : 'left' }};
        }

        /* Typography */
        .name {
            font-size: {{$cv->cv_text_size+28 ?? '40'}}px;
            color: {{$cv->cv_color ?? '#2e5395'}};
            font-weight: bold;
        }

        .title {
            padding-top: 10px;
            font-size: {{$cv->cv_text_size+4 ?? '18'}}px;
            font-weight: 400;
            text-transform: uppercase
        }

        .section-title {
            color: {{$cv->cv_color ?? '#2e5395'}};
            font-weight: bold;
            padding-bottom: 0;
            padding-top: 5px;
            font-size: {{$cv->cv_text_size+9 ?? '23'}}px;
            text-transform: uppercase
        }

        /* Sidebar specific styling */
        .sidebar td,
        .sidebar th {
            color:white;
            padding:10px;
            @if($currentLocale == 'ar')
            padding-right: 20px;
            padding-left: 20px;
            @else
            padding-left: 20px;
            padding-right: 20px;
        @endif
}


        /* Personal info table */
        .personal-info-table th {
            padding-bottom: 2px;
        }

        .personal-info-table td {
            padding-top: 2px
        }


        /* Strong text styling */
        strong.title
        {
            line-height: 25px
        }

    </style>
@endsection



@section('content')
    <div class="cv-container">
        <div class="sidebar">
            @include('components.cv.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>

        <div class="main-content">
            @include('components.cv.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>
    </div>
@endsection

