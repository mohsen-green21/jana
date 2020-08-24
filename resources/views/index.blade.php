@extends('layouts.master-rtl')

@section('content')
<style>
    .anmtion {
        position: relative;

        transition: top  2s;
    }

    .anmtion:hover {
        top: 30px

    }
</style>
<!-- Start Content-->
<div class="container-fluid card mt-2">

    <!-- Grid row -->
    <div class="row">

        <!-- Grid column -->
        <div class="col-md-12 mb-3">

            <img src="images/in.jpg" class="img-fluid z-depth-1 mt-2" alt="Responsive image">

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="row ">

        <!-- Grid column -->
        @foreach ($artists as $item)

        <div class="col-lg-4 col-md-12 mb-3  ">
            <div class="anmtion">
                <img src="{{$urlstorge.'/'.$item->avatar}}" class="img-fluid z-depth-1 " alt="Responsive image"
                    width="100%" style="height: 190px;border-radius: 6%">
            </div>

            <div class="d-flex justify-content-center">
                <audio controls class=" d-none d-lg-inline mt-2  text-center ">

                    <source
                        src="{{$item->musics()->first() != null ? $urlstorge . '/' .  $item->musics()->first()->audioLink  : ''}}"
                        type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>

        </div>
        @endforeach

    </div>



    <!-- Grid column -->


    <!-- Grid row -->

</div> <!-- container -->

@endsection
