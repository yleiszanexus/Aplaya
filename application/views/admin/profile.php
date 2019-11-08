<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Profile</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="<?= base_url('assets/images/users/') . (($user->photo) ? $user->photo : 'no-profile.png') ?>" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10"><?= $user->firstname . ' ' . $user->lastname ?></h4>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> 
                    	<small class="text-muted">Email address </small>
                        <h6><?= $user->email ? $user->email : ' - - - ' ?></h6>
                        <small class="text-muted p-t-30 db">Contact</small>
                        <h6><?= $user->contact ? $user->contact : ' - - - ' ?></h6>
                        <small class="text-muted p-t-30 db">Address</small>
                        <h6><?= $user->address ? $user->address : ' - - - ' ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile Settings</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Password Settings</a> </li>
                    </ul>
                    <div class="tab-content">
                            <div class="container px-4 pt-3">
                                <?php foreach (validation_errors_array() as $key => $errors): ?>
                                <div class="alert alert-danger alert-rounded"> 
                                    <i class="fa fa-warning"></i> <?= $errors ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span> 
                                    </button>
                                </div>
                                <?php endforeach;?>
                                <?= display_flash($this->session->flashdata()); ?>
                            </div>
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <form enctype="multipart/form-data" class="form-horizontal form-material" action="<?= base_url('admin/profile/') . $user->id ?>" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Display Photo</label>
                                        <div class="col-md-12">
                                            <input type="file" name="photo" />
                                            <input type="hidden" name="prev_photo" value="<?= $user->photo ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="<?= $user->firstname ? $user->firstname : 'firstname' ?>" class="form-control form-control-line" name="firstname" value="<?= $user->firstname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="<?= $user->lastname ? $user->lastname : 'lastname' ?>" class="form-control form-control-line" name="lastname" value="<?= $user->lastname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="<?= $user->email ?>" class="form-control form-control-line" name="email" value="<?= $user->email ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Contact</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="<?= $user->contact ? $user->contact : 'contact number' ?>" class="form-control form-control-line" value="<?= $user->contact ?>" name="contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="address"><?= $user->address ? $user->address : ' - - - ' ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-dark">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                            <div class="card-body">
                            	<form class="form-horizontal form-material" method="post" action="<?= base_url('admin/profile/') . $user->id . '/1'; ?>">
                                    <div class="form-group">
                                        <label class="col-md-12">Old Password</label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="*old password" class="form-control form-control-line" name="old-pass">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="*new password" class="form-control form-control-line" name="new-pass">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Confirm New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" placeholder="*confirm new password" class="form-control form-control-line" name="con-new-pass">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-dark">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>