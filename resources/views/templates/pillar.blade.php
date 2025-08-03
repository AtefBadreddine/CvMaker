@php
    $currentLocale = $cv->selectedLang ?? (session()->get('selectedLang') ?? 'en');
@endphp
@extends('layouts.cv')

@section('styles')
    <style>

        /* Sidebar styling */
        .sidebar {
            background:#eeeeee !important;
            color:#222 !important;
        }


        /* PDF Print Styles - Optimized for Spatie PDF (Puppeteer) */
        @media print {
            .sidebar {
                background:#eeeeee !important;
                color:#222 !important;
            }

            /* Hide sidebar content on pages after first */
            .sidebar::after {
                background:#eeeeee !important;
                color:#222 !important;
            }
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
            font-family:'Cairo';
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
            font-weight: 500;
            padding-bottom: 10px;
            border-bottom: 1px solid #eeeeee
        }

        .sidebar table td,
        .sidebar table th
        {
            color:#222;
            padding:10px;
            @if($currentLocale == 'ar')
            padding-right: 15px;
            padding-left: 0px;
            @else
            padding-left: 15px;
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
            font-size: {{$cv->cv_text_size+2 ?? '16'}}px;
            color: {{$cv->cv_color ?? '#004b8a'}};
            border-bottom: 1px solid #ccc
        }

        table td .details,
        table th .details
        {
            font-size: {{$cv->cv_text_size ?? '14'}}px; !important;
            font-weight:300;
            color: #545E6C;
            padding-top: 10px
        }

        .top-section
        {
            padding: 0 20px 10px;
            margin: 0;
            background-color: {{$cv->cv_color ?? '#004b8a'}};
            color: #fff;
            @if($currentLocale == 'ar')
            text-align: right;
            font-family:'Cairo';
            @else
            text-align: left;
            font-family:'Roboto';
        @endif
        }

    </style>
@endsection


@section('content')

    <div class="top-section">
        <h1 class="name">{{$cv->name ?? ""}}</h1>
        <h3 class="tagline">{{$cv->current_job ?? ""}}</h3>
    </div>

    <div class="cv-container">

        <div class="sidebar">
            @include('components.pillar.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>
        <div class="main-content">
            @include('components.pillar.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>

    </div>
@endsection




