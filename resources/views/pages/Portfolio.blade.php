@extends('layouts.master_home')
@section('home_content')

   <!-- ======= Breadcrumbs ======= -->
   <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portolio</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Portolio</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  

  <!-- ======= Our Portfolio Section ======= -->
  <section id="clients" class="clients" style="background-color: #f7f7f7;">
    <section id="portfolio" class="portfolio">
  
      <div class="container" data-aos="fade-up" >
  
        <div class="section-title">
          <h2>Portfolio</h2>
        </div>
     
  
        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up" style="background-color: white;" >
          @foreach($images as $img)
  
          <div class="col-lg-4 col-md-6 portfolio-item filter-web" style="border:solid 0.1px #1bbd36; margin:0px" >
            
            <div class="client-logo" style="margin: 20px; margin-bottom:100px;border:0ch; " >
              {{-- <a href="{{$img->image}}" ><img src="{{$img->image}}"alt="" width="50px" height="100px" ></a> --}}
              <img src="{{$img->image}}" class="img-fluid" alt="" style="width:100px;height:100px">
              
            </div>
            
            <div class="portfolio-info" style="">
              <h4 style="color: #1BBD36">Click To Zoom In</h4>
              <a href="{{$img->image}}" data-gall="portfolioGallery" class="venobox preview-link"  ><i class="bx bx-plus"></i></a>
              {{-- <a href="portfolio-details.html" class="details-link" title="More Details"></a> --}}
              
            </div>
            
          </div>
          @endforeach
  
        </div>
  
      </div>
    </section>
    </section><!-- End Our Portfolio Section -->





@endsection