@extends('layouts.no-preview-step')

@section('STEP_TITLE')
    <h2 class="display-5 fw-bolder mb-0">
        <span class="text-gradient d-inline">
            {{ __('general.title') }}
        </span>
    </h2>
	<p class="lead">{{ __('general.rm_title') }}</p>
@endsection

@section('STEP_CONTENT')
    <div class="card border-0">
        <div class="card-body p-4">
            <div class="list-group">
                @forelse($examples as $example)
                <a href="{{url('step/template') . "?model=" . $example->uuid}}" class="list-group-item list-group-item-action" aria-current="true">
                    {{$example->title}}
                </a>
                @empty
                    <a class="list-group-item list-group-item-action disabled" aria-disabled="true">No Data</a>
                @endforelse
            </div>
        </div>
    </div>
@endsection


