<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <link href="<?= base_url('assets/css/style/style.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/pages/error-pages.css') ?>" rel="stylesheet">
</head>

<body class="horizontal-nav boxed skin-megna fixed-layout">
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
                <?php 
                $user = $this->session->userdata('user')->id;
                if($user == 3){
                	$link = base_url();
                }else{
                	$link = base_url('admin');
                }
                ?>
                <a href="<?= $link ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
            
        </div>
    </section>
    <script src="<?= base_url('assets/node_modules/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/popper/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/waves.js') ?>"></script>
</body>

</html>