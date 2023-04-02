<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <title>reports</title>
        <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Reports</h1>
       
    <div id="frm">
    <form method="POST" action="Allreservation.php" name="form"> 
    <input type="submit" id="res" name="res"style="width:500px;height:70px" value=" All Reservations for all cars and customers"action="addCar.php">
    </form>
    <br><br>
    <form method="POST" action="reservationCarreport.php" name="form"> 
    <input type="submit" id="rescar" name="rescar"style="width:500px;height:70px"value=" All Reservations for all cars">
    </form>
    <br><br>
    <form method="POST" action="navCustomers.php" name="form"> 
    <input type="submit" id="status" name="status"style="width:500px;height:70px"value=" Status of all cars in a specific day">
    </form>
    <br><br>
    <form method="POST" action="navCustomers.php" name="form"> 
    <input type="submit" id="res" name="res"style="width:500px;height:70px"value=" All Reservations for a specific customers">
    </form>
    <br><br>
    <form method="POST" action="navCustomers.php" name="form"> 
    <input type="submit" id="res" name="res"style="width:500px;height:70px" value=" Daily Payements">
    </form>
</div>
</body>
</html>
 <!-- <div >
    <input type="btn" id="period" name="period">
    <label><b>Report for spefic period</b><label>
    <br><br>
    <label><b>From:</b></label>
    <input type="date" name="Startdate" required >
    <label><b>To:<b> </label>
    <input type="date" name="Enddate" required >
    </div> -->
    <!-- <div>
    <br><br>
    <input type="btn" id="day" name="day">
    <label><b>Report for spefic day </b><label>
    <br><br>
    <label><b>Date<b> </label>
    <input type="date" name="date" required >
    </div> -->