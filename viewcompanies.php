<?php
    $var='companies';
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
                    $sql = "SELECT * from companies where id = '$id' && empid = '$empid'";
                        $res = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                            $_SESSION["id"] = $row['id'];
                ?>
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title "><?php echo $row['cname']; ?>
                    <span class="float-right">
                        <a class="nav-link" href="editcompany.php">
                            <i class="material-icons">edit</i>
                            </a>
                    </span>
                </h4>
                <p class="card-category"><?php echo $row['ctype']; ?>, <?php echo $row['category']; ?></p>
                <p class="card-category"><a href="<?php echo $row['website']; ?>" target="blank"><?php echo $row['website']; ?></a></p>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-md-5">
                            <h5>Contact Person Detail</h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $row['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Designation</td>
                                        <td><?php echo $row['designation'];?></td>
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
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card p-4 shadow">
                                        <p style="color:#fff">Office Address</p>
                                        <p class="text-light"><?php echo $row['officeadd']; ?></p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="card p-4 shadow">
                                        <p style="color:#fff">Home Address</p>
                                        <p class="text-light"><?php echo $row['homeadd']; ?></p>
                                </div>
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
            <?php }} ?>
        </div>
    </div>
</div></div>
</div>

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->