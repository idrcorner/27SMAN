@extends('admin.layout')

@section('title')
   Ubah Album
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah Album</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        {{-- <a href="#" class="btn btn-secondary btn-round">Tambah Informasi</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('album.update',$album->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Judul Album</label> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="judul" class="form-control" value="{{$album->judul}}" id="judul" placeholder="Judul Album" required>                      
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Detail</label>  @error('deskripsi') <span class="text-danger"></span> @enderror
                                        <textarea  class="form-control" name="deskripsi"  placeholder="Deskripsi">{{$album->deskripsi}}</textarea>            
                                    </div> 
                                    <div class="form-group"> @error('tgl') <span class="text-danger">{{$message}} </span> @enderror
                                        <label for="tgl">Tanggal  </label> @error('tgl') <span class="text-danger">Tanggal   harus diisi </span> @enderror
                                        <input type="date" name="tgl"  value="{{$album->tgl}}"  class="form-control" id="tgl" placeholder="Tanggal  " style="width: 250px">                      
                                    </div>
                                        <hr>
                                   <input type="submit" value="UBAH" class="btn btn-primary">
                                   <a href="{{route('album.index')}}" class="btn btn-link" >Batal</a>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </div>
@endsection

 