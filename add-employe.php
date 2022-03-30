<?php
        if(isset($_POST['submit'])){
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $position = $_POST['position'];
            $office = $_POST['office'];
            $age = $_POST['age'];
            $start_date = $_POST['start_date'];
            $salary = $_POST['salary'];
            
            $con = mysqli_connect('localhost', 'root', '', 'blog');
            $employe = "INSERT INTO `add_of_employe`(`name`, `user_data`, `position`, `office`, `age`, `start_date`, `salary`) VALUES ('$name','$id','$position','$office','$age','$start_date','$salary')";
            $employe_walk = mysqli_query($con,$employe);
            if($employe_walk){
                header('location:add-table.php');
            }
            else{
                echo 'Not Post';
            }
        }       
?>