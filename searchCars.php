<?php 
session_start();
require '../connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <title>Search</title>
        <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <form method="post">

    <?php       
                if(isset($_REQUEST["search"])){
                  $search= $_REQUEST["search"]; 
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



                 // echo "<h2>" . $search . "</h2>";
      
                 
                  $sth ="SELECT * FROM Car as c JOIN Location as l ON c.LocID=l.LocID
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
            </tr><?php
                  } ?>
             </table>

             <a id="btn" style="width:70px;height:20px;" href="navCars.php"> Go Back </a>

             <?php
                }
                  else {
                    echo "there are no results matching your search";
                     //die('Could not get data: ' . mysql_error());
                  }
                
              }
                
                    ?>
     

    </form>
</body>