
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
	img#cimg2{
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
</style>
<div class="col-lg-12">
	<div class="card card-outline rounded-0 card-teal">
		<div class="card-header">
			<h5 class="card-title">EPR Settings</h5>
			<!-- <div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-navy new_department" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div> -->
		</div>
		<div class="card-body">
		<form action="process.php" id="system-frm">
				<div id="msg" class="form-group"></div>
				<div class="box1">
                                <div class="form-group">
                                    <label for="month" class="control-label">Choose Year</label>
                                    <input type="text" class="form-control form-control-sm" name="current_yr" id="current_yr" value="">
                               
								</div>
                </div>
               
				<div class="box1">
				<div class="form-group">
					<label for="name" class="control-label">Financial Year</label>
					<input type="text" class="form-control form-control-sm" name="finance_yr" id="finance_yr" value="">
				</div>
				</div>
				<div class="box1">
				<div class="form-group col-lg-4">
					<label for="short_name" class="control-label">Percent</label>
					<input type="text" class="form-control form-control-sm" name="percent" id="percent" value="">
					
				</div>
				</div>
				
			<!-- <div class="form-group">
				<label for="" class="control-label">Welcome Content</label>
	             <textarea name="content[welcome]" id="" cols="30" rows="2" class="form-control summernote">< ?php echo  is_file(base_app.'welcome.html') ? file_get_contents(base_app.'welcome.html') : "" ?></textarea>
			</div>
			<div class="form-group">
				<label for="" class="control-label">About Us</label>
	             <textarea name="content[about]" id="" cols="30" rows="2" class="form-control summernote">< ?php echo  is_file(base_app.'about.html') ? file_get_contents(base_app.'about.html') : "" ?></textarea>
			</div> -->
			
			</form>
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="system-frm">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
