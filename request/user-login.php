<?php

include('../includes/config.php');


if(isset($_POST['login_btn'])){


    $email = $_POST['email'];
    $pass = $_POST['password'];


    $login =  "SELECT * FROM user WHERE email ='$email' AND password='$pass'";

    $login_query = mysqli_query($con, $login);

    if(mysqli_num_rows($login_query) > 0){
   
       foreach($login_query as $users){
       
        $_SESSION['name'] = $users['first_name'];        
        $_SESSION['id'] = $users['id'];
        
       }

       $_SESSION['email'] = $email;               

        header('Location:../dashboard.php');
        
    }
    else{

        $_SESSION['message'] = "You are not registered";
        header('Location:../index.php');
    }

}

?>