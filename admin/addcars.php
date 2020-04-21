<?php require_once("connection.php"); ?>
<?php
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $seat = $_POST['seat'];
    $plate = $_POST['licenseplate'];
    $phone = $_POST['phonenum'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $photo = $_POST['photo'];

    $sql = "INSERT INTO cars (Model,Brand,Color,Seats,BKS,PhoneNum,Price,Detail,Photo) VALUES ('$model', '$brand', '$color', '$seat', '$plate', '$phone', '$price', '$detail', '$photo')";
    echo $sql;

    $stmt = $conn->query($sql);
    $conn->close();
    header("location: cars.php");
?>