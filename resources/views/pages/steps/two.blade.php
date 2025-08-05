@extends('layouts.step')

@section('PAGE_TITLE', 'إصنع سيرتك الذاتية')

@section('STEP_TITLE')
<h2 class="fw-bolder mb-0 px-1">
    {{-- <span class="text-gradient d-inline">
        {{__('pdf-sections.education')}}
    </span> --}}
</h2>
@endsection

@section('STEP_CONTENT')
<div class="card border-0">
    <div class="card-body p-2">
        <form class="row g-3" id="stepsForm" method="POST" action="{{ route('step.processingTwo') }}">
            @csrf
            <div class="card border-0">
                <div class="card-header bg-white d-flex justify-content-between flex-wrap">
                    <div>
                        <h4 class="d-flex align-items-center">
                          	<input id="headTitle" style="width:200px" type="text" class="border-0 fs-2 fw-bold" name="education_section_title" value="{{ __('pdf-sections.education')}}" placeholder="{{__('pdf-sections.education')}}" />
                            <label for="headTitle">
                                <i class="bi bi-pen align-middle"></i>
                            </label>
                        </h4>
                        <small class="text-muted">{{__('pdf-sections.education_desc')}}</small>
                    </div>
                </div>
                <div id="collapse1" class="educations">
                    <div class="card-body accordion" id="sortableList">
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#sortableList">
                                <div id="educations" class="row g-3 p-3">
                                        <div class="col-md-12">
                                            <label for="inputDegree" class="form-label">{{ __('labels.degree') }}</label>
                                            <input type="text" class="form-control form-control-lg" id="inputDegree" name="degree" value="{{ old('degree') ?? ($cv->degree ?? '') }}">
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="inputUniversity" class="form-label">{{ __('labels.university') }}</label>
                                            <input type="text" class="form-control form-control-lg" id="inputUniversity" name="university" value="{{ old('university') ?? ($cv->university ?? '') }}">
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label for="inputCity" class="form-label">{{ __('labels.city') }}</label>
                                            <input type="text" class="form-control form-control-lg" id="inputCity" name="education_city" value="{{ old('education_city') ?? ($cv->education_city ?? '') }}">
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="inputStartYear" class="form-label">{{ __('labels.start_date') }}</label>
                                          	<input type="text" class="form-control form-control-lg" id="inputStartYear" name="startYear" value="{{ old('startYear') ?? ($cv->startYear ?? '') }}">
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <label for="inputEndYear" class="form-label">{{ __('labels.end_date') }}</label>
                                            <input type="text" class="form-control form-control-lg" id="inputEndYear" name="endYear" value="{{ old('endYear') ?? ($cv->endYear ?? '') }}">
                                        </div>
                                      	<div class="col-md-12">
                                            <label for="textareaDetails" class="form-label fw-bold">{{__('labels.details')}}</label>
                                            <button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                                            <textarea class="form-control area1" id="textareaDetails" rows="3" name="edu_details">{{old('edu_details') ?? ($cv->edu_details ?? '')}}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                                        </button>
                                        <hr />
                                </div>
                            </div>
                        </div> --}}
                        @isset($cv->educations)
                            @foreach ($cv->educations as $education)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBox{{$loop->iteration+1}}" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="handler bi bi-arrows-move text-dark px-2" style="cursor:move"></i>
                                      <span class="hashNumber">{{$loop->iteration}}</span>
                                    </button>

                                </h2>
                                <div id="collapseBox{{$loop->iteration+1}}" class="accordion-collapse collapse" data-bs-parent="#sortableList">
                                    <div id="educations-{{$loop->iteration+1}}" class="row g-3 deletable p-3">
                                            <div class="col-md-12">
                                                <label for="inputDegree" class="form-label fw-bold">{{ __('labels.degree') }}</label>
                                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputDegree" name="educations[][degree]" value="{{ $education['degree'] ?? "" }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputUniversity" class="form-label fw-bold">{{ __('labels.university') }}</label>
                                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputUniversity" name="educations[][university]" value="{{ $education['university'] ?? "" }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label fw-bold">{{ __('labels.city') }}</label>
                                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputCity" name="educations[][education_city]" value="{{ $education['education_city'] ?? "" }}">
                                            </div>
                                        <div class="col-md-6">
                                            <label for="inputStartYear" class="form-label fw-bold">{{ __('labels.start_date') }}</label>
                                            <input type="text" class="form-control form-control-lg rounded-pill" id="inputStartYear" name="educations[][startYear]" value="{{ $education['startYear'] ?? "" }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEndYear" class="form-label fw-bold">{{ __('labels.end_date') }}</label>
                                            <input type="text" class="form-control form-control-lg rounded-pill" id="inputEndYear" name="educations[][endYear]" value="{{ $education['endYear'] ?? "" }}">
                                        </div>

                                        <div class="col-md-12">
                                                <label for="textareaDetails" class="form-label fw-bold">{{__('labels.details')}}</label>
                                                <button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                                                <textarea class="form-control area1" id="textareaDetails" rows="3" name="educations[][details]">{{$education['details'] ?? ""}}</textarea>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                                <i class="bi bi-trash3 fs-5 mx-2"></i>
                                            </button>
                                            <hr />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endisset
                    </div>

                </div>
                <button type="button" id="createElement" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreEduBtn')}}
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

        @isset($cv->educations) elements = {{count($cv->educations) + 1}}; @endisset
        $( document ).ready(function() {
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
                        <div id="educations-${elements}" class="row g-3 deletable p-3">
                            <div class="col-md-12">
                                <label for="inputDegree" class="form-label fw-bold">{{ __('labels.degree') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputDegree" name="educations[][degree]">
                            </div>
                            <div class="col-md-6">
                                <label for="inputUniversity" class="form-label fw-bold">{{ __('labels.university') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputUniversity" name="educations[][university]">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label fw-bold">{{ __('labels.city') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputCity" name="educations[][education_city]">
                            </div>
                            <div class="col-md-6">
                                <label for="inputStartYear" class="form-label fw-bold">{{ __('labels.start_date') }}</label>
								<input type="text" class="form-control form-control-lg rounded-pill" id="inputStartYear" name="educations[][startYear]">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEndYear" class="form-label fw-bold">{{ __('labels.end_date') }}</label>
								<input type="text" class="form-control form-control-lg rounded-pill" id="inputEndYear" name="educations[][endYear]">
                            </div>
							<div class="col-md-12">
								<label for="textareaDetails" class="form-label fw-bold">{{__('labels.details')}}</label>
								<button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
								<textarea class="form-control area1" id="textareaDetails" rows="3" name="educations[][details]"></textarea>
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
