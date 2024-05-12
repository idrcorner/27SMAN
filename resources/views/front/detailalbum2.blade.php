@extends('front.layout')

@section('title')
{{$album->judul}}
@endsection


@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>{{$album->judul}}</h2>
            <p class="  text-center" style="color:white">{{ date('d F Y', strtotime($album->tgl))}}</p>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li><a href="{{route('listalbum')}}">Daftar Album Foto</a></li>            
             <li class="active">{{$album->judul}}</li>
           </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="mu-course-content">
 <div class="container" >
 
    <div class="row mx-0" id="">

        @if ($album->jumlahfoto()==0)
            <em>Tidak ada foto pada album ini.</em>
        @endif

        @foreach($fotos as $foto)
           <div class="col-md-3">
   
          
            <a href="{{url(Storage::url($foto->foto)) }}" data-lightbox="gallery" data-title="Foto {{ $album->judul }}">
                <img src="{{url(Storage::url($foto->foto)) }}" alt="Photo {{ $foto->id }}" class="img-thumbnail">
            </a>
 

            </div>
            @endforeach
 

            
      
    </div>
 </div>
</div>
<br>
<br>
<br>
<br>
<br>
 
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        $(document).ready(function(){
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    });
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

@endsection