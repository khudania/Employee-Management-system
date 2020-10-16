<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

function GetImageExtension($imagetype)
  {
    if(empty($imagetype)) return false;
    switch($imagetype)
    {
      case 'image/bmp': return '.bmp';
      case 'image/gif': return '.gif';
      case 'image/jpeg': return '.jpg';
      case 'image/jpeg': return '.jpeg';
      case 'image/png': return '.png';
      default: return false;
    }
  }

if(isset($_POST['submit'])){
    //Speaker Image
    $target = "./assets/img/speaker/profile/".basename($_FILES["simg"]["name"]);
    $simg=$_FILES['simg']['name'];
    $error = $_FILES['simg']['error'];
    $imgtype=$_FILES['simg']['type'];
    $ext= GetImageExtension($imgtype);
    //Company logo
    $target1 = "./assets/img/speaker/logo/".basename($_FILES["clogo"]["name"]);
    $clogo=$_FILES['clogo']['name'];
    $error = $_FILES['clogo']['error'];
    $imgtype=$_FILES['clogo']['type'];
    $ext= GetImageExtension($imgtype);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $designation = mysqli_real_escape_string($db, $_POST['designation']);
    $cname = mysqli_real_escape_string($db, $_POST['cname']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $event = mysqli_real_escape_string($db, $_POST['event']);
    $stype = mysqli_real_escape_string($db, $_POST['stype']);
    // $simg = mysqli_real_escape_string($db, $_POST['simg']);
    // $clogo = mysqli_real_escape_string($db, $_POST['clogo']);
    $fb = mysqli_real_escape_string($db, $_POST['fb']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
    $twitter = mysqli_real_escape_string($db, $_POST['twitter']);

    // Check for same Category
   $query = "SELECT * FROM speaker WHERE email = '$email'";
    $result = mysqli_query($db,$query);

    // if Category already exists
    if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Speaker Already exists!')</script>";
            echo "<script>window.location.href='speakers.php'</script>";
        }
        else{
            $sql = "INSERT INTO speaker(name,cname,designation,contact,email,event,stype,simg,clogo,fb,linkedin,twitter, empid) 
            VALUES('$name','$cname','$designation','$contact','$email','$event','$stype','$simg', '$clogo','$fb','$linkedin','$twitter', '$empid')";
            $res=mysqli_query($db,$sql);
          if (move_uploaded_file($_FILES['simg']['tmp_name'],$target) and move_uploaded_file($_FILES['clogo']['tmp_name'],$target1))
            {
                //if the values are successfully inserted, then move the images to respective folders
                $msg = "Speaker Added successfully";
                echo "<script type='text/javascript'>alert('$msg');window.location.href='speakers.php';</script>";
            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='speakers.php'</script>";
            }
        }
}
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
                  <h4 class="card-title ">Speakers Added By You
                      <span class="float-right">
                          <a class="nav-link" data-toggle="modal" data-target="#addSpeaker">
                            <i class="material-icons">add</i>
                            </a>
                      </span>
                  </h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table emptable">
                      <thead class=" text-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Event</th>
                        <th>Speaker type</th>
                        <th class="text-center">View Details</th>
                      </thead>
                      <tbody style="background-color:transparent">
                      <?php
                          $sql = "SELECT * from speaker where empid = '$empid' order by name asc";
                          $res = mysqli_query($db,$sql);
                          $i = 1;
                          while($row = mysqli_fetch_assoc($res)){
                            
                      ?>
                        <tr style="background-color:transparent;">
                          <td><?php echo $i++ ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['cname']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['contact']; ?></td>
                          <td><?php echo $row['event']; ?></td>
                          <td><?php echo $row['stype']; ?></td>
                          <td class="text-center">
                              <a href="viewspeakers.php?view=<?php echo $row['id'];?>" class="text-success text-center"><i
                                      class="fa fa-eye float-center" aria-hidden="true"></i></a> 
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">Speakers Added By Others</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table emptable">
                      <thead class="">
                          <th>#</th>
                          <th>Name</th>
                          <th>Company Name</th>
                          <th>Event</th>
                          <th>Speaker Type</th>
                      </thead>
                      <tbody>
                       <?php
                          $sql = "SELECT * from speaker where empid != '$empid' order by name asc ";
                          $res = mysqli_query($db,$sql);
                          $i = 1;
                          while($row = mysqli_fetch_assoc($res)){
                      ?>
                        <tr style="background-color:transparent">
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['cname']; ?></td>
                          <td><?php echo $row['event']; ?></td>
                          <td><?php echo $row['stype']; ?></td> 
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!-- Add Speaker Modal -->
    <div class="modal fade" id="addSpeaker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="speakers.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name<sup>*</sup></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation<sup>*</sup></label>
                            <input type="text" class="form-control" id="designation" name="designation" required>
                        </div>
                        <div class="form-group">
                            <label for="cname">Company Name<sup>*</sup></label>
                            <input type="text" class="form-control" id="cname" name="cname" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="event">Event<sup>*</sup></label>
                            <select class="form-control" id="event" name="event" required>
                                <?php
                                    $sql = "SELECT * from event";
                                    $res = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($res)){
                                ?>
                                    <option class="text-dark" value="<?php echo $row['event']; ?>"><?php echo $row['event']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stype">Speaker Type<sup>*</sup></label>
                            <select class="form-control" id="stype" name="stype" required>
                                <option class="text-dark" value="Jury">Jury</option>
                                <option class="text-dark" value="Moderator">Moderator</option>
                                <option class="text-dark" value="Speaker">Speaker</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="simg">Speaker Image<sup>*</sup></label>
                            <input type="file" class="custom-file-input text-light" id="simg" name="simg" required>
                            <!-- <label class="custom-file-label text-light" for="simg">Choose file</label> -->
                        </div>
                        <div class="form-group">
                            <label for="clogo">Company Logo<sup>*</sup></label>
                            <input type="file" class="custom-file-input" id="clogo" name="clogo" required>
                        </div>
                        <div class="form-group">
                            <label for="fb">Facebook</label>
                            <input type="url" class="form-control" id="fb" name="fb">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="url" class="form-control" id="twitter" name="twitter">
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Speaker Modakl -->

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->