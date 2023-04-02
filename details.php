<html>
<?php
session_start();
require 'connection.php';
$conn = Connect();
if (!isset($_SESSION['email'])) {
   // session_destroy();
    header("location: login/signin_shape.php");
}
?>
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>

<body ng-app="">


    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">
                    MTMM CAR RENTAL </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
             if(isset($_SESSION['email'])){
                ?>
               <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                   <ul class="nav navbar-nav">
                   <li>
                           <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                       </li>
                   </ul>
           
               </div>
                  <?php }
   
                   else {
               ?>
   
               <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                   <ul class="nav navbar-nav">
                   
                       <li>
                           <br>
                           <input type="text" name="search"  placeholder="Search here...">
                       </li>
                       <li>
                           <a href="index.php">Home</a>
                       </li>
                       <li>
                           <a href="login/signin_shape.php">Login</a>
                       </li>
                       <li>
                           <a href="login/signup_shape.php"> Sign Up </a>
                       </li>
                   </ul>
               </div>
                   <?php   }
            ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container" style="margin-top: 65px;">
    <div class="col-md-7" style="float: none; margin: 0 auto;">

        <?php
        if (isset($_GET['id'])) {
            $PlateID = $_GET['id'];
            $sql = "SELECT * FROM car WHERE PlateID='$PlateID' ";
            $result = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (mysqli_num_rows($result)) {
                $PlateID = $row1['PlateID'];
                $Model = $row1["Model"];
                $Year = $row1["Year"];
                $Status = $row1["Status"];
                $InService = $row1["InService"];
                if ($Status == 1 || $InService == 1) {
                    $Status = 'available';
                    $InService = 'available';
                } else {
                    $Status = 'not available';
                    $InService = 'not available';
                }
                $Color = $row1["Color"];
                $Rental_price = $row1["Rental_price"];
                $LocID = $row1["LocID"];
                $car_img = $row1["car_img"];
            }
        } else {
            echo 'error';
        }
        ?>
        
            
                <br style="clear: both">
                <h2 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Car Details: </h2><br>
                <p style="text-align:center;"><img class="center" src="<?php echo $car_img; ?>" alt="Card image cap" width="250" height="200"></p>
                <h4 style="margin-bottom: 20px; text-align: center; font-size: 25px;"> Model: <?php echo $Model; ?> </h4>
                <h4 style="margin-bottom: 20px; text-align: center; font-size: 25px;"> Year: <?php echo $Year; ?> </h4>
                <h4 style="margin-bottom: 20px; text-align: center; font-size: 25px;"> Status:<?php echo $Status; ?> </h4>
                <h4 style="margin-bottom: 20px; text-align: center; font-size: 25px;"> Inservice:<?php echo $InService; ?> </h4>
                <h4 style="margin-bottom: 20px; text-align: center; font-size: 25px;">Color: <?php echo  $Color; ?> </h4>
                <h4 style="margin-bottom: 20px; text-align: center; font-size: 25px;">Rental price: <?php echo  $Rental_price; ?> </h4>
                <a href="reservation.php?id=<?php echo ($PlateID) ?>">
                <p style="text-align:center;"><input style="margin-bottom: 20px; text-align: center; font-size: 25px;" type="submit" value="reserve now">
                <a href="index.php?id=<?php echo ($PlateID) ?>">
                <input  type="submit" value="back">
            </p>
                  
    </div>
</div>
  
</body>
</html>