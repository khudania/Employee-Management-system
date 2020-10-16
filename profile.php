<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

// Update Password Logics

if(isset($_POST['insert'])){
	$old = $_POST['old'];
  //Encrypt Password
  $old = base64_encode(strrev(md5($old)));
	$password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

	$sql = "SELECT * from employee where empid = '$_SESSION[empid]'";
	$res = mysqli_query($db,$sql);
  $row = mysqli_fetch_assoc($res);
  $pass = $row['password'];
  if($old == $pass){
	if($password==$cpassword){
    //Encrypt Password
    $password = base64_encode(strrev(md5($password)));
		$select = "UPDATE employee set password='$password' where empid = '$_SESSION[empid]'";
		$result = mysqli_query($db,$select);
		if ($result) {

			$msg = "Password was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";

		}
		else {
			$msg = "Failed to update Password";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
		}
	}
  else {
    $msg = "Mismatch in password";
    echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
  }
}
	else {
		$msg = "Invalid old password, check again";
		echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
	}
}
// End of Update Password

// Profile Update Logics
if(isset($_POST['profile'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  // $desgination = $_POST['desgination'];
  // $department = $_POST['department'];
  $query = "UPDATE employee set name='".$name."', email='".$email."', contact='".$contact."' where empid = '$_SESSION[empid]'";
	$result = mysqli_query($db,$query);
  if ($result) {
			$msg = "Profile was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
		}
		else {
			$msg = "Failed to update Profile";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                    <?php
                      $sql = "select * from employee where empid = '$empid'";
                      $res = mysqli_query($db,$sql);
                      while($row = mysqli_fetch_assoc($res)){
                          $name = $row['name'];
                          $email = $row['email'];
                          $contact = $row['contact'];
                          $desgination = $row['desgination'];
                          $department = $row['department'];
                        }
                    ?>
                  <form method="post" action="profile.php">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Employee Id</label>
                          <input type="text" class="form-control" value="<?php echo $empid ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Designation</label>
                          <input type="text" class="form-control" name="desgination" value="<?php echo $desgination; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                          <input type="text" class="form-control" name="department" value="<?php echo $department; ?>" disabled>
                        </div>
                      </div>
                    </div>
                   
                    <button type="submit" name="profile" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <!-- <img class="img" src="./assets/img/faces/marc.jpg" /> -->
                    <img class="img" src="./assets/img/pro.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category"><?php echo $desgination; ?></h6>
                  <h4 class="card-title"><?php echo $name; ?></h4>
                  <!-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> -->
                </div>
              </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="card card-profile">
                  <div class="card-body">
                    <h4 class="card-title">Update Password</h4>
                    <form method="post" action="profile.php">
                      <div class="form-group">
                        <label for="opass" >Old Password</label>
                        <input type="password" name="old" class="form-control" id="opass">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword">
                      </div>
                      <button type="submit" name="insert" class="btn btn-primary btn-round mt-3">Update Password</bu>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->