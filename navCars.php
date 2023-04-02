<?php 
session_start();
require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Navigate Cars</title>
        <link rel="stylesheet" href="style.css">  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

form.search input[type=text] {
  padding: 6px;
  font-size: 10px;
  border: 1px solid grey;
  float: left;
  width: 60%;
  background: #f1f1f1;
}

form.search button {
  float: left;
  width: 20%;
  padding: 6px;
  background: #2196F3;
  color: white;
  font-size: 10px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

</style>
    </head>

    <body>
        <?php

        $sql = "SELECT * FROM Car as c JOIN Location as l ON c.LocID=l.LocID ";
        $result=mysqli_query($conn,$sql);
        if(! $result ) {
            die('Could not get data: ' . mysql_error());
         }
        
   ?> 

    <section>
        <h1 id="h1">View Cars</h1>
        <form method="POST" action="addCar.php" name="form"> 
          <input id="btn" style="width:100px;height:40px;" type="submit" value="Add Car" name="add"/>
          </form>

        <form action="search.php" class="search" style="margin:auto;max-width:300px"> 
        <input type="text" placeholder="Search.." name="search">
             <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        </br></br>
      

        <!-- Construct table-->
        <table id="table">
            <tr>
            <th id="sqra">Plate ID</th>
            <th id="sqra">Model</th>
            <th id="sqra">Year</th>
            <th id="sqra">Status</th>
            <th id="sqra">InService</th>
            <th id="sqra">Color</th>
            <th id="sqra">Rental price</th>
            <th id="sqra">Country</th>
            <th id="sqra">City</th>
           
            <th id="sqra">Image</th>
            <th id="sqra">Action</th>

            </tr>
            <!-- fetch data from rows ,loop till end of data-->
            <?php   
                while($row = mysqli_fetch_array($result))
                {
             ?>
            <tr id="td">
                <!--fetch data from each row of every column-->
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['Year']; ?></td>
            <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
            <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
            <td id="sqrd"><?php echo $row['Color']; ?></td>
            <td id="sqrd"><?php echo $row['Rental_price']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
        
            <td id="sqrd"><img src="../<?php echo $row['car_img']?> "width="70" height="50"></td>
            <td id="sqrd"><a href="editCar.php?id=<?php echo $row['PlateID']; ?>"><i class='fa fa-edit'></i></a></td>
            </tr>
          
            <?php
                }
             ?>
        </table>
    </section>
    
    <form method="POST" action="admin.php" name="form"> 
           <input id="btn" style="width:90px;height:30px;" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>