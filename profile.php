<?php include_once('./includes/connection.php');  ?>
<!doctype html>
<html lang="en">
  <head>
    <style>
     a.list-group-item.active{
      background-color: #215173;
      border: 0px;
     }
     a.list-group-item{
      background-color: unset;
      color: #215173;
     }
  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- linking stylesheet -->
    <link rel="stylesheet" href="./includes/css/style.css">
    <!-- <script scr="./includes/js/script.js"></script> -->
    <title>TPO Portal</title>
  </head>
  <body background="bg.jpg">
     <!-- Include Navbar --> 
     <?php include_once('./includes/navbars/navbar_profile.php'); ?>

  <?php
       error_reporting(E_ALL & ~E_NOTICE);
     //get the get parameters from url
      if (isset($_SESSION['message'])) {
         //echo $_GET['message'];
         echo '<script>alert("'.$_SESSION["message"].'")</script>';
         unset($_SESSION["message"]);
         //header('Location: '.$newURL);
      }
  ?>
    <!-- Modal starts here-->
    <!-- <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
         Modal content-->
        <!-- <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">User Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="./validate_login.php" method="post">
              <div class="form-group">
                <label for="user_name">Admission No:</label>
                <input type="text" placeholder="Your admission number" class="form-control" id="admission_number" name="admission_number">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" placeholder="Your password" class="form-control" id="password" name="password">
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div> -->
          <!-- Model body ends here -->
       <!--  </div>
      </div>
    </div> -->
    <!-- Model ends here -->

    <div class="container ">
      <div class="row" style="height:100%">
        <div class="col-md-3">
          <div class="list-group">
            <div class="imgcontainer">
            <img src="ABESEC_logo.png" alt="ABESEC" class="abes">
          </div>
            <a href="#" class="list-group-item active" id="home">Home</a>
            <a href="#" class="list-group-item" id="profile">Profile</a>
            


            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="list-group-item" data-toggle="collapse" id="current_openings" href="#companies">Companies ></a>
                </div>
                <div id="companies" class="panel-collapse collapse">
                    <a href="#" class="list-group-item" id="current_openings">Current Openings</a>
                    <a href="#" class="list-group-item" id="registered_companies">Registered Companies</a>                  
                </div>
              </div>
            </div>  
            <a href="#" class="list-group-item" id="contact" " >Contact</a>
          </div>
        </div>
        <div id="loadedPage" class="col-md-9">
          <!-- Page data comes here -->
        </div>
      </div>
    </div> 

<script>
            var items = document.getElementsByClassName("list-group-item active");
            var item = items[0].id;
            $.ajax({
             type: "POST",
             url: './ajax.php',
             data:{action : item},
             success:function(html) {
               res = html;
               document.getElementById("loadedPage").innerHTML = res;
             },
             error: function (textStatus, errorThrown) {
                  alert("Error Occured!");
              }
            });  
              
            //for onclick event change  
            var $lis = $('.list-group a')
            $lis.on('click', function(){
              $lis.removeClass('active');
              $(this).addClass('active');
              var items = document.getElementsByClassName("list-group-item active");
              var item = items[0].id;
              //alert(item);
              $.ajax({
               type: "POST",
               url: './ajax.php',
               data:{action : item},
               success:function(html) {
                 res = html;
                 document.getElementById("loadedPage").innerHTML = res;
               },
               error: function (textStatus, errorThrown) {
                    alert("Error Occured!");
                }
              }); 
            });

            function onEditButtonClicked(){
               //alert("bakwaas");
               document.getElementsByClassName('update-button')[0].style.visibility = "visible";
               var items = document.querySelectorAll('.field_value input');
                for (i = 0; i < items.length; ++i) {
                  items[i].readOnly = false;
                  items[i].style.border = "1px solid";
                } 

                var items = document.querySelectorAll('.field_value textarea');
                for (i = 0; i < items.length; ++i) {
                  items[i].readOnly = false;
                  items[i].style.border = "1px solid";
                } 
                        
            }


            function onEditAcademicButtonClicked(){
               //alert("bakwaas");
               document.getElementsByClassName('update-academic-button')[0].style.visibility = "visible";
               var items = document.querySelectorAll('.academic-field-value input');
                for (i = 0; i < items.length; ++i) {
                  items[i].readOnly = false;
                  items[i].style.border = "1px solid";
                } 

                var items = document.querySelectorAll('.academic-field-value textarea');
                for (i = 0; i < items.length; ++i) {
                  items[i].readOnly = false;
                  items[i].style.border = "1px solid";
                } 
                        
            }

            
            function onEditProjectButtonClicked(){
               //alert("bakwaas");
               document.getElementsByClassName('update-project-button')[0].style.visibility = "visible";
               var items = document.querySelectorAll('.project-field-value input');
                for (i = 0; i < items.length; ++i) {
                  items[i].readOnly = false;
                  items[i].style.border = "1px solid";
                } 

                var items = document.querySelectorAll('.project-field-value textarea');
                for (i = 0; i < items.length; ++i) {
                  items[i].readOnly = false;
                  items[i].style.border = "1px solid";
                } 
                        
            }

            function onUpdateButtonClicked(){

              var form = document.getElementById("personalInfoForm");
              let jsonObject = {};
              for(let field of form.elements) {
                if (field.name) {
                    jsonObject[field.name] = field.value;
                }
              }  
              console.log(JSON.stringify(jsonObject)); 
              $.ajax({
               type: "POST",
               url: './updateProfile.php',
               data:{action : JSON.stringify(jsonObject)},
               success:function(html) {
                 res = html;
                 alert(res);
                 document.getElementsByClassName('update-button')[0].style.visibility = "hidden";

                 //again set fields uneditable
                  var items = document.querySelectorAll('.field_value input');
                  for (i = 0; i < items.length; ++i) {
                    items[i].readOnly = true;
                    items[i].style.border = "0";
                  } 

                  var items = document.querySelectorAll('.field_value textarea');
                  for (i = 0; i < items.length; ++i) {
                    items[i].readOnly = true;
                    items[i].style.border = "0";
                  } 
                 //document.getElementById("loadedPage").innerHTML = res;
               },
               error: function (textStatus, errorThrown) {
                    alert("Error Occured!");
                }
              }); 

            }

            function onUpdateAcademicButtonClicked(){
              let jsonObject = {};
              var divElem = document.getElementById("academic-form");
              var inputElements = divElem.querySelectorAll("input, textarea");
              console.log(inputElements);
              for(i=0; i<inputElements.length;i++){
                jsonObject[inputElements[i].name] = inputElements[i].value;
                //console.log(inputElements[i].name);
                //console.log(inputElements[i].value);
              }  
              console.log(JSON.stringify(jsonObject)); 
              $.ajax({
               type: "POST",
               url: './updateAcademicInfo.php',
               data:{action : JSON.stringify(jsonObject)},
               success:function(html) {
                 res = html;
                 alert(res);
                 document.getElementsByClassName('update-academic-button')[0].style.visibility = "hidden";

                 //again set fields uneditable
                  var items = document.querySelectorAll('.academic-field-value input');
                  for (i = 0; i < items.length; ++i) {
                    items[i].readOnly = true;
                    items[i].style.border = "0";
                  } 

                  var items = document.querySelectorAll('.academic-field-value textarea');
                  for (i = 0; i < items.length; ++i) {
                    items[i].readOnly = true;
                    items[i].style.border = "0";
                  } 
                 //document.getElementById("loadedPage").innerHTML = res;
               },
               error: function (textStatus, errorThrown) {
                    alert("Error Occured!");
                }
              }); 

            }

            function onUpdateProjectButtonClicked(){
              var form = document.getElementById("projectInfoForm");
              let jsonObject = {};
              for(let field of form.elements) {
                if (field.name) {
                    jsonObject[field.name] = field.value;
                }
              }  
              console.log(JSON.stringify(jsonObject)); 
              $.ajax({
               type: "POST",
               url: './updateProjectInfo.php',
               data:{action : JSON.stringify(jsonObject)},
               success:function(html) {
                 res = html;
                 alert(res);
                 document.getElementsByClassName('update-project-button')[0].style.visibility = "hidden";

                 //again set fields uneditable
                  var items = document.querySelectorAll('.project-field-value input');
                  for (i = 0; i < items.length; ++i) {
                    items[i].readOnly = true;
                    items[i].style.border = "0";
                  } 

                  var items = document.querySelectorAll('.project-field-value textarea');
                  for (i = 0; i < items.length; ++i) {
                    items[i].readOnly = true;
                    items[i].style.border = "0";
                  } 
                 //document.getElementById("loadedPage").innerHTML = res;
               },
               error: function (textStatus, errorThrown) {
                    alert("Error Occured!");
                }
              }); 

            }

            //password change
            function onPasswordChange(){
              var form = document.getElementById("password-form");
              let jsonObject = {};
              for(let field of form.elements) {
                if (field.name) {
                    jsonObject[field.name] = field.value;
                }
              }
              console.log(JSON.stringify(jsonObject));   

               $.ajax({
               type: "POST",
               url: './changePassword.php',
               data:{action : JSON.stringify(jsonObject)},
               success:function(html) {
                 res = html;
                 alert(res);
                 //document.getElementById("loadedPage").innerHTML = res;
               },
               error: function (textStatus, errorThrown) {
                    alert("Error Occured!");
                }
              }); 
            }

            function onRegisterButtonClicked(opening_id, admission_number){
              console.log(opening_id);
              console.log(admission_number);
              $.ajax({
               type: "POST",
               url: './register.php',
               data:{opening_id : opening_id},
               success:function(html) {
                 res = html;
                 alert(res);
               },
               error: function (textStatus, errorThrown) {
                    alert("Error Occured!");
                }
              }); 

            }

            
</script>

  </body>
</html>

