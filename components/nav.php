<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">

      <div class="logo">
           <?php 
        $sql = "select name from employee where empid = '$empid'";
        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
    ?>
          <a href="profile.php" class="simple-text logo-normal">
          <?php echo $row['name']; ?>
        </a>
         <?php }?>
    </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
      
          <li class="nav-item ">
            <a class="nav-link" href="speakers.php">
              <i class="material-icons">content_paste</i>
              <p>Speakers</p>
            </a>
          </li>
      
       
          <li class="nav-item ">
            <a class="nav-link" href="companies.php">
              <i class="material-icons">content_paste</i>
              <p>Companies</p>
            </a>
          </li>
      
          <li class="nav-item ">
            <a class="nav-link" href="eod.php">
              <i class="material-icons">assignment_turned_in</i>
              <p>EOD</p>
            </a>
          </li>
       
          <hr>
         
       
          <li class="nav-item ">
            <a class="nav-link" href="photos.php">
              <i class="material-icons">photo</i>
              <p>Posters</p>
            </a>
          </li>
      
          <li class="nav-item ">
            <a class="nav-link" href="logos.php">
              <i class="material-icons">camera</i>
              <p>Logos</p>
            </a>
          </li>
       
          <hr>
         
           <li class="nav-item ">
            <a class="nav-link" href="webinar.php">
              <i class="material-icons">content_paste</i>
              <p>Form Data</p>
            </a>
          </li>
          <hr>
           <li class="nav-item ">
            <a class="nav-link" href="profile.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
      
       
           <li class="nav-item ">
            <a class="nav-link" href="task.php">
              <i class="material-icons">person</i>
              <p>Task</p>
            </a>
          </li>
      
        </ul>
      </div>
    </div>
