@php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
@endphp
@php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
@endphp
@extends('layouts.cv-simple')

@section('styles')
    <style>

        /* Sidebar styling */
        .sidebar {

            background:{{$cv->lighter_color ?? '#ecf3fb'}};
            color:#222;
        }

        .cv-container {
            flex-direction: {{ $currentLocale === 'ar' ? 'row-reverse' : 'row-reverse' }};
        }




        table {
            border-spacing: 1;
            border-collapse: collapse;
            overflow: wrap;
            width: 100%;
            margin: 0 auto;
            position: relative;
            padding-top: 15px;
        }

        table * {
            position: relative;
        }


        td,th {
            padding: 20px;
        }

        table td,
        table th {
            font-size: {{$cv->cv_text_size ?? '14'}}px;
            @if($currentLocale == 'ar')
            text-align: right;
            font-family:'Cairo','Amiri';
            @else
            text-align: left;
            font-family:'Roboto';
        @endif
}

        .name
        {
            font-size: {{$cv->cv_text_size+16 ?? '30'}}px;
        }



        .name,
        .tagline
        {
            padding: 0;
            margin: 0;
            font-weight: 300;
            line-height: 1.6;
        }
        .tagline
        {
            font-size: {{$cv->cv_text_size+4 ?? '18'}}px;
        }

        table th .title,
        table td .title
        {
            font-size: {{$cv->cv_text_size+4 ?? '18'}}px;
        }

        .gray-text
        {
            color: #97AAC3;
        }

        table th.section-title {
            color:{{$cv->cv_color ?? '#004b8a'}};
            padding-bottom: 0;
            padding-top: 20px;
            font-size: {{$cv->cv_text_size+6 ?? '20'}}px;
            font-weight: 900;
            padding-bottom: 10px;
        }

        .sidebar table td,
        .sidebar table th
        {
            color:#222;
            padding:10px;
            @if($currentLocale == 'ar')
            padding-right: 20px;
            padding-left: 0px;
            @else
            padding-left: 20px;
            padding-right: 0px;
        @endif
}

        table td.info-section
        {
            text-align: center;
            padding: 20px !important;
            width: 100%
        }

        .sidebar table th.sidebar-title
        {
            font-size: {{$cv->cv_text_size+4 ?? '18'}}px;
            color: {{$cv->cv_color ?? '#004b8a'}};
            padding-top:20px
        }

        table td .details,
        table th .details
        {
            font-size: {{$cv->cv_text_size ?? '14'}}px; !important;
            font-weight:300;
            color: #545E6C;
            padding-top: 10px
        }



        /* PDF Print Styles - Optimized for Spatie PDF (Puppeteer) */
        @media print {
            .cv-container {
                flex-direction: {{ $currentLocale === 'ar' ? 'row-reverse' : 'row-reverse' }};
            }

            .sidebar {
                background:{{$cv->lighter_color ?? '#ecf3fb'}};
                color:#222;
            }

            /* Hide sidebar content on pages after first */
            .sidebar::after {
                background:{{$cv->lighter_color ?? '#ecf3fb'}};
                color:#222;
            }
        }
    </style>
@endsection


@section('content')
    <div class="cv-container">

        <div class="sidebar">
            @include('components.simple-dev.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>
        <div class="main-content">
            @include('components.simple-dev.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>

    </div>
@endsection


