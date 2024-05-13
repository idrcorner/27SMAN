@extends('front.layout')
@section('title')
    Profil Sekolah
@endsection

@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Tentang Kami</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Tentang Kami</li>
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
                 <div class="container text-center">
                    @foreach ($tentangkamis as $tk)
                        <a href="{{route('tentangkamidetail',$tk->slug)}}" class="btn btn-lg btn-primary">{{$tk->judul}}</a>
                        <br>
                        <br>
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