<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Pusispan</title>
    <link rel="apple-touch-icon" href="<?= base_url('assets/') ?>logolapan.png">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>icon/favicon.ico">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="../../global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/chartist/chartist.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/aspieprogress/asPieProgress.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/jquery-selective/jquery-selective.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>examples/css/dashboard/team.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/formvalidation/formValidation.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>examples/css/forms/validation.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/vendor/dropify/dropify.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>global/vendor/datatables-bootstrap/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>global/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>global/vendor/datatables-responsive/dataTables.responsive.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>global/vendor/datatables-buttons/dataTables.buttons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>global/vendor/summernote/summernote.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="<?= base_url('assets/') ?>global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand navbar-brand-center" href="<?= base_url('Dashboard') ?>">
                <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?= base_url('assets/') ?>logo/logolapan.png" title="Remark">
                <img class="navbar-brand-logo navbar-brand-logo-special" src="<?= base_url('assets/') ?>images/logo-blue.png" title="Remark">
                <span class="navbar-brand-text hidden-xs-down"> Pusispan</span>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">

                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right mr-80">
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                            <span class="avatar avatar-online">
                                <img src="<?= base_url('assets/') ?>img_profile/default.jpg" alt="...">
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                            <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->
            <!-- Site Navbar Seach -->
            <div class="collapse navbar-search-overlap" id="site-navbar-search">
                <form role="search">
                    <div class="form-group">
                        <div class="input-search">
                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="site-search" placeholder="Search...">
                            <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Site Navbar Seach -->
        </div>
    </nav>
    <div class="site-menubar site-menubar-light">
        <div class="site-menubar-body">
            <div>
                <div>
                    <ul class="site-menu" data-plugin="menu">
                        <li class="site-menu-item">
                            <a href="<?= base_url('Dashboard') ?>">
                                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Menu') ?>">
                                <i class="site-menu-icon wb-menu" aria-hidden="true"></i>
                                <span class="site-menu-title">Menu</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Halaman') ?>">
                                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                <span class="site-menu-title">Halaman</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Berita') ?>">
                                <i class="site-menu-icon wb-list" aria-hidden="true"></i>
                                <span class="site-menu-title">Berita</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('kegiatan') ?>">
                                <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                                <span class="site-menu-title">Kegiatan</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('agenda') ?>">
                                <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                                <span class="site-menu-title">Agenda</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Album') ?>">
                                <i class="site-menu-icon wb-gallery" aria-hidden="true"></i>
                                <span class="site-menu-title">Album</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Download') ?>">
                                <i class="site-menu-icon wb-download" aria-hidden="true"></i>
                                <span class="site-menu-title">Download</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('sop') ?>">
                                <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                                <span class="site-menu-title">SOP</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Akses') ?>">
                                <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                                <span class="site-menu-title">Akses Cepat</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Link') ?>">
                                <i class="site-menu-icon wb-link" aria-hidden="true"></i>
                                <span class="site-menu-title">Link Terkait</span>
                            </a>
                        </li>
                        <li class="site-menu-item">
                            <a href="<?= base_url('Identitas') ?>">
                                <i class="site-menu-icon wb-info-circle" aria-hidden="true"></i>
                                <span class="site-menu-title">Identitas</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>