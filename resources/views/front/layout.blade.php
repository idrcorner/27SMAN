<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{url('assets/img/icon.png')}}" type="image/x-icon"/>

    {{-- <!-- Font awesome --> --}}
    <link href="{{url('front/assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{url('front/assets/css/bootstrap.css')}}" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{url('front/assets/css/slick.css')}}">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{url('front/assets/css/jquery.fancybox.css')}}" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="{{url('front/assets/css/theme-color/default-theme.css')}}" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="{{url('front/assets/css/style.css')}}" rel="stylesheet">    
 
    <!-- Fonts and icons -->
	<script src="{{url('assets/js/plugin/webfont/webfont.min.js')}}"></script>
  @yield('css')
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{url("assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
  <style>
    li.active a{
      color:rgb(0, 170, 255) !important;
    }
  </style>
  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->
  @php
  if(!isset($menu)){
      $menu='home';
  }
@endphp
  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>{{$kontak->email}}</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>{{$kontak->tlp}}</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="{{$kontak->fb}}" target="_blank"><span class="fab fa-facebook"></span></a></li>
                      <li><a href="{{$kontak->ig}}" target="_blank"><span class="fab fa-instagram"></span></a></li>
                      <li><a href="{{$kontak->yt}}" target="_blank"><span class="fab fa-youtube"></span></a></li>
                      <li><a href="{{$kontak->tw}}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                     
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation" >  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          {{-- <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Varsity</span></a> --}}
          <!-- IMG BASED LOGO  -->
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{url('assets/img/logo.svg')}}" alt="logo"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="{{$menu=='home'?' active':''}}"><a href="{{route('home')}}">HOME</a></li>            
            <li class="dropdown {{$menu=='tentangkami'?' active':''}}">
              <a href="#" class="dropdown-toggle  " data-toggle="dropdown">TENTANG KAMI <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                @foreach ($tentangkamis as $item)
                    <li><a href="{{route('tentangkamidetail',$item->slug)}}">{{$item->judul}}</a></li>               
                @endforeach
  
              </ul>
            </li>    
            <li class="{{$menu=='informasi'?' active':''}}"><a href="{{route('listinformasi')}}">INFORMASI SEKOLAH</a></li>
            <li><a href="{{route('listguru')}}">GURU DAN TU</a></li>       
            <li class="{{$menu=='blog'?' active':''}}"><a href="{{route('listblog')}}">BLOG GURU</a></li>
            <li class="{{$menu=='prestasi'?' active':''}}"><a href="{{route('listprestasi')}}">PRESTASI</a></li>
            <li class="dropdown  {{$menu=='galeri'?' active':''}}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">GALERI <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{route('listalbum')}}">Foto</a></li>                
                <li><a href="{{route('listvideo')}}">Video</a></li>                
              </ul>
            </li>            
           
                
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form" method="POST" action="{{route('pencarian')}}">
              @csrf
              <input type="search" name="cari" placeholder="Ketik apa yang anda cari & Tekan Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <!-- Start Slider -->
 @yield('content')

  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
              <div class="mu-footer-widget">
                <img src="{{url('assets/img/icon.png')}}" width="100%" alt="" srcset="">
              </div>
            </div>
           
           
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="mu-footer-widget">
                <h4>{{appname()}}</h4>
                <address>
                 <small>
                  <p>{{$kontak->alamat}}</p>
                  <p>Phone: {{$kontak->tlp}} </p>
                  <p>Email:{{$kontak->email}}</p>
                 </small>
                </address>
             
                 
                      <a href="{{$kontak->fb}}" target="_blank"><span class="fab fa-facebook " style="color:white;margin-right:10px"></span></a> 
                      <a href="{{$kontak->ig}}" target="_blank"><span class="fab fa-instagram " style="color:white;margin-right:10px"></span></a> 
                     <a href="{{$kontak->yt}}" target="_blank"><span class="fab fa-youtube " style="color:white;margin-right:10px"></span></a> 
                     <a href="{{$kontak->tw}}" target="_blank"><span class="fab fa-twitter " style="color:white;margin-right:10px"></span></a> 
                     
                    
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="mu-footer-widget">
                <h4> _</h4>
                <table>
                  <tr>
                    <td>
                      <ul>
                        <li><a href="">Tentang Kami</a></li>
                        <li><a href="{{route('listinformasi')}}">Informasi Sekolah</a></li>
                        <li><a href="{{route('listguru')}}">Guru dan Tata Usaha</a></li>
                        <li><a href="{{route('listblog')}}">Blog Guru</a></li>
                            
                      </ul>
                    </td>
                    <td style="padding-left:20px">
                      <ul>
                        <li><a href="{{route('katasambutan')}}">Sambutan Kepsek</a></li>     
                        <li><a href="{{route('listprestasi')}}">Prestasi</a></li>                  
                        <li><a href="{{route('listalbum')}}">Album Foto</a></li>                  
                        <li><a href="{{route('listvideo')}}">Video</a></li>                
                                
                      </ul>
                    </td>
                  </tr>
                </table>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
           <p> 2024,  <i class="fa fa-heart heart text-danger"></i>   {{appname()}} </p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src="{{url('front/assets/js/jquery.min.js')}}"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{url('front/assets/js/bootstrap.js')}}"></script>   
  <script type="text/javascript" src="{{url('front/assets/js/slick.js')}}"></script>
  <!-- Counter -->
  <script type="text/javascript" src="{{url('front/assets/js/waypoints.js')}}"></script>
  <script type="text/javascript" src="{{url('front/assets/js/jquery.counterup.js')}}"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="{{url('front/assets/js/jquery.mixitup.js')}}"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="{{url('front/assets/js/jquery.fancybox.pack.js')}}"></script>
  
  
  <!-- Custom js -->
  <script src="{{url('front/assets/js/custom.js')}}"></script> 
@yield('script')
  </body>
</html>