@extends('front.layout')
@section('title')
    Daftar Informasi Sekolah
@endsection

@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Informasi Sekolah</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Informasi Sekolah</li>
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
                    @foreach ($informasis as  $informasi)

                        @php
                            $x++;
                        @endphp
                    <div class="col-md-3 col-sm-3">
                            <article class="mu-blog-single-item img-thumbnail">
                           
                              <a href="{{route('detailinformasi',$informasi->slug)}}"><img src="{{url(Storage::url($informasi->cover))}}" alt="img" width="100%"></a>
                                              
                            
                           <div style="padding:10px">
                           
                              
                              <h4 style="margin-top:10px "><a href="{{route('detailinformasi',$informasi->slug)}}"><strong>{{$informasi->judul}}</strong></a></h4>
                                
                            <div class="mu-blog-meta">
                              <small>
                                 
                                  <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($informasi->tgl_publis))}}</span>
                                  <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$informasi->view}}</span>
                                </small>
                            </div>
                            <div class="mu-blog-description text-justify">
                              <p>{{$informasi->subjudul}}</p>
                            
                            </div>
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
                   {{$informasis->links()}}
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