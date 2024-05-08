@extends('admin.layout')

@section('title')
    Guru dan Tata Usaha
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Guru dan Tata Usaha</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        <a href="{{route('guru.create')}}" class="btn btn-secondary btn-round">Tambah Guru dan Tata Usaha</a>
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
                                    <th width="100px">Foto</th>
                                    <th>Nama</th> 
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>View</th>
                                    <th>Action</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach ($gurus as $i=>$inf)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>
                                        <img src="{{url(Storage::url($inf->foto))}}" alt="cover" width="100px" style="border-radius: 5px" >
                                    </td>
                                    <td>{{$inf->nama}}</td> 
                                    <td>{{$inf->jk==1?'Laki-laki':'Perempuan'}}</td>
                                    <td>{{$inf->jabatan}}</td>
                                    <td class="text-center">{{$inf->tmpt_lahir}}, {{ date('d F Y', strtotime($inf->tgl_lahir)) }}</td>
                                    <td>{{$inf->view}}</td>
                                   <td>
                                    <a href="{{route('guru.edit',$inf->id)}}"> <i class=" fas fa-pen text-warning mr-2" title="Ubah"></i></a>
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

    <form id="deleteform" action="{{route('guru.delete')}}" method="post">
        @csrf
        @method('DELETE')
        <input id="idGuru" type="hidden" name="id" value="">
     
    </form>
@endsection

@section('script')
 

<script>
    $(document).ready(function() {

        $('#sideB').addClass('sidebar_minimize');

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
            , text: "Menghapus Guru / TU : " + judul
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
                document.getElementById("idGuru").value=id
                document.getElementById("deleteform").submit();  
            } 
        });
    }
 
</script>
@endsection