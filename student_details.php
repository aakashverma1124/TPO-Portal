<head>
  <style>
  .nav-link{
    color: #215173;
  }
  .nav-tabs .nav-link.active{
    background-color: #215173;
    color: azure;
  }
</style>
<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');

  error_reporting(E_ALL & ~E_NOTICE);
  session_start(); 
  $user_type = $_SESSION["user_type"];

echo '<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal" role="tab" aria-controls="nav-home" aria-selected="true">Personal</a>
    <a class="nav-item nav-link" id="nav-academic-tab" data-toggle="tab" href="#nav-academic" role="tab" aria-controls="nav-profile" aria-selected="true">Academic</a>';
    if($user_type == "user"){
      echo'  <a class="nav-item nav-link" id="nav-project-tab" data-toggle="tab" href="#nav-project" role="tab" aria-controls="nav-project" aria-selected="true">Project/Intern</a>
        <a class="nav-item nav-link" id="nav-photo-tab" data-toggle="tab" href="#nav-photo" role="tab" aria-controls="nav-photo" aria-selected="true">Photo/Resume</a>
        <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="true">Change Password</a>';
    }
  echo '</div>
</nav>';

echo '<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">';
    include_once('./profile/personal.php');
 echo' </div>
  <div class="tab-pane fade" id="nav-academic" role="tabpanel" aria-labelledby="nav-academic-tab">';
    // echo '<form id="academicInfoForm" method="post" action="./updateAcademicInfo.php>';
    include_once('./profile/academic.php'); 
  echo '
    </div>
  <div class="tab-pane fade" id="nav-project" role="tabpanel" aria-labelledby="nav-profile-tab">';
    if($user_type == "user")  
      include_once('./profile/project.php');
  echo '</div>
  <div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-photo-tab">';
    if($user_type == "user")
      include_once('./profile/photo.php'); 
  echo '</div>
  <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">';
    if($user_type == "user")
     include_once('./profile/password.php');
  echo '</div>
</div>';

?>