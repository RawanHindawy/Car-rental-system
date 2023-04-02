<?php 
session_start();
require '../connection.php';
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
    if((isset($_REQUEST["search"]))&&(isset($_REQUEST["choice"]))){
       $search= $_REQUEST["search"];
       $choice= $_REQUEST["choice"]; 
       $status="4";
        $inservice="4";
        if(!strcasecmp($search,"available"))
        $status="1";
        if(!strcasecmp($search,"reserved"))
        $status="0";
        if(!strcasecmp($search,"active"))
        $inservice="1";
        if(!strcasecmp($search,"inactive"))
        $inservice="0";
       if(!strcasecmp($choice,"Car")){
        

        $sth ="SELECT * FROM Car as c left JOIN Location as l ON c.LocID=l.LocID left JOIN Customer as cu on cu.LocID=l.LocID 
        left JOIN Account as a on a.Email=cu.Email natural JOIN Reservation as r
                   WHERE Model Like'$search'Or Year Like'$search'
                  Or Color Like '$search' Or PlateID Like '$search' Or Country Like '$search'
                  Or City Like '$search' Or Rental_price Like '$search' Or Status Like '$status' Or InService Like '$inservice'";
                  
                  $query=mysqli_query($conn,$sth);
                  $res=mysqli_num_rows($query);

               
                  if( $res> 0 ) { 
                    echo "Search result of: " . $search . "</h2>";
                    ?>
                  
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
                    <th id="sqra">Address</th>
                    <th id="sqra">Image</th>
                    <th id="sqra">Customer ID</th>
                    <th id="sqra">Firstname</th>
                    <th id="sqra">Lastname</th>
                    <th id="sqra">Phone number</th>
                    <th id="sqra">Username</th>
                    <th id="sqra">Email</th>
                    <th id="sqra">Drive Licence</th>
                    <th id="sqra">Reservation ID</th>
                    <th id="sqra">Payment way</th>
                    <th id="sqra">Start date</th>
                    <th id="sqra">End date</th>
        
                    </tr>

                  <?php
                     while($row=mysqli_fetch_assoc($query)){
                       ?>
                <!--fetch data from each row of every column-->
                <tr id="td">
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['Year']; ?></td>
            <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
            <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
            <td id="sqrd"><?php echo $row['Color']; ?></td>
            <td id="sqrd"><?php echo $row['Rental_price']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
            <td id="sqrd"><?php echo $row['Address']; ?></td>
            <td id="sqrd"><img src="../<?php echo $row['car_img']?> "width="70" height="50"></td>
            <td id="sqrd"><?php echo $row['CID']; ?></td>    
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['phone'] ;?></td>
            <td id="sqrd"><?php echo $row['username'] ;?></td>
            <td id="sqrd"><?php echo $row['Email'] ;?></td>
            <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
            <td id="sqrd"><?php echo $row['ResID']; ?></td> 
            <td id="sqrd"><?php echo $row['Payment_way'] ;?></td>
            <td id="sqrd"><?php echo $row['Start_date'] ;?></td>
            <td id="sqrd"><?php echo $row['End_date']; ?></td>

            </tr><?php
                  } ?>
                   </table>
                   

<a id="btn" style="width:70px;height:20px;" href="navCars.php"> Go Back </a>

<?php
   }
     else {
       echo "there are no results matching your search";
        die('Could not get data: ' . mysql_error());
     }
   
 }

   if(!strcasecmp($choice,"Customer")){



        
     }

        
                  



       }?>


    
    <form method="POST" action="admin.php" name="form"> 
           <input id="btn" style="width:90px;height:30px;" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>