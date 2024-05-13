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
             <li><a href="{{route('listblog')}}">Blog Guru</a></li>            
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
             
               <div class="col-md-3">
                 <!-- start sidebar -->
                 <aside class="mu-sidebar">
                   
                   <!-- start single sidebar -->
                   <div class="mu-single-sidebar">
                     <h3>Artikel Populer</h3>
                     <div class="mu-sidebar-popular-courses">
                        @foreach ($informasipop as $pop)
                            @if ($informasi->id!=$pop->id)
                            <div class="media">
                                <div class="media-left">
                                  <a href="{{route('detailblog',$pop->slug)}}">
                                    <img class="media-object" src="{{url(Storage::url($pop->cover))}}" alt="img" style="border-radius:5px">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="{{route('detailblog',$pop->slug)}}">{{$pop->judul}}</a></h4>                      
                                  <span class="popular-course-price text-success">
                                  <small>  
                                    <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($informasi->user_id)}}</span> 
                           
                                    <i class="fa fa-eye" style="margin-right:5px"></i> <br/>  Dilihat   {{$pop->view}} kali</small>
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
                    <h3>Informasi Sekolah</h3>
                   @foreach ($beritas as $berita)
                  <small>
                    <a href="{{route('detailinformasi',$berita->slug)}}">
                        <table>
                            <tr>
                                <td style="vertical-align: text-top"> <i class="fas fa-file text-primary" style="font-size: 20px;padding-right:10px"></i></td>
                                <td>
                                    {{$berita->judul}} <br/>
                                    <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$berita->view}}</span>
                                </td>
                            </tr>
                        </table>
                      
                    </a> <hr>
                  </small>
                   @endforeach
                  </div>

                  
                  <div class="mu-single-sidebar">
                    <h3> Video Terbaru</h3>
                   @foreach ($videos as $video)
                   <iframe width="240" height="150" src="https://www.youtube.com/embed/{{$video->deskripsi}}" title=" {{$video->judul}}" frameborder="0" ></iframe>
                   <a href="{{route('detailvideo',$video->slug)}}">   <strong class="text-center"> {{$video->judul}}</strong></a>
                    <hr>
                   @endforeach
                  </div>
          
                   {{-- <div class="mu-single-sidebar">
                     <h3> Foto Terbaru</h3>
                    @foreach ($fotos as $foto)
                    <img src="{{url(Storage::url($foto->foto))}}" width="100%" style="border-radius:5px">
                    <div class="text-center">
                        <small >{{$foto->namaalbum()}}</small>
                    </div>
                    <br/> 
                    @endforeach
                   </div>
                  --}}
                   <!-- end single sidebar -->
                 </aside>
                 <!-- / end sidebar -->
              </div>
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
                      <div class="mu-relategd-item-area">
                        <div id="mu-relagted-item-slide">
                           @php
                               $a=0;
                           @endphp
                           @foreach ($informasis as $info)
                        @if ($info->id!=$informasi->id)
                        
                         <div class="card mb-3 " style="margin-bottom:10px;border-bottom:1px solid rgb(214, 211, 211);" >
                            <div class="row no-gutters">
                              <div class="col-md-4">
                                <a href="{{route('detailblog',$info->slug)}}">
                                <img src="{{url(Storage::url($info->cover))}}" class="card-img" width="100%" alt="...">
                              </a>
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{route('detailblog',$info->slug)}}">
                                        <h4 class="card-title"><strong>{{$info->judul}}</strong></h4>
                                    </a>
                                  <p class="card-text text-justify">{{$info->subjudul}}.</p>
                                  <p class="card-text">
                                    <small>
                                        <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($info->user_id)}}</span> 
                                        <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($info->tgl_publis))}}</span>
                                        <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$info->view}}</span>
                                  
                                    </small>
                                </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                             
                           @endforeach
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          
          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection