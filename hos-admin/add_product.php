 <?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid product_page">
				<!--     start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Add Product</h4></div>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
									<li class="breadcrumb-item active">Add Product</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->
				<form id="product_form">
					<div class="row">
						<div class="card">
							<!-- <div class="header">
								<h4 class="card-title mb-4">Features</h4> </div> -->
							<div class="card-body">
								<div class="d-flex my-4">
									<div class="form-group mx-3  w-100">
										<label for="Title" class="form-label"> Product Name</label>
										<input type="text" class="form-control " id="pro_name" name="pro_name" placeholder="Enter Name">
									</div>
									<div class="form-group  w-100">
										<label for="horizontal-firstname-input">Product Slug</label>
										<input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
									</div>
								</div>

								<div class="d-flex">
									<div class="form-group mx-3 w-100">
									<label class="form-label"> Select Category </label>
										<?php $stmt = $conn->prepare("SELECT * FROM `categories`");
            							$stmt->execute();
            							$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        									?>
											<select class="form-control sel_cat" id="category" name="category" title="Please select Category">
												<option value="">Pick a Category... </option>
												<?php foreach ($data as $data) {
            									?>
													<option value="<?php echo $data['cat_slug']; ?>">
														          <?php echo $data['cat_name']; ?>
													</option>
													<?php } ?>
											</select>
									</div>

									<div class="form-group mx-3 w-100">
												<label>Color</label>
												<input type="text" class="form-control" id="color" name="color" placeholder="Enter Color">
											</div>
								</div>

								<div class="d-flex my-4">
									<div class="form-group mx-3  w-100">
										<label for="Title" class="form-label">Authenticity Guaranteed</label>
										<input type="text" class="form-control " id="pro_name" name="authenticity_guaranteed" placeholder="Enter Authenticity Guaranteed">
									</div>
									<div class="form-group  w-100">
										<label for="horizontal-firstname-input">In Stock & Ready to ship</label>
										<input type="text" class="form-control" id="slug" name="ready_to_ship" placeholder="Enter In Stock & Ready to ship">
									</div>
								</div>

								<div class="d-flex my-4">
									<div class="form-group mx-3  w-100">
										<label for="Title" class="form-label">Returns Accepted</label>
										<input type="text" class="form-control " id="pro_name" name="returns_accepted" placeholder="Enter Returns Accepted">
									</div>
									<div class="form-group  w-100">
										<label for="horizontal-firstname-input">BRAND</label>
										<input type="text" class="form-control" id="slug" name="brand" placeholder="Enter BRAND">
									</div>
								</div>

								<div class="d-flex my-4">
									
								<div class="form-group mx-3  w-100">
								<label class="form-label"> Select Gender </label>
									<select class="form-control sel_cat" id="category" name="category" title="Please select Category">
												<option value="">Select Gender</option>
													<option value="male">Male</option>
													<option value="female">Female</option>
											</select>


								</div>

									<div class="form-group  w-100">
										<label for="horizontal-firstname-input">Set Release Date</label>
										<input type="text" class="form-control" name="release_date" value="Set Release Date" id="datetimepicker">
									</div>
								
								</div>
								
								<div class="d-flex">	
								<div class="form-group  w-100">
										<label for="horizontal-firstname-input" class="col-form-label">Description</label>
										<textarea name="description" class="form-control" id="" name="description" cols="15" rows="5"></textarea>
								</div>
										
								
									<div class="form-group w-100 m-5">
									<div class="blog-img-box" data-toggle="modal" data-target="#exampleModal"> <img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png" alt="feature click image">
										<h5>Set Feature Image</h5> </div>
										<input type="hidden" class="image_id" name="img_id"/> </div>
										<div class="float-right">
											<div class="set_images text-center"> <img src="" alt="" class="image_path"> </div>
										</div>
									</div>

									<div class="row" id="forAppend">
										
										<div class="col-sm-3">
											<div class="form-group">
											<label>Size</label>
												<input type="text" class="form-control" id="size" name="size[]" placeholder="Enter Size">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<label>Price</label>
												<input type="text" class="form-control" id="price" name="price[]" placeholder="Enter Price">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="Title" class="form-label">Discount Price</label>
												<input type="text" class="form-control " id="d_price" name="d_price[]" placeholder="Enter Discount Price">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="submit-btn">
												<input type="button" class="post-btn" value="Add More" onclick="appendProductsize()">
                                            </div>
										</div>
									</div>



							</div>								
				<div class="submit-btns clearfix d-flex">           
                <input type="hidden" name="btn" value="addProduct">
                <input type="submit" class="post-btn float-left ml-4" name="blog_publish" value="Publish">
                <!-- <button class="discard-btn" type="submit"> <i class="fa fa-trash" aria-hidden="true"></i>Discard</button> -->
                </div>
				
     
							</div>
						</div>
					</div>
					<!-- end card body -->
				</form>
			</div>
			<!-- end card -->
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
	</div>
	<!-- container-fluid -->
	</div>
	<!-- End Page-content -->
	<script>
	function blog_img_pathUrl(input) {
		$('#blog-img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
	}
	</script>
	<?php
    include('include/footer.php');
						}else{
	echo "<script>window.location='http://localhost/admin/index.php'</script>";
	}
 ?>