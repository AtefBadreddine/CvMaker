@extends('layouts.cv')

@php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
@endphp

@section('styles')
    <style>

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
            font-size: {{$cv->cv_text_size+16 ?? '30'}}px
        }

        table th .title,
        table td .title
        {
            font-size: {{$cv->cv_text_size + 4 ?? '18'}}px;
        }

        .gray-text
        {
            color: #97AAC3;
        }

        table th.section-title {
            color: {{$cv->cv_color ?? '#2a5fb0'}};
            padding-bottom: 0;
            padding-top: 20px;
            font-size: {{$cv->cv_text_size+6 ?? '20'}}px;
            font-weight: 500;
        }

        .sidebar table td,
        .sidebar table th
        {
            color:white;
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
            background-color: {{$cv->cv_color ?? '#2a5fb0'}};
            width: 100%
        }

        .sidebar table {
            width: 100%;
            table-layout: fixed;
        }


        .sidebar table th.sidebar-title {
            background-color: {{$cv->darker_color ?? '#224c8d'}};
            font-size: {{$cv->cv_text_size+2 ?? '16'}}px;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
            box-sizing: border-box;
        }


        table td .details,
        table th .details
        {
            font-size: {{$cv->cv_text_size ?? '14'}}px !important;
            font-weight:300;
            color: #545E6C;
            padding-top: 10px
        }


    </style>
@endsection

@section('content')
    <div class="cv-container">
        <div class="sidebar">
            @include('components.orbital.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>

        <div class="main-content">
            @include('components.orbital.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale])
        </div>
    </div>
@endsection



