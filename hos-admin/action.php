<?php include('include/config.php');
session_start();
session_regenerate_id();
date_default_timezone_set('Asia/Kolkata');
if($_POST['btn']=='loginUser'){
    $username = trim_data($_POST['username']);
    $pass = trim_data($_POST['password']);
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE username=?");
    $stmt->execute([$username]);
    $userCount=$stmt->rowCount();
    if($userCount > 0){
      while($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
        $email = $user_data['username'];
        $password = $user_data['password'];
        //if (password_verify($pass, $password)) {
          $_SESSION['admin_is_login'] = $user_data['username'];
          $_SESSION['admin_is_login_id'] = $user_data['id'];
          $_SESSION['admin_is_login_id'] = true;
          echo "done";            
        //}

      }
    }
  }
if($_POST['btn']=='image_update'){
  $id = $_POST['img_id'];
  $alt = $_POST['alt'];
  $title = $_POST['title'];
  $stmt = $conn->prepare("UPDATE images SET alt=?, title=? WHERE id=?");
  if($stmt->execute([$alt, $title, $id])){
    echo "updated";
  }
}

if($_POST['btn']=='addCategory'){
  $cat_name = $_POST['cat_name'];
  $title = $_POST['cat_title'];
  $slug = $_POST['cat_slug'];
  $desc = $_POST['cat_description'];
  $img_id = $_POST['img_id'];
  $stmt = $conn->prepare("INSERT INTO categories(img_id, cat_name, cat_slug, cat_desc, cat_title, status) VALUES(?,?,?,?,?,?)");
  if($stmt->execute([$img_id, $cat_name, $slug, $desc, $title, 1])){
    echo "inserted";
  }
}
if($_POST['btn']=='addHomeslider'){
  $slogan = $_POST['slogan'];
  $description = $_POST['description'];
  $title = $_POST['title'];
  $link = $_POST['link'];
  $img_id = $_POST['img_id'];
  $stmt = $conn->prepare("INSERT INTO home_slider(heading_slogan, heading_title, heading_para, heading_link, img_id, status) VALUES(?,?,?,?,?,?)");
  if($stmt->execute([$slogan, $title, $description, $link, $img_id, 1])){
    $last_pro_id = $conn->lastInsertId();

    echo "inserted".$last_pro_id;
  }
}

if($_POST['btn']=='updatehome_slider'){
  $home_slider_id = $_POST['home_slider_id'];
  $slogan = $_POST['slogan'];
  $description = $_POST['description'];
  $title = $_POST['title'];
  $link = $_POST['link'];
  if(empty($_POST['img_id'])){
    $img_id = $_POST['old_img_id'];
  }else{
    $img_id = $_POST['img_id'];
  }
  $stmt = $conn->prepare("UPDATE home_slider SET heading_slogan=?, heading_title=?, heading_para=?, heading_link=?, img_id=? WHERE id=?");
  if($stmt->execute([$slogan, $title, $description, $link, $img_id, $home_slider_id])){
    echo "updated";
  }
}

if($_POST['btn']=='updateCategory'){
  $cat_id = $_POST['cat_id'];
  $cat_name = $_POST['cat_name'];
  $title = $_POST['cat_title'];
  $slug = $_POST['cat_slug'];
  $desc = $_POST['cat_description'];
  if(empty($_POST['img_id'])){
    $img_id = $_POST['old_img_id'];
  }else{
    $img_id = $_POST['img_id'];
  }
  $stmt = $conn->prepare("UPDATE categories SET img_id=?, cat_name=?, cat_slug=?, cat_desc=?, cat_title=? WHERE id=?");
  if($stmt->execute([$img_id, $cat_name, $slug, $desc, $title, $cat_id])){
    echo "updated";
  }
}
if($_POST['btn']=='deleteCategory_id'){
    $update = $conn->prepare('DELETE FROM categories WHERE id=?');
    $update->execute([$_POST['deleteCategory_id']]);
    echo 'deleted';
    }

//product
    if($_POST['btn']=='addProduct'){
    $name=$_POST['pro_name'];
    $cat = $_POST['category'];
    $description = $_POST['description']; 
    $img_id = $_POST['img_id'];
    $color = $_POST['color'];
    $authenticity_guaranteed = $_POST['authenticity_guaranteed'];
    $ready_to_ship = $_POST['ready_to_ship'];
    $returns_accepted = $_POST['returns_accepted'];
    $brand = $_POST['brand'];
    $release_date = $_POST['release_date'];
    $gender = $_POST['gender'];
    $slug = strtolower($name);
    $slug = str_replace(' ', '-', $slug);
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

    $stmt = $conn->prepare("INSERT INTO product(img_id, product_name, slug, category, description, product_color, authenticity_guaranteed, ready_to_ship, 
    returns_accepted, brand, gender, PostDate, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    if($stmt->execute([$img_id, $name, $slug, $cat, $description, $color, $authenticity_guaranteed, $ready_to_ship, $returns_accepted, $brand, $gender, $release_date, 1])){
                $last_pro_id = $conn->lastInsertId();
                $total_price = count($_POST['size']);
              
                if(!empty($_POST['size'][0])){ 
                if(!empty($total_price)){    
                for($i=0;$i<$total_price;$i++){ 
                     $size = $_POST['size'][$i];
                     $price =  $_POST['price'][$i];
                     $d_price =  $_POST['d_price'][$i];
                     $product_price = $conn->prepare("INSERT INTO product_price(product_id, size, price, d_price, status) VALUES(?,?,?,?,?)");
                      if($product_price->execute([$last_pro_id, $size, $price, $d_price, 1])){
                        
                      }
                }
              }
            }

              echo "inserted".$last_pro_id;


    }
  }

  if($_POST['btn']=='updateProduct'){
    $product_id=$_POST['product_id'];
    $name = $_POST['pro_name'];
    $cat = $_POST['category'];
    $desc = $_POST['discription'];
    $color = $_POST['color'];
    $authenticity_guaranteed = $_POST['authenticity_guaranteed'];
    $ready_to_ship = $_POST['ready_to_ship'];
    $returns_accepted = $_POST['returns_accepted'];
    $brand = $_POST['brand'];
    $gender = $_POST['gender'];
    $release_date = $_POST['release_date'];
  



    if(empty($_POST['img_id'])){
      $img_id = $_POST['old_img_id'];
    }else{
      $img_id = $_POST['img_id'];
    }
    if(empty($_POST['front_img'])){
      $front_img = $_POST['old_front_img'];
    }else{
      $front_img = $_POST['front_img'];
    }

    $slug = strtolower($name);
    $slug = str_replace(' ', '-', $slug);
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $stmt = $conn->prepare("UPDATE product SET img_id=?, front_img=?, product_name=?, slug=?, category=?, description=?, product_color=?, 
    product_color=?, authenticity_guaranteed=?, ready_to_ship=?, returns_accepted=?, brand=?, gender=?, PostDate=?  WHERE id=?");
    if($stmt->execute([$img_id, $front_img, $name, $slug, $cat, $desc, $color, $authenticity_guaranteed, $ready_to_ship, $ready_to_ship,
    $returns_accepted, $brand, $gender, $release_date, $product_id])){
    
     if(!empty($_POST['size'][0])){ 
      $total_price = count($_POST['size']);
      if(!empty($total_price)){    
      for($i=0;$i<$total_price;$i++){ 
           $size = $_POST['size'][$i];
           $price =  $_POST['price'][$i];
           $d_price =  $_POST['d_price'][$i];
           $product_price = $conn->prepare("INSERT INTO product_price(product_id, size, price, d_price, status) VALUES(?,?,?,?,?)");
            if($product_price->execute([$product_id, $size, $price, $d_price, 1])){             
            }
      }
    }
  }
      echo "updated";
    }
  }
//   upload product
if($_POST['btn']=='uploadProduct_id'){
    $update = $conn->prepare('UPDATE product SET status=1 WHERE id=?');
    $update->execute([$_POST['uploadProduct_id']]);
    echo 'uploaded';
    }
  // Trash product
  if($_POST['btn']=='trashProductprice_id'){
    $update = $conn->prepare('DELETE FROM product_price WHERE id=?');
    $update->execute([$_POST['trashProductprice_id']]);
    echo 'deleted';
    }

    // Permanent delete product
    if($_POST['btn']=='deleteProduct_id'){
        $update = $conn->prepare('DELETE FROM product WHERE id=?');
        $update->execute([$_POST['deleteProduct_id']]);
        echo 'deleted';
        }
//   product ends here
//user

// get product price data

if($_POST['btn']=="productPriceupdate"){
    

  $getAddress=$conn->prepare("SELECT * FROM product_price WHERE id=?");
  $getAddress->execute([$_POST['productPriceupdate']]);
  while($row=$getAddress->fetch(PDO::FETCH_ASSOC)){
      echo json_encode(array(
          "price"=>$row['price'],
          "dprice"=>$row['d_price'],
          "size"=>$row['size'],
          "updateProductprice_id"=>$row['id'],
      ));    
  }
}

if($_POST['btn']=='updateProductprice'){
  $update = $conn->prepare('UPDATE product_price SET size=?, price=?, d_price=? WHERE id=?');
  $update->execute([$_POST['size'], $_POST['price'], $_POST['dprice'], $_POST['updateProductprice_id']]);
  echo 'updated';
  }
  
if($_POST['btn']=='Product_price_id'){
  $update = $conn->prepare('SELECT * FROM product_price WHERE id=?');
  $update->execute([$_POST['Product_price_id']]);
  }


if($_POST['btn']=='addUser'){
    $name = trim_data($_POST['name']);
    $username = trim_data($_POST['username']);
    $pwd = trim_data($_POST['pwd']);
    $options = ['cost' => 12];  
    $password_hash = password_hash($pwd, PASSWORD_DEFAULT, $options);
    $stmt = $conn->prepare("INSERT INTO user(name ,username,password,status) VALUES(?,?,?,?)");
    if($stmt->execute([$name, $username, $password_hash, 1])){
      echo "inserted";
    }
  }
//   UPDATE
  if($_POST['btn']=='updateUser'){
    $user_id=$_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];  
    $stmt = $conn->prepare("UPDATE user SET name=?, username=?, password=?, status=? WHERE id=?");
    if($stmt->execute([$name, $username,  $pwd, 1, $user_id])){
      echo "updated";
    }
  }


//   DELETE
  if($_POST['btn']=='deleteUser_id'){
    $update = $conn->prepare('DELETE FROM user WHERE id=?');
    $update->execute([$_POST['deleteUser_id']]);
    echo 'deleted';
    }
//   user ends here


 // post start here
// delete post
if($_POST['btn']=='delete_pro_id'){
    $update = $conn->prepare('DELETE FROM images WHERE id=?');
    $update->execute([$_POST['pro_id']]);
    echo 'deleted';
    }
 //   upload post
if($_POST['btn']=='uploadPost_id'){
    $update = $conn->prepare('UPDATE post SET status=1 WHERE id=?');
    $update->execute([$_POST['uploadPost_id']]);
    echo 'uploaded';
    }

   
// trash post
if($_POST['btn']=='trashPost_id'){
    $update = $conn->prepare('UPDATE post SET status=0 WHERE id=?');
    $update->execute([$_POST['trashPost_id']]);
    echo 'trashed';
    }
    function trim_data($text) {
       $text = trim($text); //<-- LINE 31
       if(is_array($text)) {
           return array_map('trim_data', $text);
       }

       $text = preg_replace("/(\r\n|\n|\r)/", "\n", $text); // cross-platform newlines
       $text = preg_replace("/\n\n\n\n+/", "\n", $text); // take care of duplicates 
      
       $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
       $text = stripslashes($text);
      
       $text = str_replace ( "\n", " ", $text );
       $text = str_replace ( "\t", " ", $text );
      
       return $text;
   }
?>