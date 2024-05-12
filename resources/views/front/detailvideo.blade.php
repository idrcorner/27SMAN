@extends('front.layout')

@section('title')
   Video: {{$video->judul}}
@endsection

@section('content')
     <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Video :  {{$video->judul}}</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>    
             <li><a href="{{route('listvideo')}}">Daftar Video</a></li>             
             <li class="active">{{$video->judul}}</li>
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
          
               <div class="col-md-8">
                 <!-- start course content container -->
                 <div class="mu-course-container mu-blog-single">
                   <div class="row">
                     <div class="col-md-12">
                       <article class="mu-blog-single-item text-justify" style="padding:20px">
                        
                        <iframe width="100%" height="380" src="https://www.youtube.com/embed/{{$video->deskripsi}}" title=" {{$video->judul}}" frameborder="0" ></iframe>
                     
                        
                       </article>
                     </div>                                   
                   </div>
                 </div>
               
             
               </div>

            <div class="col-md-4 ">
                <div class="mu-single-sidebar">
                    <h3> Video Lainnya</h3><br/>
               @foreach ($videos as $vid)
                    @if ($video->id!=$vid->id)
                    <div class="card  ">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/{{$vid->deskripsi}}" title=" {{$vid->judul}}" frameborder="0" ></iframe>
                     
                      
                       <a href="{{route('detailvideo',$vid->slug)}}"> <strong class="text-center"><small> {{$vid->judul}}</small></strong></a>
                        <hr>
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
  </section>
@endsection