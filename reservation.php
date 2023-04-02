<!DOCTYPE html>
<html>
<?php
// include('session_customer.php');
// if (!isset($_SESSION['login_customer'])) {
//     session_destroy();
//     header("location: customerlogin.php");
// }

session_start();
require 'connection.php';
$conn = Connect();

?>
<title>Reservation Car </title>

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
            <div class="form-area">
                <form role="form" action="done.php" method="POST">
                    <br style="clear: both">
                    <h2 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Rent your desired car </h2><br>

                    <?php
                    $PlateID = $_GET["id"];
                    $sql = "SELECT * FROM car WHERE PlateID = '$PlateID'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row1 = mysqli_fetch_assoc($result)) {
                            $PlateID = $row1["PlateID"];
                            $Model = $row1["Model"];
                            $Year = $row1["Year"];
                            $Status = $row1["Status"];
                            $InService = $row1["InService"];
                            $Color = $row1["Color"];
                            $Rental_price = $row1["Rental_price"];
                            $LocID = $row1["LocID"];
                            $car_img = $row1["car_img"];
                        }
                    }

                    ?>

                    <h5> Car: <?php echo ($PlateID); ?></h5>
                    <input type="hidden" name="id" value="<?php echo ($PlateID);?>" > 

                    <h5> Model:&nbsp; <?php echo ($Model); ?></h5>
                   
                    <?php $today = date("Y-m-d") ?>
                    <label>
                        <h5>Start Date:</h5>
                    </label>
                    <input type="date" name="start_date" min="<?php echo ($today); ?>" required>
                    &nbsp;
                    <label>
                        <h5>End Date:</h5>
                    </label>

                    <input type="date" name="end_date" min="<?php echo ($today); ?>" required>                 
                   
                    <h5>Rental price: <?php echo ($Rental_price); ?></h5>
                    
                    <h5> Payment Way: &nbsp;
                        <input type="radio" name="payment-way" value="visa" required > Visa 
                        <input type="radio" name="payment-way" value="cash"> Cash
                    </h5>
                    <br>
                                     
                    <input id="btn" type="submit" name="submit" value="Book Now" class="btn btn-success pull-right">
                </form>
                <a href="details.php?id=<?php echo ($PlateID) ?>">
                <p style="text-align:right;"><input id="btn" type="submit"  value="back"></p>
                <!-- <form action="price.php" method="POST">
                    <input id="btn" type="submit" name="price" value="get total" class="btn btn-success pull-right">
                </form> -->
            </div>
            <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
                <h6><strong>Kindly Note:</strong> You will be charged <span class="text-danger">200 LE</span> for each day after the due date.</h6>
            </div>
        </div>
        
</body>

</html>