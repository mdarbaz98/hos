
<?php 
include('hos-admin/include/config.php');
include("./include/header.php") ?>
<section class="home__page">
    <div class="banner__section">
        <div class="banner-carousel owl-carousel">
            <div class="item">
                <div class="card">
                    <div class="sub__heading mehtab">BLACK AND WHITE mq</div>
                    <div class="heading">
                        Back in Black( and ofc White)
                    </div>
                    <p>The original "Black/White" colorway returns, this time in the fully remastered '85
                        construction.</p>
                    <button><a class="text-white" href="product.html">SHOP NOW</a></button>
                </div>
                <img src="images/home/banner1.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="px-4 px-lg-0">
        <div class="products__section py-5 ">
            <div class="owl__slider">
                <div class="slider__heading">
                    New Releases
                </div>
                <div class="P__1 p__carousel owl-carousel">

                	 <?php
                 $product=$conn->prepare("SELECT * FROM product  order by id ASC limit 8");
                 $product->execute();
                 $i=0;
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                        
                       // for image                    
                    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
					$stmt_img->execute([$row['img_id']]);
					$img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
					if(!empty($img_data)) {
						$image = $img_data[0]['path']; 
						$alt = $img_data[0]['alt'];
					}else{
                        $image="Not Found";
						$alt="Not Found";
						}
                ?>	<a href="<?php echo $row['slug'] ?>">    
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="http://admin.houseofsneakers.in/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo $formattedPrice = number_format($row['prc']);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo $formattedPrice = number_format($row['prc']);?>
                            </div>
                        </div>
                    </div>
                    </a>
            <?php } ?>
                        

                </div>
            </div>
        </div>
        <div class="products__section py-5">
            <div class="owl__slider">
                <div class="slider__heading">
                    New Releases
                </div>
                <div class="P__1 p__carousel owl-carousel">
                    
                
                
                <?php
                 $product=$conn->prepare("SELECT * FROM product  order by id DESC limit 8");
                 $product->execute();
                 $i=0;
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                        
                       // for image                    
                    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
					$stmt_img->execute([$row['img_id']]);
					$img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
					if(!empty($img_data)) {
						$image = $img_data[0]['path']; 
						$alt = $img_data[0]['alt'];
					}else{
                        $image="Not Found";
						$alt="Not Found";
						}
                ?>	   <a href="<?php echo $row['slug'] ?>">  
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="http://admin.houseofsneakers.in/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo $formattedPrice = number_format($row['prc']);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo $formattedPrice = number_format($row['prc']);?>
                            </div>
                        </div>
                    </div>
                    </a>
            <?php } ?>


                </div>
            </div>
        </div>
        <div class="products__section py-5">
            <div class="owl__slider">
                <div class="slider__heading">
                    New Releases
                </div>
                <div class="P__1 p__carousel owl-carousel">
                <?php
                 $product=$conn->prepare("SELECT * FROM product WHERE category='jordan-1-high' order by id DESC");
                 $product->execute();
                 $i=0;
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                        
                       // for image                    
                    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
					$stmt_img->execute([$row['img_id']]);
					$img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
					if(!empty($img_data)) {
						$image = $img_data[0]['path']; 
						$alt = $img_data[0]['alt'];
					}else{
                        $image="Not Found";
						$alt="Not Found";
						}
                ?>	    <a href="<?php echo $row['slug'] ?>"> 
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="http://admin.houseofsneakers.in/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo $formattedPrice = number_format($row['prc']);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo $formattedPrice = number_format($row['prc']);?>
                            </div>
                        </div>
                    </div>
                    </a>
            <?php } ?>
                </div>
            </div>
        </div>
        <div class="products__section py-5">
            <div class="owl__slider">
                <div class="slider__heading">
                    New Releases
                </div>
                <div class="P__1 p__carousel owl-carousel">
                <?php
                 $product=$conn->prepare("SELECT * FROM product WHERE category='sb-dunk' order by id DESC");
                 $product->execute();
                 $i=0;
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                        
                       // for image                    
                    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
					$stmt_img->execute([$row['img_id']]);
					$img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
					if(!empty($img_data)) {
						$image = $img_data[0]['path']; 
						$alt = $img_data[0]['alt'];
					}else{
                        $image="Not Found";
						$alt="Not Found";
						}
                ?>	<a href="<?php echo $row['slug'] ?>"> 
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="http://admin.houseofsneakers.in/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo $formattedPrice = number_format($row['prc']);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo $formattedPrice = number_format($row['prc']);?>
                            </div>
                        </div>
                    </div>
                    </a>
            <?php } ?>
                </div>
            </div>
        </div>

        <div class="highlighted__section container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="h__card">
                        <img src="images/home/cd0b2a53ba4f41b40a9da7baa728f3d2.jpg" alt="">
                        <div class="desc__div">
                            <span class="cat">JOURNAL</span>
                            <div class="heading">Now Trending: Purple Sneaker Colorways</div>
                            <p class="mb-0">Eight great purple sneakers that should be on your radar this year</p>
                            <a class="text-decoration-underline" href="">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="h__card">
                        <img src="images/home/cd0b2a53ba4f41b40a9da7baa728f3d2.jpg" alt="">
                        <div class="desc__div">
                            <span class="cat">JOURNAL</span>
                            <div class="heading">Now Trending: Purple Sneaker Colorways</div>
                            <p class="mb-0">Eight great purple sneakers that should be on your radar this year</p>
                            <a class="text-decoration-underline" href="">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="highlighted__section container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="h__card">
                        <img src="images/home/cd0b2a53ba4f41b40a9da7baa728f3d2.jpg" alt="">
                        <div class="desc__div">
                            <span class="cat">JOURNAL</span>
                            <div class="heading">Now Trending: Purple Sneaker Colorways</div>
                            <p class="mb-0">Eight great purple sneakers that should be on your radar this year</p>
                            <a class="text-decoration-underline" href="">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="h__card">
                        <img src="images/home/cd0b2a53ba4f41b40a9da7baa728f3d2.jpg" alt="">
                        <div class="desc__div">
                            <span class="cat">JOURNAL</span>
                            <div class="heading">Now Trending: Purple Sneaker Colorways</div>
                            <p class="mb-0">Eight great purple sneakers that should be on your radar this year</p>
                            <a class="text-decoration-underline" href="">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("./include/footer.php") ?>