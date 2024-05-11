@extends('admin.layout')

@section('title')
   Kepala Sekolah
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Kepala Sekolah</h2>
                        
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
                                <form action="{{ route('kepsek.update',$kepsek->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Kepala Sekolah</label> @error('nama') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="nama" class="form-control" value="{{$kepsek->nama}}" id="nama" placeholder="Nama Kepala Sekolah" required>                      
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label> @error('nip') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="nip" class="form-control" value="{{$kepsek->nip}}" id="nip" placeholder="NIP" required>                      
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="summernote">Kata Sambutan</label>  @error('konten') <span class="text-danger">Kata Sambutan Harus diisi </span> @enderror
                                        <textarea id="summernote" name="katasambutan" required>{{$kepsek->katasambutan}}</textarea>            
                                    </div> 
                                        <div class="input-file input-file-image">
                                           <div class="form-group">
                                            <label for="foto">Foto</label> @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                                            <img class="img-upload-preview" width="250" src="{{url(Storage::url($kepsek->foto))}}" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="foto" name="foto" accept="image/*"   >
                                            <label for="foto" class="  label-input-file btn btn-black btn-round">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image"></i>
                                                </span>
                                                Pilih Foto
                                            </label>
                                           </div>
                                        </div>
                             
                                        <hr>
                                   <input type="submit" value="UBAH" class="btn btn-primary">
                                   <a href="{{route('dashboard')}}" class="btn btn-link" >Batal</a>
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
        placeholder:'Kata Sambutan',
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 300
    });
</script>
@endsection