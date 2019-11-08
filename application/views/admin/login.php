<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite admin</p>
    </div>
</div>
<section id="wrapper">
    <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="login_user" action="<?= base_url('admin/logincheck') ?>" method="post">
                    <h3 class="text-center m-b-20">Login</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control pl-3" type="text" name="email" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control pl-3" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-dark btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>