<?php 
 include 'security.php';
include('includes/header.php'); ?>
<?php  include 'includes/sidebar.php' ;?>
<?php  include 'includes/navbar-top.php' ?>


 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SR NO.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                       
                        
                        
                    </tr>
                </thead>
            
                <tbody>

                <?php 

               
                 
              $con = mysqli_connect('localhost', 'root', '', 'blog');


              
                $qry = "SELECT * FROM `user` WHERE id = '".$_SESSION['id']."'";

                $qry_run = mysqli_query($con,$qry);

                if(mysqli_num_rows($qry_run) > 0){
                    $i = 0;
                     
                    while($data = mysqli_fetch_array($qry_run)){
                        $i++;
                        ?>

                    <tr>
                        <td scope = "row"><?php echo $i?></td>
                        <td><?php echo $data['first_name']?></td>
                        <td><?php echo $data['last_name']?></td>
                        <td><?php echo $data['email']?></td>                                              
                    </tr> 

                      <?php

                }
            }
                
            ?>
                   
                </tbody>
            </table>
                    
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
       Add
    </a>
    
<div class="collapse" id="collapseExample">
  <div class="card card-body">
       
                <form action="add-employe.php" method="POST">
                     <div class="row g-3 mt-3 mb-2">                              
                                    <input type="hidden" class="form-control"  name = "id" placeholder="Name" value="<?php echo $_SESSION['id']; ?>" aria-label="Name">
                                
                                <div class="col">
                                    <input type="text" class="form-control"  name = "name" placeholder="Name"  aria-label="Name">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "position" placeholder="Position" aria-label="Position">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "office" placeholder="Office" aria-label="Office">                    
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "age" placeholder="Age" aria-label="Age">                    
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "start_date" placeholder="Start date" aria-label="Start date">                    
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "salary" placeholder="Salary" aria-label="Salary">                    
                                </div>
                                
                                <div class="col">
                                    <button class="btn btn-primary" name="submit">Save & Update</button>
                                </div>
                        </div>
                    </form>
                                

 
  
  </div>
</div>
           
        </div>
    </div>
</div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </tfoot>
                                  <?php
                                  
                                  $con = mysqli_connect('localhost', 'root', '', 'blog');
                                  $employe_data = "SELECT * FROM `add_of_employe` WHERE user_data = '".$_SESSION['id']."'";
                                  $employe_data_run = mysqli_query($con,$employe_data);

                                  if(mysqli_num_rows($employe_data_run) > 0){
                                      foreach($employe_data_run as $record){

                                        ?>
                                        <tr>
                                            <td><?php echo $record['name']?></td>
                                            <td><?php echo $record['position']?></td>
                                            <td><?php echo $record['office']?></td>
                                            <td><?php echo $record['age']?></td>
                                            <td><?php echo $record['start_date']?></td>
                                            <td><?php echo $record['salary']?></td>
                                            <td><a href="">edit</a></td>
                                            <td><a href="delete-employe.php?id=<?php echo $record['id'];?>">Delete</a></td>
                                        </tr>
                                        
                                        <?php

                                  }
                               
                                }

                                  ?>

                                    <tbody>
                                     
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



<?php  include 'includes/header-top.php' ;?>
<?php  include 'includes/footer.php';?>


<?php
if(isset($_SESSION['delete'])){

?>
<script>

swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Thnx! Your data has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your data is safe!");
  }
});

</script>
    <?php
       unset($_SESSION['delete']);
}
    ?>
