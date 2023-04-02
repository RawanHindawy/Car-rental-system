<?php 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
         <link rel="stylesheet" href="style.css"> 
    </head>

    <body>
        <p>Advanced Search by:</p>
    <form  action="advanceSearch.php" name="form1" class="search"> 
  <input id="car"type="radio" name="choice" value="Car">
  <label for="car">Car</label><br>
  <input id="cus"type="radio"  name="choice" value="Customer">
  <label for="cus">Customer</label><br>
  <input id="res"type="radio"  name="choice" value="Reservation">
  <label for="res" >Reservation</label><br>
  <input type="text" placeholder="Search.." name="search">
 <input id="btn" style="width:150px;height:30px;"  type="submit" />  
</form>


           
      

        <h1 id="h1">
            Choose from bellow:
        </h1>
        <div id="frm">

        <form method="POST" action="navCustomers.php" name="form"> 
           <input id="btn" style="width:500px;height:70px;"  type="submit" value="Customers" name="Custsubmit"/>
           </form>
           <form method="POST" action="navCars.php" name="form"> 
           <input id="btn" style="width:500px;height:70px;" type="submit" value="Cars" name="Csubmit"/>
           </form>
           <form  method="POST" action="navReservations.php" name="form"> 
           <input id="btn" style="width:500px;height:70px;" type="submit" value="Reservations" name="Ressubmit"/>
           </form>
</div>

<form  method="POST" action="reports.php" name="form"> 
           <input id="btn" style="width:200px;height:70px;" type="submit" value="reports" name="repsubmit"/>
           </form>

<form  method="POST" action="../index.php"> 
           <input style="width:100px;height:90px;color:blue;" type="submit" value="Log out" name="logout"/>
           </form>
           


    </body>
</html>