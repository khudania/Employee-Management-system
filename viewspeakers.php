<?php
    $var='index.php';
    include('./config/config.php');
    include('./config/sessions.php');

    $empid = $_SESSION["empid"];

    // $id = $_SESSION["id"];
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
                <?php
        if(isset($_GET['view']))
        {
        $id=$_GET['view'];
        $sql = "SELECT * from speaker where id = '$id'";
            $res = mysqli_query($db,$sql);
            while($row = mysqli_fetch_assoc($res)){
                $_SESSION["id"] = $row['id'];
        ?>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "><?php echo $row['name']; ?>
                      <span class="float-right">
                          <a class="nav-link" href="editspeaker.php">
                            <i class="material-icons">edit</i>
                            </a>
                      </span>
                  </h4>
                  <p class="card-category"><?php echo $row['designation']; ?>, <?php echo $row['cname']; ?></p>
                </div>
                <div class="card-body">
                  <div class="mt-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="./assets/img/speaker/profile/<?php echo $row['simg'];?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-5">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Event</td>
                                        <td><?php echo $row['event'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Want to be</td>
                                        <td><?php echo $row['stype'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact Number</td>
                                        <td><?php echo $row['contact'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="col-md-5">
                            
                                    <div class="card text-center p-4 shadow">
                                        <p style="color:#fff">Company Logo</p>
                                        <img src="./assets/img/speaker/logo/<?php echo $row['clogo'];?>" alt="" class="img-fluid" style="width:150px; margin:auto">

                            </div>
                        </div>

                        
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card text-center" style="width:100%">
                                    <p class="text-light">Social Media</p>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">

                                                    <tr>
                                                <td> <a  class="p-4" href="<?php echo $row['linkedin']; ?>" target="_blank" rel="noopener noreferrer"> <i class="fa fa-linkedin fa-2x float-center" aria-hidden="true"></i></a></td>
                                                <td> <a  class="p-4" href="<?php echo $row['fb']; ?>" target="_blank" rel="noopener noreferrer"> <i class="fa fa-facebook fa-2x float-center" aria-hidden="true"></i></a></td>
                                                <td><a  class="p-4" href="<?php echo $row['twitter']; ?>" target="_blank" rel="noopener noreferrer"> <i class="fa fa-twitter fa-2x float-center" aria-hidden="true"></i></a></td>

                                            </tr>
                                                
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } }?>
            </div>
            </div>
        </div>
    </div>
</div>

    
    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->