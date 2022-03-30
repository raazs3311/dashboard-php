<?php
include 'includes/config.php';


if(isset($_POST['add-btn'])){
   
    $cate_name  = $_POST['cate_name'];
    $catimg  = $_FILES['cateimg']['name'];

    $cate =  "INSERT INTO `category`(`name`, `image`) VALUES ('$cate_name','$catimg')";
    $cate_run  = mysqli_query($con,$cate);
    if($cate_run){

        move_uploaded_file($_FILES['cateimg']['tmp_name'],"img/".$catimg);

        header('location:add-category.php');
    }
    else{
        echo "not posted";
    }
}

?>