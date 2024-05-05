<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/rendy/theme/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/rendy/theme/plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
        rel="stylesheet">
    <link href="/rendy/theme/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="#">
                    <b class="logo-abbr"><img src="/rendy/theme/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/rendy/theme/images/logo-compact.png"
                            alt=""></span>
                    <span class="brand-title">
                        <img src="/rendy/theme/images/rendy-text1.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">
                                                <i class="icon-user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <hr class="my-2">
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>

                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/jenisbarang">Data Kode Barang</a></li>
                            <li><a href="/barang">Data Barang</a></li>
                        </ul>
                    </li>



                    <li>

                    </li>


                    <li>

                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://github.com/Gezod">rendy hermansyah</a>
                    2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/rendy/theme/plugins/common/common.min.js"></script>

    <script src="/rendy/theme/js/custom.min.js"></script>

    <script src="/rendy/theme/js/settings.js"></script>

    <script src="/rendy/theme/js/gleek.js"></script>

    <script src="/rendy/theme/js/styleSwitcher.js"></script>

    <script src="/rendy/theme/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/rendy/theme/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/rendy/theme/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script>
        function reloadPage() {
        location.reload();
    }
       function showBarang(json, href) {
            let data = JSON.parse(json);
            console.log(data, href)
            $('#modalShow').modal('show');
            $('#form_show').attr('action', href);
            $('disabled[name=nama_barang]').val(data.nama_barang);
            $('disabled[name=id_jenis]').val(data.id_jenis);
            $('disabled[name=stock]').val(data.stock);
            $('disabled[name=harga]').val(data.harga);
            $('disabled[name=description]').val(data.description);
        }

        function deleteUser(json, href) {
            let data = JSON.parse(json);
            // console.log(data);
            $('#modalHapus').modal('show');
            $('#form_delete').attr('action', href);
        }

        function editUser(json, href) {
            let data = JSON.parse(json);
            // console.log(data, href)
            $('#modalEdit').modal('show');
            $('#form_edit').attr('action', href);
            $('input[name=name]').val(data.name);
            $('input[name=email]').val(data.email);
            $('select[name=role]').val(data.role);
        }

        function deleteJenisBarang(json, href) {
            const data = JSON.parse(json);
            $('#modalHapus').modal('show');
            $('#form_delete').attr('action', href);
        }

        function editJenisBarang(json, href) {
            let data = JSON.parse(json);
            console.log(data, href)
            $('#modalEdit').modal('show');
            $('#form_edit').attr('action', href);
            $('input[name=nama_jenis]').val(data.nama_jenis);
        }

        function deleteBarang(json, href) {
            const data = JSON.parse(json);
            $('#modalHapus').modal('show');
            $('#form_delete').attr('action', href);
        }

        function editBarang(json, href) {
            let data = JSON.parse(json);
            console.log(data, href)
            $('#modalEdit').modal('show');
            $('#form_edit').attr('action', href);
            $('input[name=nama_barang]').val(data.nama_barang);
            $('input[name=id_jenis]').val(data.id_jenis);
            $('input[name=stock]').val(data.stock);
            $('input[name=harga]').val(data.harga);
            $('input[name=description]').val(data.description);
        }
    </script>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500,
        })
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('success') }}',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
</body>

</html>
