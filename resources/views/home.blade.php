@extends('layouts.master_home')
@section('home_content')
@include('layouts.body.slider')

{{-- Start brand section --}}
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Brands</strong></h2>
      <p style= "font-weight:bold;"> Enjoy the Top Brands We Have </p>
    </div>

    <div class="row">
      @foreach($brands as $brand)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-blue">
          <div class="icon">
            <img src="{{$brand->brand_image}}" class="img-fluid"  alt=""  width="120" height="150" viewBox="0 0 600 600">
            
          </div>
          <h4><a href="">{{$brand->brand_name}}</a></h4>
          <p style="color:#1BBD36; font-weight:bold;">{{$brand->brand_details}}</p>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- End brand Section -->

{{-- <!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</strong></h2>
      </div>

      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right">
          <h2><i class="ri-check-double-line"></i>{{$about->title}}<i class="ri-check-double-line"></i></h2>
          <h3>{{$about->short_description}}</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
          <ul>
            <li><i class="ri-check-double-line"></i> {{$about->long_description}}</li>
          </ul>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section --> --}}

  

  
  <!-- ======= Our Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Our <strong>Skills</strong></h2>
        <p style="font-weight: bold;">The goal of knowledge-based objectives is to test our team members understanding of principles, concepts and facts related to a particular fire situation.</p>
      </div>

      <div class="row skills-content">
        @foreach($skills as $skill)


        <div class="col-lg-6" data-aos="fade-up">

          <div class="progress">
            <span class="skill" style="margin:20px;">{{$skill->skill}}<i class="val">{{$skill->percentage}}%</i></span>
            <div class="progress-bar-wrap">
            
              <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>


        @endforeach
      </div>

    </div>
  </section><!-- End Our Skills Section -->

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

  {{-- <!-- ======= Our Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Our <strong>Team</strong></h2>
        <p style="font-weight:bold;">The process of working collaboratively with a group of people in order to achieve a goal</p>
      </div>

      <div class="row">
        @foreach($team as $teams)

        <div class="col-lg-6 col-md-2 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up">
            <div class="member-img">
              <img src="{{$teams->image}}" class="img-fluid" alt="">
              <div class="social">
                <a href="{{$teams->facebook}}"><i class="icofont-facebook"></i></a>
                <a href="{{$teams->instagram}}"><i class="icofont-instagram"></i></a>
                <a href="{{$teams->linkedin}}"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>{{$teams->name}}</h4>
              <span style="color:#1BBD36;">{{$teams->position}}</span>
            </div>
          </div>
        </div>

        @endforeach
      </div>

    </div>
  </section><!-- End Our Team Section --> --}}




  @endsection