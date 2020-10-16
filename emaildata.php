<?php
$var='index.php';
// $var = 'export';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

date_default_timezone_set('Asia/Kolkata');
// $currentTime = date( 'h:i:s', time () );
$currentDate = date('Y-m-d', time());

if(isset($_POST['submit'])){
   
    $email = mysqli_real_escape_string($db, $_POST['email']);


    // Check for same Category
   $query = "SELECT * FROM emaildata WHERE email = '$email'";
    $result = mysqli_query($db,$query);

// if Category already exists
if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Email data Already exists!')</script>";
            echo "<script>window.location.href='emaildata.php'</script>";
        }
        else{
            $sql = "INSERT INTO emaildata(email,date, empid) 
            VALUES('$email','$currentDate', '$empid')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                $msg = "Data Added successfully";
                echo "<script type='text/javascript'>alert('$msg');window.location.href='emaildata.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='emaildata.php'</script>";
            }
        }
}


$query = "SELECT * from emaildata order by date desc";
if (!$result = mysqli_query($db, $query)) {
    exit(mysqli_error($db));
}

if (mysqli_num_rows($result) > 0) {
    $number = 1;
    $users = '<table class="table emptable">
       <thead class=" text-primary">
          <th>#</th>
          <th>Email</th>
          <th>Date</th>
        </thead>
        <tbody style="background-color:transparent">
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr style="background-color:transparent;">
            <td>'.$number.'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['date'].'</td>
        </tr>';
        $number++;
    }
    $users .= '</tbody>
              </table>';
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
          <div class="col-md-4 order-md-12">
            <div class="card shadow">
             <div class="card-header card-header-warning">
                  <h4 class="card-title ">Enter New Email
                 
                  </h4>
                </div>
                <div class="card-body p-3">
                    <form method="post" action="emaildata.php">    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" name="submit" class="btn btn-warning">Add</button>
                </form>
                </div>
            </div>
          </div>
          <div class="col-md-2 order-md-6"></div>
            <div class="col-md-6 order-md-1">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Email Data
                   <span style="float:right">
                   <?php if($_SESSION['priorities']['export']=='1') {
                     ?>
                      <div class="form-group">
                        <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
                    </div>
                 <?php  } ?>
                   
                  </span>
                  </h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table emptable">
                      <thead class=" text-primary">
                        <th>#</th>
                        <th>Email</th>
                         <th>Date</th>
                      </thead>
                      <tbody style="background-color:transparent">
                      
                      <?php
                          $sql = "SELECT * from emaildata order by date desc";
                          $res = mysqli_query($db,$sql);
                          $i = 1;
                          while($row = mysqli_fetch_assoc($res)){
                            
                      ?>
                        <tr style="background-color:transparent;">
                          <td>
                          <?php echo $i++ ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['date']; ?></td>
                          
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
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Speaker Modakl -->


    
    <script>
        function Export()
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("export.php", '_blank');
            }
        }
    </script>

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->