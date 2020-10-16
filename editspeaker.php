<?php
$var='companies';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];
$id = $_SESSION["id"];

// Profile Update Logics
if(isset($_POST['update'])){
  
            $cname = $_POST['cname'];
            $contact = $_POST['contact'];
            $designation = $_POST['designation'];
            $email = $_POST['email'];
            $event = $_POST['event'];
            $name = $_POST['name'];
            $linkedin = $_POST['linkedin'];
            $fb = $_POST['fb'];
            $twitter = $_POST['twitter'];
  $query = "UPDATE speaker set name='".$name."', designation='".$designation."', cname='".$cname."', contact='".$contact."', email='".$email."', event='".$event."', fb='".$fb."', linkedin='".$linkedin."', twitter='".$twitter."' where id = '$id'";
	$result = mysqli_query($db,$query);
  if ($result) {

			$msg = "Profile was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='editspeaker.php;</script>";

		}
		else {
			$msg = "Failed to update Profile";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='editspeaker.php';</script>";
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
                  <h4 class="card-title">Edit Speaker</h4>
                  <p><?php echo $id; ?></p>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                    <?php
  
      $sql = "select * from speaker where id = '$id'";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
          // $id = $row['id'];   
          $cname = $row['cname'];
          $contact = $row['contact'];
          $designation = $row['designation'];
          $email = $row['email'];
          $event = $row['event'];
          $stype = $row['stype'];
          $simg = $row['simg'];
          $clogo = $row['clogo'];
          $name = $row['name'];
          $linkedin = $row['linkedin'];
          $fb = $row['fb'];
          $twitter = $row['twitter'];
        }
        
        ?>
                  <form method="post" action="editspeaker.php">
                    <div class="row">
                        <label name="id_name" style="display:none"><?php echo $id; ?></label>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Speaker Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Speaker type</label>
                          <input type="text" class="form-control" name="stype" value="<?php echo $stype; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Event</label>
                          <select class="form-control" id="event" name="event" required>
                                
                                    <option class="text-dark" value="<?php echo $event; ?>"><?php echo $event; ?></option>
                                    <?php
                                    $sql = "SELECT * from event where event != '$event'";
                                    $res = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($res)){
                                ?>
                                    <option class="text-dark" value="<?php echo $row['event']; ?>"><?php echo $row['event']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Designation</label>
                          <input type="text" class="form-control" name="designation" value="<?php echo $designation; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company Name</label>
                          <input type="text" class="form-control" name="cname" value="<?php echo $cname; ?>">
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
                          <label class="bmd-label-floating">Facebook</label>
                          <input type="url" class="form-control" name="fb" value="<?php echo $fb; ?>">
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
                          <label class="bmd-label-floating">Twitter </label>
                          <input type="url" class="form-control" name="twitter" value="<?php echo $twitter; ?>">
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