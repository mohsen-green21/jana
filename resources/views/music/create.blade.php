@extends('layouts.master-rtl')

@section('css')
<!-- Plugins css-->
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/persian-datepicker.min.css') }}"/>
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
                        ویرایش آهنگ ها
                    </h4>
                </div>
            </div>
        </div>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
        <!-- end page title -->
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

                          <form action="{{ url('music/') }}" enctype="multipart/form-data" method="post" multipart="">

                    @csrf

                    <input type="hidden" name="music_id" value="{{isset($music) ? $music->_id : ''}}">


                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">
                            اطلاعات آهنگ
                        </h5>
                        {{-- fild1 --}}
                        <div class="d-flex">
                            <div class="form-group mb-3 mr-3 " style="flex:1">
                                <label for="product-name">
                                   @lang('form.music_name')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <input class="form-control border-top-0 border-right-0 border-left-0" id="product-name" name="name" placeholder="" type="text" value="{{old('name')}}">
                                </input>
                            </div>
                            <div class="form-group mb-3" style="flex: 1">
                                <label for="product-name">
                                        @lang('form.music_artist')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>

                                <select class="mdb-select " name="artist"  searchable="جستجو" >

                                    <option value="" selected></option>
                                    @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">
                                        {{ $artist->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- fild1 end --}}



    {{-- fild2 --}}
                        <div class="d-flex">
                            <div class="form-group mb-3 mr-3 " style="flex:1">
                                <label for="product-name">
                                   موزیک
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>

                                <div class="md-form">
                                    <div class="file-field">
                                      <a class="btn-floating purple-gradient mt-0 float-left">
                                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                        <input type="file" name="music" >
                                      </a>
                                      <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="موزیک">
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="form-group mb-3" style="flex: 1">
                                <label for="product-name">
                                    تصویر
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>

                                <div class="md-form">
                                    <div class="file-field">
                                      <a class="btn-floating purple-gradient mt-0 float-left">
                                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                        <input type="file" name="img" >
                                      </a>
                                      <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="تصویر">
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        {{-- fild2 end --}}

 {{-- fild3 --}}
                        <div class="d-flex">
                            <div class="form-group mb-3 mr-3 " style="flex:1">
                                <label for="product-name">
                                      @lang('form.music_data')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>

                                <input class="form-control example1  border-top-0 border-right-0 border-left-0" id="product-name" name="data" placeholder="" type="text" value="{{isset($music) ? $music->releasedata : ''}}">
                                </input>
                            </div>
                            <div class="form-group mb-3" style="flex: 1">
                                <label for="product-name">
                                       @lang('form.music_gener')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <select class="mdb-select " name="genre"  searchable="جستجو">
                                    <option value="" selected></option>
                                      @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">
                                        {{ $genre->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- fild3 end --}}

{{-- fild4 --}}
                        <div class="d-flex">
                            <div class="form-group mb-3 mr-3 " style="flex:1">
                                <label>
                                      @lang('form.music_color')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <input class="form-control mt-3 border-top-0 border-right-0 border-left-0" name="color" type="color" value="{{isset($music) ? $music->color : '#ffe6e6'}}">
                                </input>
                            </div>
                            <div class="form-group mb-3" style="flex: 1">
                                <label>
                                      @lang('form.music_album')
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <select class="mdb-select md-form" name="album"  searchable="جستجو">
                                    <option value="" selected></option>
                                 @foreach ($albums as $album)
                                    <option value="{{ $album->id }}">
                                        {{ $album->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- fild4 end --}}
                        <div class="text-center mb-3 mt-3">
                            <input class="btn w-sm btn-success waves-effect waves-light" id="save_genre" type="submit" value=" ذخیره">
                                <button class="btn w-sm btn-danger waves-effect waves-light" type="button">
                                  لغو
                                </button>
                            </input>
                        </div>
                    </div>
                </form>
                <!-- end card-box -->
            </div>
            <!-- end col -->
            <!-- end col-->
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
    <script type="text/javascript">

        $(document).ready(function() {
          $(".example1").pDatepicker({
              altFormat: "YYYY/MM/DD",
      observer: true,
      format: 'YYYY/MM/DD',
      initialValue: true,
      initialValueType: 'persian',
      autoClose: true,
      maxDate: 'today',
          });

        });
      </script>
      <script src="{{ asset('js/mdb.js') }}"></script>
      <script>
          // Material Select Initialization
      $(document).ready(function() {
      $('.mdb-select').materialSelect();
      })
      </script>
    @endsection
