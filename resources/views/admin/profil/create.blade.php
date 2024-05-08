@extends('admin.layout')

@section('title')
   Tambah Tentang Kami
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tambah Tentang Kami</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        {{-- <a href="#" class="btn btn-secondary btn-round">Tambah Tentang Kami</a> --}}
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
                                <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="judul">Judul </label> @error('judul') <span class="text-danger">{{$message}} </span> @enderror
                                            <input type="text" name="judul" class="form-control" value="{{old('judul')}}" id="judul" placeholder="Judul Tentang Kami" required>                      
                                        </div>
                                        <div class="form-group">
                                            <label for="summernote">Detail  </label>  @error('konten') <span class="text-danger">Detail Tentang Kami Harus diisi </span> @enderror
                                            <textarea id="summernote" name="konten" required>{{old('konten')}}</textarea>            
                                        </div> 
                            
                                            <div class="form-check">
                                                <label>Status</label><br/>
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="status" value="1"  checked="">
                                                    <span class="form-radio-sign">Publis</span>
                                                </label>
                                                <label class="form-radio-label ml-3">
                                                    <input class="form-radio-input" type="radio" name="status" value="0">
                                                    <span class="form-radio-sign">Arsip</span>
                                                </label>
                                            </div>
                                            <hr>
                                    <input type="submit" value="SIMPAN" class="btn btn-primary">
                                    <a href="{{route('profil.index')}}" class="btn btn-link" >Batal</a>
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
        placeholder: 'Konten',
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 300
    });
</script>
@endsection