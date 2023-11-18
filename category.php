<?php 
 include('hos-admin/include/config.php');
 include("include/header.php") ?>

<h1><?php $category = $_GET['cat']; ?></h1>
<div class="category__products__container row">
<div class="col-lg-3 col-12">
                <div class="side__bar__filter p-3">
                    <div class="search__wrapper">
                        <input type="text" placeholder="Search">
                    </div>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                              Category Shoes
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <!-- another accordion  -->
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-heading1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
                              Price
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading1">
                            <div class="accordion-body">
                                <input type="range" class="form-range" id="customRange1">
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-heading2">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="true" aria-controls="panelsStayOpen-collapse2">
                              Shoes size
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading2">
                            <div class="accordion-body">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      Select Type
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="#">Men</a></li>
                                      <li><a class="dropdown-item" href="#">Women</a></li>
                                    </ul>
                                    <p>Shoes Sizes</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button class="size-btn">12</button>
                                        <button class="size-btn">12</button>
                                        <button class="size-btn">12</button>
                                        <button class="size-btn">12</button>
                                    </div>
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-heading3">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="true" aria-controls="panelsStayOpen-collapse3">
                              Shoes Color
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading3">
                            <div class="accordion-body">
                                <div>
                                    <button class="size-btn w-100 d-flex align-items-center gap-3 px-2 mb-2"><span class="color" style="background-color: black;" ></span>Black</button>
                                    <button class="size-btn w-100 d-flex align-items-center gap-3 px-2 mb-2"><span class="color" style="background-color: black;" ></span>Black</button>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
    <div class="col-9">
                        <div class="products__section py-5">
                            <div class="owl__slider">
                                <div class="slider__heading">
                                <?php echo $category ?>
                                </div>
                                <div class="P__1 p__carousel owl-carousel">
                                    
                                                    <?php
                                        $product=$conn->prepare("SELECT * FROM product WHERE category='$category' order by id DESC");
                                        $product->execute();
                                        $i=0;
                                            while ($row = $product->fetch(PDO::FETCH_ASSOC)){
                                                $pro_id=$row['id'];
                                                $stmt_product_price = $conn->prepare("SELECT * FROM `product_price` WHERE status=1 AND product_id=?");
                                                $stmt_product_price->execute([$pro_id]);
                                                $price_data = $stmt_product_price->fetchAll(PDO::FETCH_ASSOC);
                                                if(empty($price_data[0]['price'])){
                                                    $price=0;
                                                }else{
                                                    $price=$price_data[0]['price'];
                                                }
    
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
                                                    <img src="hos-admin/<?php echo $image ?>" alt="">
                                                    <div class="p__name"><?php echo $row['product_name'] ?></div>
                                                    <div class="P__desc">
                                                        <?php //echo $row['category'] ?>
                                                    </div>
                                                    <div class="p__cat">
                                                        "<?php echo $row['category'] ?>"
                                                    </div>
                                                    <div class="p__price">
                                                        INR <?php echo $formattedPrice = number_format($price);?>
                                                    </div>
                                                </div>
                                                </a>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
<?php include("include/footer.php") ?>