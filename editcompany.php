<?php
$var='companies';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];
$id = $_SESSION["id"];

// Profile Update Logics
if(isset($_POST['update'])){
  
  $name = $_POST['name'];
  $cname = $_POST['cname'];
  $designation = $_POST['designation'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $website = $_POST['website'];
  $homeadd = $_POST['homeadd'];
  $officeadd = $_POST['officeadd'];
  $fb = $_POST['fb'];
  $linkedin = $_POST['linkedin'];
  $twitter = $_POST['twitter'];
  $github = $_POST['github'];
  $category = $_POST['category'];
  $ctype = $_POST['ctype'];
  $query = "UPDATE companies set name='".$name."', cname='".$cname."', designation='".$designation."', contact='".$contact."', email='".$email."', website='".$website."', homeadd='".$homeadd."', officeadd='".$officeadd."', fb='".$fb."', linkedin='".$linkedin."', twitter='".$twitter."', github='".$github."', category='".$category."', ctype='".$ctype."' where id = '$id'";
	$result = mysqli_query($db,$query);
  if ($result) {

			$msg = "Profile was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='editcompany.php;</script>";

		}
		else {
			$msg = "Failed to update Profile";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='editcompany.php';</script>";
		}
}

// End of Profile Update logic


      
?>

<!-- header component -->
<?php include('./components/head.php') ?>
<!-- end of header component -->


<body class="dark-edition">
  <div class="wrapper ">
    <!-- navbar component -->
    <?php include('./components/nav.php') ?>
    <!-- end of navbar component -->
    <div class="main-panel">
      <!-- Top navbar component -->
      <?php include('./components/topnav.php') ?>
      <!-- end of Top navbar component -->
      <div class="content">
      
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Company</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                    <?php
  
      $sql = "select * from companies where id = '$id'";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
          // $id = $row['id'];   
          $cname = $row['cname'];
          $ctype = $row['ctype'];
          $contact = $row['contact'];
          $designation = $row['designation'];
          $email = $row['email'];
          $name = $row['name'];
          $linkedin = $row['linkedin'];
          $fb = $row['fb'];
          $twitter = $row['twitter'];
          $github = $row['github'];
          $website = $row['website'];
          $officeadd = $row['officeadd'];
          $homeadd = $row['homeadd'];
          $category = $row['category'];
        }
        ?>
                  <form method="post" action="editcompany.php">
                    <div class="row">
                        <label name="id_name" style="display:none"><?php echo $id; ?></label>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input type="text" class="form-control" name="cname" value="<?php echo $cname; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company type</label>
                          <input type="text" class="form-control" name="ctype" value="<?php echo $ctype; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact Person Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Designation</label>
                          <input type="text" class="form-control" name="designation" value="<?php echo $designation; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Website </label>
                          <input type="url" class="form-control" name="website" value="<?php echo $website; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Linkedin</label>
                          <input type="url" class="form-control" name="linkedin" value="<?php echo $linkedin; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Facebook</label>
                          <input type="url" class="form-control" name="fb" value="<?php echo $fb; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Twitter </label>
                          <input type="url" class="form-control" name="twitter" value="<?php echo $twitter; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Github</label>
                          <input type="url" class="form-control" name="github" value="<?php echo $github; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Office Address</label>
                          <input type="text" class="form-control" name="officeadd" value="<?php echo $officeadd; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Home Address </label>
                          <input type="text" class="form-control" name="homeadd" value="<?php echo $homeadd; ?>">
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" name="update" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->