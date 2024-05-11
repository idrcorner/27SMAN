@extends('admin.layout')

@section('title')
    {{ $prestasi->judul}}
@endsection

@section('content')
   <div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{$prestasi->judul}}</h2>
                 
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <i class="fas fa-calendar-alt mr-1 text-success" ></i> {{ date('d F Y', strtotime($prestasi->created_at))}}
                        |
                         <i class="  fas fa-eye text-primary mr-1"></i> {{$prestasi->view}}
                         |
                          <i class="fas fa-user-astronaut text-warning mr-1"></i>  {{getUsername($prestasi->user_id)}}
                        <br>
                        <br>
                        <br>
                     <center>
                        <img src="{{url(Storage::url($prestasi->cover))}}" alt="cover" width="50%" style="border-radius: 10px">
                     </center>
                     <br>
                     <br>
                     {!! $prestasi->konten !!}

                     <br>
                     <br>
                     <a class="btn btn-primary" href="{{route('prestasi.index')}}">Kembali</a>

                    </div>
                </div>
            </div>
           
        </div>
      
    </div>
</div> 
@endsection
