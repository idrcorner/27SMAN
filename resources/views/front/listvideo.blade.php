@extends('front.layout')
@section('title')
    Daftar Video
@endsection

@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Daftar Video</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Video</li>
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
                    @foreach ($videos as  $video)

                        @php
                            $x++;
                        @endphp
                    <div class="col-md-4 col-sm-4">
                     
                        <div class="card text-center ">
                         <iframe width="100%" height="180" src="https://www.youtube.com/embed/{{$video->deskripsi}}" title=" {{$video->judul}}" frameborder="0" ></iframe>
                      
                       
                        <a href="{{route('detailvideo',$video->slug)}}">  <strong class="text-center"> {{$video->judul}}</strong></a>
                           <hr>
                        </div>
                   
                    
                    </div>   

                      @if ($x==3)
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
                   {{$videos->links()}}
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