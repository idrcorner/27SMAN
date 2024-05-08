<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title> @yield('title') </title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url('assets/img/icon.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{url('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{url("assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/atlantis.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{url('assets/css/demo.css')}}">
    @yield('css')
</head>
<body>
    @php
        if(!isset($menu)){
            $menu='';
        }
    @endphp
	<div class="wrapper" id="sideB">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<img src="{{url('assets/img/logo.svg')}}" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					 
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
					<strong class="text-white mr-3">{{auth()->user()->name}}</strong>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">                             
									<img src="{{url('assets/img/profile.png')}}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									 
									<li>
									 
										<a class="dropdown-item" href="#"> <i class="text-primary icon-wrench mr-2"></i>Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
										<i class="text-danger icon-login mr-2"></i>
                                        {{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST"
											class="d-none">
											@csrf
										</form>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		@include('admin.sidebar')
		<div class="main-panel">
			@yield('content')
			<footer class="footer">
				<div class="container-fluid">
					 
					<div class="copyright ml-auto">
						2024,  <i class="fa fa-heart heart text-danger"></i>   {{appname()}} 
					</div>				
				</div>
			</footer>
		</div>
		
		 
		 
	</div>
	<!--   Core JS Files   -->
	<script src="{{url('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{url('assets/js/core/popper.min.js')}}"></script>
	<script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

	<!-- Moment JS -->
	<script src="{{url('assets/js/plugin/moment/moment.min.js')}}"></script>
 
	<!-- Datatables -->
	<script src="{{url('assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{url('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
   
	<!-- Summernote -->
	<script src="{{url('assets/js/plugin/summernote/summernote-bs4.min.js')}}"></script>
 
	<!-- Sweet Alert -->
	<script src="{{url('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
 

	<!-- Magnific Popup -->
	<script src="{{url('assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('assets/js/atlantis.min.js')}}"></script>
      @yield('script')

	  
	@if (session()->has('success'))
	<script>
		function notif() {
        var placementFrom = 'top';
        var placementAlign = 'right';
        var state = 'success';
        var style = 'withicon';
        var content = {};

        content.message ="{{session()->get('success')}}";
        content.title = 'Berhasil';
        if (style == "withicon") {
            content.icon = 'fa fa-check';
        } else {
            content.icon = 'none';
        }


        $.notify(content, {
            type: state
            , placement: {
                from: placementFrom
                , align: placementAlign
            }
            , time: 1000
            , delay: 0
        , });
    }
    notif()

	</script>
	@endif
</body>
</html>