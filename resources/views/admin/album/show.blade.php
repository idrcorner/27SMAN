@extends('admin.layout')

@section('title')
    {{ $album->judul}}
@endsection

@section('css')
<style>
    .delete-button {
    position: absolute;
    bottom: 10;
    left: 10;
}

    .img-container {
        position: relative;
    }
</style>
@endsection

@section('content')
   <div class="container">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{$album->judul}}</h2>
                    <h5 class="text-white op-7 mb-2">{{$album->deskripsi}}</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button class="btn btn-secondary btn-round"  data-toggle="modal" data-target="#imageModalTambah">Tambah Foto</button>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                       
                                <i class="fas fa-calendar-alt mr-1 text-success" ></i> {{ date('d F Y', strtotime($album->tgl))}}
                                |
                                 <i class="  fas fa-eye text-primary mr-1"></i> {{$album->view}}
                            
                            
                           
                         
                       <br>
                      
                     <br>
                   <div class="row">
                        @forelse ($fotos as $item)
                          
                            <div class="col-3 mb-2 position-relative">
                                <div class="delete-button">
                                    <i  onclick="alertdelete('{{url(Storage::url($item->foto))}}','{{$item->id}}')"
                                        role="button" class="fas fa-trash-alt text-danger cursor-pointer ml-2 mt-1" title="Hapus"></i>
                                </div>
                                <img src="{{url(Storage::url($item->foto))}}" onclick="prevImg('{{url(Storage::url($item->foto))}}')" data-toggle="modal" data-target="#imageModal" width="100%">
                            </div>
                        @empty
                            <em>Tidak ada foto pada album ini.</em>
                        @endforelse
                    </div>
                     <br>
                     <hr>
                     <a class="btn btn-primary" href="{{route('album.index')}}">Kembali</a>

                    </div>
                </div>
            </div>
           
        </div>
      
    </div>
</div> 

<!-- Blade view file -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <div class="modal-body">
                <img id="previewImage" src="" style="max-width: 100%;" />
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="imageModalTambah" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
            <div class="modal-body">
                <form action="{{ route('uploadfoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex align-items-center">
                        <label for="imageInput" class="me-3">Pilih Foto:</label>
                        <input type="file" class="form-control me-2" id="imageInput" name="images[]" multiple required>
                        <input type="hidden" name="album_id" value="{{$album->id}}">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                  
                </form>

             
            </div>
            
        </div>
    </div>
</div>

<form id="deleteform" action="{{route('deletefoto')}}" method="post">
    @csrf
    @method('DELETE')
    <input id="idFoto" type="hidden" name="id" value="">
    <input  type="hidden" name="album_id" value="{{$album->id}}">
 
</form>

@endsection
 

@section('script')
   <script>
         function prevImg(img){      
            $('#previewImage').attr('src',img)
         }

         function alertdelete(judul, id) {
        swal({
            title: 'Anda yakin?'
            , text: "Menghapus Foto ini ?"
            , icon: 'warning'
            , buttons: {
                confirm: {
                    text: 'Ya, Hapus'
                    , className: 'btn btn-primary'
                }
                , cancel: {
                    visible: true
                    , className: 'btn btn-danger'
                }
            }
        }).then((result) => {
            if (result) {
                document.getElementById("idFoto").value=id
                document.getElementById("deleteform").submit();  
            } 
        });
    }
   </script>
@endsection