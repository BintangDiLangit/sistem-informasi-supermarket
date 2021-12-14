<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cart-plus"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI <sup>Supermarket</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pemasok
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/pemasok*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pemasok.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pemasok</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produk
    </div>

    <!-- Nav Item - Kategori -->
    <li class="nav-item {{ request()->is('admin/kategori') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item {{ request()->is('admin/produk*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produk.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Produk</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaksi :</h6>
                <a class="collapse-item" href="{{ route('penjualan.index') }}">Penjualan</a>
                <a class="collapse-item" href="{{ route('pembelian.index') }}">Pembelian</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
