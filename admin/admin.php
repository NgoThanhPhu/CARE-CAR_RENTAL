<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>GODMODE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="icon" href="img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">  </script>
    <link rel="script" href="https://use.fontawesome.com/releases/v5.13.0/js/all.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/nav.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="admin.php">CARE's CONTROL CENTER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><strike>Account Management</strike>(Coming Soon)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cars.php">Cars Management</a>
            </li>
            <?php
              if(isset($_SESSION['Username'])) {
            ?>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i><?php echo $_SESSION['Username']; ?>
              </a>
                
                <div class="dropdown-menu" style="background-color: #EE787A; color: black;">
                  <a href="#" class="dropdown-item disabled"><strike>Recent Action</strike><br>(Coming Soon)</a>
                  <a href="#" class="dropdown-item">Update Account</a>
                  <a href="logout.php" class="dropdown-item">Logout</a>
                </div>
            </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://cimg1.ibsrv.net/ibimg/hgm/1920x1080-1/100/548/bmw-vision-next-100-concept_100548649.jpg" alt="BMWVisionNext100">
          <div class="carousel-caption d-none d-md-block">
            <h5>BMW’S VISION NEXT 100</h5>
            <p>BMW is on a world tour this year with a selection of concept cars that present its vision for the next 100 years of automotive development</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://www.tesla.com/xNVh4yUEc3B9/01_Main_Hero_Desktop.jpg" alt="Cybertruck">
          <div class="carousel-caption d-none d-md-block">
            <h5>TESLA CYBERTRUCK</h5>
            <p>BETTER UTILITY THAN A TRUCK WITH MORE PERFORMANCE THAN A SPORTS CAR</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://cdn.dailyxe.com.vn/image/rolls-royce-vision-next-100-concept4-83705j.jpg" alt="RollsRoyceVision103EX">
          <div class="carousel-caption d-none d-md-block">
            <h5>Rolls Royce Vision 103EX</h5>
            <p>“Our vision, in its purest form, is to create the automotive equivalent of haute couture. This is the future of luxury mobility.”</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
        <!--MODAL-->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">GODMODE LOGIN</h4>
          </div>
          <form action="login.php" method="post">
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <input type="username" name="usr" class="form-control username" placeholder="UserName" required>
              </div>

              <div class="md-form mb-4">
                <input type="password" name="pwd" class="form-control password" placeholder="Password" required>
              </div>
            </div>
            <?php 
              if(@$_GET['EmptyInput']==true)
                {
            ?>
                <div class="alert-light text-danger text-center py-3"><?php echo $_GET['EmptyInput'] ?></div>                                
            <?php
                }
            ?>

            <?php 
                if(@$_GET['Error']==true)
                {
            ?>
                <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Error'] ?></div>                                
            <?php
                }
            ?>
            <div class="modal-footer d-flex justify-content-center">
              <button name="btn submit" class="btn btn-default login">Login</button>
            </div>
            </form>
        </div>
      </div>
    </div>
    <?php 
        if(isset($_SESSION['loggedin']))
        {
    ?>
      <script type="text/javascript">
        $(window).on('load',function(){
          $('#modalLogin').modal('hide');
        })
      </script>                               
    <?php
        }else{
    ?>
      <script type="text/javascript">
        $(window).on('load',function(){
          $('#modalLogin').modal('show');
        })
      </script> 
    <?php
        }
    ?>
      
    
    <!--END MODAL-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>