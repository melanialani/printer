<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/assets/img/apple-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/assets/img/printer.png'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $page_title ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/bootstrap.min.css'); ?>" />

    <!-- Animation library for notifications   -->
    <!-- <link href="assets/css/animate.min.css" rel="stylesheet"/> -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/animate.min.css'); ?>" />

    <!--  Paper Dashboard core CSS    -->
    <!-- <link href="assets/css/paper-dashboard.css" rel="stylesheet"/> -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/paper-dashboard.css'); ?>" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/demo.css'); ?>" />

    <!--  Fonts and icons     -->
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'> -->
    <!-- <link href="assets/css/themify-icons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/themify-icons.css'); ?>" />

    <!--  DataTables     -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/datatables.min.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/DataTables-1.10.18/css/jquery.dataTables.css'); ?>"/>
    <script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js'); ?>"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= base_url(); ?>" class="simple-text">
                    Printing Offset
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?= site_url('login/dashboard'); ?>">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('user'); ?>">
                        <i class="ti-user"></i>
                        <p>Users Management</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('referensi'); ?>">
                        <i class="ti-view-list-alt"></i>
                        <p>Referensi</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('barang'); ?>">
                        <i class="ti-archive"></i>
                        <p>Product Management</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-files"></i>
                        <p>Upload File</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-receipt"></i>
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-email"></i>
                        <p>Messages</p>
                    </a>
                </li>
            </ul>
            
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= $page_title ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <i class="ti-search"></i>
                                <p>Search</p>
                            </a>
                        </li>
                        <?php if (!empty($_SESSION['printer']['loggedin'])) { ?>
                        <li>
                            <a href="<?= site_url('login/logout'); ?>">
                                <p>Logout</p>
                            </a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="<?= site_url('login'); ?>">
                                <p>Login</p>
                            </a>
                        </li>
                        <?php } ?>                    
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>Notifications</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                    </ul>

                </div>
            </div>
        </nav>