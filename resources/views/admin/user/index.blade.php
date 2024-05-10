@extends('admin.layout')

@section('title')
    User
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"> User</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        <a href="{{route('user.create')}}" class="btn btn-secondary btn-round">Tambah User</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12">
                    <div class="card full-height">
                        <div class="card-body">
                           <table class="table table-bordered table-hovered" id='iniTabel'>
                               <thead>
                                <tr>
                                    <th>No</th> 
                                    <th>Nama</th> 
                                    <th>Username</th>
                                    <th>Role</th>
                                     
                                    <th>Action</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach ($users as $i=>$inf)
                                <tr>
                                    <td>{{$i+1}}</td> 
                                    <td>
                                       {{$inf->name}} 
                                      </td> 
                                      <td class="text-center">{{$inf->username}}</td>
                                    <td  >{{$inf->role}}</td>
                                    
                                   
                                    <td>
                                        @if (auth()->user()->id != $inf->id)
                                            <a href="{{route('user.edit',$inf->id)}}"> <i class=" fas fa-pen text-warning mr-2" title="Ubah"></i></a>
                                            <i  onclick="alertdelete('{{$inf->name}}','{{$inf->id}}')"
                                                role="button" class="fas fa-trash-alt text-danger cursor-pointer" title="Hapus"></i>
                                        @endif
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

    <form id="deleteform" action="{{route('user.delete')}}" method="post">
        @csrf
        @method('DELETE')
        <input id="idUser" type="hidden" name="id" value="">
     
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
            , text: "Menghapus User : " + judul
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
                document.getElementById("idUser").value=id
                document.getElementById("deleteform").submit();  
            } 
        });
    }
 
</script>
@endsection