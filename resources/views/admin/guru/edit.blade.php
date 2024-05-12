@extends('admin.layout')

@section('title')
   Ubah Guru/TU
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah Guru/TU</h2>
                        
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
                                <form action="{{ route('guru.update',$guru->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Guru</label> @error('nama') <span class="text-danger">{{$message}} </span> @enderror
                                            <input type="text" name="nama" class="form-control" value="{{$guru->nama}}" id="nama" placeholder="Nama Guru" required>                      
                                        </div>
                                        <div class="form-check">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="jk" value="1"  {{$guru->jk==1? ' checked':''}}>
                                                <span class="form-radio-sign">Laki-laki</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="jk" value="0"  {{$guru->jk==0? ' checked':''}}>
                                                <span class="form-radio-sign">Perempuan</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label> @error('jabatan') <span class="text-danger">{{$message}} </span> @enderror
                                            <input type="text" name="jabatan" class="form-control" value="{{$guru->jabatan}}" id="jabatan" placeholder="Jabatan" required>                      
                                        </div>
                                        <div class="form-group">
                                            <label for="tmpt_lahir">Tempat Lahir</label> @error('tmpt_lahir') <span class="text-danger">{{$message}} </span> @enderror
                                            <input type="text" name="tmpt_lahir" class="form-control" value="{{$guru->tmpt_lahir}}" id="tmpt_lahir" placeholder="Tempat Lahir" required>                      
                                        </div>
                                        <div class="form-group"> @error('tgl_lahir') <span class="text-danger">{{$message}} </span> @enderror
                                            <label for="tgl_lahir">Tanggal Lahir</label> @error('tgl_lahir') <span class="text-danger">Tanggal Lahir harus diisi </span> @enderror
                                            <input type="date" name="tgl_lahir"  value="{{$guru->tgl_lahir}}"  class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" style="width: 250px">                      
                                        </div>
                                   
                                            <div class="input-file input-file-image">
                                               <div class="form-group">
                                                <label for="foto">Foto</label> @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                                                <img class="img-upload-preview" width="250"src="{{url(Storage::url($guru->foto))}}"  alt="preview">
                                                <input type="file" class="form-control form-control-file" id="foto" name="foto" accept="image/*"  value="{{old('foto')}}" >
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
                                   <a href="{{route('guru.index')}}" class="btn btn-link" >Batal</a>
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