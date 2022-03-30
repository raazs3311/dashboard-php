<?php include('includes/header.php'); ?>
<?php  include 'includes/sidebar.php' ;?>
<?php  include 'includes/navbar-top.php'; ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">All Category Details</h3>
    </div>

<div class="card-body">
    <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
       Add
    </a>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
       
                <form action="category-des-add.php" method="POST">
                     <div class="row g-3 mt-2 mb-2">                              
                                                           
                                <div class="col">
                                <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>

                                <select class="form-select" name = "cate_name" id="inputGroupSelect01">

                                    <option selected>Choose...</option>

                                <?php
                                  $con = mysqli_connect('localhost', 'root', '', 'blog');
                                  $cate = "SELECT * FROM `category`";
                                  $cate_walk = mysqli_query($con,$cate);
                                  if(mysqli_num_rows($cate_walk) > 0){

                                      foreach($cate_walk as $record){
                                          ?>
                                           <option value="<?php echo $record['id']?>"><?php echo $record['name']?></option>
                                          <?php

                                  }
                                  }
                                ?>                                  
                                    
                                </select>
                                 </div>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "title" placeholder="title" aria-label="title">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "short_description" placeholder="Short Description" aria-label="short_description">                    
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name = "long_des" placeholder="Long Description" aria-label="Long Description">                    
                                </div>                                
                                                  
                                <div class="col">
                                    <button class="btn btn-primary" name="submit">Update</button>
                                </div>
                        </div>
                    </form>
  
  </div>
</div>
            <thead>
                <tr>
                    <th>Category ID</th>                    
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Long Description</th>                   
                    <th>Category Image</th>
                    <th>Post Date</th>

                </tr>
            </thead>
            <tbody>
              <?php
               $con = mysqli_connect('localhost', 'root', '', 'blog');
               
               $cate_post  = "SELECT * FROM `post`";
               $cate_post_run  = mysqli_query($con,$cate_post);
               if($cate_post_run){
                    $i = 0;
                   foreach($cate_post_run as $data){
                       $i++;

                        ?>
                            <tr>
                            <td scope="row"><?php echo $i;?></td>                            
                            <td><?php echo $data['title'];?></td>
                            <td><?php echo $data['short_description'];?></td>
                            <td><?php echo $data['long_des'];?></td>
                            <td><?php echo $data['image'];?></td>
                            <td><?php echo $data['created_at'];?></td>
                            </tr>
                                
                        <?php

               }
              
            }
              ?>           
            
            </tbody>
        </table>


    </div>
</div>





<?php  include 'includes/header-top.php' ;?>
<?php  include 'includes/footer.php';?>