<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">User Management</h4>
            </div>
        </div>
	    <div class="row">
	    	<div class="col-lg-4 col-xlg-3 col-md-12">
	    		<div class="card">
                	<div class="card-body">
                		<h5>
                			<i class="ti-plus"></i> Add User
                		</h5>
                	</div>
                	<hr class="m-0">
	                <div class="card-body">
                        <?php foreach (validation_errors_array() as $key => $errors): ?>
                        <div class="alert alert-danger alert-rounded"> 
                            <i class="fa fa-warning"></i> <?= $errors ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span> 
                            </button>
                        </div>
                        <?php endforeach;?>
                        <?= display_flash($this->session->flashdata()); ?>
	                	<form enctype="multipart/form-data" class="form p-t-5" action="<?= base_url('admin/usermanagement/add') ?>" method="post">
                            <div class="form-group">
                                <label>Email address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="role"><i class="ti-key"></i></span>
                                    </div>
                                    <select class="form-control custom-select" name="role" ria-label="role" aria-describedby="role">
                                        <?php foreach ($roles as $key => $user_role): ?>
                                        	<option value="<?= $user_role->id ?>"><?= ucfirst($user_role->type) ?></option>
                                    	<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
	                		<div class="form-group">
                                <label>First Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="first_name"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" aria-label="first_name" aria-describedby="first_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="last_name"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" aria-label="last_name" aria-describedby="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="contact"><i class="ti-mobile"></i></span>
                                    </div>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact" aria-label="contact" aria-describedby="contact">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="address"><i class="ti-location-pin"></i></span>
                                    </div>
                                    <input type="text" name="address" class="form-control" placeholder="Address" aria-label="address" aria-describedby="address">
                                </div>
                            </div>
                            <div class="form-group">
                            	<button class="btn btn-dark">Add</button>
                            </div>
	                	</form>
	                </div>
	            </div>
	    	</div>
	    	<div class="col-lg-8 col-xlg-9 col-md-12">
	            <div class="card">
	            	<div class="card-body">
	            		<h5><i class="ti-layout-accordion-merged"></i> Users </h5>
	                </div>
	                <hr class="m-0">
	                <div class="card-body">
	                	<table id="users_table" class="display nowrap table table-hover table-responsive-md table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php foreach ($users as $key => $user): ?>
                                <tr>
                                    <td><?= $user->firstname . ' ' . $user->lastname ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->type ?></td>
                                    <td><?= $user->contact ?></td>
                                    <td><?= $user->address ?></td>
                                    <td>
                                    	<button class="btn btn-sm btn-primary btn-circle text-white action-edit" rel="tooltip" data-toggle="modal"  data-target=".bs-example-modal-lg" data-id="<?= $user->id ?>" data-original-title="Edit user"><i class="fas fa-pencil-alt"></i></button>
                                    	<button class="btn btn-sm btn-danger btn-circle text-white action-remove" rel="tooltip" data-original-title="Remove user" data-id="<?= $user->id ?>"><i class="fas fa-trash-alt"></i></button>
                                    	<button class="btn btn-sm btn-info btn-circle text-white action-view action-view" rel="tooltip" data-toggle="modal"  data-target=".bs-example-modal-lg" data-original-title="Details" data-id="<?= $user->id ?>"><i class=" fas fa-bars"></i></button>
                                    </td>
                                </tr>
                            	<?php endforeach; ?>
                            </tbody>
                        </table>
	                </div>
	            </div>
	    	</div>
	    </div>
    </div>
</div>
<!-- modal -->
<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="preloader">
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('admin/usermanagement') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Display photo</label>
                                <div class="input-group mb-3">
                                <input type="file" id="input-file-disable-remove" class="dropify" data-show-remove="false" data-default-file="" name="photo" accept="image/*"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="prev_photo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="role"><i class="ti-key"></i></span>
                                    </div>
                                    <select class="form-control custom-select" name="role" ria-label="role" aria-describedby="role">
                                        <?php foreach ($roles as $key => $user_role): ?>
                                            <option value="<?= $user_role->id ?>"><?= ucfirst($user_role->type) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">  
                            <div class="form-group">
                                <label>First Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="first_name"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" aria-label="first_name" aria-describedby="first_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="last_name"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" aria-label="last_name" aria-describedby="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="contact"><i class="ti-mobile"></i></span>
                                    </div>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact" aria-label="contact" aria-describedby="contact">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <div class="input-group mb-3">
                                    <textarea name="address" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-action" type="submit" class="btn btn-dark waves-effect text-left">Update details</button>
                </div>
            </form>
        </div>
    </div>
</div>

