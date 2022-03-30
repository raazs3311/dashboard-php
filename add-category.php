<?php include('includes/header.php'); ?>
<?php  include 'includes/sidebar.php' ;?>
<?php  include 'includes/navbar-top.php'; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ADD CATEGORY</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>                   

                    <div class="card">
                        <div class="card-header bg-primary text-white">Category</div>
                        <div class="card-body">
                            <form action="insert-category.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="email">Name:</label>
                          <input type="text" name = "cate_name" class="form-control" placeholder="Enter name" >
                        </div>
                        <div class="form-group">
                          <label for="pwd">Image:</label>
                          <input type="file" name = "cateimg" class="form-control">
                        </div>
                        
                        <button type="submit" name = "add-btn" class="btn btn-primary">Submit</button>
                      </form></div>

                    </div>

                </div>
                <!-- /.container-fluid -->


                
<?php  include 'includes/header-top.php' ;?>
<?php  include 'includes/footer.php';?>