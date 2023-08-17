<?php include("./include/header.php") ?>
<section class="cart__page">
            <div class="black__section">
                <div class="container">
                    <p class="page__heading">Contact Us</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="tag__line">At House of Sneakers, we take immense pride in offering a meticulously curated selection of footwear that reflects our deep love for shoes. Our team of experts ensures that every product we offer is 100% authentic, guaranteeing the highest quality for our valued customers.
                            </p>
                            <p class="tag__line">With a profound understanding of shoe and contemporary style trends, we aim to become the ultimate destination for sneaker aficionados. Our friendly and knowledgeable staff is always available to provide expert advice on finding the perfect pair of kicks or simply to chat about the latest sneaker releases and trends.
                            </p>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="shipping__form">
                                <form name="contactForm">
                                <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class=" form-control" id="floatingfirst" name="fname" placeholder="First name">
                                                <label for="floatingfirst">First Name</label>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingLast" name="lname" placeholder="Last name">
                                                <label for="floatingLast">Last Name</label>
                                              </div>
                                        </div>
                                      </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                      </div>
                                      <div class="form-floating mb-3">
                                        <input type="tel" class=" form-control" id="floatingZip" placeholder="Zip" name="phone">
                                        <label for="floatingZip">Phone</label>
                                      </div>
                                      <div class="form-floating mb-3">
                                        <textarea class="form-control p-5" name="message" id="floatingAddress" cols="30" rows="10" placeholder="Enter Your Message">
                                        </textarea>
                                        <label for="floatingAddress">Enter Your Message</label>
                                      </div>
                                      <input type="hidden" name="btn" value="addUsercontact_details"/>
                                      <button class="add_to_cart_contact" type="submit">Submit</button>
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