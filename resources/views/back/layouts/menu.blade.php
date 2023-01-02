<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('adminDashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HKM Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if(Request::segment(2)=="") active @endif">
                <a class="nav-link" href="{{route('home')}}" target="_blank">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Siteyi Görüntüle</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                İçerik Yönetimi
            </div>

            <!-- YAYINLAR -->
            <li class="nav-item @if(Request::segment(2)=="yayinlar") active @endif">
                <a class="nav-link collapsed "
                   href="#" data-toggle="collapse"
                   data-target="#collapseTwo"
                   aria-expanded="true"
                   aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Yayınlar</span>
                </a>
                <div id="collapseTwo" class="collapse  @if(Request::segment(2)=="yayinlar") show @endif"
                     aria-labelledby="headingTwo"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Yayın İşlemleri</h6>
                        <a class="collapse-item @if(Request::segment(2)=="yayinlar" && !Request::segment(3)) active @endif"
                           href="{{route('yayinlar.index')}}">Tüm Yayınlar</a>
                        <a class="collapse-item @if(Request::segment(2)=="yayinlar" && Request::segment(3)=="create") active @endif"
                           href="{{route('yayinlar.create')}}">Yeni Yayın</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- SAYFALAR PAGES-->
            <li class="nav-item @if(Request::segment(2)=="kategori") active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                   aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-file"></i>
                    <span>Sayfalar</span>
                </a>
                <div id="collapseUtilities2" class="collapse @if(Request::segment(2)=="sayfalar") show @endif" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sayfa İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2)=="sayfalar" && !Request::segment(3)) active @endif" href="{{route('adminPagesList')}}">Tüm Sayfalar</a>
                        <a class="collapse-item @if(Request::segment(2)=="sayfalar" && Request::segment(3)=="olustur") active @endif" href="{{route('adminGetPagesCreate')}}">Yeni Sayfa</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- KATEGORİ -->
            <li class="nav-item @if(Request::segment(2)=="kategori") active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseUtilities" class="collapse @if(Request::segment(2)=="kategori") show @endif" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2)=="kategori" && !Request::segment(3)) active @endif" href="{{route('adminCategoryIndex')}}">Tüm Kategori</a>
                        <a class="collapse-item @if(Request::segment(2)=="kategori" && Request::segment(3)=="olustur") active @endif" href="{{route('adminGetCategoryCreate')}}">Yeni Kategori</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- KATEGORİ -->
            <li class="nav-item @if(Request::segment(2)=="mesajlar") active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                   aria-expanded="true" aria-controls="collapseUtilities3">
                    <i class="fas fa-fw fa-message"></i>
                    <span>Mesajlar</span>
                </a>
                <div id="collapseUtilities3" class="collapse @if(Request::segment(2)=="mesajlar") show @endif" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Mesaj İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2)=="mesajlar" && !Request::segment(3)) active @endif" href="{{route('adminMessage')}}">Tüm Mesajlar</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <!-- KATEGORİ -->
            <li class="nav-item @if(Request::segment(2)=="ayarlar") active @endif">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                   aria-expanded="true" aria-controls="collapseUtilities3">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ayarlar</span>
                </a>
                <div id="collapseUtilities3" class="collapse @if(Request::segment(2)=="ayarlar") show @endif" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ayar İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2)=="ayarlar" && !Request::segment(3)) active @endif" href="{{route('adminConfig')}}">Tüm Ayarlar</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
