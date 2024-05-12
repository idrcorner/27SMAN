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
               
                  <img src="{{url(Storage::url($kepsek->foto))}}"  width="100%" alt="img" style="border-radius: 5px">
                  
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
                  <div  >
                    <a href="{{route('detailinformasi',$informasi->slug)}}"><img src="{{url(Storage::url($informasi->cover))}}" width="100% "alt="img"></a>
      
                  </div>
                  
                  <div style="padding: 10px" class="text-center">
                   <small>
                    <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($informasi->user_id)}}</span> 
                    <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($informasi->tgl_publis))}}</span>
                    <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$informasi->view}}</span>
                  </small>
                  </div>
                
                  <div class="mu-latest-course-single-content">
                    <h4>  <a href="{{route('detailinformasi',$informasi->slug)}}"><strong>{{$informasi->judul}}</strong></a></h4>
                    <p>{{$informasi->subjudul}}</p>
                    <div class="mu-latest-course-single-contbottom">
                      <a class="  text-primary" href="{{route('detailinformasi',$informasi->slug)}}">Baca Selengkapnya</a>
                     
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
           
            <!-- end title -->  
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">
               
                <div class="col-md-8" >
                  
                      <h2>Artikel</h2>
                    <br>
                    <br>
                
                  @foreach ($artikels as $arti)
              
                  <div class="card mb-3" style="margin-bottom:20px">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="{{url(Storage::url($arti->cover))}}" width="100%" class="card-img" alt="..." style="border-radius: 5px">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h4 class="card-title"><strong>{{$arti->judul}}</strong></h4>
                          <p class="card-text">{{$arti->subjudul}}.</p>
                          <p class="card-text"><small class="text-muted">

                            <div style=" " >
                              <small>
                               <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($arti->user_id)}}</span> 
                               <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($arti->tgl_publis))}}</span>
                               <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$arti->view}}</span>
                             </small>
                             </div>
                          
                          </small></p>
                        </div>
                      </div>
                    </div>
                  </div> 
                  @endforeach
                </div>
                <div class="col-md-2">
                  
                    <h2>Video</h2>
                   <br>
                   <br>
                   @foreach ($videos as $video)
                       <div class="card text-center">
                        <iframe width="300" height="180" src="https://www.youtube.com/embed/{{$video->deskripsi}}" title=" {{$video->judul}}" frameborder="0" ></iframe>
                       <strong class="text-center"> {{$video->judul}}</strong>
                        <hr>
                       
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
             @foreach ($quotes as $quote)
             <div class="mu-testimonial-item">
              <div class="mu-testimonial-quote">
                <blockquote>
                  <p>{{$quote->quote}}.</p>
                </blockquote>
              </div>
               
              <div class="mu-testimonial-info">
                <h4>{{$quote->oleh}}</h4>
               
              </div>
            </div>
             @endforeach
             
            
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