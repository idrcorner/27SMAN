@extends('front.layout')
@section('title')
    {{$informasi->judul}}
@endsection
@section('content')
     <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>{{$informasi->judul}}</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li><a href="{{route('listinformasi')}}">Informasi Sekolah</a></li>            
             <li class="active">{{$informasi->judul}}</li>
           </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->
  <section id="mu-course-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-course-content-area">
             <div class="row">
               <div class="col-md-9">
                 <!-- start course content container -->
                 <div class="mu-course-container mu-blog-single">
                   <div class="row">
                     <div class="col-md-12">
                       <article class="mu-blog-single-item">
                         <figure class="mu-blog-single-img">
                           <a  ><img alt="img" src="{{url(Storage::url($informasi->cover))}}"></a>
                           <figcaption class="mu-blog-caption">
                             <h3><a  >{{$informasi->judul}}</a></h3>
                           </figcaption>                      
                         </figure>
                         <div class="mu-blog-meta">
                    <small>
                        <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($informasi->user_id)}}</span> 
                        <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($informasi->tgl_publis))}}</span>
                        <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$informasi->view}}</span>
                  
                    </small>
                         </div>
                         <div class="mu-blog-description">
                          {!!$informasi->konten!!}
                           
                         </div>
                         
                        
                       </article>
                     </div>                                   
                   </div>
                 </div>
               
                 <div class="row">
                   <div class="col-md-12">
                     <div class="mu-related-item">
                       <h3>Baca Juga:</h3>
                       <div class="mu-related-item-area">
                         <div id="mu-related-item-slide">
                            @php
                                $a=0;
                            @endphp
                            @foreach ($informasis as $info)
                         @if ($info->id!=$informasi->id)
                         <div class="col-md-6">
                            <article class="mu-blog-single-item">
                              <figure class="mu-blog-single-img">
                                <a href="{{route('detailinformasi',$info->slug)}}"><img alt="img" src="{{url(Storage::url($info->cover))}}"></a>
                                <figcaption class="mu-blog-caption">
                                  <h3><a href="{{route('detailinformasi',$info->slug)}}">Lorem ipsum dolor sit amet.</a></h3>
                                </figcaption>                      
                              </figure>
                              <div class="mu-blog-meta">
                                <small>
                                    <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($info->user_id)}}</span> 
                                    <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($info->tgl_publis))}}</span>
                                    <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$info->view}}</span>
                              
                                </small>
                              </div>
                              <div class="mu-blog-description">
                                <p>{{$info->subjudul}}</p>
                                
                              </div>
                            </article>
                          </div>
                         @endif
                              
                            @endforeach
                        
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
           
           
               </div>
               <div class="col-md-3">
                 <!-- start sidebar -->
                 <aside class="mu-sidebar">
                   
                   <!-- start single sidebar -->
                   <div class="mu-single-sidebar">
                     <h3>Informasi Populer</h3>
                     <div class="mu-sidebar-popular-courses">
                        @foreach ($informasipop as $pop)
                            @if ($informasi->id!=$pop->id)
                            <div class="media">
                                <div class="media-left">
                                  <a href="{{route('detailinformasi',$pop->slug)}}">
                                    <img class="media-object" src="{{url(Storage::url($pop->cover))}}" alt="img" style="border-radius:5px">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="{{route('detailinformasi',$pop->slug)}}">{{$pop->judul}}</a></h4>                      
                                  <span class="popular-course-price text-success">
                                  <small>  <i class="fa fa-eye" style="margin-right:5px"></i>   Dilihat   {{$pop->view}} kali</small>
                                  </span>
                                </div>
                                <hr>
                              </div>
                            @endif
                        @endforeach
                      
                       
                     </div>
                   </div>

                   <div class="mu-single-sidebar">
                    <br>
                    <br>
                    <blockquote>
                      <em> <small> {{$quote->quote}}</small></em>
                      <strong> <p class="text-right"><small>{{$quote->oleh}}</small></p></strong>
                    </blockquote>
                   </div>
          
                   <div class="mu-single-sidebar">
                     <h3> Foto Terbaru</h3>
                    @foreach ($fotos as $foto)
                    <a href="{{route('detailalbum',$foto->slugalbum())}}"> 
                    <img src="{{url(Storage::url($foto->foto))}}" width="100%" style="border-radius:5px">
                    </a>
                    <div class="text-center">
                       <a href="{{route('detailalbum',$foto->slugalbum())}}"> <small >{{$foto->namaalbum()}}</small></a>
                    </div>
                    <br/> 
                    @endforeach
                   </div>
                 
                   <div class="mu-single-sidebar">
                     <h3> Video Terbaru</h3>
                    @foreach ($videos as $video)
                    <iframe width="240" height="150" src="https://www.youtube.com/embed/{{$video->deskripsi}}" title=" {{$video->judul}}" frameborder="0" ></iframe>
                   <a href="{{route('detailvideo',$video->slug)}}"> <strong class="text-center"> {{$video->judul}}</strong></a>
                     <hr>
                    @endforeach
                   </div>
                 
                   <!-- end single sidebar -->
                 </aside>
                 <!-- / end sidebar -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection