<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];



if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $cname = mysqli_real_escape_string($db, $_POST['cname']);
    $designation = mysqli_real_escape_string($db, $_POST['designation']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $website = mysqli_real_escape_string($db, $_POST['website']);
    $homeadd = mysqli_real_escape_string($db, $_POST['homeadd']);
    $officeadd = mysqli_real_escape_string($db, $_POST['officeadd']);
    $fb = mysqli_real_escape_string($db, $_POST['fb']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
    $twitter = mysqli_real_escape_string($db, $_POST['twitter']);
    $github = mysqli_real_escape_string($db, $_POST['github']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $ctype = mysqli_real_escape_string($db, $_POST['ctype']);

    // Check for same Category
   $query = "SELECT * FROM companies WHERE email = '$email'";
    $result = mysqli_query($db,$query);

// if Category already exists
if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('company Already exists!')</script>";
            echo "<script>window.location.href='companies.php'</script>";
        }
        else{
            $sql = "INSERT INTO companies(name,cname,designation,contact,email,website,homeadd,officeadd,fb,linkedin,twitter,github,category,ctype, empid) 
            VALUES('$name','$cname','$designation','$contact','$email','$website','$homeadd','$officeadd','$fb','$linkedin','$twitter','$github','$category','$ctype', '$empid')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                $msg = "Employee Added successfully";
                echo "<script type='text/javascript'>alert('$msg');window.location.href='companies.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='companies.php'</script>";
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
                  <h4 class="card-title ">Companies Added By You
                  <span class="float-right">
                          <a class="nav-link" data-toggle="modal" data-target="#addCompany">
                            <i class="material-icons">add</i>
                            </a>
                      </span></h4>

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
                        <th>Category</th>
                        <th class="text-center">View Details</th>
                      </thead>
                      <tbody>

                  <?php

                      $sql = "SELECT * from companies where empid = '$empid'";
                      $res = mysqli_query($db,$sql);
                      $i = 1;
                      while($row = mysqli_fetch_assoc($res)){
                        $_SESSION["id"] = $row['id'];
                  ?>
                <tr style="background-color:transparent">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td class="text-center">
                      <a href="viewcompanies.php?view=<?php echo $row['id'];?>" class="text-success text-center"><i
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
                  <h4 class="card-title mt-0">Companies Added By Others</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table emptable">
                      <thead class="">
                          <th>#</th>
                          <th>Name</th>
                          <th>Company Name</th>
                          <th>Category</th>
                      </thead>
                      <tbody>
                      <?php
                          $sql = "SELECT * from companies where empid != '$empid'";
                          $res = mysqli_query($db,$sql);
                          $i = 1;
                          while($row = mysqli_fetch_assoc($res)){
                      ?>
                <tr style="background-color:transparent">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['cname']; ?></td> 
                    <td><?php echo $row['category']; ?></td>
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

  <!-- Add Company Modal -->
    <div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="post" action="companies.php">
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
                            <label for="ctype">Company Type</label>
                            <select class="form-control" id="ctype" name="ctype">
                                <option class="text-dark" value="startup">Startup</option>
                                <option class="text-dark" value="mnc">MNC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Company Category</label>
                            <select class="form-control" id="category" name="category">
                                <?php
                                    $sql = "SELECT * from category";
                                    $res = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($res)){
                                ?>
                                    <option class="text-dark" value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact<sup>*</sup></label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email<sup>*</sup></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="website">Website<sup>*</sup></label>
                            <input type="url" class="form-control" id="website" name="website" required>
                        </div>
                        <div class="form-group">
                            <label for="homeadd">Home Adress</label>
                            <input type="text" class="form-control" id="homeadd" name="homeadd">
                        </div>
                        <div class="form-group">
                            <label for="officeadd">Office Adress<sup>*</sup></label>
                            <input type="text" class="form-control" id="officeadd" name="officeadd" required>
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
                        <div class="form-group">
                            <label for="github">Github</label>
                            <input type="url" class="form-control" id="github" name="github">
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Company Modakl -->


    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->