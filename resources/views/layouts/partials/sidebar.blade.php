<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link {{ Request::is('supplier*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fa-solid fa-boxes-packing"></i>
                        <p>
                            Supplier
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>


                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                        class="nav-link {{ Request::is('kategori_barang*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fa-solid fa-rectangle-list"></i>
                        <p>
                            Kategori Barang
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fa-solid fa-rectangle-list"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('barang.index') }}"
                        class="nav-link {{ Request::is('barang*') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fa-solid fa-rectangle-list"></i>
                        <p>
                            Barang
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
