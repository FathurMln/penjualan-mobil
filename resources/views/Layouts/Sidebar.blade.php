<!--begin::Sidebar-->
<aside class="app-sidebar bg-dark shadow-lg" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand p-3 d-flex align-items-center bg-dark text-white shadow-sm">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link d-flex align-items-center text-decoration-none text-white">
            <!--begin::Brand Image-->
            
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-bold fs-5 text-uppercase">Fatur Showroom</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper mt-4">
        <nav>
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" role="menu" data-accordion="false">
                <!-- Menu Header -->
               
                <!-- Pelanggan -->

                <!-- Divider -->
              

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center text-light py-3 px-4 rounded hover-bg-light" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars me-3 fs-5 text-success"></i>
                        <p class="m-0">Menu</p>
                    </a>
                    <ul class="dropdown-menu custom-dropdown shadow border-0 mt-2">
                        <!-- Data Kamar -->
                        <li>
                            <a href="{{ url('mobil.index') }}" class="dropdown-item d-flex align-items-center text-black py-2">
                                <i class="fa-solid fa-bed text-primary me-2 fs-5"></i> Daftar Mobil
                            </a>
                        </li>
                        <!-- Data Reservasi -->
                        <li>
                            <a href="{{ url('customer.index') }}" class="dropdown-item d-flex align-items-center text-black py-2">
                                <i class="fa-solid fa-calendar-check text-danger me-2 fs-5"></i> Data transaksi
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
