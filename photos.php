<?php
    $var='companies';
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
    $target = "./assets/img/media/posters/".basename($_FILES["pimg"]["name"]);
    $pimg=$_FILES['pimg']['name'];
    $error = $_FILES['pimg']['error'];
    $imgtype=$_FILES['pimg']['type'];
    $ext= GetImageExtension($imgtype);

    $name = mysqli_real_escape_string($db, $_POST['poster']);
    $event = mysqli_real_escape_string($db, $_POST['event']);
    $purpose = mysqli_real_escape_string($db, $_POST['purpose']);
    

    // Check for same Category
   $query = "SELECT * FROM poster WHERE name = '$name'";
    $result = mysqli_query($db,$query);

    // if Category already exists
    if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Poster Name Already exists!')</script>";
            echo "<script>window.location.href='photos.php'</script>";
        }
        else{
            $sql = "INSERT INTO poster(event,name,purpose,pimg,empid) 
            VALUES('$event','$name','$purpose','$pimg','$empid')";
            $res=mysqli_query($db,$sql);
          if (move_uploaded_file($_FILES['pimg']['tmp_name'],$target))
            {
                //if the values are successfully inserted, then move the images to respective folders
                $msg = "Poster Added successfully";
                echo "<script type='text/javascript'>alert('$msg');window.location.href='photos.php';</script>";
            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='photos.php'</script>";
            }
        }
}

?>

<!-- header component -->
<?php include('./components/head.php'); ?>
<!-- end of header component -->

<!-- Main Body -->
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
                <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Photos</h4>
                    </div>
                </div>
                    <div class="row">
                     <?php
                        $sql = "SELECT * from poster";
                        $res = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                            
                    ?>
                        <div class="col-md-6">
                       
                            <div class="card card-stats">
                                <div class="card-header card-header-success">
                                    <h4 class="card-title"><?php echo $row['name']; ?></h4>
                                </div>
                                <div class="card-body text-center">
                                   <img src="./assets/img/speaker/profile/IMG-20160529-WA0039.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="card-footer text-light">
                                   <p>Event :- <?php echo $row['event']; ?><br>Purpose :- <?php echo $row['purpose']; ?></p>
                                </div>
                            </div>
                        </div>
                      <?php }?>
                    </div>
                          
                </div>
                <div class="col-md-5">
                    <div class="card card-stats">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add Photos</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="photos.php">
                                <div class="form-group">
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
                                    <input class="form-control" type="text" name="poster" id="poster" placeholder="Poster Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="purpose" id="purpose" placeholder="Purpose">
                                </div>
                                <div class="form-group float-left">
                                    <label for="pimg">Add Posters<sup>*</sup></label>
                                    <input type="file" class="form-control" id="pimg" name="pimg" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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