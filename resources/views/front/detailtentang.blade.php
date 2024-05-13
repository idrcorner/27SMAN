@extends('front.layout')

@section('title')
    {{$tentang->judul}}
@endsection

@section('content')
     <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>{{$tentang->judul}}</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">{{$tentang->judul}}</li>
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
                       <article class="mu-blog-single-item text-justify" style="padding:20px">
                        
                        {!!$tentang->konten!!}
                        
                       </article>
                     </div>                                   
                   </div>
                 </div>
               
             
               </div>
               <div class="col-md-3">
                 <!-- start sidebar -->
                 <aside class="mu-sidebar">
                   <!-- start single sidebar -->
                   <div class="mu-single-sidebar">
                     <h3>Tentang Kami</h3>
                     <ul class="mu-sidebar-catg">
                        @foreach ($tentangkamis as $tk)
                            @if ($tentang->id!=$tk->id)
                               <li><a href="{{route('tentangkamidetail',$tk->slug)}}">{{$tk->judul}}</a></li>
                            @endif
                        @endforeach
                      
                       
                     </ul>
                   </div>
                   <!-- end single sidebar -->
                   <!-- start single sidebar -->
                   <div class="mu-single-sidebar text-center">
                     <h3>Kepala Sekolah</h3>
                     <div class="mu-sidebar-popular-courses text-center">
                        <img src="{{url(Storage::url($kepsek->foto))}}" width="100%" alt="Foto Kepala Sekolah" class="img-thumbnail" style="margin-bottom:10px">
                        
                        <p style="margin-bottom:-5px"><strong>{{$kepsek->nama}}</strong></p>
                        <small  >NIP:  {{$kepsek->nip}} </small>
                     </div>
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