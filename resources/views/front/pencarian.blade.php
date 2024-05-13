@extends('front.layout')
@section('title')
   Pencarian : {{$cari}}
@endsection

@section('content')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Pencarian : {{$cari}}</h2>
            <p class="  text-center" style="color:white">Ditemukan {{$total}} item</p>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Pencarian</li>
           </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->
  <section id="mu-course-content">
  
    <div class="container">
        <h3><em style="color:blue">Pencarian : "{{$cari}}", ditemukan {{$total}} item</em></h3> <br/><br/>
      <div class="row">
     
       
        <div class="col-md-12">
          <div class="mu-course-content-area">
             <div class="row">
               <div class="col-md-6">
                @foreach ($informasis as  $informasi)

               
            <div class="col-md-12">
                <div class="card mb-3 " style="margin-bottom:10px;border-bottom:1px solid rgb(214, 211, 211);" >
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <a href="{{route('detailinformasi',$informasi->slug)}}">
                        <img src="{{url(Storage::url($informasi->cover))}}" class="card-img" width="100%" alt="...">
                      </a>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <a href="{{route('detailinformasi',$informasi->slug)}}">
                                <h4 class="card-title"><strong>{{$informasi->judul}}</strong></h4>
                            </a>
                          <p class="card-text text-justify">{{$informasi->subjudul}}.</p>
                          <p class="card-text">
                            <small>
                                <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($informasi->user_id)}}</span> 
                                <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($informasi->created_at))}}</span>
                                <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$informasi->view}}</span>
                          
                            </small>
                        </p>
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>   
 
            @endforeach
                @foreach ($albums as  $album)

               
            <div class="col-md-12">
                <div class="card mb-3 " style="margin-bottom:10px;border-bottom:1px solid rgb(214, 211, 211);" >
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <a href="{{route('detailalbum',$album->slug)}}">
                        <img src="{{url(Storage::url($album->getfoto()))}}" class="card-img" width="100%" alt="...">
                      </a>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <small>Album Foto:</small>
                            <a href="{{route('detailalbum',$album->slug)}}">
                                <h4 class="card-title"><strong>{{$album->judul}}</strong></h4>
                            </a>
                         
                          <p class="card-text">
                            <small>
                  
                                <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($album->tgl))}}</span>
                                <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$album->view}}</span>
                          
                            </small>
                        </p>
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>   
 
            @endforeach
               </div>
               <div class="col-md-6">
                @foreach ($blogs as  $blog)

               
            <div class="col-md-12">
                <div class="card mb-3 " style="margin-bottom:10px;border-bottom:1px solid rgb(214, 211, 211);" >
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <a href="{{route('detailblog',$blog->slug)}}">
                        <img src="{{url(Storage::url($blog->cover))}}" class="card-img" width="100%" alt="...">
                      </a>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <a href="{{route('detailblog',$blog->slug)}}">
                                <h4 class="card-title"><strong>{{$blog->judul}}</strong></h4>
                            </a>
                          <p class="card-text text-justify">{{$blog->subjudul}}.</p>
                          <p class="card-text">
                            <small>
                                <span class="text-primary " style="margin-right:15px"><i class="fa fa-user  " style="margin-right:5px"> </i>Oleh. {{getusername($blog->user_id)}}</span> 
                                <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($blog->created_at))}}</span>
                                <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$blog->view}}</span>
                          
                            </small>
                        </p>
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>   
 
            @endforeach
            @foreach ($videos as  $video)

               
            <div class="col-md-12">
                <div class="card mb-3 " style="margin-bottom:10px;border-bottom:1px solid rgb(214, 211, 211);" >
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <a href="{{route('detailvideo',$video->slug)}}">
                        <i class="fab fa-youtube" style="font-size:80px"></i>
                      </a>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <small>Video:</small>
                            <a href="{{route('detailvideo',$video->slug)}}">
                                <h4 class="card-title"><strong>{{$video->judul}}</strong></h4>
                            </a>
                         
                          <p class="card-text">
                            <small>
                  
                                <span class="text-success " style="margin-right:15px"><i class="fa fa-calendar " style="margin-right:5px"> </i>{{ date('d F Y', strtotime($video->tgl))}}</span>
                                <span  class="text-warning " style="margin-right:15px"><i class="fa fa-eye" style="margin-right:5px"></i>{{$video->view}}</span>
                          
                            </small>
                        </p>
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>   
 
            @endforeach
               </div>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection