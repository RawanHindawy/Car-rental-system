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
                 // echo "<h2>" . $search . "</h2>";
      
                 
                  $sth ="SELECT * FROM Customer as c JOIN Location as l ON c.LocID=l.LocID 
                   WHERE CID Like'$search'Or fname Like'$search' Or lname Like '$search' 
                  Or phone Like '$search' Or Email Like '$search'
                  Or Drive_licence Like '$search' Or Country Like '$search' Or City Like '$search'";
                  
                  $query=mysqli_query($conn,$sth);
                  $res=mysqli_num_rows($query);

              
                  if( $res> 0 ) {
                echo "Search result of: " . $search . "</h2>";
                    ?>
                  
                    <table id="table">
            <tr>
            <th id="sqra">ID</th>
            <th id="sqra">Firstname</th>
            <th id="sqra">Lastname</th>
            <th id="sqra">Phone number</th>
            <th id="sqra">Email</th>
            <th id="sqra">Drive Licence</th>
            <th id="sqra">Country</th>
            <th id="sqra">City</th>
            </tr>
                  

                  <?php
                     while($row=mysqli_fetch_assoc($query)){
                       ?>
                <!--fetch data from each row of every column-->
                <tr id="td">
                <td id="sqrd"><?php echo $row['CID']; ?></td>    
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['phone'] ;?></td>
            <td id="sqrd"><?php echo $row['Email'] ;?></td>
            <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
            </tr>
            <?php
                  } ?>
             </table>

             <a id="btn" style="width:70px;height:20px;" href="navCustomers.php"> Go Back </a>

             <?php
                }
                  else {
                    echo "there are no results matching your search";
                     die('Could not get data: ' . mysqli_error());
                  }
                
              }
                
                    ?>
     

    </form>
</body>