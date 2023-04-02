<?php
// include('login');


session_start();
require 'connection.php';
$conn = Connect();
if (!isset($_SESSION['email'])) {
    //session_destroy();
    header("location: login/signin_shape.php");
}
?>
<?php
        if(isset($_POST['submit'])){
            
            $paymentway=$_POST['payment-way'];
           // echo "<h2>". $paymentway . "</h2>";
            $startdate=$_POST['start_date'];
            // echo "<h2>". $startdate . "</h2>";
            $enddate=$_POST['end_date'];
            // echo "<h2>". $enddate . "</h2>";
            //  $time=(strtotime($enddate)-strtotime($startdate))/(60*60*24);
            //  echo "<h2>". $time . "</h2>";
            // $time=$_POST['days'];
            //   echo "<h2>". $time . "</h2>";

            $email= $_SESSION['email'];
            // echo "<h2>". $email . "</h2>";
            $result = mysqli_query($conn,"SELECT CID FROM Customer WHERE Email='$email'");
            $CID = mysqli_fetch_array($result);
            // echo "<h2>". $CID[0] . "</h2>";
            $PlateID=$_POST['id'];
            // echo "<h2>". $PlateID . "</h2>";
           $sql1="INSERT INTO Reservation( CID,PlateID,Payment_way,Start_date,End_date)
               VALUES('$CID[0]','$PlateID','$paymentway' ,'$startdate','$enddate');" ;
            $sql2="UPDATE Car SET Status='0' where PlateID='$PlateID'";
                if ($conn->multi_query($sql1)&&$conn->multi_query($sql2) === TRUE) {
                   // echo "New records created successfully";
                  } else {
                    echo "Error: " . $sql1 ."or" . $sql2 . "<br>" . $conn->error;
                  }
        }
        else
          echo 'error';
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
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center"> Thank you for reserving from MTMM Car Rental! </h2>
    <a href="index.php?id=<?php echo ($PlateID) ?>">
    <p style="text-align:center;"><input id="btn" type="submit"  value="back to home page" class="btn btn-success pull-center"></p>
   
</body>