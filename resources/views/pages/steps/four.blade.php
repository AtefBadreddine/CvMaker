@extends('layouts.step')

@section('PAGE_TITLE', 'إصنع سيرتك الذاتية')

@section('STEP_TITLE')
<h2 class="fw-bolder mb-0 px-1">
    <span class="text-dark d-inline">
        {{__('steps-bar.six')}}
    </span>
</h2>
@endsection

@section('STEP_CONTENT')
    <div class="card-body p-2">
        <form class="row " id="stepsForm" method="POST" action="{{ route('step.processingFour') }}">
            @csrf
            <div class="card border-0 p-md-5 p-sm-1">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-translate fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="langs_section_title"
                                   value="{{ __('pdf-sections.languages') }}"
                                   placeholder="{{ __('pdf-sections.languages') }}"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-muted fst-italic">{{ __('pdf-sections.languages_desc') }}</small>
                    </div>
                </div>

                <div id="collapse1">
                    <div class="card-body">
                        <div id="languages" class="row g-3 structure align-items-center" style="display:none">
                            <div class="col-md-6">
                                <label for="inputLanguageTitle" class="form-label fw-bold">{{ __('labels.language') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputLanguageTitle" name="language" value="{{ old('language') ?? ($cv->language ?? '') }}">
                            </div>
                            <div class="col-md-5">
                                <label for="inputLanguageLevel" class="form-label fw-bold">{{ __('labels.level') }}</label>
                                <select class="form-control form-control-lg rounded-pill" id="inputLanguageLevel" name="level">
                                    <option @selected(isset($cv->level) && $cv->level == __('labels.language_begginer'))>{{__('labels.language_begginer')}}</option>
                                    <option @selected(isset($cv->level) && $cv->level == __('labels.language_good'))>{{__('labels.language_good')}}</option>
                                    <option @selected(isset($cv->level) && $cv->level == __('labels.language_vgood'))>{{__('labels.language_vgood')}}</option>
                                    <option @selected(isset($cv->level) && $cv->level == __('labels.language_native'))>{{__('labels.language_native')}}</option>
                                    <option @selected(isset($cv->level) && $cv->level == 'A1')>A1</option>
                                    <option @selected(isset($cv->level) && $cv->level == 'A2')>A2</option>
                                    <option @selected(isset($cv->level) && $cv->level == 'B1')>B1</option>
                                    <option @selected(isset($cv->level) && $cv->level == 'B2')>B2</option>
                                    <option @selected(isset($cv->level) && $cv->level == 'C1')>C1</option>
                                    <option @selected(isset($cv->level) && $cv->level == 'C2')>C2</option>
                                </select>
                            </div>
                          	<div class="col-1 pt-4">
                              <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                  <i class="bi bi-trash3 fs-5 mx-2"></i>
                              </button>
                            </div>
                            <hr />
                        </div>
                        @isset($cv->languages)
                            @foreach ($cv->languages as $lang)
                                <div id="languages" class="row g-3 structure deletable">
                                    <div class="col-md-6">
                                        <label for="inputLanguageTitle" class="form-label fw-bold">{{ __('labels.language') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputLanguageTitle" name="languages[{{$loop->iteration}}][language]" value="{{$lang['language']}}">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputLanguageLevel" class="form-label fw-bold">{{ __('labels.level') }}</label>
                                        <select class="form-control form-control-lg rounded-pill" id="inputLanguageLevel" name="languages[{{$loop->iteration}}][level]">
                                            <option @selected(isset($lang['level']) && $lang['level'] == __('labels.language_begginer'))>{{__('labels.language_begginer')}}</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == __('labels.language_good'))>{{__('labels.language_good')}}</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == __('labels.language_vgood'))>{{__('labels.language_vgood')}}</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == __('labels.language_native'))>{{__('labels.language_native')}}</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == 'A!')>A1</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == 'A2')>A2</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == 'B1')>B1</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == 'B2')>B2</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == 'C1')>C1</option>
                                            <option @selected(isset($lang['level']) && $lang['level'] == 'C2')>C2</option>
                                        </select>
                                    </div>
                                  	<div class="col-1 pt-4">
                                      <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                          <i class="bi bi-trash3 fs-5 mx-2"></i>
                                      </button>
                                    </div>
                                    <hr />
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <button type="button" id="createElement" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreLangBtn')}}
                </button>
            </div>

            <div class="card border-0 p-md-5 p-sm-1">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-magic fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="skills_section_title" value="{{__('pdf-sections.skills')}}" placeholder="{{__('pdf-sections.skills')}}"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-muted fst-italic">{{__('pdf-sections.skills_desc')}}</small>
                    </div>
                </div>
                <div id="collapse2">
                    <div class="card-body">
                        <div id="skills" class="row g-3 structure align-items-center" style="display:none">
                            <div class="col-md-11">
                                <label for="inputSkill" class="form-label fw-bold">{{ __('labels.skill') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputSkill" name="skill" value="{{ old('skill') ?? ($cv->skill ?? '') }}">
                            </div>
                          	<div class="col-md-1 pt-4">
                              <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                  <i class="bi bi-trash3 fs-5 mx-2"></i>
                              </button>
                            </div>
                            <hr />
                        </div>
                        @isset($cv->skills)
                            @foreach ($cv->skills as $skill)
                                <div id="skills" class="row g-3 structure deletable">
                                    <div class="col-md-11">
                                        <label for="inputSkill" class="form-label fw-bold">{{ __('labels.skill') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputSkill" name="skills[{{$loop->iteration}}][skill]" value="{{$skill['skill']}}">
                                    </div>
                                  	<div class="col-md-1 pt-4">
                                      <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                          <i class="bi bi-trash3 fs-5 mx-2"></i>
                                      </button>
                                    </div>
                                    <hr />
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <button type="button" id="createElement2" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreSkillBtn')}}
                </button>
            </div>

          <div class="card border-0 p-md-5 p-sm-1">
              <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                  <div class="w-100">
                      <h4 class="d-flex align-items-center mb-1">
                          <i class="bi bi-moon-stars-fill fs-4 text-primary"></i>
                          <input type="text"
                                 class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                 name="summary_section_title" value="{{__('pdf-sections.summary')}}" placeholder="{{__('pdf-sections.summary')}}"
                                 aria-label="Section Title" />
                      </h4>
                      <small class="text-muted fst-italic">{{__('pdf-sections.summary_desc')}}</small>
                  </div>
              </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="textareaDetails" class="form-label fw-bold">{{__('labels.details')}}</label>
                          	<button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                            <textarea class="form-control rounded" id="textareaDetails" rows="3" name="profession_summary">{{old('profession_summary') ?? ($cv->profession_summary ?? '')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 p-md-5 p-sm-1 collapse @isset($cv->cert) show @endisset" id="collapseCerts">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bank fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="certs_section_title" value="{{__('pdf-sections.certs')}}" placeholder="{{__('pdf-sections.certs')}}"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-primary fst-italic">{{__('pdf-sections.optional_section')}}</small>
                    </div>
                </div>
                <div id="collapse6">
                    <div class="card-body">
                        <div id="certs" class="row g-3 structure align-items-center">
                            <div class="col-md-12">
                                <label for="inputSkill" class="form-label fw-bold">{{ __('labels.cert') }}</label>
                                <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="cert">{{($cv->cert ?? '') }}</textarea>
                            </div>
                            <!--<div class="col-md-1 pt-4">
                                <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                    <i class="bi bi-trash3 fs-5 mx-2"></i>
                                </button>
                            </div>-->
                            <hr />
                        </div>
                        @isset($cv->certs)
                            @foreach ($cv->certs as $cert)
                                <div id="certs" class="row g-3 structure deletable">
                                    <div class="col-md-12">
                                        <label for="inputSkill" class="form-label fw-bold">{{ __('labels.cert') }}</label>
                                        <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="certs[{{$loop->iteration}}][cert]">{{$cert['cert']}}</textarea>
                                    </div>
                                    <!--<div class="col-md-1 pt-4">
                                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                                        </button>
                                    </div>-->
                                    <hr />
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <!--<button type="button" id="createElement6" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreBtn')}}
                </button>-->
            </div>

            <div class="card border-0 p-md-5 p-sm-1  collapse @isset($cv->ref) show @endisset" id="collapseRefs">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-pen fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="refs_section_title" value="{{__('pdf-sections.refs')}}" placeholder="{{__('pdf-sections.refs')}}"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-primary fst-italic">{{__('pdf-sections.optional_section')}}</small>
                    </div>
                </div>
                <div id="collapse9">
                    <div class="card-body">
                        <div id="refs" class="row g-3 structure align-items-center">
                            <div class="col-md-12">
                                <label for="inputSkill" class="form-label fw-bold">{{ __('labels.ref') }}</label>
                                <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="ref">{{($cv->ref ?? '') }}</textarea>
                            </div>
                            <!--<div class="col-md-1 pt-4">
                                <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                    <i class="bi bi-trash3 fs-5 mx-2"></i>
                                </button>
                            </div>-->
                            <hr />
                        </div>
                        @isset($cv->refs)
                            @foreach ($cv->refs as $ref)
                                <div id="refs" class="row g-3 structure deletable">
                                    <div class="col-md-12">
                                        <label for="inputSkill" class="form-label fw-bold">{{ __('labels.ref') }}</label>
                                        <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="refs[{{$loop->iteration}}][ref]">{{$ref['ref']}}</textarea>
                                    </div>
                                    <!--<div class="col-md-1 pt-4">
                                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                                        </button>
                                    </div>-->
                                    <hr />
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <!--<button type="button" id="createElement9" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreBtn')}}
                </button>-->
            </div>





            <div class="card border-0 p-md-5 p-sm-1  collapse @isset($cv->interests) show @endisset" id="collapseInterests">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bag-heart-fill fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="interests_section_title" value="{{__('pdf-sections.interests')}}" placeholder="{{__('pdf-sections.intersts')}}"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-primary fst-italic">{{__('pdf-sections.optional_section')}}</small>
                    </div>
                </div>
                <div id="collapse3">
                    <div class="card-body">
                        <div id="interests" class="row g-3 structure" style="display: none">
                            <div class="col-md-11">
                                <label for="inputInterest" class="form-label fw-bold">{{ __('labels.interest') }}</label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputInterest" name="interest" value="{{ old('interest') ?? ($cv->interest ?? '') }}">
                            </div>
                          	<div class="col-md-1 pt-4">
                              <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                  <i class="bi bi-trash3 fs-5 mx-2"></i>
                              </button>
                            </div>
                            <hr />
                        </div>
                        @isset($cv->interests)
                            @foreach ($cv->interests as $interest)
                                <div id="interests" class="row g-3 structure deletable">
                                    <div class="col-md-11">
                                        <label for="inputInterest" class="form-label fw-bold">{{ __('labels.interest') }}</label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputInterest" name="interests[{{$loop->iteration}}][interest]" value="{{ $interest['interest'] }}">
                                    </div>
                                  	<div class="col-md-1 pt-4">
                                      <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                          <i class="bi bi-trash3 fs-5 mx-2"></i>
                                      </button>
                                  	</div>
                                    <hr />
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <button type="button" id="createElement3" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    {{__('general.addMoreInterestBtn')}}
                </button>
            </div>

            <div class="card border-0 p-md-5 p-sm-1  structure" id="customSections" style="display: none">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bandaid fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="customSectionTitle" value="{{old('customSectionTitle') ?? ($cv->customSectionTitle ?? '')}}"   placeholder="{{__('labels.customSectionTitle')}}"
                                   aria-label="Section Title" />
                        </h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-primary fst-italic">{{__('pdf-sections.optional_section')}}</small>
                            <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                <i class="bi bi-trash3 fs-5 mx-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="textareaDetails1" class="form-label">{{__('labels.details')}}</label>
                          	<button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                            <textarea class="form-control" id="textareaDetails1" rows="3" name="customSectionDetails">{{old('customSectionDetails') ?? ($cv->customSectionDetails ?? '')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <span id="customs">
                @isset($cv->customSections)
                    @foreach ($cv->customSections as $section)
                        <div class="card shadow border-0 p-md-5 p-sm-1 mt-5 structure deletable" id="customSections">

                               <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bandaid fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="customSections[{{$loop->iteration}}][customSectionTitle]" value="{{$section['customSectionTitle']}}"  placeholder="{{__('labels.customSectionTitle')}}"
                                   aria-label="Section Title" />
                        </h4>
                        <div class="d-flex justify-content-between align-items-center">
                               <small class="text-primary fst-italic">{{__('pdf-sections.optional_section')}}</small>
                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                        </button>
                        </div>

                    </div>
                </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-2">
                                               <label for="textareaDetails1" class="form-label">{{__('labels.details')}}</label>
                                      	<button class="btn btn-sm btn-primary addBullet" type="button">{{__('labels.add_bullet')}} •</button>
                                        </div>

                                        <textarea class="form-control" id="textareaDetails1" rows="3" name="customSections[{{$loop->iteration}}][customSectionDetails]">{{$section['customSectionDetails']}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </span>

            <div class="card border-0 p-md-5 p-sm-1 mt-5">
                <div class="card-header bg-white d-flex justify-content-between flex-wrap">
                    <div>
                        <h4>
                            <i class="bi bi-pencil-square"></i>
                            {{__('general.addNewSectionTitle')}}
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseInterests">
                                <i class="bi bi-bag-heart-fill"></i>
                                {{__('pdf-sections.interests')}}
                            </button>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseCerts">
                                <i class="bi bi-bank2"></i>
                                {{__('pdf-sections.certs')}}
                            </button>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseRefs">
                                <i class="bi bi-pen"></i>
                                {{__('pdf-sections.refs')}}
                            </button>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" id="createElement5">
                                <i class="bi bi-mic-fill"></i>
                                {{__('pdf-sections.custom')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('BODY_BOTTOM')
    <script src="{{ asset('assets/js/jquery.repeater.js') }}"></script>
    <script>

        $(function() {
            $('#stepsForm').repeater({
                repeatElement: 'languages',
                containerElement: 'collapse1',
                groupName: "languages",
                createElement: 'createElement',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'skills',
                containerElement: 'collapse2',
                groupName: "skills",
                createElement: 'createElement2',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'interests',
                containerElement: 'collapse3',
                groupName: "interests",
                createElement: 'createElement3',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'certs',
                containerElement: 'collapse6',
                groupName: "certs",
                createElement: 'createElement6',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'refs',
                containerElement: 'collapse9',
                groupName: "refs",
                createElement: 'createElement9',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'courses',
                containerElement: 'collapse4',
                groupName: "courses",
                createElement: 'createElement4',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'customSections',
                containerElement: 'customs',
                groupName: "customSections",
                createElement: 'createElement5',
                removeElement: 'removeElement'
            });



            $('.removeElement').click(function () {
                $(this).parents(".deletable").remove();
            });

            $('#submitBtn').click(function(event) {
                event.preventDefault();
                // Check if the collapsible div is shown
                if ($('.collapse').hasClass('show'))
                {
                    // Enable the additional inputs inside the collapsible div
                    $('.collapse input').prop('disabled', false);
                } else {
                    // Disable the additional inputs inside the collapsible div
                    $('.collapse input').prop('disabled', true);
                }

                // Submit the form
                $('#stepsForm').submit();
            });
        });
    </script>
@endpush
