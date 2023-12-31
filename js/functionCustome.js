function getSizeprice(x){
  var price = $(x).data('price');
  var dprice = $(x).data('dprice');
  var size = $(x).data('size');
  $(`.sizeProduct_price`).html(price);
  $(`.show_Selected`).html(size);
  $(`#setaddProductToCart`).attr('data-price',price);
  $(`#setaddProductToCart`).attr('data-discounted_price',dprice);
  $(`#setaddProductToCart`).attr('data-size',size);
  

}

//product add into cart
function addProductToCart(x){
    var image = $(x).data('image');
    var name = $(x).data('name');
    var category = $(x).data('category');
    var price = $(x).data('price');
    var size = $(x).data('size');
    var discounted_price = $(x).data('discounted_price');
    var shipping_charge = $(x).data('shipping_charge');
    var btn = 'addToCartproduct';
    $.ajax ({
      url: 'action.php',
      type: 'post',
      dataType: 'html',
      data: {'btn':btn,
             'image':image,
             'name':name,
             'category':category,
             'price':price,
             'size':size,
             'discounted_price':discounted_price,
             'shipping_charge':shipping_charge,
              },
              beforeSend: function () {
                $(".content").css("opacity", 0.5);
                $(".btn-ring-addtocart").show();
              },
      success: function(data) {
              console.log(data)
              if(data){
                var success_cart_btn =`
                <a class="add_to_cart" href="cart.php" id="setaddProductToCart" />Checkout</a>`;

                $(`#setaddProductToCart`).attr("onclick", "").html(success_cart_btn);

                //$(`[data-quantitycode=${data}]`).attr('data-cart',"yes");
                
                // $(".content").css("opacity", 1);
                // $(".btn-ring-addtocart").hide();
                
                // load_cart();
                // count_cart();
                // getCart()
                
              }
            }
      });
}

function getCart() {
    var btn = "load_maincart_data";
    $.ajax({
      url: "action.php",
      type: "post",
      dataType: "json",
      data: { btn: btn },
      beforeSend: function () {
        $(".loader-bg").show();
      },
      success: function (data) {
        var json = $.parseJSON(JSON.stringify(data));
        var cart_product_count = json.cart_product_count;
        var htmldata = json.datahtml;
        var product_calculation = json.product_calculation;
        var shipping_total_price = json.shipping_total_price;
        var subtotal_CartPrice = json.subtotal_CartPrice;
        var finalTotal = json.finalTotal;

        // var total_saving_amount = json.total_saving_amount;
        // var final_total_amount = json.final_total_amount;
        // console.log(shipping_total_price);
        
        if(shipping_total_price==0){ 
          $(`.total_shipping_amount`).html("INR "+shipping_total_price);
          }else{
          $(`.total_shipping_amount`).html("INR "+shipping_total_price);
          }
        $(".cart_total_product").html(cart_product_count);
        $(".products__container").html(htmldata);
        $(".product_subtotal").html(product_calculation);
        $(".subtotal_CartPrice").html("INR "+subtotal_CartPrice);
        $(".product_shipping").html("INR "+shipping_total_price);
        $(".final_total_amount").html("INR "+finalTotal);
        
        // $(".loader-bg").hide();
      },
    });
  }
  getCart();
  
  function deleteCartproduct(id) {
    var btn = "DeleteFromCartPage";
    $.ajax({
      url: "action.php",
      type: "post",
      dataType: "html",
      data: { btn: btn, cartid: id },
      success: function (data) {
        if (data == "done") {
          //snackbar('Item Removed');
          // if(currentPage1.includes('cart')){
          //     load_main_cart();
          //     loadCoupan();
          // }
          // if(currentPage1.includes('checkout')){
          //     load_checkout();
          // }
          // if(pageName=='ProductPage'){
          //     loadMainStrength();
          // }
  
          getCart();
          count_cart();
        }
      },
    });
  }
  function emptyCartproduct() {
    var btn = "RemoveAllcartproduct";
    snackbar("Deleting Cart ...");
    $.ajax({
      url: "new_action.php",
      type: "post",
      dataType: "html",
      data: { btn: btn },
  
      success: function (data) {
        if (data == "done") {
          getCart();
          count_cart();
          //count_cart();
        }
      },
    });
  }
  
  function cartProductupdate(id) {
    var btn = "updateCartproduct";
    $.ajax({
      url: "new_action.php",
      type: "post",
      dataType: "json",
      data: { btn: btn, cartid: id },
      beforeSend: function () {
        $(".loader-bg").show();
      },
      success: function (data) {
        var json = $.parseJSON(JSON.stringify(data));
        var cart_product_strength = json.cart_product_strength;
        var cart_product_quantity = json.cart_product_quantity;
        var product_cart_name = json.product_cart_name;
        var pill_calculation_strength = json.pill_calculation_strength;
  
        $(".strength-section").html(cart_product_strength);
        $("#productTabContent").html(cart_product_quantity);
        $(".product_cart_name").html(product_cart_name);
        $(".pill-strength-calculation").html(pill_calculation_strength);
        $("#cartProduct_update").modal("show");
        $(".loader-bg").hide();
        // if(data=='done'){
            getCart();
            count_cart();
        // }
      },
    });
  }

  function addToWishlist(x) {
    var id = $(x).attr("id");
    var btn = "AddedToWishlist";
    snackbar("Adding to wishlist...");
    $.ajax({
      url: "action.php",
      type: "post",
      data: { btn: btn, id: id },
      success: function (data) {
        if (data == "done") {
          snackbar("Added to Wishlist");
          if (currentPage1.includes("cart")) {
            load_main_cart();
            loadCoupan();
          }
          if (currentPage1.includes("checkout")) {
            load_checkout();
          }
          if (pageName == "ProductPage") {
            loadMainStrength();
          }
          load_cart();
          count_cart();
        }
      },
    });
  }

  function load_for_active_class_call() {
    $(".size_accordion .active").click();
  }
  load_for_active_class_call();


      // register for validation 
$(function() {
  $("form[name='userOrderplace']").validate({
    // Specify validation rules
    rules: {
      fname: {
        minlength: 3,
                    maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },
      lname: {
        minlength: 3,
                    maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 10,
      },
      address: {
        minlength: 3,
                    maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },pincode: {
        minlength: 3,
                    maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },state: {
                    //minlength: 3,
                    //maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },
      city: {
                    //minlength: 3,
                    //maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },
    },
    // Specify validation error messages
    messages: {
      name: {
        minlength:"min length should be 3",
        maxlength:"min length should be 30",
        //pattern: "should be alphabet",
        required:"Please enter your first name"
      },
      lname: {
        minlength:"min length should be 3",
        maxlength:"min length should be 30",
        //pattern: "should be alphabet",
        required:"Please enter your last name"
      },
      email: "Please enter a valid email address",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
    },
    submitHandler: function(form) {
          var formData = new FormData(form);
          var url = window.location.href;
          $.ajax({
            url: "action.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
            window.location.href='/orderconfirm'
            },
          });
        }
  });
});

// contact form details

$(function() {
  $("form[name='contactForm']").validate({
    // Specify validation rules
    rules: {
      fname: {
        minlength: 3,
                    maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },
      lname: {
        minlength: 3,
                    maxlength: 30,
                    //pattern: "^[a-zA-Z_]*$",
                    required: true
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 10,
      },
      message: {
                    required: true
      },
    },
    // Specify validation error messages
    messages: {
      name: {
        minlength:"min length should be 3",
        maxlength:"min length should be 30",
        //pattern: "should be alphabet",
        required:"Please enter your first name"
      },
      lname: {
        minlength:"min length should be 3",
        maxlength:"min length should be 30",
        //pattern: "should be alphabet",
        required:"Please enter your last name"
      },
      email: "Please enter a valid email address",
      phone: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
    },
    submitHandler: function(form) {
          var formData = new FormData(form);
          var url = window.location.href;
          $.ajax({
            url: "action.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
            
            if(data=='inserted'){
              alert("Your request has been added our team will contact you soon!");
              $("form[name='contactForm']").trigger("reset");
            }
              //window.location.href='/orderconfirm'
            },
          });
        }
  });
});