<?php
include('./config/config.php');
session_start();
if (isset($_SESSION['admin'])) {
  header('location:index.php');
}
if (isset($_POST['log-btn'])) {
  $empid = mysqli_real_escape_string($db, $_POST['empid']);
  $pass = mysqli_real_escape_string($db, $_POST['password']);
  $pass = base64_encode(strrev(md5($pass)));
  $query="select * from employee where empid='$empid' and password='$pass' and active = 0";
  $res=mysqli_query($db,$query);
  if (mysqli_num_rows($res)==1) {
    $row=mysqli_fetch_array($res);
    $_SESSION['admin']=$row['status'];
    $_SESSION['id_admin']=$row['id'];
    $_SESSION['empid']=$row['empid'];

    $query1="select * from priorities where id_admin='$row[id]'";
    $result=mysqli_query($db,$query1);
    $_SESSION['priorities']=mysqli_fetch_array($result);
    header('location:index.php');
  }else {
    echo "<script>alert('invalid credentials');</script>";
  }
}
?>

<!-- header component -->
<?php include('./components/head.php') ?>
<!-- end of header component -->

<!-- Main Body -->

<body id="login" class="dark-edition">
  <div class="wrapper ">
    <!-- navbar component -->

    <!-- end of navbar component -->
    <div class="main-panel">
      <!-- Top navbar component -->
    
      <!-- end of Top navbar component -->
      <div class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <p class="text-center">
                <img src="http://testtechnologies.in/assests/imgs/testtronix-logo.png" alt="" class="img-fluid mb-3 text-center" style="margin:auto; height:60px"></p><br>
                <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="https://lh3.googleusercontent.com/proxy/FOZdfH1xg96eY0nDC3rqfzmY6mRLYQoMPdMUrfsTift_cTA8GlvpUPhOoHCSqMfDucr6IDe7cZx9H8z4CS5sKupw_3khwRM" />
                  </a>
                </div>
                <div class="card-body">
                  <form method="post" action="login.php">
                    <h3 class="text-center text-warning">Employee Portal Login</h3><br><br>
                    <div class="form-group">
                      <label for="empid">mailid</label>
                      <input type="text" class="form-control" name="empid" id="empid">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" style="background-color: transparent">
                    </div>
                    <button type="submit" name="log-btn" class="btn btn-primary">Login</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
      <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->