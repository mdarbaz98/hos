<?php 
 include('hos-admin/include/config.php');
 include("include/header.php") ?>

<h1><?php $category = $_GET['cat']; ?></h1>
<div class="col-12">
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
<?php include("include/footer.php") ?>