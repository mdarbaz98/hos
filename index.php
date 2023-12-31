
<?php 
include('hos-admin/include/config.php');
include("./include/header.php") ?>
<section class="home__page">
    <div class="banner__section">
        <div class="banner-carousel owl-carousel">

        <?php
        $product_slider=$conn->prepare("SELECT * FROM home_slider order by id DESC");
        $product_slider->execute();
        while ($row = $product_slider->fetch(PDO::FETCH_ASSOC)){

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

        ?>
            <div class="item">
                <div class="card">
                    <div class="sub__heading"><?php echo $row['heading_slogan'] ?></div>
                    <div class="heading">
                        <?php echo $row['heading_title'] ?>
                    </div>
                    <p><?php echo $row['heading_para'] ?></p>
                    <button><a class="text-white" href="<?php echo $row['heading_link'] ?>">SHOP NOW</a></button>
                </div>
                <img src="hos-admin/<?php echo $image ?>" alt="<?php echo $image ?>">
            </div>
        <?php } ?>

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
                 $product=$conn->prepare("SELECT * FROM product order by id DESC limit 8");
                 $product->execute();
                 $i=0;
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                        $pro_id= $row['id'];
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

                        $stmt_product_price = $conn->prepare("SELECT * FROM `product_price` WHERE status=1 AND product_id=?");
                        $stmt_product_price->execute([$pro_id]);
                        $i=1;
                        $price_data = $stmt_product_price->fetchAll(PDO::FETCH_ASSOC);
                        $price= $price_data[0]['price'];             
                        $dprice= $price_data[0]['d_price'];             

                ?>	<a href="<?php echo $row['slug'] ?>">    
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="hos-admin/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                             <?php if($dprice==0){ ?>   
                             <?php }else{ ?>
                                INR <?php echo number_format($dprice);?>
                            <?php } ?>   
                        </div>
                            <div class="p__price">
                                INR <?php echo number_format($price);?>
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
                    Yeezy 350
                </div>
                <div class="P__1 p__carousel owl-carousel">
                <?php
                 $product=$conn->prepare("SELECT * FROM product  WHERE category='yeezy-350' order by id asc limit 8");
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
                        // $stmt_product_price = $conn->prepare("SELECT * FROM `product_price` WHERE status=1 AND product_id=?");
                        // $stmt_product_price->execute([$pro_id]);
                        // $i=1;
                        // $price_data = $stmt_product_price->fetchAll(PDO::FETCH_ASSOC);
                        // $price= $price_data[0]['price'];             
                        // $dprice= $price_data[0]['d_price'];             

                ?>	   <a href="<?php echo $row['slug'] ?>">  
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="hos-admin/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <!-- <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo number_format($dprice);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo number_format($price);?>
                            </div>
                        </div> -->
                    </div>
                    </a>
            <?php } ?>


                </div>
            </div>
        </div>
        <div class="products__section py-5">
            <div class="owl__slider">
                <div class="slider__heading">
                Jordan 1 High
                </div>
                <div class="P__1 p__carousel owl-carousel">
                <?php
                 $product=$conn->prepare("SELECT * FROM product WHERE category='jordan-1-high' order by id DESC");
                 $product->execute();
                 $i=0;
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                        $pro_id= $row['id'];
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
                        // $stmt_product_price = $conn->prepare("SELECT * FROM `product_price` WHERE status=1 AND product_id=?");
                        // $stmt_product_price->execute([$pro_id]);
                        // $i=1;
                        // $price_data = $stmt_product_price->fetchAll(PDO::FETCH_ASSOC);
                        // $price= $price_data[0]['price'];             
                        // $dprice= $price_data[0]['d_price'];     

                ?>	    <a href="<?php echo $row['slug'] ?>"> 
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="hos-admin/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <!-- <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo number_format($dprice);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo number_format($price);?>
                            </div>
                        </div> -->
                    </div>
                    </a>
            <?php } ?>
                </div>
            </div>
        </div>
        <div class="products__section py-5">
            <div class="owl__slider">
                <div class="slider__heading">
                SB Dunk
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
                        // $stmt_product_price = $conn->prepare("SELECT * FROM `product_price` WHERE status=1 AND product_id=?");
                        // $stmt_product_price->execute([$pro_id]);
                        // $i=1;
                        // $price_data = $stmt_product_price->fetchAll(PDO::FETCH_ASSOC);
                        // $price= $price_data[0]['price'];             
                        // $dprice= $price_data[0]['d_price'];   
                ?>	<a href="<?php echo $row['slug'] ?>"> 
                    <div class="p__card">
                        <i class="wishlist fa-regular fa-heart"></i>
                        <img src="hos-admin/<?php echo $image ?>" alt="">
                        <div class="p__name"><?php echo $row['product_name'] ?></div>
                        <div class="P__desc">
                            <?php //echo $row['category'] ?>
                        </div>
                        <div class="p__cat">
                            "<?php echo $row['category'] ?>"
                        </div>
                        <!-- <div class="price__part d-flex gap-3">
                        <div class="p__price cross">
                            $ <?php echo number_format($dprice);?>
                        </div>
                            <div class="p__price">
                                $ <?php echo number_format($price);?>
                            </div>
                        </div> -->
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