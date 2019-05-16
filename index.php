<!doctype html>
<html lang="en" style="height: 100%; width: 100%">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>TPO Portal</title>
    <style>
      body {
        background-image:url("./images/front.jpeg");
      }

      @media only screen and (max-width: 600px) {
        body {
          background-color: lightblue;
        }
      }
</style>
  </head>
  <body>
     <?php include_once('./includes/navbars/navbar_login.php'); ?>

    <?php
      if (isset($_GET['status'])) {
         if($_GET['status']=="failed"){
           // echo("Login Failed");
            echo "<script>alert('Login Failed! Check username or password');</script>";
         }
      }
    ?>

    <!-- Modal starts here-->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
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
              <button type="submit" class="btn btn-dark">Submit</button>
            </form>
          </div>
          <!-- Model body ends here -->
        </div>
      </div>
    </div>
    <!-- Model ends here -->
    <div class="container">
          <h1 style="font-size: 100px;color: #330000;margin-top: 15%;font-family: initial;">ABES</h1>
          <h1 style="font-size: 50px;color: #330000;font-family: initial;">Engineering College</h1>
          <h1 style="color: #330000;"><span
             class="txt-rotate"
             data-period="2000"
             data-rotate='[ "Because it matters.","Connect life and technology.","Where science is leading."]'></span>
           </h1>
  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Script for typing effect -->
    <script type="text/javascript">
        var TxtRotate = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 8) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
          };

          TxtRotate.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
              this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
              this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
              delta = this.period;
              this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
              this.isDeleting = false;
              this.loopNum++;
              delta = 500;
            }

            setTimeout(function() {
              that.tick();
            }, delta);
          };

          window.onload = function() {
            var elements = document.getElementsByClassName('txt-rotate');
            for (var i=0; i<elements.length; i++) {
              var toRotate = elements[i].getAttribute('data-rotate');
              var period = elements[i].getAttribute('data-period');
              if (toRotate) {
                new TxtRotate(elements[i], JSON.parse(toRotate), period);
              }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
            document.body.appendChild(css);
          };
    </script>
  </body>
</html>

