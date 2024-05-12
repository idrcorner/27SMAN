@extends('front.layout')
@section('title')
    Daftar Blog Guru
@endsection

@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Blog Guru</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Blog Guru</li>
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
                    @foreach ($blogs as  $informasi)

                        @php
                            $x++;
                        @endphp
                    <div class="col-md-3 col-sm-3">
                            <article class="mu-blog-single-item">
                            <figure class="mu-blog-single-img">
                              <a href="{{route('detailblog',$informasi->slug)}}"><img src="{{url(Storage::url($informasi->cover))}}" alt="img"></a>
                              <figcaption class="mu-blog-caption">
                                <h4><a href="{{route('detailblog',$informasi->slug)}}"><strong>{{$informasi->judul}}</strong></a></h4>
                              </figcaption>                      
                            </figure>
                            <div class="mu-blog-meta">
                              <small>
                                <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($informasi->user_id)}}</span> 
                           
                                  <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($informasi->tgl_publis))}}</span>
                                  <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$informasi->view}}</span>
                                </small>
                            </div>
                            <div class="mu-blog-description text-justify">
                              <p>{{$informasi->subjudul}}</p>
                            
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
                   {{$blogs->links()}}
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