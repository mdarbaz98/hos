<?php include("./include/header.php") ?>
        <section class="cart__page">
            <div class="black__section">
                <div class="container">
                    <p class="page__heading">Shopping Cart</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="tag__line">You have <span class="cart_total_product">0</span> item in your cart</p>
                            <div class="products__container">


                                <!-- <div class="card_p">
                                    <div class="left__div">
                                        <img src="images/home/595a1b2f314685d0fdea8cbff8c72e5f.jpg" alt="">
                                        <div>
                                            <p>Adidas T-Shirt</p>
                                            <span>
                                                Adidas men's T-Shirt
                                            </span>
                                        </div>
                                    </div>
                                    <div class="right__div">
                                        <div class="qty">
                                            <span>1</span>
                                            <div><i class="fa-solid fa-caret-down"></i>
                                                <i class="fa-solid fa-caret-down"></i></div>
                                        </div>
                                        <div class="price">
                                            $356
                                        </div>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
                                </div>
                                <div class="card_p">
                                    <div class="left__div">
                                        <img src="images/home/595a1b2f314685d0fdea8cbff8c72e5f.jpg" alt="">
                                        <div>
                                            <p>Adidas T-Shirt</p>
                                            <span>
                                                Adidas men's T-Shirt
                                            </span>
                                        </div>
                                    </div>
                                    <div class="right__div">
                                        <div class="qty">
                                            <span>1</span>
                                            <div><i class="fa-solid fa-caret-down"></i>
                                                <i class="fa-solid fa-caret-down"></i></div>
                                        </div>
                                        <div class="price">
                                            $356
                                        </div>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
                                </div>
                                <div class="card_p">
                                    <div class="left__div">
                                        <img src="images/home/595a1b2f314685d0fdea8cbff8c72e5f.jpg" alt="">
                                        <div>
                                            <p>Adidas T-Shirt</p>
                                            <span>
                                                Adidas men's T-Shirt
                                            </span>
                                        </div>
                                    </div>
                                    <div class="right__div">
                                        <div class="qty">
                                            <span>1</span>
                                            <div><i class="fa-solid fa-caret-down"></i>
                                                <i class="fa-solid fa-caret-down"></i></div>
                                        </div>
                                        <div class="price">
                                            $356
                                        </div>
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
                                </div> -->
                           
                            </div>
                            <div class="total_text text-white">
                                    <ul class="pt-5 ps-0"><li class="my-3 d-flex justify-content-between
    "><span>Shipping Charges</span><span class="total_shipping_amount">0</span></li><li class="my-3 d-flex justify-content-between
    "><span>Subtotal</span><span class="subtotal_CartPrice">0</span></li>
                                    <li class="pt-3 border-top border-white my-3 d-flex justify-content-between
    "><span>Total</span><span class="final_total_amount">0</span></li></ul>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="shipping__form">
                                <form name="userOrderplace">
                                <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-5">
                                                <input type="text" class=" form-control" id="floatingfirst" name="fname" placeholder="First name">
                                                <label for="floatingfirst">First Name</label>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-5">
                                                <input type="text" class="form-control" id="floatingLast" name="lname" placeholder="Last name">
                                                <label for="floatingLast">Last Name</label>
                                              </div>
                                        </div>
                                      </div>
                                    <div class="form-floating mb-5">
                                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                      </div>
                                      <div class="form-floating mb-5">
                                        <input type="tel" class=" form-control" id="floatingZip" placeholder="Zip" name="phone">
                                        <label for="floatingZip">Phone</label>
                                      </div>
                                      <div class="form-floating mb-5">
                                        <input type="text" class=" form-control" id="floatingAddress" name="address" placeholder="Street Address">
                                        <label for="floatingAddress">Street Address</label>
                                      </div>
                                      <div class="form-floating mb-5">
                                        <input type="text" class=" form-control" id="floatingCity" placeholder="City" name="city">
                                        <label for="floatingCity">City</label>
                                      </div>
                                      <div class="form-floating mb-5">
                                        <input type="text" class=" form-control" id="floatingCity" placeholder="State" name="state">
                                        <label for="floatingCity">State</label>
                                      </div>
                                      <div class="form-floating mb-5">
                                        <input type="text" class=" form-control" id="floatingZip" placeholder="Zip" name="pincode">
                                        <label for="floatingZip">Zip/postal code</label>
                                      </div>
                                      <input type="hidden" name="btn" value="addUseraddress"/>
                                      <button class="add_to_cart" type="submit">continue to shopping options</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="payment__form">
                                <div class="form__heading">
                                    Card Details
                                </div>
                                <div class="heading">
                                    Card type
                                </div>
                                <div class="cards__section">
                                    <img src="images/home/flag.jpg" alt="">
                                    <img src="images/home/flag.jpg" alt="">
                                    <img src="images/home/flag.jpg" alt="">
                                    <img src="images/home/flag.jpg" alt="">
                                    <img src="images/home/flag.jpg" alt="">
                                </div>
                                <form action="">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" placeholder="Name">
                                   
                                    <label for="number">Card Number</label>
                                    <input id="number" type="number" placeholder="111 0022 3333 5555">
                                    <div class="row">
                                        <p>Expiry Date</p>
                                        <div class="col">
                                            <input type="text" placeholder="MM/YY">
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="CVV">
                                        </div>
                                    </div>
                                    <hr>
                                    <ul>
                                        <li><span>Subtotal</span><span class="product_subtotal">0</span></li>
                                        <li><span>Shipping</span><span class="product_shipping">0</span></li>
                                        <li><span>Total</span><span class="final_total_amount">0</span></li>
                                    </ul>
                                    <div class="checkout__section">
                                        <span class="final_total_amount">0</span>
                                        <span>Checkout<i class="fa-solid fa-arrow-right-long ps-3"></i></span>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include("./include/footer.php") ?>
