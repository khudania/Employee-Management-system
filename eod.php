<?php
$var='eod';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'h:i:s', time () );
$currentDate = date('Y-m-d', time());

if(isset($_POST['eod'])){

    $task = mysqli_real_escape_string($db, $_POST['task']);
    $desc = mysqli_real_escape_string($db, $_POST['desc']);
    
            $sql = "INSERT INTO eod(task,description, empid, date, time) 
            VALUES('$task','$desc', '$empid', '$currentDate', '$currentTime')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                // $msg = "EOD Added successfully";
                // echo "<script type='text/javascript'>alert('$msg');window.location.href='eod.php';</script>";
            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='eod.php'</script>";
            }
        }

?>

<!-- header component -->
<?php include('./components/head.php') ?>
<!-- end of header component -->


<body class="dark-edition" onload="startTime()">
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
            <div class="col-md-7">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">EOD Report</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table emptable">
                      <thead class=" text-primary">
                        <th>#</th>
                        <th>Project/Task</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                      </thead>
                      <tbody>
                    <?php
                      $sql = "SELECT * from eod where empid = '$empid' order by date desc";
                      $res = mysqli_query($db,$sql);
                      $i = 1;
                      while($row = mysqli_fetch_assoc($res)){
                        // $date = $row['date']; 
                        $task = $row['task'];
                        $desc = $row['description']; 
                        $date = $row['date'];
                        $time = $row['time'];
                        ?>
                        <tr style="background-color:transparent">
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $task; ?></td>
                          <td><?php echo $desc; ?></td>
                          <td><?php echo $date; ?></td>
                          <td><?php echo $time; ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add EOD For the Day
                    <span id="txt" class="float-right"></span>
                  </h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body mt-3">
                  <form method="post" action="eod.php">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Employee Id</label>
                          <input type="text" class="form-control" value="<?php echo $empid ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Project/Task<sup>*</sup></label>
                          <input type="text" class="form-control" name="task" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description<sup>*</sup></label>
                          <input type="text" class="form-control" name="desc" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="eod" class="btn btn-primary pull-right">Update EOD</button>
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



function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}


</script>


      <!-- header component -->
      <?php include('./components/footer.php') ?>
      <!-- end of header component -->