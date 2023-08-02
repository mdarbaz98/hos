<?php
        include('hos-admin/include/config.php');
        $product_slug = $_GET['slug'];
        $product=$conn->prepare("SELECT * FROM product WHERE slug ='$product_slug'");
        $product->execute();
        while ($row = $product->fetch(PDO::FETCH_ASSOC)){

            $product_name= $row['product_name'];
            $pro_id= $row['id'];
            $category= $row['category'];
            $description= $row['description'];
            $price= $row['prc'];
            $product_name= $row['product_name'];
            $product_name= $row['product_name'];

            if($price>20000){
                    $shipping_charge=0;
            }else{
                $shipping_charge=299;
            }
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";

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
        }




    include("./include/header.php") ?>

        <section class="product__page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single_product_box">
                            <p><span>HOUSE OF SNEAKERS</span> | <span>HOUSE OF SNEAKERS</span> | <span>HOUSE OF SNEAKERS</span></p>
                        <div class="product_carousel">
                            <div class="product owl-carousel">
                                <img src="https://admin.houseofsneakers.in/<?php echo $image ?>" alt="<?php echo $image ?>">
                            </div>
                        </div>
                        <div class="desc ellipses"><?php echo $description ?></div>
                        <a class="read_more">READ MORE</a>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="product_side_bar">
                            <div class="category">
                                <?php
                                $category_remove = str_replace('-', ' ', $category);
                                echo $category_remove = ucwords($category_remove);?>
                            </div>
                            <div class="name">
                                <?php echo $product_name; ?>
                            </div>
                            <div class="price">
                                INR <span class="sizeProduct_price">00</span> & Up
                            </div>
                            <div class="tag_line">
                                Duties & Taxes included
                            </div>
                            <div class="side_card">
                                <div class="header">
                                    <img src="images/home/flag.jpg" alt="">
                                    <p>UK Sizes Displayed</p>
                                </div>
                                <div class="accordion size_accordion" id="accordionExample">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Select Size- UK Mens
                                        </button>
                                      </h2>
                                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          <ul>
                                            <?php
                                                            $stmt_product_price = $conn->prepare("SELECT * FROM `product_price` WHERE status=1 AND product_id=?");
                                                            $stmt_product_price->execute([$pro_id]);
                                                            while($price_data = $stmt_product_price->fetch(PDO::FETCH_ASSOC)){
                                            
                                            ?>

                                            <li onclick="getSizeprice(this)" data-size="<?php echo $price_data['size'] ?>" data-price="<?php echo $price_data['price'] ?>" data-dprice="<?php echo $price_data['d_price'] ?>">
                                                <span><?php echo $price_data['size'] ?></span>
                                                <span>INR <?php echo $price_data['price'] ?></span>
                                            </li>
                                            <?php } ?>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                            </div>
                            <a class="add_to_cart" href="javascript:void(0)" id="setaddProductToCart" onclick="addProductToCart(this)" data-image="<?php echo $image ?>" data-name="<?php echo $product_name ?>"
                            data-category="<?php echo $category ?>"data-price="<?php echo $price ?>" data-size="<?php echo 5.5 ?>" data-discounted_price="<?php echo $price ?>" data-shipping_charge="<?php echo $shipping_charge ?>"  >ADD TO CART</a>
                        </div>
                        <div class="side_card">
                            <div class="accordion desc_accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Authenticity Guaranteed
                                    </button>
                                  </h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    In Stock & Ready to ship
                                    </button>
                                  </h2>
                                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Returns Accepted
                                    </button>
                                  </h2>
                                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 product_main_desc">

                        <div class="row">
                            <div class="col">
                                <div class="cat">
                                Brand
                                </div>
                                <p>Jordan</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                Color
                                </div>
                                <p>Black</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                    Gender
                                </div>
                                <p>Male</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                Release Date
                                </div>
                                <p>September 2, 2023</p>
                            </div>
                        </div>
                </div>
                <div class="col-12">
                    <div class="products__section py-5">
                        <div class="owl__slider">
                            <div class="slider__heading">
                                New Releases
                            </div>
                            <div class="P__1 p__carousel owl-carousel">
                                
                            <?php
                 $product=$conn->prepare("SELECT * FROM product WHERE category='$category' order by id ASC");
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
                        <div class="p__price">
                            $ <?php echo $formattedPrice = number_format($price);?>
                        </div>
                    </div>
                    </a>
            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("./include/footer.php") ?>
