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
                //  echo "<h2>" . $search . "</h2>";
      
                 
                  $sth ="SELECT * FROM Reservation as r natural Join Customer as c
                   WHERE CID Like'$search'Or fname Like'$search' Or lname Like'$search' Or ResID Like '$search' Or PlateID Like '$search'
                  Or Payment_way Like '$search' Or `Start_date` Like '$search' Or End_date Like '$search'";
                    $query=mysqli_query($conn,$sth);
                    $res=mysqli_num_rows($query);
  
                
                    if( $res> 0 ) {
                  echo "Search result of: " . $search . "</h2>";
                    
                    ?>
         <table id="table">
            <tr>
            <th id="sqra">Reservation ID</th>
            <th id="sqra">Customer ID</th>
            <th id="sqra">Customer firstname</th>
            <th id="sqra">Customer lastname</th>
            <th id="sqra">Plate ID</th>
            <th id="sqra">Payment way</th>
            <th id="sqra">Start date</th>
            <th id="sqra">End date</th>
            </tr>
                  

                  <?php
                     while($row=mysqli_fetch_assoc($query)){
                       ?>
                <!--fetch data from each row of every column-->
                <tr id="td">
                <td id="sqrd"><?php echo $row['ResID']; ?></td>    
            <td id="sqrd"><?php echo $row['CID']; ?></td>
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>
            <td id="sqrd"><?php echo $row['Payment_way'] ;?></td>
            <td id="sqrd"><?php echo $row['Start_date'] ;?></td>
            <td id="sqrd"><?php echo $row['End_date']; ?></td>
            </tr>
            <?php
                  } ?>
             </table>

             <a id="btn" style="width:70px;height:20px;" href="navReservations.php"> Go Back </a>

             <?php
                }
                  else {
                    echo "there are no results matching your search";
                     die('Could not get data: ' . mysql_error());
                  }
                  mysqli_close($conn);
              }
                
                    ?>
     

    </form>
</body>
</html>