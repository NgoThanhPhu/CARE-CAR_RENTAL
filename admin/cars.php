<?php
    require_once("connection.php");
    session_start();
    
    if(!isset($_SESSION['loggedin'])) {
        header("location: admin.php?Error=MUST BE LOGGED IN FIRST TO USE GOD FUNCTION");
    }
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Car Management</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-control" content="no-cache">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">  </script>
    <link rel="script" href="https://use.fontawesome.com/releases/v5.13.0/js/all.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/cars.css">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: black;">
        <div class="container">
          <a class="navbar-brand" href="admin.php">CARE's CONTROL CENTER</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="admin.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><strike>Account Management</strike>(Coming Soon)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Cars Management</a>
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
    <main>
    <!-------------------------------------------START ADDING FORM----------------------------------->
        <div class="adding">
            <button type="button" class="btn btn-care" data-toggle="modal" data-target=".bd-example-modal-lg">Add Car</button>
            <!--MODAL-->
            <div class="modal fade bd-example-modal-lg" id="modalAddCars" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">ADD NEW CAR FOR RENT</h4>
                        </div>
                        <form action="addcars.php" method="post">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="brand" id="brand" class="form-control input-sm" placeholder="Brand" required>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="model" id="model" class="form-control input-sm" placeholder="Model" required>
                                    </div>
                                </div>
                            </div>
                            <!--Long input fiels-->
                            <div class="form-group">
                                <input type="url" name="photo" id="photo" class="form-control input-sm" placeholder="Car's Image" required>
                            </div>
                            <!---------------------------2 Input Fiels 1 Line--------------------------------------------------------->
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="color" id="color" class="form-control input-sm" placeholder="Color" required>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="licenseplate" id="licenseplate" class="form-control input-sm" placeholder="License Plate" required>
                                    </div>
                                </div>
                            </div>
                            <!--Long input fiels-->
                            <div class="form-group">
                                <input type="text" name="detail" id="detail" class="form-control input-sm" placeholder="Describe The Car" required>
                            </div>
                            <!---------------------------2 Input Fiels 1 Line--------------------------------------------------------->
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phonenum" id="phonenum" class="form-control input-sm" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="price" id="price" class="form-control input-sm" placeholder="Cost per Day" required>
                                    </div>
                                </div>
                            </div>  
                            <!--Dropdown List-->
                            <select name="seat" id="seat" required>
                                <option value="2">2 Seats</option>
                                <option value="4">4 Seats</option>
                                <option value="5">5 Seats</option>
                                <option value="7">7 Seats</option>
                                <option value="16">16 Seats</option>
                            </select>
                            <input class="modal-submit" type="submit" value="ADD" class="btn btn-outline-success btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------END ADDING FORM--------------------------------------------------->

        <div class="row" id="carList">

            <!--Start Product Showcase-->
            <?php 
                if($result->num_rows>0) {
                    while($row=$result->fetch_assoc()) {
            ?>
                        <div class="col-xl-3 col-md-6 col-sm-12">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $row['Photo'] ?>" alt="#">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $row['Model']; ?></h4>
                                    <h6 class="card-title text-muted"><?php echo $row['Brand']; ?></h6>
                                    <p class="card-text"><?php echo $row['Detail']; ?></p>
                                    <a href="#" class="btn btn-outline-light btn-sm">Edit</a>
                                    <a href="deletecars.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
            <?php 
                }
            }
            ?>
            <!---------------------------------END SHOWCASE------------------------>

        </div>
    </main>
    <script>

    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>