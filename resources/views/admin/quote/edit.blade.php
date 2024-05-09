@extends('admin.layout')

@section('title')
   Ubah Quote
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah Quote</h2>
                        
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
                                <form action="{{ route('quote.update',$quote->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                              
                                    <div class="form-group">
                                        <label for="quote">Quote </label> @error('quote') <span class="text-danger">{{$message}} </span> @enderror
                                        <textarea  name="quote" class="form-control" id="quote" placeholder="  Quote" required>{{$quote->quote}}</textarea>                      
                                    </div>
                                    <div class="form-group">
                                        <label for="oleh">Oleh </label> @error('oleh') <span class="text-danger">{{$message}} </span> @enderror
                                        <input type="text" name="oleh" class="form-control" value="{{$quote->oleh}}" id="oleh" placeholder="  Oleh" required>                      
                                    </div>
                                    
                                        <hr>
                                   <input type="submit" value="UBAH" class="btn btn-primary">
                                   <a href="{{route('quote.index')}}" class="btn btn-link" >Batal</a>
                                
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