<?php
include 'includes/config.php';

if(isset($_POST['submit'])){
    
    $cate_name = $_POST['cate_name'];
    $title = $_POST['title'];
    $sdes = $_POST['short_description'];
    $ldes = $_POST['long_des'];

    $des = "INSERT INTO `post`( `cat_id`, `title`, `short_description`, `long_des`) VALUES ('$cate_name','$title','$sdes','$ldes')";
    
    $des_qry = mysqli_query($con,$des);

    if($des_qry){

        echo "Inserted";
    }
    else{
       echo "not add";
    }
}

?>