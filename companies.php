
<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
?>

<h1> Welcome! </h1>
<hr>
<div class="container" style="height: 100%; padding-top: 10%">
  <div class="row">
    <div class="col-md-4"><img style="height: 100%; width: 90%" src="image.jpg"></div>
    <div class="col-md-8">
      <ul class="list-unstyled" style="padding-top: 4%;">
      <?php
          session_start(); 
          $admission_number = $_SESSION['admission_number'];
          $name = $_SESSION['name'];
          $branch = get_branch($admission_number);
          echo '    
          <li>'.$admission_number.'</li>
          <li>'.$name.'</li>
          <li>'.$branch.'</li>
          <li><a href="profile.php">View Complete Profile</a></li>
        </ul>';
      ?>
    </div>
  </div>
</div>
