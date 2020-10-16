<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];

date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y', time () );

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
        <?php
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
        ?>
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">Total Speakers</p>
                <?php 
                    $sql = "select count(*) as total from speaker";
                    $res = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                  <h3 class="card-title"><?php echo $row['total']; ?></h3>
                <?php }?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-warning">table</i>
                  <a href="speakers.php" class="warning-link">View All Speakers</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Total Companies</p>
                <?php 
                    $sql = "select count(*) as total from companies";
                    $res = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                <h3 class="card-title"><?php echo $row['total']; ?></h3>
                <?php }?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i
                    class="material-icons text-success">date_range</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="companies.php" class="success-link">View All Companies</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Speaker Added By You</p>
                <?php 
                    $sql = "select count(*) as total from speaker where empid = '$empid'";
                    $res = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                <h3 class="card-title"><?php echo $row['total']; ?></h3>
                <?php } ?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">local_offer</i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="speakers.php" class="text-white">View Speakers</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="fa fa-building"></i>
                </div>
                <p class="card-category">Companies Added by You</p>
                <?php 
                    $sql = "select count(*) as total from companies where empid = '$empid'";
                    $res = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                <h3 class="card-title"><?php echo $row['total']; ?></h3>
                <?php } ?>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i
                    class="material-icons">update</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="companies.php" style="color: #00ccff">View Companies</a>
                </div>
              </div>
            </div>
          </div>
        </div>
            <?php } ?>

        <div class="row">
          <div class="col-md-6">
              <div class="row">
                      <!-- cards -->
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                              <i class="fa fa-building"></i>
                            </div>
                            <p class="card-category">SAARC Webinar Registration</p>
                            <?php 
                                $sql = "select count(*) as total from saarcwebinar";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                            ?>
                            <h3 class="card-title"><?php echo $row['total']; ?></h3>
                            <?php } ?>
                          </div>
                          <div class="card-footer">
                            <!-- <div class="stats">
                              <i
                                class="material-icons">update</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="companies.php" style="color: #00ccff">View Companies</a>
                            </div> -->
                          </div>
                        </div>
                      </div>
                      <!-- end of card -->
                       <!-- cards -->
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                              <i class="fa fa-building"></i>
                            </div>
                            <p class="card-category">SAARC Webinar Registration</p>
                            <?php 
                                $sql = "select count(*) as total from saarcwebinar";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                            ?>
                            <h3 class="card-title"><?php echo $row['total']; ?></h3>
                            <?php } ?>
                          </div>
                          <div class="card-footer">
                            <!-- <div class="stats">
                              <i
                                class="material-icons">update</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="companies.php" style="color: #00ccff">View Companies</a>
                            </div> -->
                          </div>
                        </div>
                      </div>
                      <!-- end of card -->
                       <!-- cards -->
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                              <i class="fa fa-building"></i>
                            </div>
                            <p class="card-category">SAARC Webinar Registration</p>
                            <?php 
                                $sql = "select count(*) as total from saarcwebinar";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                            ?>
                            <h3 class="card-title"><?php echo $row['total']; ?></h3>
                            <?php } ?>
                          </div>
                          <div class="card-footer">
                            <!-- <div class="stats">
                              <i
                                class="material-icons">update</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="companies.php" style="color: #00ccff">View Companies</a>
                            </div> -->
                          </div>
                        </div>
                      </div>
                      <!-- end of card -->
                       <!-- cards -->
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-stats">
                          <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                              <i class="fa fa-building"></i>
                            </div>
                            <p class="card-category">SAARC Webinar Registration</p>
                            <?php 
                                $sql = "select count(*) as total from saarcwebinar";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                            ?>
                            <h3 class="card-title"><?php echo $row['total']; ?></h3>
                            <?php } ?>
                          </div>
                          <div class="card-footer">
                           
                          </div>
                        </div>
                      </div>
                      <!-- end of card -->
              </div>
          </div>
          <div class="col-md-6">
            <div class="card p-4">
            <canvas id="myBarChart"></canvas>
            </div>
            <script>
            var ctx = document.getElementById("myBarChart");
                        var myBarChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: [
                              <?php 
                              $sql = "SELECT department from employee group by department order by department asc";
                              $res = mysqli_query($db,$sql);
                              while($row = mysqli_fetch_assoc($res)){
                                $dept =  $row['department'];
                              ?>
                                "<?php echo $dept ?>",

                              <?php }?>
                            ],
                            // labels: ["Information Technology", "Demo2", "Demo2", "Demo2", "Demo2", "Demo2"],
                            datasets: [{
                              label: "Employee Count",
                              backgroundColor: [
                                "#4e73df", 
                                "red", 
                                "green", 
                                "purple", 
                                "teal", 
                                "#fcba03", 
                                "#fc038c", 
                                "#a103fc",
                                "#03dffc",
                                "#03fcb1",
                                "#adfc19",
                                "#f8fc19",
                              ],
                              hoverBackgroundColor: [
                                "#4e73df", 
                                "red", 
                                "green", 
                                "purple", 
                                "teal", 
                                "#fcba03", 
                                "#fc038c", 
                                "#a103fc",
                                "#03dffc",
                                "#03fcb1",
                                "#adfc19",
                                "#f8fc19",
                              ],
                              borderColor: "#4e73df",
                              // data: [4215, 5312, 6251, 7841, 9821, 14984],
                              data: [
                                <?php
                                $sql = "SELECT count(*) as total, department from employee group by department order by department asc";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                                  $dept = $row['department'];
                                  $total =  $row['total'];
                                ?>
                              <?php echo $total; ?>,

                                <?php } ?>
                              ],
                            }],
                          },
                          options: {
                            maintainAspectRatio: false,
                            layout: {
                              padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                              }
                            },
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'month'
                                },
                                gridLines: {
                                  display: false,
                                  drawBorder: false
                                },
                                ticks: {
                                  maxTicksLimit: 6
                                },
                                maxBarThickness: 25,
                              }],
                              yAxes: [{
                                ticks: {
                                  min: 0,
                                  max: 50,
                                  maxTicksLimit: 5,
                                  padding: 10,
                                  // Include a dollar sign in the ticks
                                  
                                },
                                gridLines: {
                                  color: "rgb(234, 236, 244)",
                                  zeroLineColor: "rgb(234, 236, 244)",
                                  drawBorder: false,
                                  borderDash: [2],
                                  zeroLineBorderDash: [2]
                                }
                              }],
                            },
                            legend: {
                              display: false
                            },
                            tooltips: {
                              titleMarginBottom: 10,
                              titleFontColor: '#6e707e',
                              titleFontSize: 14,
                              backgroundColor: "rgb(255,255,255)",
                              bodyFontColor: "#858796",
                              borderColor: '#dddfeb',
                              borderWidth: 1,
                              xPadding: 15,
                              yPadding: 15,
                              displayColors: false,
                              caretPadding: 10,
                             
                            },
                          }
                        });

                      </script>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Quote of the Day! <span
                        class="float-right"><?php echo $currentTime; ?></span></h4>
                    <p class="card-category"></p>
                  </div>
                  <div class="card-body table-responsive">
                    <?php
               $sql = "SELECT * from quote";
                $res = mysqli_query($db,$sql);
                while($row = mysqli_fetch_assoc($res)){
              ?>
                    <br>
                    <h2 class="text-center"><?php echo $row['quote']; ?></h2>
                    <h4 class="text-right">-- <?php echo $row['writer']; ?></h4>
                    <?php } ?>
                  </div>
                </div>
                <?php
        if($_SESSION['priorities']['companies']=='2' || $_SESSION['priorities']['companies']=='1') {
        ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header card-header-warning">
                        <h4 class="card-title">Speakers</h4>
                        <p class="card-category"></p>
                      </div>
                      <div class="card-body table-responsive">
                        <table class="table emptable">
                          <thead class="text-primary">
                            <th class="text-primary">#</th>
                            <th class="text-primary">Name</th>
                            <th class="text-primary">Designation</th>
                            <th class="text-primary">Company Name</th>
                            <th class="text-primary">Event</th>
                            <th class="text-primary">Speaker Type</th>
                          </thead>
                          <tbody>
                            <?php
                    $sql = "SELECT * from speaker where empid = '$empid'";
                    $res = mysqli_query($db,$sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                            <tr style="background-color:transparent">
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['designation']; ?></td>
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
                    <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
              <div class="card-header card-header-tabs card-header-warning">
                <h4 class="card-title">Announcements
                  
                </h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body">
              <hr>
              <?php
                    $sql = "SELECT * from announcement order by id desc";
                    $res = mysqli_query($db,$sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                      $empid1 = $row['empid'];
                      $notice = $row['notice'];
                      
                    $sql1 = "Select * from employee where empid = '$empid1'";
                    $res1 = mysqli_query($db,$sql1);
                      while($row = mysqli_fetch_assoc($res1)){
                        $name = $row['name'];
                ?>
                <p>
                  <span style="font-weight:bolder; font-size:20px; color: #fff"><?php echo $name?>:</span>
                  &nbsp;&nbsp;<?php echo $notice ?>
                </p>
                <hr>
                <?php } } ?>
              </div>
            </div>
            </div>
          </div>
          <?php
        if($_SESSION['priorities']['companies']=='2' || $_SESSION['priorities']['companies']=='1') {
        ?>
          <div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                <h4 class="card-title">Companies</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body table-responsive">
                <table class="table emptable">
                  <thead class="text-warning">
                    <th class="text-warning">#</th>
                    <th class="text-warning">Name</th>
                    <th class="text-warning">Company</th>
                    <th class="text-warning">Email</th>
                    <th class="text-warning">Contact</th>
                    <th class="text-warning">Category</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * from companies where empid = '$empid'";
                    $res = mysqli_query($db,$sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                    <tr style="background-color:transparent">
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['cname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['category']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
                    <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->