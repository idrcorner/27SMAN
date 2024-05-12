@extends('front.layout')
@section('title')
    Daftar Album Foto
@endsection

@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Daftar Album Foto</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Album Foto</li>
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
               <div class="col-md-12">
                 <!-- start course content container -->
                 <div class="mu-course-container mu-blog-archive">
                   <div class="row">
                    @php
                        $x=0;
                    @endphp
                    @foreach ($albums as  $album)

                        @php
                            $x++;
                        @endphp
                    <div class="col-md-3 col-sm-3 img-thumbnail">
                        <article class="mu-blog-single-item  ">
                            <figure class="mu-blog-single-img">
                                <br>
                                
                              <a href="{{route('detailalbum',$album->slug)}}"><img src="{{url(Storage::url($album->getfoto()))}}" alt="img"></a>
                              <figcaption class="mu-blog-caption">
                                <h5><a href="{{route('detailalbum',$album->slug)}}"><strong>{{$album->judul}}</strong></a></h5>
                              </figcaption>                      
                            </figure>
                            <div class="mu-blog-meta text-center">
                              <small>
                                <span class="text-primary " style="margin-right:15px"><i class="fa fa-image  " style="margin-right:5px"> </i> {{$album->jumlahfoto()}} Foto</span> 
                           
                                  <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($album->tgl))}}</span>
                                  <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$album->view}}</span>
                                </small>
                            </div>
                           
                          </article> 
                    
                    </div>   

                      @if ($x==4)
                          @php
                              $x=0;
                          @endphp
                          </div>
                          <div class="row">
                      @endif
                    @endforeach
                                 
                     
                 </div>
                 <!-- end course content container -->
                 <!-- start course pagination -->
                 <div class="mu-pagination">
                   {{$albums->links()}}
                 </div>
                 <!-- end course pagination -->
               </div>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection