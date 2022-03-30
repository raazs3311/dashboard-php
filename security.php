<?php

include ('includes/config.php');
if(!$_SESSION['email']){

    header('Location:index.php');
}

?>