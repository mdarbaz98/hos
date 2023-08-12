<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
include('include/database.php');

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>House of Sneakers 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="./css/style.css">

    <?php
      if(strpos($actual_link, 'localhost')) {
    ?>
      <base href="http://localhost/hos/">
    <?php
      }else {
    ?>
      <base href="<?php echo $actual_link; ?>">
    <?php
      }
      setcookie("userID");
      $id = uniqid();
      if(!isset($_COOKIE["userID"])) {
        setcookie("userID",$id,time()+31556926 ,'/');
        $insertUser=$conn->prepare("INSERT INTO customer(userid, cookieUser) VALUE('".$id."', 'yes')");
        $insertUser->execute();
        echo '<script type="text/javascript">location.reload()</script>';
      } else {
        setcookie("userID",$_COOKIE["userID"],time()+31556926 ,'/');
        $checkUser=$conn->prepare("SELECT * FROM customer WHERE userid='".$_COOKIE["userID"]."'");
        $checkUser->execute();
        $isUser = $checkUser->rowCount();
        while($row=$checkUser->fetch(PDO::FETCH_ASSOC)){
            $email = $row['email'];
            $fname=$row['fname'];
            $userid=$row['userid'];
        }
        if($email!=NULL){
            $_SESSION['IS_LOGIN']=true;
            $_SESSION['NAME']=$fname;
            $_SESSION['EMAIL']=$email;
            $_SESSION['USER_ID']=$userid;   
        }
        if($isUser==0){
            $insertUser=$conn->prepare("INSERT INTO customer(userid, cookieUser) VALUE('".$_COOKIE['userID']."', 'yes')");
            $insertUser->execute();
        } 
      }
    ?>

    

</head>

<body>
    <header>
    <ul class="side__bar d-lg-none">
    <i class="fa-solid fa-xmark"></i>
                    <li><i class="fa-solid fa-user" data-bs-toggle="modal" data-bs-target="#loginModal"></i>User</li>
                    <li><i class="fa-solid fa-heart"></i>Wishlist</li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
                    <li><i class="fa-solid fa-flag"></i>Country</li>
                </ul>
        <div class="top__header">

            <div>
            <i class="fa-solid fa-bars-staggered d-lg-none" style="color: #ffffff;"></i>
                <i class="fa-solid fa-magnifying-glass d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#searchModal"></i>
            </div>
            <div><a href="/"><img class="logo" src="images/logo.jpg" alt="logo"></a></div>
            <nav>
            <i class="fa-solid fa-magnifying-glass d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal"></i>
                <ul class="d-none d-lg-flex">
                    <li><i class="fa-solid fa-user" data-bs-toggle="modal" data-bs-target="#loginModal"></i></li>
                    <li><i class="fa-solid fa-heart"></i></li>
                    <li><a href="cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><i class="fa-solid fa-flag"></i></li>
                </ul>
            </nav>
        </div>
        <div class="bottom__header d-md-block d-none">
            <ul>
                <?php
                $all_category=$conn->prepare("SELECT * FROM categories order by id desc");
                $all_category->execute();
                while($row=$all_category->fetch(PDO::FETCH_ASSOC)){ ?>
                <li><a href="category/<?php echo $row['cat_slug'] ?>"><?php echo $row['cat_name'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- Modal For Search -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark" style="color: #ffffff;"></i></button>
                        <div class="search__content">
                            <div class="w-100 d-flex justify-content-center">
                                <img class="logo" src="images/logo.jpg" alt="logo">
                            </div>
                            <div class="input__wrapper">
                                <input type="text" placeholder="Search House of Sneakers">
                                <p>Hit Enter To See The Results</p>
                            </div>
                            <div class="top__search">
                                <p>Or Explore other Popular Categories:</p>
                                <div class="suggested__list">
                                    <div>JORDAN</div>
                                    <div>JORDAN</div>
                                    <div>JORDAN</div>
                                    <div>JORDAN</div>
                                    <div>JORDAN</div>
                                    <div>JORDAN</div>
                                    <div>JORDAN</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal For Login -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark" style="color: #ffffff;"></i></button>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 order-1 order-lg-0">
                                    <div class="form__section">
                                        <form name="register" class="register" action="">
                                            <h5>Welcome !</h5>
                                            <span>Sign in to House of Sneakers</span>
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="username">Username</label>
                                                    <input id="username" type="text" name="username" placeholder="Username">
                                                </div>
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="col-12">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input id="cpassword" type="password" name="cpassword" placeholder="Confirm Password">
                                                </div>
                                                <div class="col-12">
                                                    <div class="check__div d-flex justify-content-between align-items-center">
                                                        <div class="d-flex flex-row-reverse align-items-center gap-2">
                                                        <label for="check">Remember Me</label>
                                                        <input id="check" type="checkbox">
                                                        </div>
                                                        <a href="">
                                                            Forgot Password ?
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div>
                                                    <button type="submit">Register</button>
                                                    <p class="text-black-50">Already have an Account ? <a class="register"><strong>Login</strong></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form name="login" action="">
                                            <h5>Welcome !</h5>
                                            <span>Sign in to House of Sneakers</span>
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="username">Username</label>
                                                    <input id="username" type="text" name="username" placeholder="Username">
                                                </div>
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="text" name="password" placeholder="Password">
                                                </div>
                                                <div class="col-12">
                                                    <div class="check__div d-flex justify-content-between align-items-center">
                                                        <div class="d-flex flex-row-reverse align-items-center gap-2">
                                                        <label for="check">Remember Me</label>
                                                        <input id="check" type="checkbox">
                                                        </div>
                                                        <a href="">
                                                            Forgot Password ?
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div>
                                                    <button type="submit">Login</button>
                                                    <p class="text-black-50">Don’t have an Account ? <a class="login"><strong>Register</strong></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-7 order-0 order-lg-1">
                                    <div class="d-flex align-align-items-center h-100">
                                    <img src="images/home/loginimage.png" class="m-auto d-block" alt="loginimage">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <main>