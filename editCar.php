<?php 
session_start();
require '../connection.php';
$conn = Connect();
?>
 <!DOCTYPE html>
<html>
    <head>
        <title>Edit Car</title>
        <link rel="stylesheet" href="style.css">  
</head>
<body>
    <?php
    $id=$_GET['id'];
    $query=mysqli_query($conn,"select * from Car as c JOIN Location as l ON c.LocID=l.LocID  where PlateID='$id'");
    $row=mysqli_fetch_array($query);

    if(isset($_POST['submit'])){
        $model=$_POST['model'];
        $year=$_POST['year'];
        $status=$_POST['status'];
        $inservice=$_POST['inservice'];
        $color=$_POST['color'];
        $rprice=$_POST['rprice'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $carimg=$_POST['carimg'];


        // echo "<h2>" . $id . "</h2>";

       $edit= mysqli_query($conn,"update Location as l JOIN Car as c ON c.LocID=l.LocID 
       SET Model='$model', Year='$year',Status='$status',InService='$inservice',Color='$color', 
       Rental_price='$rprice', Country='$country',City='$city',car_img='$carimg' WHERE c.PlateID='$id'");
        
        if($edit)
        {
            header("location:navCars.php"); // redirects to all records page
            mysqli_close($conn); // Close connection
            exit;
        }
        else
        {
            echo "hi";
            // echo mysqli_error();
        }  
    }
    ?>

    <h2 id="h1">Edit Car</h2>
    <form id="frm" method="POST">

    <div >
   <label>Model:</label> <input  id="frmd" type="text" value ="<?php echo $row['Model'];?>" name="model">
</div>

<div>
    <label>Year:</label><input id="frmd" type="text" value ="<?php echo $row['Year'];?>" name="year">
</div>
    <div>
    <label>Status:</label><input id="frmd" type="text" value ="<?php echo $row['Status'];?>" name="status">
</div>
    <div>
    <label>InService:</label><input id="frmd" type="text" value ="<?php echo $row['InService'];?>" name="inservice">
</div>
<div>
    <label>Color:</label><input id="frmd" type="text" value ="<?php echo $row['Color'];?>" name="color">
</div>
        <div>
    <label>Rental price:</label><input id="frmd" type="text" value ="<?php echo $row['Rental_price'];?>" name="rprice">
</div>
<div>
    <label>Country:</label><input id="frmd" type="text" value ="<?php echo $row['Country'];?>" name="country">
</div>
    <div>
    <label>City:</label><input id="frmd" type="text" value ="<?php echo $row['City'];?>" name="city">
</div>
<div>
    <label>Image:</label><input id="frmd" type="text" value ="<?php echo $row['car_img'];?>" name="carimg">
</div>
    <input id="btn" type="submit" name="submit" value="Submit">
    <a href="navCars.php"> Go Back </a>
</form>


</body>
</html>