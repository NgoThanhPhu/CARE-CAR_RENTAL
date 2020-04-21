<?php require_once("connection.php"); ?>
<?php
    $sql = "DELETE FROM cars WHERE id=".$_GET['id'];
    $conn->query($sql);

    $conn->close();
    header("location: cars.php");
?>