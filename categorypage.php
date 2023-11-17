<?php include("./include/header.php") ?>
        <div class="category__products__container container-fluid">
        <div class="row">
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
            <div class="product__list col-lg-9">
                <div class="row">
                    <div class="col-lg-4 col-md-2 col">
                        <div class="p__card">
                            <i class="wishlist fa-regular fa-heart"></i>
                            <img src="images/home/faa37359b4191648cfde90b4a7fc6cb2.png" alt="">
                            <div class="p__name">Jordan</div>
                            <div class="P__desc">
                                Air Jordan 1 WMNS
                            </div>
                            <div class="p__cat">
                                "Washed Pink"
                            </div>
                            <div class="p__price">
                                $571
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./include/footer.php") ?>