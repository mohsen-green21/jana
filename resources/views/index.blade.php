@extends('layouts.master-rtl')

@section('content')

<!-- Start Content-->
<div class="container-fluid card mt-2">

  <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 mb-3">

        <img src="images/in.jpg" class="img-fluid z-depth-1 mt-2" alt="Responsive image" >

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      @foreach ($artists as $item)

      <div class="col-lg-4 col-md-12 mb-3">

      <img src="{{$urlstorge.'/'.$item->avatar}}" class="img-fluid z-depth-1"
          alt="Responsive image" width="100%" style="height: 330px">

      </div>
      @endforeach

    </div>



      <!-- Grid column -->


    <!-- Grid row -->

</div> <!-- container -->

@endsection
