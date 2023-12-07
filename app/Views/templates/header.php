<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?? 'KIP Web' ?></title>

    <!-- Custom fonts for this template-->
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables CSS dan JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .editable.active {
        background-color: #f8d7da;
        /* Ganti warna latar belakang sesuai keinginan Anda */
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class=""></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin KIP </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider 

            <!-- Divider -->
            <hr class=" sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Dashboard</span>
                </a>
                <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Dashboard:</h6>
                        <a class="collapse-item" href="buttons.html">Proses</a>
                        <a class="collapse-item" href="/hasil">Hasil</a>
                    </div>
                </div> -->
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/tambah-periode">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Tambah Periode</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/hasil">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Hasil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->
        <!-- Main Content -->
        <div id="content" class="w-100 pt-5">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- End of Topbar -->
                <?php
                $session = session();
                if ($session->has('success')) {
                    echo '<div class="alert alert-success">' . $session->getFlashdata('success') . '</div>';
                }
                ?>

                <!-- Content Row -->
                <div class="container-fluid">