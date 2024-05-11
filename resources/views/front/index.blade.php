@extends('front.layout')

@section('title')
    {{appname()}}
@endsection

@section('content')
<section id="mu-slider">
   @foreach ($sliders as $slider)
   <div class="mu-slider-single">
    <div class="mu-slider-img">
      <figure>
        <img src="{{url(Storage::url($slider->cover))}}" alt="img-slider">
      </figure>
    </div>
    <div class="mu-slider-content">
      <h4>{{$slider->judul}}</h4>
      <span></span>
      {{-- <h2>We Will Help You To Learn</h2> --}}
      <p>{{$slider->deskripsi}}</p>
      
    </div>
  </div>
   @endforeach
   
 
   
  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fas fa-school"></span>
              <h3>Profil Sekolah</h3>
    
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-users"></span>
              <h3>Guru dan Tata Usaha</h3>
            
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fas fa-trophy"></span>
              <h3>Prestasi</h3>
           
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h3 class="text-bold text-left mb-5"><strong>Sambutan Kepala Sekolah</strong></h3>              
                  </div>
                  <br>
                  <br>
                  <br>
              <div class="text-justify">
                {{-- {!! $kepsek->katasambutan !!} --}}
                {!! \Illuminate\Support\Str::limit($kepsek->katasambutan , 800) !!}
              </div>
<button class="btn btn-sm btn-primary">Baca Selengkapnya</button>
               </p>
             </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">                            
               
                  <img src="{{url(Storage::url($kepsek->foto))}}"  width="100%" alt="img">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <section id="mu-latest-courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Informasi Sekolah  </h2>
              
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">
              @foreach ($informasis as $informasi)
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="{{url(Storage::url($informasi->cover))}}" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption ">
                    
                    
                     
                      <span><i class="fa fa-eye"></i>{{$informasi->view}}</span>

                      
                      <span class="mr-5"><i class="fa fa-calendar "> </i>{{ date('d F Y', strtotime($informasi->tgl_publis))}}</span>

                     <a href=""> <span><i class="fa fa-user"> </i>By {{getusername($informasi->user_id)}}</span></a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <h4>  <a href="#">{{$informasi->judul}}</a></h4>
                    <p>{{$informasi->subjudul}}</p>
                    <div class="mu-latest-course-single-contbottom">
                      <a class="mu-course-details" href="#">Baca Selengkapnya</a>
                     
                    </div>
                  </div>
                </div>
              </div>
            
              @endforeach
             
            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="mu-from-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>Artikel</h2>
             
            </div>
            <!-- end title -->  
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">
               
                @foreach ($artikels as $arti)
                <div class="col-md-4 col-sm-4">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="#"><img src="{{url(Storage::url($arti->cover))}}" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="#">{{$arti->judul}}</a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <a href="#">By {{getusername($arti->user_id)}}</a>
                      <a href="#">{{ date('d F Y', strtotime($arti->tgl_publis))}}</a>
                      <span><i class="fa fa-eye"></i>{{$arti->view}}</span>
                    </div>
                    <div class="mu-blog-description text-justify">
                      <p>{{$arti->subjudul}}</p>
                      <a class="mu-read-more-btn" href="#">Baca Selengkapnya</a>
                      <br>
                      <br>
                    </div>
                  </article>
                </div>
                @endforeach
               
              </div>
            </div>     
            <!-- end from blog content   -->   
          </div>
        </div>
      </div>
    </div>
  </section>
 
 
  <section id="mu-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem rerum soluta aperiam blanditiis obcaecati eveniet aliquam consequatur nobis eaque id.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="assets/img/testimonial-1.png" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>John Doe</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem rerum soluta aperiam blanditiis obcaecati eveniet aliquam consequatur nobis eaque id.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="assets/img/testimonial-3.png" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>Rebaca Michel</h4>
                  <span>Happy Parent</span>
                </div>
              </div>
              <!-- end testimonial single item -->
              <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem rerum soluta aperiam blanditiis obcaecati eveniet aliquam consequatur nobis eaque id.</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="assets/img/testimonial-2.png" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>Stev Smith</h4>
                  <span>Happy Student</span>
                </div>
              </div>
              <!-- end testimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->

  <!-- Start from blog -->

  <!-- End from blog -->
@endsection