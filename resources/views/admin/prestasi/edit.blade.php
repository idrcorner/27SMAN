@extends('admin.layout')

@section('title')
   Ubah Prestasi
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah Prestasi</h2>
                        
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
                                <form action="{{ route('prestasi.update',$prestasi->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Nama Prestasi</label> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="judul" class="form-control" value="{{$prestasi->judul}}" id="judul" placeholder="Nama Prestasi" required>                      
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="summernote">Detail Prestasi</label>  @error('konten') <span class="text-danger">Detail Prestasi Harus diisi </span> @enderror
                                        <textarea id="summernote" name="konten" required>{{$prestasi->konten}}</textarea>            
                                    </div> 
                                        <div class="input-file input-file-image">
                                           <div class="form-group">
                                            <label for="cover">Cover</label> @error('cover') <span class="text-danger">{{$message}}</span> @enderror
                                            <img class="img-upload-preview" width="250" src="{{url(Storage::url($prestasi->cover))}}" alt="preview">
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
                                                <input class="form-radio-input" type="radio" name="status" value="1" {{$prestasi->status==1? ' checked':''}}>
                                                <span class="form-radio-sign">Publis</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="status" value="0"  {{$prestasi->status==0? ' checked':''}}>
                                                <span class="form-radio-sign">Arsip</span>
                                            </label>
                                        </div>
                                        <hr>
                                   <input type="submit" value="UBAH" class="btn btn-primary">
                                   <a href="{{route('prestasi.index')}}" class="btn btn-link" >Batal</a>
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