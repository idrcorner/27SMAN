@extends('admin.layout')

@section('title')
   Ubah Artikel
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah Artikel</h2>
                        
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
                                <form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Judul Artikel</label> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="judul" class="form-control" value="{{$blog->judul}}" id="judul" placeholder="Judul Informasi" required>                      
                                    </div>
                               
                                    <div class="form-group">
                                            <label for="subjudul">Sub Judul / Highlight</label>
                                            <input type="text" name="subjudul" class="form-control" value="{{$blog->subjudul}}"  id="subjudul" placeholder="Sub Judul / Highlight">                      
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Detail Informasi</label>  @error('konten') <span class="text-danger">Detail Informasi Harus diisi </span> @enderror
                                        <textarea id="summernote" name="konten" required>{{$blog->konten}}</textarea>            
                                    </div>
                                    <div class="form-group"> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                        <label for="tgl_publis">Tanggal Publis</label> @error('tgl_publis') <span class="text-danger">Tanggal Publis harus diisi </span> @enderror
                                        <input type="date" name="tgl_publis"  value="{{$blog->tgl_publis}}"  class="form-control" id="tgl_publis" placeholder="Tanggal Publis" style="width: 250px">                      
                                    </div>
                                    
                                        <div class="input-file input-file-image">
                                           <div class="form-group">
                                            <label for="cover">Cover</label> @error('cover') <span class="text-danger">{{$message}}</span> @enderror
                                            <img class="img-upload-preview" width="250" src="{{url(Storage::url($blog->cover))}}" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="cover" name="cover" accept="image/*"   >
                                            <label for="cover" class="  label-input-file btn btn-black btn-round">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image"></i>
                                                </span>
                                                Pilih Cover
                                            </label>
                                           </div>
                                        </div>
                                    
                                        <div class="form-check">
                                            <label>Status</label><br/>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="status" value="1" {{$blog->status==1? ' checked':''}}>
                                                <span class="form-radio-sign">Publis</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="status" value="0"  {{$blog->status==0? ' checked':''}}>
                                                <span class="form-radio-sign">Arsip</span>
                                            </label>
                                        </div>
                                        <hr>
                                   <input type="submit" value="UBAH" class="btn btn-primary">
                                   <a href="{{route('blog.index')}}" class="btn btn-link" >Batal</a>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </div>
@endsection

@section('script')
<script src="{{url('assets/js/plugin/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $('#summernote').summernote({
        placeholder:'Konten',
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 300
    });
</script>
@endsection