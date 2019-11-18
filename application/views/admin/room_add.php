<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add New Room</h4>
            </div>
        </div>
	    <div class="row">
	    	<div class="col-lg-8 col-xlg-3 col-md-12">
	    		<div class="card">
                	<div class="card-body">
                		<h5>
                			<i class="ti-plus"></i> Add Room
                		</h5>
                	</div>
                	<hr class="m-0">
                	<div class="card-body">
                		<form class="form-material mt-0">
                			<div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-line" placeholder="Room name"> 
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control form-control-line" placeholder="Price"> 
                            </div>
                            <div class="form-group">
                                <label>Promo</label>
                                <input id="is_sale" type="checkbox" class="js-switch" data-color="#f62d51" data-size="small">
                                <input id="sale_input" type="number" class="form-control form-control-line" style="display: none" placeholder="Promo price"> 
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                               	<textarea id="description" rows=""></textarea>
                            </div>
                		</form>
                	</div>
                </div>
            </div>
            <div class="col-lg-4 col-xlg-3 col-md-12">
	    		<div class="card">
                	<div class="card-body">
                		<h5>
                			<i class="ti-clipboard"></i> Amenities
                		</h5>
                	</div>
                	<hr class="m-0">
                	<div class="card-body">
                		<div class="form-group">
                           <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                           		<?php if($amenities):
                           			foreach ($amenities as $key => $amenity):
                   				?>
                                    <option value="<?= $amenity->id ?>"><?= $amenity->name ?></option>
                                <?php endforeach; 
		                        	endif;
		                        ?>
                            </select>
                        </div>
                	</div>
                </div>
                <div class="card">
                	<div class="card-body">
                		<h5>
                			<i class="ti-image"></i> Room photo
                		</h5>
                	</div>
                	<hr class="m-0">
                	<div class="card-body">
                		<div class="form-group">
                			<input type="file" id="room_photo" class="dropify" name="photo" accept="image/*">
                        </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>