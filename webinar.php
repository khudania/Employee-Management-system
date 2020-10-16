<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


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
                  <h4 class="card-title ">SAARC Webinar
                  </h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table emptable">
                      <thead class=" text-primary">
                         <th>#</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Company</th>
                      <th>Email</th>
                      <th>Contact</th>
                      </thead>
                      <tbody>
                      <?php
                    $sql = "SELECT * from saarcwebinar";
                    $res = mysqli_query($db,$sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                        <tr style="background-color:transparent">
                         <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['desig']; ?></td>
                        <td><?php echo $row['company']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
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



    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->