@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css-->

<link rel="stylesheet" href="{{ asset('css/mdb.css') }}">
@endsection

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">
                    ویرایش آلبوم
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="d-flex">


                {{-- flex form --}}
                <div class="d-flex flex-column card " style="flex: 1">
                    <form action="{{url('album')}}" enctype="multipart/form-data" method="post">

                        @csrf
                        <h5 class="text-uppercase bg-light p-2  m-3">
                            اطلاعات آلبوم
                        </h5>
                        <div class="d-flex flex-column mt-4">
                            <div class="form-group m-3 " style="">
                                <label for="product-name">
                                    @lang('form.album_name')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>

                                <input class="form-control border-top-0 border-right-0 border-left-0" id="product-name"
                            name="name" placeholder="" type="text" value="{{old('name')}}">
                                </input>


                            </div>
                            <div class="m-3" style="">
                                <label for="product-name">
                                    @lang('form.album_artist')

                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>


                                <select class="mdb-select " searchable="جستجو" name="name_artist">
                                    <option value=""" disabled selected></option>
                                    @foreach ($artists as $artist)

                                    <option value=" {{$artist->_id}}">
                                        {{ $artist->name }}
                                    </option>
                                    @endforeach
                                </select>




                            </div>
                        </div>
                        <div class="fallback">

                            <div class="md-form mr-2" style="width: 50%">
                                <div class="file-field">
                                    <a class="btn-floating peach-gradient mt-0 float-left">
                                        <i class="fas fa-paperclip" aria-hidden="true"></i>
                                        <input type="file" name="img">
                                    </a>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="  انتخاب تصویر">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 ">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <button class="btn w-sm btn-success waves-effect waves-light" type="submit">
                                        @lang('form.submit')
                                    </button>
                                    <button class="btn w-sm btn-danger waves-effect waves-light" type="button">
                                        لغو
                                    </button>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                </div>
                {{-- flex form --}}

                <div class="text-white  d-flex justify-content-center align-items-center" style="flex: 1">
                    <img src="{{ asset('images/album.jpg') }}" style="width: 100% ; height: 100%;">
                </div>
            </div>
            <!-- end card-box -->
        </div>
        <!-- end col -->
        <div class="">
        </div>
        <!-- end col-->
    </div>
    <!-- end row -->
    <!-- end row -->
</div>
<!-- container -->
@endsection

@section('script')
<!-- Summernote js -->

<script src="{{ asset('js/mdb.js') }}"></script>
<script>
    // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
})
</script>

@endsection
