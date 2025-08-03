@extends('dashboard.layout')
@section('PAGE_TITLE', 'Ready Made CV')

@section('PAGE_CONTENT')
@isset($cv)
    <form class="row g-3" method="POST" action="{{route('dashboard.cvs.update', ['cv' => $cv])}}">
        @method('PUT')
@else
    <form class="row g-3" method="POST" action="{{route('dashboard.cvs.store')}}">
@endisset
        @csrf
        <div class="col-sm-12 col-md-6">
            <label for="inputEmail4" class="form-label">Model Title</label>
            <input type="text" class="form-control" id="inputEmail4" name="title" value="{{$cv->title ?? ""}}">
        </div>
        <div class="col-sm-12 col-md-6">
            <label for="lang" class="form-label">Model Language</label>
            <select id="lang" class="form-select" name="lang" aria-label="Default select example">
                <option selected>Select Language</option>
                @foreach(App\Utils\CV::LANGUAGES as $lang)
                    <option value="{{$lang['code']}}">{{$lang['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label for="exampleFormControlTextarea1" class="form-label">{{__('pdf-sections.summary')}}</label>
            <textarea class="form-control" name="profession_summary" id="exampleFormControlTextarea1" rows="3">{{$data->profession_summary ?? ""}}</textarea>
        </div>
        <div class="col-md-12">
            <hr />
            <strong class="lead">{{__('pdf-sections.education')}}</strong>
            <table class="table" data-dynamicrows>
                <thead>
                <tr>
                    <th>{{ __('labels.degree') }}</th>
                    <th>{{ __('labels.university') }}</th>
                    <th>{{ __('labels.city') }}</th>
                    <th>{{ __('labels.start_date') }}</th>
                    <th>{{ __('labels.end_date') }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data->educations ?? [] as $education)
                    <tr>
                        <td><input type="text" class="form-control" value="{{$education['degree'] ?? ""}}" name="educations[{{$loop->index}}][degree]"></td>
                        <td><input type="text" class="form-control" value="{{$education['university'] ?? ""}}" name="educations[{{$loop->index}}][university]"></td>
                        <td><input type="text" class="form-control" value="{{$education['education_city'] ?? ""}}" name="educations[{{$loop->index}}][education_city]"></td>
                        <td><input type="text" class="form-control" value="{{$education['startYear'] ?? ""}}" name="educations[{{$loop->index}}][startYear]"></td>
                        <td><input type="text" class="form-control" value="{{$education['endYear'] ?? ""}}" name="educations[{{$loop->index}}][endYear]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><input type="text" class="form-control" name="educations[0][degree]"></td>
                        <td><input type="text" class="form-control" name="educations[0][university]"></td>
                        <td><input type="text" class="form-control" name="educations[0][education_city]"></td>
                        <td><input type="text" class="form-control" name="educations[0][startYear]"></td>
                        <td><input type="text" class="form-control" name="educations[0][endYear]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <hr />
            <strong class="lead">{{__('pdf-sections.experiences')}}</strong>
            <table class="table" data-dynamicrows>
                <thead>
                <tr>
                    <th>{{ __('labels.job') }}</th>
                    <th>{{ __('labels.employer') }}</th>
                    <th>{{ __('labels.city') }}</th>
                    <th>{{ __('labels.start_date') }}</th>
                    <th>{{ __('labels.end_date') }}</th>
                    <th>{{ __('labels.details') }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data->jobs ?? [] as $job)
                    <tr>
                        <td><input type="text" value="{{$job['job_title'] ?? ""}}" class="form-control" name="jobs[{{$loop->index}}][job_title]"></td>
                        <td><input type="text" value="{{$job['employer'] ?? ""}}" class="form-control" name="jobs[{{$loop->index}}][employer]"></td>
                        <td><input type="text" value="{{$job['job_city'] ?? ""}}" class="form-control" name="jobs[{{$loop->index}}][job_city]"></td>
                        <td><input type="text" value="{{$job['jobStartYear'] ?? ""}}" class="form-control" name="jobs[{{$loop->index}}][jobStartYear]"></td>
                        <td><input type="text" value="{{$job['jobEndYear'] ?? ""}}" class="form-control" name="jobs[{{$loop->index}}][jobEndYear]"></td>
                        <td><input type="text" value="{{$job['details'] ?? ""}}" class="form-control" name="jobs[{{$loop->index}}][details]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><input type="text" class="form-control" name="jobs[0][job_title]"></td>
                        <td><input type="text" class="form-control" name="jobs[0][employer]"></td>
                        <td><input type="text" class="form-control" name="jobs[0][job_city]"></td>
                        <td><input type="text" class="form-control" name="jobs[0][jobStartYear]"></td>
                        <td><input type="text" class="form-control" name="jobs[0][jobEndYear]"></td>
                        <td><input type="text" class="form-control" name="jobs[0][details]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <hr />
            <strong class="lead">{{__('pdf-sections.languages')}}</strong>
            <table class="table" data-dynamicrows>
                <thead>
                <tr>
                    <th>{{ __('labels.language') }}</th>
                    <th>{{ __('labels.level') }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data->languages ?? [] as $language)
                    <tr>
                        <td><input type="text" value="{{$language['language'] ?? ""}}" class="form-control" name="languages[{{$loop->index}}][language]"></td>
                        <td><input type="text" value="{{$language['level'] ?? ""}}" class="form-control" name="languages[{{$loop->index}}][level]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><input type="text" class="form-control" name="languages[0][language]"></td>
                        <td><input type="text" class="form-control" name="languages[0][level]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <hr />
            <strong class="lead">{{__('pdf-sections.skills')}}</strong>
            <table class="table" data-dynamicrows>
                <thead>
                <tr>
                    <th>{{ __('labels.skill') }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data->skills ?? [] as $skill)
                    <tr>
                        <td><input type="text" class="form-control" value="{{$skill['skill'] ?? ""}}" name="skills[{{$loop->index}}][skill]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><input type="text" class="form-control" name="skills[0][skill]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <hr />
            <strong class="lead">{{__('pdf-sections.interests')}}</strong>
            <table class="table" data-dynamicrows>
                <thead>
                <tr>
                    <th>{{ __('labels.interest') }}</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data->interests ?? [] as $interest)
                    <tr>
                        <td><input type="text" class="form-control" value="{{$interest['interest'] ?? ""}}" name="interests[{{$loop->index}}][interest]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td><input type="text" class="form-control" name="interests[0][interest]"></td>
                        <td>
                            <i class="fa fa-minus" data-remove></i>
                            <i class="fa fa-arrows" data-move></i>
                            <i class="fa fa-plus" data-add></i>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@push('X_JS')
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-sortable@1.0.0/jquery-ui.min.js"></script>
    <script src="{{asset('assets/dashboard/js/dynamicrows.js')}}"></script>
    <script !src="">
        $(function() {
            $('[data-dynamicrows]').dynamicrows({
                animation: 'fade',
                copy_values: false,
                minrows: 1
            });
        });
    </script>
@endpush
