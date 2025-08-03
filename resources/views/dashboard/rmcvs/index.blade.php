@extends('dashboard.layout')

@section('PAGE_TITLE', 'Ready Made CVs')

@section('PAGE_CONTENT')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
            <i class="fas fa-table me-1"></i>
            You can add, edit and delete any model
            </div>
            <a href="{{route('dashboard.cvs.create')}}" class="btn btn-primary">Add</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $cv)
                        <tr>
                            <td>{{$cv->title}}</td>
                            @php
                                $lang = $cv->langDetails()
                            @endphp
                            <td>{{$lang['name']}} <i class="fi fi-{{$lang['flag']}}"></i> </td>
                            <td>{{str()->slug($cv->title, '-')}}</td>
                            <td>
                                <a href="{{route('dashboard.cvs.edit', ['cv' => $cv->id])}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                                <button data-clipboard-text="{{url('/') . '?model=' . $cv->uuid}}" class="btn btn-outline-dark"><i class="fa fa-link"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('X_JS')
    <script src="{{asset('assets/js/jquery.copy-to-clipboard.js')}}"></script>
    <script>

    </script>
@endpush
