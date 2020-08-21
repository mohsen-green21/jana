
@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css -->
<link rel="stylesheet" href="{{ asset('css/mdb.css') }}">
@endsection
<!-- Start Content-->

@section('content')
<div class="mt-3 ">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('message2'))
    <div class="alert alert-danger">
        {{ session()->get('message2') }}
    </div>
    @endif
    @if(session()->has('message3'))
    <div class="alert alert-danger">
        {{ session()->get('message3') }}
    </div>
    @endif

    @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<h3 class="mt-2 mb-3 page-title">اسلایدر</h3>
<div class="card-box">
    <h5 class="container bg-light p-2 text-uppercase">اطلاعات اسلایدر</h5>
    <form action="{{ url('slider/'.$slide->_id) }}" method="POST" enctype="multipart/form-data" class="">
        <input type="hidden" name="_method" value="PUT">
      @csrf
        <div class="d-flex mt-1">
            <div class="d-flex flex-column mr-3 mt-0" style="width: 50%">
                <label>@lang('form.slider_title')</label>
                <input type="text" value="{{old('title') != null ? old('title') : $slide->title}}" name="title"
                    class="form-control mr-3 border-right-0 border-left-0 border-top-0">
            </div>
            <div class="d-flex flex-column " style="width: 50%">
                <label class="">@lang('form.slider_isactive')</label>
                <select class=" mdb-select " name="isactive">
                    <option value="" selected></option>
                    <option value="1">فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="d-flex flex-column mr-3" style="width: 50%">
                <label>@lang('form.slider_album')</label>
                <select class="mdb-select md-form" name="album" searchable="جستجو">
                    <option selected value=""></option>
                    @foreach ($album as $items)
                    <option value="{{$items->_id}}">{{$items->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="d-flex flex-column " style="width: 50%">
                <label>@lang('form.slider_music')</label>
                <select class=" mdb-select md-form" name="music" searchable="جستجو">
                    <option selected value=""></option>
                    @foreach ($music as $items)
                    <option value="{{$items->_id}}">{{$items->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="d-flex mt-2">


            <div class="d-flex flex-column mr-3" style="width: 50%">
                <label>@lang('form.slider_artist')</label>
                <select class=" mdb-select md-form" name="artist" searchable="جستجو">
                    <option selected value=""></option>
                    @foreach ($artist as $items)
                    <option value="{{$items->_id}}">{{$items->name}}</option>

                    @endforeach
                </select>

            </div>

            <div class="d-flex flex-column " style="width: 50%">
                <label>@lang('form.slider_link')</</label>
                <input type="text" name="link" class="form-control mr-3 mt-4 border-right-0 border-left-0 border-top-0"
                    value="{{old('link') != null ? old('link') : $slide->link }}">
            </div>
        </div>



        <div class="d-flex flex-column mt-2" style="width: 50%">
            <label>@lang('form.slider_image')</label>
            <div class="md-form">
                <div class="file-field">
                    <a class="btn-floating purple-gradient mt-0 float-left">
                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                        <input type="file" name="image">
                    </a>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="انتخاب تصویر">
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center mt-4">
            <input type="submit" value="{{ trans('form.submit') }}" class="btn btn-success mr-2">
            <input type="button" value="لغو" class="btn btn-danger">
        </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{ asset('js/mdb.js') }}"></script>
<script>
    // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
})
</script>
@endsection
