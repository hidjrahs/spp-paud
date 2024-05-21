<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('mazer/assets/compiled/svg/logo.svg') }}"
                        alt="Logo"></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ asset('mazer/assets/compiled/jpg/1.jpg') }}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->role }}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="#">My Account</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>



                <li class="menu-item  ">
                    <a href="{{ route('dashboard') }}" class='menu-link'>
                        <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                    </a>
                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-stack"></i> Menabung</span>
                    </a>
                </li>



                <li class="menu-item active has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-grid-1x2-fill"></i> Mengambil</span>
                    </a>

                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-file-earmark-medical-fill"></i> Laporan</span>
                    </a>
                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-table"></i> Master</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">


                            <ul class="submenu-group">

                                <li class="submenu-item  ">
                                    <a href="table.html" class='submenu-link'>Data Siswa</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="table-datatable.html" class='submenu-link'>Data Kelas</a>


                                </li>



                                <li class="submenu-item  ">
                                    <a href="table-datatable-jquery.html" class='submenu-link'>Periode
                                        (jQuery)</a>


                                </li>

                            </ul>


                        </div>
                    </div>
                </li>



                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-plus-square-fill"></i> Extras</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">


                            <ul class="submenu-group">

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Widgets</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-widgets-chatbox.html"
                                                class="subsubmenu-link">Chatbox</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-widgets-pricing.html"
                                                class="subsubmenu-link">Pricing</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-widgets-todolist.html" class="subsubmenu-link">To-do
                                                List</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Icons</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-icons-bootstrap-icons.html"
                                                class="subsubmenu-link">Bootstrap Icons </a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-icons-fontawesome.html"
                                                class="subsubmenu-link">Fontawesome</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-icons-dripicons.html"
                                                class="subsubmenu-link">Dripicons</a>
                                        </li>

                                    </ul>

                                </li>



                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>Charts</a>


                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item ">
                                            <a href="ui-chart-chartjs.html"
                                                class="subsubmenu-link">ChartJS</a>
                                        </li>

                                        <li class="subsubmenu-item ">
                                            <a href="ui-chart-apexcharts.html"
                                                class="subsubmenu-link">Apexcharts</a>
                                        </li>

                                    </ul>

                                </li>

                            </ul>


                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

</header>
