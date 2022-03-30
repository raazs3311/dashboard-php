<?php include 'security.php';?>
<?php include('includes/header.php'); ?>
<?php  include 'includes/sidebar.php' ;?>
<?php  include 'includes/navbar-top.php';?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
             <?php
             $con = mysqli_connect('localhost', 'root', '', 'blog');
             $profile = "SELECT * FROM `user_profile` WHERE user_id = '".$_SESSION['id']."' ";
             $profile_done = mysqli_query($con,$profile);
             if($profile_done){

              foreach($profile_done as $raaz){
                ?>
                  <img src="img/<?php echo $raaz['image'];?>" class="rounded-circle w-100" height="300px">
                <?php

              }
             }
                         
             ?>
              
              <h2><?php echo $_SESSION['name']?></h2>
              <h3>Web Designer</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><box-icon type='logo' name='twitter'></box-icon></i></a>
                <a href="#" class="facebook"><box-icon type='logo' name='facebook'></box-icon></i></a>
                <a href="#" class="instagram"><box-icon type='logo' name='instagram'></box-icon></a>
                <a href="#" class="linkedin"><box-icon type='logo' name='linkedin'></box-icon></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

   <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> Edit Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="change-tab" data-bs-toggle="tab" data-bs-target="#change" type="button" role="tab" aria-controls="change" aria-selected="false">Change Password</button>
  </li>
  
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
      <div class="card">
        <div class="card-body">
            <?php
          $con  = mysqli_connect("localhost", "root", "", "blog");
          $query = "SELECT * FROM user_profile WHERE user_id = '".$_SESSION['id']."' ";
          $query_run = mysqli_query($con, $query);
          if(mysqli_num_rows($query_run) > 0 ){
             
            foreach($query_run as $data){

                  $_SESSION['user_id'] = $data['user_id'];
               
              ?>  

          <div class="profile">
            
            <h5>Name : <?php echo $data['full_name']; ?></h5>
            <p>About : <?php echo $data['about']; ?> </p>
            <p>Company : <?php echo $data['company']; ?> </p>
            <p>Job :<?php echo $data['job']; ?> </p>
            <p>Country :<?php echo $data['country']; ?></p>
            <p>Phone :<?php echo $data['phone']; ?></p>
            <p>Email :<?php echo $data['email']; ?></p>
          </div>
              <?php
            }

          }
          else{
            echo "No Data Found";
          }

          ?> 
          
          
        </div>
      </div>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  

       <div class="card">
         <div class="card-body">
          <?php 
          $query = "SELECT * FROM user_profile WHERE user_id = '".$_SESSION['id']."' ";
          $query_run = mysqli_query($con, $query);
          if(mysqli_num_rows($query_run) > 0 ){
             
            foreach($query_run as $data){
              ?>
        <form action="request/update-user.php" method="POST" enctype="multipart/form-data">
        <div class="form-floating mb-3">          
          <img src="img/<?php echo $raaz['image'];?>"  width="150px" height="150px">
          <input type="file" name="profile" class="form-control" id="floatingInput" placeholder="Profile Image">
        </div>
          <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" value="<?php echo $data['full_name']; ?>" placeholder="Name">
            <input type="hidden" name="user_id" class="form-control" id="floatingInput" value="<?php echo $_SESSION['user_id']; ?>">
            <label for="floatingInput">Name </label>
          </div>
          <div class="form-floating">
            <input type="text" name="about" class="form-control" value="<?php echo $data['about']; ?>" id="floatingPassword" placeholder="About">
            <label for="">About</label>
          </div>
          <div class="form-floating">
            <input type="text" name="company" class="form-control" value="<?php echo $data['company']; ?>" id="floatingPassword" placeholder="Company">
            <label for="">Company</label>
          </div>
          <div class="form-floating">
            <input type="text" name="job" class="form-control" value="<?php echo $data['job']; ?>" id="floatingPassword" placeholder="Job">
            <label for="">Job</label>
          </div>
          <div class="form-floating">
            <input type="text" name="country" class="form-control" value="<?php echo $data['country']; ?>" id="floatingPassword" placeholder="Country">
            <label for="">Country</label>
          </div>
          <div class="form-floating">
            <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>" id="floatingPassword" placeholder="Phone">
            <label for="">Phone</label>
          </div>
          <div class="form-floating">
            <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" id="floatingPassword" placeholder="Email Address">
            <label for="">Email Address</label>
          </div>
            <button type="submit" name="edit_btn" class="btn btn-primary mt-3">Save & Update</button>
            </form>

              <?php

            }
          }
            ?>
           
         </div>
       </div>


  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
  
        </div>

      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  

<?php  include 'includes/header-top.php';?>
<?php  include 'includes/footer.php';?>

<?php
    
       if(isset($_SESSION['update'])){
           ?>
<script>
swal({
  title: "<?php echo $_SESSION['name']; ?>",
  text: "<?php echo $_SESSION['update']; ?>",
  icon: "success",
});
</script>

           <?php
         unset($_SESSION['update']);
       }
    
    ?>

    