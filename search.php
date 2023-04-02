<?php 
session_start();
require 'connection.php';
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
                 
                  $sth ="SELECT * FROM Car as c JOIN Location as l ON c.LocID=l.LocID
                   WHERE Model Like'%$search%'Or Year Like'%$search%'
                  Or Color Like '%$search%' Or PlateID Like '%$search%' ";
                  
                  $query=mysqli_query($conn,$sth);
                  $res=mysqli_num_rows($query);

                   echo " There are ".$res." results!";
                  if( $res> 0 ) {
                     while($row1=mysqli_fetch_assoc($query)){
                        $PlateID = $row1["PlateID"];
                        $Model = $row1["Model"];
                        $Year = $row1["Year"];
                        $Status = $row1["Status"];
                        $InService = $row1["InService"];
                        $Color = $row1["Color"];
                        $Rental_price = $row1["Rental_price"];
                        $LocID = $row1["LocID"];
                        $car_img = $row1["car_img"];
            ?>
                        <a href="details.php?id=<?php echo ($PlateID) ?>">
                            <div class="sub-menu">


                                <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap" width="250" height="200">
                                <h5> <?php echo $Model; ?> </h5>


                            </div>
                        </a>
                    <?php }
                }
                  else {
                    echo "there are no results matching your search";
                     die('Could not get data: ' . mysql_error());
                  }
                
              }
                 // $res->execute(); 
                  //if($row = $res->fetch()){
                    ?>
     

    </form>
</body>