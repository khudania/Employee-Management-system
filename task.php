<?php
$var='task';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'h:i:s', time () );
$currentDate = date('Y-m-d', time());


if(isset($_POST['assign'])){
    $empid1 = mysqli_real_escape_string($db, $_POST['employee']);
    $task = mysqli_real_escape_string($db, $_POST['task']);

   
            $sql = "INSERT INTO tasks(empid,assignedby,task,date,time) VALUES('$empid1','$empid','$task','$currentDate','$currentTime')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                // $msg = "Employee Added successfully";
                // echo "<script type='text/javascript'>alert('$msg');window.location.href='employee.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
        $msg = "Failed to add Task";
        echo "<script type='text/javascript'>alert('$msg');window.location.href='tasks.php';</script>";
        }
}



//To Progress
if(isset($_GET['progress'])){
  $sql="UPDATE tasks set status='1' where id='$_GET[progress]'";
  $res=mysqli_query($db,$sql);
}

//To Review
if(isset($_GET['review'])){
  $sql="UPDATE tasks set status='2' where id='$_GET[review]'";
  $res=mysqli_query($db,$sql);
}

//Delete
if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from tasks where id='$id'";
mysqli_query($db,$delete);
header("location: task.php");
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
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">TODO list
                   <?php
        if($_SESSION['priorities']['task']=='2') {
      ?>
                  <span><a class="float-right" data-toggle="modal" data-target="#exampleModal"> <i class="material-icons">add</i></a></span>
        <?php } ?>
                  </h4>
                 
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                    <div class="row">
                     <?php
                        $sql = "SELECT * from tasks where status = 0 and ( empid = '$empid' || assignedby = '$empid') order by date desc";
                        $res = mysqli_query($db,$sql);
                        // $i =1;
                        while($row = mysqli_fetch_assoc($res)){
                            $id1 = $row['id'];
                            $empid2 = $row['assignedby'];
                            $task = $row['task'];
                            $date = $row['date'];
                            $assignedby = $row['assignedby'];
                            $sql1 = "SELECT * from employee where empid = '$empid2'";
                            $res1 = mysqli_query($db,$sql1);
                            while($row = mysqli_fetch_assoc($res1)){
                                $name = $row['name'];
                          
                    ?>
                        <div class="col-md-12 mb-3">
                            <div class="card shadow p-3">
                            <p style="font-size:12px; color:#fff"><span><?php echo $date; ?></span><span class="float-right"><?php echo $name; ?></span></p>
                            <p style="color:#fff">Task: <?php echo $task; ?></p> 
                            <?php if($assignedby != $empid)  {?>                 
                            <a href="task.php?progress=<?php echo $id1; ?>" class="btn btn-success">In Progress</a>
                            <?php } ?>
                            </div>
                        </div>
                    <?php }} ?>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">In Progress
                  </h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                <div class="row">
                    <?php
                        $sql = "SELECT * from tasks where status = 1 and ( empid = '$empid' || assignedby = '$empid') order by date desc";
                        $res = mysqli_query($db,$sql);
                        // $i =1;
                        while($row = mysqli_fetch_assoc($res)){
                            $id1 = $row['id'];
                            $empid2 = $row['assignedby'];
                            $task = $row['task'];
                            $date = $row['date'];
                            $assignedby = $row['assignedby'];
                            $sql1 = "SELECT * from employee where empid = '$empid2'";
                            $res1 = mysqli_query($db,$sql1);
                            while($row = mysqli_fetch_assoc($res1)){
                                $name = $row['name'];
                          
                    ?>
                        <div class="col-md-12 mb-3">
                            <div class="card shadow p-3">
                            <p style="font-size:12px; color:#fff"><span><?php echo $date; ?></span><span class="float-right"><?php echo $name; ?></span></p>
                            <p style="color:#fff">Task: <?php echo $task; ?></p>   
                            <?php if($assignedby != $empid)  { ?>                  
                            <a href="task.php?review=<?php echo $id1; ?>" class="btn btn-primary">To Review</a>
                            <?php } ?>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">For Review
                  </h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                 <div class="row">
                   
                   <?php
                        $sql = "SELECT * from tasks where status = 2 and ( empid = '$empid' || assignedby = '$empid') order by date desc";
                        $res = mysqli_query($db,$sql);
                        // $i =1;
                        while($row = mysqli_fetch_assoc($res)){
                            $id1 = $row['id'];
                            $empid2 = $row['assignedby'];
                            $task = $row['task'];
                            $date = $row['date'];
                            $assignedby = $row['assignedby'];
                            $sql1 = "SELECT * from employee where empid = '$empid2'";
                            $res1 = mysqli_query($db,$sql1);
                            while($row = mysqli_fetch_assoc($res1)){
                                $name = $row['name'];
                          
                    ?>
                        <div class="col-md-12 mb-3">
                            <div class="card shadow p-3">
                            <p style="font-size:12px; color:#fff"><span><?php echo $date; ?></span><span class="float-right"><?php echo $name; ?></span></p>
                            <p style="color:#fff">Task: <?php echo $task; ?></p>
                            <?php if($assignedby != $empid)  { ?>                                    
                            <p class="text-danger" disabled>Will be Reviewed by <?php echo $name; ?></p>
                            <?php } else { ?>
                            <a href="task.php?delete=<?php echo $id1; ?>" class="btn btn-danger">Done</a>
                            <?php } ?>
                            </div>
                        </div>
                    <?php }} ?>
                 </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
  </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="task.php">
            <div class="form-group">
                <input type="text" class="form-control" name="task" placeholder="Task Description"/>
            </div>
            <div class="form-group">
                <select type="text" class="form-control" name="employee">
                <?php
                        $sql = "SELECT * from employee where empid != '$empid' order by name asc";
                        $res = mysqli_query($db,$sql);
                      
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option class="text-primary" value="<?php echo $row['empid'] ?>"><?php echo $row['name'] ?></option>
                        <?php } ?>
                  
                </select>
            </div>
            <button name="assign" type="submit" class="btn btn-success btn-sm">Assign</button>
        </form>
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