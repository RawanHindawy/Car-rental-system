<?php 
session_start();
require '../connection.php';
$conn = Connect();
$id=$_GET['id'];


        $model=$_POST['Model'];
        $year=$_POST['Year'];
        $status=$_POST['Status'];
        $inservice=$_POST['InService'];
        $color=$_POST['Color'];
        $rprice=$_POST['Rental_price'];
        $country=$_POST['Country'];
        $city=$_POST['City'];
        $address=$_POST['Address'];
        $carimg=$_POST['car_img'];

     
        mysqli_query($conn,"update Car as c JOIN Location as l ON c.LocID=l.LocID SET PlateID='$plateid', Model='$model', Year='$year',Status='$status',InService='$inservice',
        Color='$color', Rental_price='$rprice', Country='$country',City='$city',Address='$address',car_img='$carimg' where PlateID='$id'");
        header('location:navCars.php');

?>