@extends('front.layout')

@section('title')
   Guru dan Tata Usaha
@endsection

@section('css')
  <style>
      .guru{
        font-size: 13px !important;
        border-radius: 10px;
    }

    .cardguru{
        margin-bottom:20px;
      
        
    }
    .jkLaki{
        background-color: rgba(200, 194, 245, 0.952);
        /* border:1px solid rgb(105, 105, 247); */
        border-radius: 10px;
    }
    .jkPr{
        background-color: rgba(245, 179, 182, 0.509);
        /* border:1px solid pink; */
        border-radius: 10px;
    }
.judulan{
    font-size: 9px;
    /* background: #9d8484; */
    /* margin-bottom: -3px !important; */
    font-weight: 600;
    color: rgb(0, 0, 0)
 
}
.isian{
    font-size: 12px;
    /* background: #07e28e; */
    margin-bottom: 1px !important;
}
    
  </style>
@endsection

@section('content')
     <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Guru dan Tata Usaha</h2>
            <ol class="breadcrumb">
             <li><a href="{{route('home')}}">Home</a></li>            
             <li class="active">Guru dan Tata Usaha</li>
           </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->
  <section id="mu-course-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-course-content-area">
             <div class="row">
               <div class="col-md-9">
                 <!-- start course content container -->
                 <div class="mu-course-container mu-blog-single">
                   <div class="row">
                     <div class="col-md-12">
                       <article class="mu-blog-single-item " style="padding:20px">
                        
                    @foreach ($gurus as $guru)

                    <div  class="card mb-6 col-md-6" >
                        <div class=" cardguru {{$guru->jk==0? ' jkPr':' jkLaki'}}"   style="padding: 5px 15px 5px 15px ">
                            <div class="row  "  style="padding: 5px 5px 5px -10px">
                              <div class="col-md-4" style="padding:5px !important">
                                <img src="{{url(Storage::url($guru->foto))}}" width="100%" class="card-img-top" alt="..." style=" border-radius: 10px">
                              </div>
                              <div class="col-md-8 ket" style="padding:5px 15px 15px 15px !important">
                                   
                                <div class="judulan">Nama:</div>
                                <div class="isian"> {{$guru->nama}} </div>
                                <div class="judulan">Tempat, Tanggal Lahir:</div>
                                <div class="isian">{{$guru->tmpt_lahir}}, {{ date('d F Y', strtotime($guru->tgl_lahir))}} </div>
                                <div class="judulan">Jenis Kelamin:</div>
                                <div class="isian">{{$guru->jk==1? "Laki-laki": "Perempuan"}}</div>
                                <div class="judulan">Jabatan:</div>
                                <div class="isian">{{$guru->jabatan}}</div>
                             
                                {{-- <table class="guru">
                                        <tr>
                                            <td style="vertical-align: text-top"><strong>Nama</strong></td>
                                            <td style="vertical-align: text-top">:</td>
                                            <td style="padding-left:10px"><strong>{{$guru->nama}}</strong></td>
                                        </tr>
                                       
                                        <tr>
                                            <td style="vertical-align: text-top"><strong>Tempat Lahir</strong></td>
                                            <td style="vertical-align: text-top">:</td>
                                            <td style="padding-left:10px">{{$guru->tmpt_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: text-top"><strong>Tanggal Lahir</strong></td>
                                            <td style="vertical-align: text-top">:</td>
                                            <td style="padding-left:10px">{{ date('d F Y', strtotime($guru->tgl_lahir))}}</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: text-top"><strong>Jenis Kelamin</strong></td>
                                            <td style="vertical-align: text-top">:</td>
                                            <td style="padding-left:10px">{{$guru->jk==1? "Laki-laki": "Perempuan"}}</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: text-top"><strong>Jabatan/Tugas</strong></td>
                                            <td style="vertical-align: text-top">:</td>
                                            <td style="padding-left:10px">{{$guru->jabatan}}</td>
                                        </tr>
                                    </table>
                               --}}
                              </div>
                            </div>
                          </div>
                        
                    </div>
                   
                    @endforeach
                        
                       </article>
                     </div>                                   
                   </div>
                 </div>
               
             
               </div>
               <div class="col-md-3">
                 <!-- start sidebar -->
                 <aside class="mu-sidebar">
                   <!-- start single sidebar -->
              
                   <!-- end single sidebar -->
                   <!-- start single sidebar -->
                   <div class="mu-single-sidebar text-center">
                     <h3>Kepala Sekolah</h3>
                     <div class="mu-sidebar-popular-courses text-center">
                        <img src="{{url(Storage::url($kepsek->foto))}}" width="100%" alt="Foto Kepala Sekolah" style="margin-bottom:10px">
                        
                        <p style="margin-bottom:-5px"><strong>{{$kepsek->nama}}</strong></p>
                        <small  >NIP:  {{$kepsek->nip}} </small>
                     </div>
                   </div>

                   <div class="mu-single-sidebar">
                    <h3>Tentang Kami</h3>
                    <ul class="mu-sidebar-catg">
                       @foreach ($tentangkamis as $tk)
                          
                              <li><a href="{{route('tentangkamidetail',$tk->slug)}}">{{$tk->judul}}</a></li>
                          
                       @endforeach
                     
                      
                    </ul>
                  </div>
                 
                 
                   <!-- end single sidebar -->
                 </aside>
                 <!-- / end sidebar -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection