@extends('admin.layout')

@section('title')
   Tambah Slider
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tambah Slider</h2>
                        
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
                                <div class="col-12">
                                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                            
                                    <div class="form-group">
                                        <label for="judul">Judul</label> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="judul" class="form-control" value="{{old('judul')}}" id="judul" placeholder="Judul" required>                      
                                    </div>
                              
                                    <div class="form-group">
                                        <label for="summernote">Deskripsi</label>  @error('konten') <span class="text-danger">Deskripsi Harus diisi </span> @enderror
                                        <textarea class="form-control" name="deskripsi" required>{{old('konten')}}</textarea>            
                                    </div> 
                                    
                                        <div class="input-file input-file-image">
                                           <div class="form-group">
                                            <label for="cover">Cover</label> @error('cover') <span class="text-danger">{{$message}}</span> @enderror
                                            <img class="img-upload-preview" width="400" src="http://placehold.it/400x150" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="cover" name="cover" accept="image/*" required="" value="{{old('cover')}}" >
                                            <label for="cover" class="  label-input-file btn btn-black btn-round">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image"></i>
                                                </span>
                                                Pilih Gambar
                                            </label>
                                           </div>
                                        </div>
                                  
                                        <hr>
                                   <input type="submit" value="SIMPAN" class="btn btn-primary">
                                   <a href="{{route('slider.index')}}" class="btn btn-link" >Batal</a>
                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </div>
@endsection

 