<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Room Management</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </div>
            </div>
        </div>
        <div class="row">
	    	<div class="col-lg-12">
	    		<div class="card">
                	<div class="card-body">
                		<h5>
                			<i class="ti-layers"></i> Rooms
                		</h5>
                	</div>
                	<hr class="m-0">
	                <div class="card-body">
	                	<table id="rooms_table" class="display nowrap table table-hover table-responsive-md table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Promo</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Promo</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            	<?php foreach($rooms as $key => $room): ?>
                                <tr>
                                    <td><?= $room->name ?></td>
                                    <td><?= $room->description ?></td>
                                    <td><?= $room->price ?></td>
                                    <td><?= ($room->promo_price) ? $room->promo_price : 'not avalable' ?></td>
                                    <td><img src="<?= base_url('assets/images/rooms/') . ($room->photo) ? $room->photo : 'no-image.jpg' ?>" class="table-img"></td>
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