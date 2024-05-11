@extends('admin.layout')

@section('title')
   Tambah Video
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tambah Video</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        {{-- <a href="#" class="btn btn-secondary btn-round">Tambah Tentang Kami</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  
                                        <div class="form-group">
                                            <label for="judul">Judul  </label> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                            <input type="text" name="judul" class="form-control" value="{{old('judul')}}" id="judul" placeholder="Judul  " required>                      
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">ID Video Youtube. Contoh: https://www.youtube.com/watch?v=<strong><span class="text-danger">xo2Plv2WkmU</span></strong></label>  @error('deskripsi') <span class="text-danger"></span> @enderror
                                            <textarea  class="form-control" name="deskripsi"  placeholder="Salin yang berwarna merah">{{old('deskripsi')}}</textarea>            
                                        </div> 
                                        <div class="form-group"> @error('tgl') <span class="text-danger">{{$message}} </span> @enderror
                                            <label for="tgl">Tanggal  </label> @error('tgl') <span class="text-danger">Tanggal   harus diisi </span> @enderror
                                            <input type="date" name="tgl"  value="{{old('tgl')}}"  class="form-control" id="tgl" placeholder="Tanggal  " style="width: 250px">                      
                                        </div>
                                            <hr>
                                        <input type="submit" value="SIMPAN" class="btn btn-primary ml-2">
                                        <a href="{{route('video.index')}}" class="btn btn-link" >Batal</a>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </div>
@endsection

 