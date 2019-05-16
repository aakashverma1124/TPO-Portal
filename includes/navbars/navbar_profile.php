<header> 
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid ">

          <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="color: #d5dae2">TPO Student's Portal</a>
          </div>

          <div class="nav navbar-right">
            <!-- <li>
              <button class="btn btn-primary btn-sm " href="#" id="navbarDropdown" role="button" >
                Register
              </button>
              <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#myModal" role="button" >
                Login
              </button>
            </li> -->
            
            <!-- Retrieve username from session variable -->
            <?php 
              session_start();
              if(isset($_SESSION)){
                if($_SESSION["user_type"]=="admin"){
                   $name = "Admin"; 
                }else{
                  $name = $_SESSION["name"];
                 } 
                //echo $name;
              }

             echo 
             '<div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown">'.$name.'
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="./includes/logout.php">Logout</a></li>
                </ul>
              </div>';

            ?>

            
          </div>
        </div>
      </nav>
</header>