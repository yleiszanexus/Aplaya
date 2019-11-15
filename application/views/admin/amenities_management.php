<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Amenities Management</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info m-l-15" data-toggle="modal"  data-target=".add-new-amenity"><i class="fa fa-plus-circle"></i> Create New</button>
                </div>
            </div>
        </div>
        <div class="row">
	    	<div class="col-lg-12">
	    		<div class="card">
                	<div class="card-body">
                		<h5>
                			<i class="ti-layers"></i> Amenities
                		</h5>
                	</div>
                	<hr class="m-0">
	                <div class="card-body">
	                	<table id="amenities_table" class="display nowrap table table-hover table-responsive-md table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>no image</td>
                                    <td>Free wifi</td>
                                    <td>Lorem ipsum sit amet dolor consectitar</td>
                                    <td>
                                    	<button class="btn btn-sm btn-primary btn-circle text-white action-edit" rel="tooltip" data-toggle="modal"  data-target=".edit-amenity" data-id="<?= $user->id ?>" data-original-title="Edit user"><i class="fas fa-pencil-alt"></i></button>
                                    	<button class="btn btn-sm btn-danger btn-circle text-white action-remove" rel="tooltip" data-original-title="Remove user" data-id="<?= $user->id ?>"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<!-- Start Modal Add New Amenity -->
<div class="modal add-new-amenity" tabindex="-1" role="dialog" aria-labelledby="modalAddnew" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="preloader">
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="modalAddnew">Add New Amenity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('admin/amenitiesaddmanagement') ?>" method="post" enctype="multipart/form-data" id="add_new_amenity">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Display photo</label>
                                <div class="input-group mb-3">
                                <input type="file" id="input-file-disable-remove-add" class="dropify" data-show-remove="false" data-default-file="" name="photo" accept="image/*"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="name"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="desc"><i class="ti-receipt"></i></span>
                                    </div>
                                    <input type="text" name="desc" class="form-control" placeholder="Description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-action" type="submit" class="btn btn-dark waves-effect text-left">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add New Amenity -->


<!-- Start Modal Edit Amenity -->
<div class="modal edit-amenity" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="preloader">
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="modalEdit">Edit Amenity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('admin/usermanagement') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Display photo</label>
                                <div class="input-group mb-3">
                                <input type="file" id="input-file-disable-remove-edit" class="dropify" data-show-remove="false" data-default-file="" name="photo" accept="image/*"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="name"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="desc"><i class="ti-receipt"></i></span>
                                    </div>
                                    <input type="text" name="desc" class="form-control" placeholder="Description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-action" type="submit" class="btn btn-dark waves-effect text-left">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Edit Amenity -->