@extends('admin.layout')

@section('title')
    Prestasi
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Prestasi</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        <a href="{{route('prestasi.create')}}" class="btn btn-secondary btn-round">Tambah Prestasi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                           <table class="table table-bordered table-hovered" id='iniTabel'>
                               <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="100px">Cover</th>
                                    <th>Judul</th> 
                                    <th>Admin</th>
                                    <th>View</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach ($prestasis as $i=>$inf)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>
                                        <img src="{{url(Storage::url($inf->cover))}}" alt="cover" width="100px" style="border-radius: 5px" >
                                    </td>
                                    <td>{{$inf->judul}}</td> 
                                    <td>{{getUsername($inf->user_id)}}</td>
                                    <td class="text-center">{{$inf->view}}</td>
                                    <td class="{{$inf->status==0?'text-warning':'text-primary'}}">{{$inf->status==0?'Arsip':'Publis'}}</td>
                                    <td>
                                        <a href="{{route('prestasi.show',$inf->id)}}"><i class=" fas fa-search text-primary mr-2" title="Lihat Detail"></i></a>
                                       <a href="{{route('prestasi.edit',$inf->id)}}"> <i class=" fas fa-pen text-warning mr-2" title="Ubah"></i></a>
                                        <i  onclick="alertdelete('{{$inf->judul}}','{{$inf->id}}')"
                                            role="button" class="fas fa-trash-alt text-danger cursor-pointer" title="Hapus"></i>
                                    </td>
                                </tr>
                            @endforeach
                               </tbody>
                           </table>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </div>

    <form id="deleteform" action="{{route('prestasi.delete')}}" method="post">
        @csrf
        @method('DELETE')
        <input id="idPrestasi" type="hidden" name="id" value="">
     
    </form>
@endsection

@section('script')
 

<script>
    $(document).ready(function() {

        // $('#sideB').addClass('sidebar_minimize');

        var table=  $('#iniTabel').DataTable({
            ordering: false,
            pageLength: 100
         });
       
         table.destroy()
        $('#iniTabel').DataTable({
                ordering: false,
                pageLength: 100,
                info: false
            });
		}); 
        
        function alertdelete(judul, id) {
        swal({
            title: 'Anda yakin?'
            , text: "Menghapus Prestasi : " + judul
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
                document.getElementById("idPrestasi").value=id
                document.getElementById("deleteform").submit();  
            } 
        });
    }
 
</script>
@endsection