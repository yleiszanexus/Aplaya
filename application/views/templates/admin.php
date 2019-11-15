<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
	<title><?= $title ?></title>
	<link href="<?= base_url('assets/node_modules/toast-master/css/jquery.toast.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style/style.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-confirm/jquery-confirm.min.css') ?>">
	<?php if(isset($css)){
		foreach ($css as $key => $cssextra) {
			echo '<link rel="stylesheet" type="text/css" href="'. base_url('assets/') . $cssextra . '">';
		}
	}?>
</head>
<body class="horizontal-nav skin-default fixed-layout boxed">
	<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite admin</p>
    </div>
</div>
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url('admin') ?>">
                    <b>
                        <img src="<?= base_url('assets/images/logo-icon.png') ?>" alt="logo" class="dark-logo" />
                        <img src="<?= base_url('assets/images/logo-light-icon.png') ?>" alt="logo" class="light-logo" />
                    </b>
					<span class="hidden-sm-down">
                     <img src="<?= base_url('assets/images/logo-text.png') ?>" alt="logo" class="dark-logo" />
                     <img src="<?= base_url('assets/images/logo-light-text.png') ?>" class="light-logo" alt="logo" />
                 	</span>
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-bell"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have N new reservation</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all reservations</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/images/users/') . (($user->photo) ? $user->photo : 'no-profile.png') ?>" alt="user" class=""> <span class="hidden-md-down"><?= $this->session->userdata('user')->firstname ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <a href="<?= base_url('admin/profile') ?>" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <a href="<?= base_url('admin/logout') ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="<?= base_url('admin') ?>" aria-expanded="false"><img src="<?= base_url('assets/images/users/1.jpg') ?>" alt="user-img" class="img-circle"><span class="hide-menu"><?= $this->session->userdata('user')->firstname . ' ' . $this->session->userdata('user')->lastname ?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="<?= base_url('admin/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">--- PERSONAL</li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="index.html">Minimal </a></li>
                            <li><a href="index2.html">Analytical</a></li>
                            <li><a href="index3.html">Demographical</a></li>
                            <li><a href="index4.html">Modern</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout"></i><span class="hide-menu">Rooms</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?= base_url('admin/roommanagement'); ?>">Rooms</a></li>
                            <li><a href="<?= base_url('admin/amenitiesmanagement'); ?>">Amenities</a></li>
                            <li><a href="app-calendar.html">Gallery</a></li>
                        </ul>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= base_url('admin/usermanagement') ?>" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Users</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

	<?= $content ?>

	    <footer class="footer">
	        © 2019 Eliteadmin by themedesigner.in
	    </footer>
	</div>
	<script src="<?= base_url('assets/node_modules/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/popper/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/toast-master/js/jquery.toast.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/toast-master/js/jquery.toast.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-confirm/jquery-confirm.min.js') ?>"></script>
	<?php if(isset($js)){
		foreach($js as $key => $jsextra){
			echo '<script type="text/javascript" src="'. $jsextra .'"></script>';
		}
	}?>
</body>
</html>