@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css-->
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
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
                    ویرایش ژانر
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


    <div class="row card">
        <div class="col-lg-12">
            <div class="d-flex ">


                {{-- form1 --}}
                <div style="flex: 1" class="">
                    <form action="{{ url('genre') }}" enctype="multipart/form-data" method="POST">

                        <div class="">
                            @csrf
                            <h5 class="text-uppercase bg-light p-2 mt-2 mr-2 mb-3">
                                اطلاعات ژانر
                            </h5>
                            <div class="d-flex flex-column ">
                                <div class="form-group mb-3 mr-2">

                                    <input name="id" type="hidden" value="0">

                                    <label for="product-name">
                                        نام ژانر
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>

                                    <input class="form-control border-top-0 border-right-0 border-left-0"
                                id="product-name" name="name" placeholder="" type="text" value="{{old('name')}}">

                                    </input>
                                    </input>
                                    </input>
                                    </input>
                                </div>
                                <div class="mr-2">
                                    <label>
                                        slug
                                        <span class="text-danger">
                                            *
                                        </span>
                                    </label>

                                    <input class="form-control  border-top-0 border-right-0 border-left-0" name="slug"
                                type="text" value="{{old('slug')}}" />

                                </div>
                            </div>

                            {{-- file input --}}
                            <div class="md-form d-flex " style="width:100%">
                                <div class="file-field mt-3">
                                    <a class="btn-floating purple-gradient mt-0 float-left">
                                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                        <input type="file" name="file">
                                    </a>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="انتخاب تصویر">
                                    </div>
                                </div>
                            </div>
                            {{-- file  --}}
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="text-center mb-3">
                                        <input class="btn w-sm btn-success waves-effect waves-light" id="save_genre"
                                            type="submit" value=" ذخیره">
                                        <button class="btn w-sm btn-danger waves-effect waves-light" type="button">
                                            لغو
                                        </button>
                                        </input>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                        </div>
                    </form>
                </div>
                {{-- form1 --}}
                {{-- div image --}}
                <div style="flex: 1" class="d-none d-md-inline ">
                    <img src="{{ asset('images/genre.jpg') }}" style="width:100%;height: 100%;">
                </div>
                {{-- div image --}}

            </div>
            <!-- end card-box -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end row -->
</div>

<!-- container -->
@endsection

@section('script')
<!-- Summernote js -->
<script src="{{ URL::asset('assets/libs/summernote/summernote.min.js')}}">
</script>
<!-- Select2 js-->
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}">
</script>
<!-- Dropzone file uploads-->
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js')}}">
</script>
<!-- Init js -->
<script src="{{ URL::asset('assets/js/pages/add-product.init.js')}}">

</script>
<script src="{{ asset('js/mdb.js') }}"></script>
@endsection
