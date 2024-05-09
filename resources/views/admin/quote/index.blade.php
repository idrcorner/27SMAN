@extends('admin.layout')

@section('title')
    Quote
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Quote</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        <a href="{{route('quote.create')}}" class="btn btn-secondary btn-round">Tambah Quote</a>
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
                                    <th>Quote</th> 
                                    <th>oleh</th>
                                    <th>Action</th>
                                </tr>
                               </thead>
                               <tbody>
                                @foreach ($quotes as $i=>$inf)
                                <tr>
                                    <td>{{$i+1}}</td> 
                                    <td>{{$inf->quote}}</td> 
                                    <td>{{$inf->oleh}}</td> 
                                        <td>
                                    <a href="{{route('quote.edit',$inf->id)}}"> <i class=" fas fa-pen text-warning mr-2" title="Ubah"></i></a>
                                        <i  onclick="alertdelete('{{$inf->quote}}','{{$inf->id}}')"
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

    <form id="deleteform" action="{{route('quote.delete')}}" method="post">
        @csrf
        @method('DELETE')
        <input id="idQuote" type="hidden" name="id" value="">
     
    </form>
@endsection

@section('script')
 

<script>
    $(document).ready(function() {

       

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
            , text: "Menghapus Quote : " + judul
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
                document.getElementById("idQuote").value=id
                document.getElementById("deleteform").submit();  
            } 
        });
    }
 
</script>
@endsection