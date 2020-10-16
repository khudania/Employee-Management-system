<?php
$var='masterconnect';
// $var = 'export';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

date_default_timezone_set('Asia/Kolkata');
// $currentTime = date( 'h:i:s', time () );
$currentDate = date('Y-m-d', time());






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
                  <h4 class="card-title ">Master Connects Mentees Data
                  <span class="float-right">
                    <?php
                         $sql = "SELECT count(*) as total from masterconnectmentee";
                          $res = mysqli_query($db,$sql);
                          $i = 1;
                          while($row = mysqli_fetch_assoc($res)){
                              $total =  $row['total'];
                          }
                    ?>
                    Total Count: <?php echo $total ?>
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
                        <th>Email</th>
                        <th>Contact</th>
                        <th>College</th>
                        <th>City</th>
                        <th>Profile</th>
                        <th>Expertise</th>
                      </thead>
                      <tbody style="background-color:transparent">
                      
                      <?php
                          $sql = "SELECT * from masterconnectmentee order by id desc";
                          $res = mysqli_query($db,$sql);
                          $i = 1;
                          while($row = mysqli_fetch_assoc($res)){
                            
                      ?>
                        <tr style="background-color:transparent;">
                          <td>
                          <?php echo $i++ ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['contact']; ?></td>
                          <td><?php echo $row['college']; ?></td>
                          <td><?php echo $row['city']; ?></td>
                          <td><?php echo $row['profile']; ?></td>
                          <td><?php echo $row['expertise']; ?></td>
                          
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