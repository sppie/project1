<?php
session_start();
//include("auth_session.php");


$servername = "localhost";
$database = "aposite";
$usernamedb = "root";
$password = "";

$conn = mysqli_connect($servername, $usernamedb, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


?>

<html>
<head>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <h1>wip</h1>
  <img src="img/placeholder.png" width="100" height="100">
  <div class="menu">
    <h4>menu</h4>
    <ul class="l1">
      <li class="i1"><a href="index.php">Home</a></li>
      <li class="i1"><a href="service.php">Service</a></li>
      <li class="i1"><a href="info.php">Voorlichting</a></li>
      <li class="i1"><a href="login.php">Mijn APO</a></li>
    </ul>
  </div>
  <div class="detail">
    <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
    <p>this is your account</p>
  </div>
</body>
</html>
