@extends('admin.layout')

@section('title')
    {{appname()}}
@endsection

@section('content')
   <div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Selamat Datang, {{auth()->user()->name}}</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                   
                    @if (auth()->user()->role=='admin')
                    <a href="{{route('album.create')}}" class="btn btn-white btn-border btn-round mr-2">Tambah Album Foto</a>
                    <a href="{{route('informasi.create')}}" class="btn btn-secondary btn-round">Tambah Informasi Sekolah</a>
                    @else
                    <a href="{{route('blog.create')}}" class="btn btn-white btn-border btn-round mr-2">Tambah Artikel</a>
                   
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        @if (isset($quote))
                        <div class="card-title">Quotes Of The Day</div>
                        <div class="card-category">
                            "{{$quote->quote}}"
                            
                            -<strong>{{$quote->oleh}}</strong>-
                        </div>
                        @endif
                       
                      
                    </div>
                </div>
            </div>
           
        </div>
      
    </div>
</div> 
@endsection
