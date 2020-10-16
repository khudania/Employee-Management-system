<?php
    $var='index.php';
    include('./config/config.php');
    include('./config/sessions.php');

    $empid = $_SESSION["empid"];
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Logos</h4>
                                </div>
                                <div class="card-body text-center">
                                    <p>Testing</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Logos</h4>
                                </div>
                                <div class="card-body text-center">
                                    <p>Testing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                  <div class="card cad-stats">
                    <div class="card-header card-header-warning">
                      <h4 class="card-title">Logos</h4>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="form-group">
                          <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Logos</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <button class="btn btn-warning" type="submit">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header component -->
    <?php include('./components/footer.php') ?>
    <!-- end of header component -->