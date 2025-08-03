@extends('layouts.step')

@section('PAGE_TITLE', 'إصنع سيرتك الذاتية')

@section('STEP_TITLE')
<h2 class="fw-bolder mb-0 px-1">
    {{-- <span class="text-gradient d-inline">
        {{__('pdf-sections.experiences')}}
    </span> --}}
</h2>
@endsection

@section('STEP_CONTENT')
<div class="card border-0">
    <div class="card-body p-2">
        {{-- <div class="mb-3">
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="large"
                data-on="عربي" data-off="English" />
        </div> --}}
        <form class="row g-3" id="stepsForm" method="POST" action="{{ route('step.processingThree') }}">
            @csrf
            <div class="card border-0">
                <div class="card-header bg-white d-flex justify-content-between flex-wrap">
                    <div>
                        <h4 class="d-flex align-items-center">
                            <input id="headTitle" type="text" style="width:255px" class="border-0 fs-2 fw-bold" name="jobs_section_title" value="{{ __('pdf-sections.experiences')}}" placeholder="{{__('pdf-sections.experiences')}}" />
                            <label for="headTitle">
                                <i class="bi bi-pen align-middle"></i>
                            </label>
                        </h4>
                        <small class="text-muted">{{__('pdf-sections.experiences_desc')}}</small>
                    </div>
                    {{-- <button type="button" id="createElement" class="btn btn-light">
                        <i class="bi bi-plus-circle fs-5 mx-2"></i>
                    </button> --}}
                </div>
                <div id="collapse1" class="jobs">
                    <div class="card-body accordion" id="sortableList">
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button positionn-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#sortableList">
                        		<div id="jobs" class="row g-3 p-3">
                                    <div class="col-md-12">
                                        <label for="inputJobTitle" class="form-label">{{ __('labels.job') }}</label>
                                        <input type="text" class="form-control form-control-lg" id="inputJobTitle" name="job_title" value="{{ old('job_title') ?? ($cv->job_title ?? '') }}">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="inputEmployer" class="form-label">{{ __('labels.employer') }}</label>
                                        <input type="text" class="form-control form-control-lg" id="inputEmployer" name="employer" value="{{ old('employer') ?? ($cv->employer ?? '') }}">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="inputCity" class="form-label">{{ __('labels.city') }}</label>
                                        <input type="text" class="form-control form-control-lg" id="inputCity" name="job_city" value="{{ old('job_city') ?? ($cv->job_city ?? '') }}">
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <label for="inputStartYear" class="form-label">{{ __('labels.start_date') }}</label>
                                        <input type="text" class="form-control form-control-lg" id="inputStartYear" name="jobStartYear" value="{{ $cv->jobStartYear ?? '' }}">
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <label for="inputEndYear" class="form-label">{{ __('labels.end_date') }}</label>
                                        <input type="text" class="form-control form-control-lg" id="inputEndYear" name="jobEndYear" value="{{ $cv->jobEndYear ?? '' }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="textareaDetails" class="form-label">{{__('labels.details')}}</label>
                                        <button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                                        <textarea class="form-control area1" id="textareaDetails" rows="3" name="details">{{$cv->details ?? ""}}</textarea>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                        <i class="bi bi-trash3 fs-5 mx-2"></i>
                                    </button>
                                    <hr />
                                </div>
                            </div>
                        </div> --}}
                        @isset($cv->jobs)
                            @foreach ($cv->jobs as $job)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed positionn-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBox{{$loop->iteration+1}}" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="handler bi bi-arrows-move text-dark px-2" style="cursor:move"></i>
                                      	<span class="hashNumber">{{$loop->iteration}}</span>
                                    </button>
                                </h2>
                                <div id="collapseBox{{$loop->iteration+1}}" class="accordion-collapse collapse" data-bs-parent="#sortableList">
                                	<div id="jobs-{{$loop->iteration+1}}" class="row g-3 deletable p-3">
                                    <div class="col-md-12">
                                        <label for="inputJobTitle" class="form-label fw-bold">{{ __('labels.job') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputJobTitle" name="jobs[][job_title]" value="{{$job['job_title'] ?? ''}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmployer" class="form-label fw-bold">{{ __('labels.employer') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputEmployer" name="jobs[][employer]" value="{{$job['employer'] ?? ''}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label fw-bold">{{ __('labels.city') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputCity" name="jobs[][job_city]" value="{{$job['job_city'] ?? ''}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStartYear" class="form-label fw-bold">{{ __('labels.start_date') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputStartYear" name="jobs[][jobStartYear]" value="{{$job['jobStartYear'] ?? ''}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEndYear" class="form-label fw-bold">{{ __('labels.end_date') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputEndYear" name="jobs[][jobEndYear]" value="{{$job['jobEndYear'] ?? ''}}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="textareaDetails" class="form-label fw-bold">{{__('labels.details')}}</label>
                                      	<button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                                        <textarea class="form-control area rounded" id="textareaDetails" rows="3" name="jobs[{{$loop->iteration}}][details]">{{$job['details'] ?? ''}}</textarea>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                        <i class="bi bi-trash3 fs-5 mx-2"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <button type="button" id="createElement" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreJobBtn')}}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('HEAD_BOTTOM')
@if(app()->getLocale() == 'ar')
	<style>.accordion-button::after{margin-left:0}</style>
@else
	<style>.accordion-button::after{margin-right:0}</style>
@endif
<style>

.accordion-button:not(.collapsed) {
    color: unset;
    background-color: unset;
}
</style>
@endpush

@push('BODY_BOTTOM')
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <script>
        let elements = 0;
        @isset($cv->jobs) elements = {{count($cv->jobs) + 1}}; @endisset
        $(function() {
            $('body').on('click','.removeElement',function () {
                elements--;
                $(this).parents(".accordion-item").remove();
            });
			new Sortable(document.getElementById('sortableList'), {
                animation: 150,
              	onEnd: autoPreview,
              handle:'.handler'
            });
            
            $("#createElement").click(function(e){
                e.preventDefault();
              $(".accordion-collapse").each((i, element) => {
              	element.classList.remove("show")
              });
              $(".accordion-button").each((i, element) => {
              	element.classList.add("collapsed")
              });
                elements++;
                $('#sortableList').append(
                `<div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button positionn-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBox${elements}" aria-expanded="true" aria-controls="collapseOne">
                            <i class="handler bi bi-arrows-move text-dark px-2" style="cursor:move"></i>
							<span class="hashNumber">${elements}</span>
                        </button>
                    </h2>
                    <div id="collapseBox${elements}" class="accordion-collapse collapse show" data-bs-parent="#sortableList">
                        <div id="jobs" class="row g-3 deletable p-3">
                            <div class="col-md-12">
                                <label for="inputJobTitle" class="form-label fw-bold">{{ __('labels.job') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputJobTitle" name="jobs[][job_title]" >
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="inputEmployer" class="form-label fw-bold">{{ __('labels.employer') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputEmployer" name="jobs[][employer]">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="inputCity" class="form-label fw-bold">{{ __('labels.city') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputCity" name="jobs[][job_city]">
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <label for="inputStartYear" class="form-label fw-bold">{{ __('labels.start_date') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputStartYear" name="jobs[][jobStartYear]">
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <label for="inputEndYear" class="form-label fw-bold">{{ __('labels.end_date') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputEndYear" name="jobs[][jobEndYear]">
                            </div>
                            <div class="col-md-12">
                                <label for="textareaDetails" class="form-label fw-bold">{{__('labels.details')}}</label>
                                <button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                                <textarea class="form-control area1 rounded" id="textareaDetails" rows="3" name="jobs[][details]"></textarea>
                            </div>
                            <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                <i class="bi bi-trash3 fs-5 mx-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                `);
            });
            

        });
    </script>
@endpush
