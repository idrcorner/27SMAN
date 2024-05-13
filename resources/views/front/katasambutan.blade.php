@extends('front.layout')

@section('title')
   Kata Sambutan Kepala Sekolah
@endsection

@section('content')
     <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Kata Sambutan Kepala Sekolah</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Kata Sambutan</li>
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
                <div class="col-md-4 text-center">
                    <img src="{{url(Storage::url($kepsek->foto))}}" width="100%" alt="Foto Kepala Sekolah" class="img-thumbnail" style="margin-bottom:10px">
                        
                    <p style="margin-bottom:-5px"><strong>{{$kepsek->nama}}</strong></p>
                    <small  >NIP:  {{$kepsek->nip}} </small>
                </div>
               <div class="col-md-8">
                 <!-- start course content container -->
                 <div class="mu-course-container mu-blog-single">
                   <div class="row">
                     <div class="col-md-12">
                       <article class="mu-blog-single-item text-justify" style="padding:20px">
                        
                        {!!$kepsek->katasambutan!!}
                        
                       </article>
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