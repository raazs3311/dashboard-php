<?php

 include('../includes/config.php');

if(isset($_POST['submit'])){

  $fname =  $_POST['first_name'];
   $lname =  $_POST['last_name'];
   $email =  $_POST['email'];
   $password = $_POST['password'];
   $confirmpass = $_POST['confirm_password'];
   if($confirmpass==$password){
        $userquery =  "INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')";

        $query_run =  mysqli_query($con, $userquery);

        if( $query_run){
        
        
            header('location:../index.php');

        }
        else{


            echo "Not Register";
        }
   }
   else{
       echo "Password not match please match";
   }

  
}


?>