<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
             
            <ul class="nav nav-primary">
                <li class="nav-item {{$menu=='dashboard'? ' active ':''}}">
                    <a href="{{route('dashboard')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <p>Dashboard</p>                       
                    </a>            
                </li>
                <li class="nav-item  {{$menu=='informasi'? ' active ':''}}">
                    <a href="{{route('informasi.index')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-book-open"></i>
                        <p>Informasi Sekolah</p>                       
                    </a>            
                </li>
                <li class="nav-item  {{$menu=='profil'? ' active ':''}} ">
                    <a href="{{route('profil.index')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-directions"></i>
                        <p>Tentang Kami</p>                       
                    </a>            
                </li>
                <li class="nav-item {{$menu=='guru'? ' active ':''}} ">
                    <a href="{{route('guru.index')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-people"></i>
                        <p>Guru dan TU</p>                       
                    </a>            
                </li>
                <li class="nav-item   {{$menu=='prestasi'? ' active ':''}} ">
                    <a href="{{route('prestasi.index')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-trophy"></i>
                        <p>Prestasi</p>                       
                    </a>            
                </li>
                <li class="nav-item  {{$menu=='album'? ' active ':''}} ">
                    <a href="{{route('album.index')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-picture"></i>
                        <p>Album</p>                       
                    </a>            
                </li>
                <li class="nav-item  {{$menu=='quote'? ' active ':''}} ">
                    <a href="{{route('quote.index')}}" class="collapsed" aria-expanded="false">
                        <i class="icon-diamond"></i>
                        <p>Quote</p>                       
                    </a>            
                </li>
            <hr>
            <li class="nav-item  {{$menu=='kontak'? ' active ':''}} ">
                <a href="{{route('kontak.index')}}" class="collapsed" aria-expanded="false">
                    <i class="icon-direction"></i>
                    <p>Kontak</p>                       
                </a>            
            </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
