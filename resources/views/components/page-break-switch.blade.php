@php
    $id = rand(1,9999);
@endphp
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault{{$id}}" name="{{$breakName}}">
    <label class="form-check-label" for="flexSwitchCheckDefault{{$id}}">{{__('general.new_page_titel')}}</label>
</div>
<small class="text-muted">{{__('general.new_page_desc')}}</small>