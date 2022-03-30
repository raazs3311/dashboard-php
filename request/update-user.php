<?php
include '../includes/config.php';

if(isset($_POST['edit_btn'])){
   
        $user_id =  $_POST['user_id'];        
        $name=  $_POST['name'];
        $about =  $_POST['about'];
        $company = $_POST['company'];
        $job = $_POST['job'];
        $country = $_POST['country'];       
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $img = $_FILES["profile"]["name"];
        $query_update = "UPDATE `user_profile` SET `image`='$img',`about`='$about',`full_name`='$name', `company`='$company',`job`='$job',`country`='$country',`phone`='$phone',`email`='$email' WHERE user_id = $user_id";
        $query_update_run = mysqli_query($con,$query_update);
        if($query_update_run){

            move_uploaded_file($_FILES["profile"]["tmp_name"], "../img/".$img);
            
            $_SESSION['update'] = "Profile Update";
            header('Location:../profile.php'); 
        }
        }

?>



