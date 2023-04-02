<?php 
session_start();
require '../connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <title>Add New Car</title>
        <link rel="stylesheet" href="style.css"> 

</head>

<body>

    <h1 id="h1">Add a new Car</h1>

    <form id="frm" method="POST">
    <div>
                 <label >PlateID:</label><br>
                 <input id="frmd" type="text" placeholder="PlateId" name="PlateID" required >
    </div>
    <div>
<br><br>
                 <label>Model:</label><br>
                 <input id="frmd"  type="text" name="model" placeholder="model" required >
    </div>
    <br><br>
    <div>

                 <label>Year:</label><br>
                 <input id="frmd" type="text" name="year" placeholder="year" required >
    </div>
    <div>
    <br><br>
                 <label>Color:</label><br>
                 <input  id="frmd" type="text" name="color" placeholder="color" required >
    </div>
    <div>
    <br><br>
                 <label>Rental price/day:</label><br>
                 <input  id="frmd" type="text" name="price"placeholder="price" required>
    </div>
    <div>
    <br><br>
                 <label>Country:</label><br>
                 <input  id="frmd" type="text" name="country" placeholder="country" required>
    </div>
    <div>
    <br><br>
                 <label>City:</label><br>
                 <input  id="frmd" type="text" name="city"placeholder="city" required>
    </div>
    <br><br>

    <div>
    <label>Image:</label>
    <input  type="file" name="file" id="file" >
    </div>
    <input id="btn" type="submit" value="Add" name="submit"/>
    <a href="navCars.php"> Go Back </a>
    </form>


    
<?php
if(isset($_POST['submit'])){
$plateid=$_POST['PlateID'];
$model=$_POST['model'];
$year=$_POST['year'];
$color=$_POST['color'];
$price=$_POST['price'];
$img=$_POST['file'];
$img="assets/img/cars/" . $img ;
$country=$_POST['country'];
$city=$_POST['city'];
$status=1;
$inservice=1;
 
 if((!strcasecmp($country,"Egypt"))&&(!strcasecmp($city,"Alexandria")))
 $lid=1;
 if((!strcasecmp($country,"Egypt"))&&(!strcasecmp($city,"Cairo")))
 $lid=2;
 if((!strcasecmp($country,"Lebanon"))&&(!strcasecmp($city,"Beirut")))
 $lid=3;
 if((!strcasecmp($country,"China"))&&(!strcasecmp($city,"Beijing")))
 $lid=4;

 $sql="INSERT INTO Car (PlateID,Model,Year,Status,InService,Color,Rental_price,LocID,car_img) 
 VALUES ('$plateid','$model','$year','$status','$inservice','$color','$price','$lid','$img');";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

}

?>
</body>
</html>