@extends('admin.layout')

@section('title')
   Ubah Kontak
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah Kontak</h2>
                        
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
                                <form action="{{ route('kontak.update',$kontak->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                              <h1>{{appname()}}</h1>
                                    <div class="form-group">
                                        <label for="alamat">Alamat </label> @error('alamat') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" value="{{$kontak->alamat}}"  name="alamat" class="form-control" id="alamat" placeholder="  Alamat"  >                      
                                    </div>
                                    <div class="form-group">
                                        <label for="tlp">Telepon </label> @error('tlp') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="tlp" class="form-control" value="{{$kontak->tlp}}" id="tlp" placeholder="  Telepon"  >                      
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email </label> @error('email') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="email" name="email" class="form-control" value="{{$kontak->email}}" id="email" placeholder="  Email"  >                      
                                    </div>
                                    <div class="form-group">
                                        <label for="fb">Facebook</label> @error('fb') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="fb" class="form-control" value="{{$kontak->fb}}" id="fb" placeholder="  Facebook URL"  >                      
                                    </div>
                                    <div class="form-group">
                                        <label for="ig">Instagram </label> @error('ig') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="ig" class="form-control" value="{{$kontak->ig}}" id="ig" placeholder="  Instagram"  >                      
                                    </div>
                                    <div class="form-group">
                                        <label for="yt">Youtube </label> @error('yt') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="yt" class="form-control" value="{{$kontak->yt}}" id="yt" placeholder="  Youtube"  >                      
                                    </div>
                                    <div class="form-group">
                                        <label for="tw">Twitter </label> @error('tw') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="tw" class="form-control" value="{{$kontak->tw}}" id="tw" placeholder="  Twitter"  >                      
                                    </div>
                                    
                                        <hr>
                                   <input type="submit" value="UBAH" class="btn btn-primary">
                                   {{-- <a href="{{route('kontak.index')}}" class="btn btn-link" >Batal</a> --}}
                                
                                </form>
                            </div>
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