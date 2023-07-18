<?php 

include('include/config.php');

if($_POST['btn']=="pro_name")
{

    $pro_name = $_POST['pro_name'];


   $sql = "SELECT * FROM product WHERE product_name LIKE '%$pro_name%'";   
   $stmt= $conn->prepare($sql);                               
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo '<table id="datatable" class="table table-bordered dt-responsive">
    <thead>
        <tr role="row">
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>';
    
    if(!empty($result))
    {
            foreach($result as $row)
            {
                $id = $row['id'];

	                        $img_id=$row['front_img'];
                            if(!empty($img_id)){
                                $images_front=$conn->prepare("SELECT * FROM `images` WHERE id=$img_id");                               
                                $images_front->execute();
                                $image_data = $images_front->fetch(PDO::FETCH_ASSOC);
                            }
                            
                $img_path = $image_data['path'];
                echo "<tr>";
                
                
                echo "<td><img src='$img_path' class='product_img_data' alt='$img_path'></td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['prc'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                $publisDate = $row['PostDate'];
                $filter_date = date('d F Y', strtotime($publisDate));
                echo "<td>" .$filter_date. "</td>";
                

                    echo "<td>";
                echo "<a target='_blank' href='https://houseofsneakers.in/".$row['slug']."' class='btn btn-success'><i class='fas fa-solid fa-eye'
					    style='margin-left:-2px;color: white;font-size: 15px;margin-top:1px;'></i>";    
                echo "<a href='product_update.php?id=".$row["id"]."' class='btn btn-success' style='color: white;background: blueviolet'><i class='fas fa-edit'></i>";
                echo "<a href='javascript:void(0)' class='btn btn-danger' onclick='trashProduct(".$row['id'].")'><i class='fas fa-trash-alt'></i></td>";
                echo "</tr>";
            }

        }
        else{
            echo "<tr>No Data Found</tr>";
        }

        echo "</table>";
}

//page table listing


?>