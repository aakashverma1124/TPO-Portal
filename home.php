
<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
?>

<h1> Welcome! </h1>
<hr>
<div class="container" style="height: 100%; padding-top: 10%">
  <div class="row">
    <?php
      error_reporting(E_ALL & ~E_NOTICE);
      session_start(); 
      $admission_number = $_SESSION["admission_number"];
      // if($admission_number=='')
      //   $admission_number = "default";
      $remoteImageURL = './data/photos/'.$admission_number.'.jpg';
      if(@getimagesize($remoteImageURL)){
        //image exists!
      }else{
        $remoteImageURL = "./data/photos/default.jpg";
      }
      echo '<div class="col-md-4"><img style="height: 100%; width: 90%" src="'.$remoteImageURL.'"></div>';
    ?>
    <div class="col-md-8">
      <ul class="list-unstyled" style="padding-top: 4%; font-size: 35px">
      <?php
          session_start(); 
          $admission_number = $_SESSION['admission_number'];
          $name = $_SESSION['name'];
          $branch = get_branch($admission_number);
          echo '    
          <li>'.$name.'';
          if(is_personal_verified($admission_number) && is_academic_verified($admission_number))
          {
            echo '&nbsp;&nbsp;<img src="verified.png" width="25" height="25">';
          }echo '</li>';
          echo '
          <li>'.$admission_number.'</li>
          <li>'.$branch.'</li>
        </ul>';
        // <li><a href="profile.php">View Complete Profile</a></li>
      ?>
    </div>
  </div>
</div>
