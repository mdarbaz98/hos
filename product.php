<?php
        include('hos-admin/include/config.php');
        $product_slug = $_GET['slug'];
        $product=$conn->prepare("SELECT * FROM product WHERE slug ='$product_slug'");
        $product->execute();
        while ($row = $product->fetch(PDO::FETCH_ASSOC)){

            $product_name= $row['product_name'];
            $category= $row['category'];
            $description= $row['description'];
            $price= $row['prc'];
            $product_name= $row['product_name'];
            $product_name= $row['product_name'];
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
                                <img src="http://admin.houseofsneakers.in/<?php echo $image ?>" alt="<?php echo $image ?>">
                            </div>
                        </div>
                        <div class="desc"><?php echo $description ?></div>
                        <a class="read_more" href="">READ MORE</a>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="product_side_bar">
                            <div class="category">
                                <?php echo $category ?>
                            </div>
                            <div class="name">
                                <?php $product_name; ?>
                            </div>
                            <div class="product_short_desc mb-3">
                                “Panda- Black/ White”
                            </div>
                            <div class="price">
                                INR <span> <?php echo $formattedPrice = number_format($price);?></span> & Up
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
                                          
                                        </div>
                                      </div>
                                    </div>
                            </div>
                            <a class="add_to_cart" href="">ADD TO CART</a>
                        </div>
                        <div class="view__line d-flex">
                            <span>🔥</span>
                            <p><span>7048</span>views in the past day</p>
                        </div>
                        <div class="side_card">
                            <div class="accordion desc_accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                      Accordion Item #1
                                    </button>
                                  </h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                      Accordion Item #2
                                    </button>
                                  </h2>
                                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                      Accordion Item #3
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
                                    Gender
                                </div>
                                <p>dd1038787f</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                    Gender
                                </div>
                                <p>dd1038787f</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                    Gender
                                </div>
                                <p>dd1038787f</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                    Gender
                                </div>
                                <p>dd1038787f</p>
                            </div>
                            <div class="col">
                                <div class="cat">
                                    Gender
                                </div>
                                <p>dd1038787f</p>
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
