<?php

include 'includes/config.php';


$id = $_GET['id'];


$delete_qry = "DELETE FROM `add_of_employe` WHERE id = $id";

$delete_qry_run = mysqli_query($con, $delete_qry);

if($delete_qry_run){
    $_SESSION['delete'] = "Delete successfully";

    header('location:add-table.php');
}
else{
    echo 'not deleted';
}



?>