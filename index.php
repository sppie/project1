<?php
$servername = "localhost";
$database = "aposite";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

?>

<html>
<head>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <h1>home</h1>
  <img src="img/placeholder.png" width="100" height="100">
  <div class="menu">
    <p>menu</p>
    <ul class="l1">
      <li class="i1"><a href="index.php">Home</a></li>
      <li class="i1"><a href="service.php">Service</a></li>
      <li class="i1"><a href="info.php">Voorlichting</a></li>
      <li class="i1"><a href="login.php">Mijn APO</a></li>
    </ul>
  </div>
  <div class="slideshow">
    <img src="img/placeholder.png" width="100" height="100">
    <h5>placeholder slide show</h5>
  </div>
  <div class="location">
    <img src="img/placeholder.png" width="100" height="100">
    <h5>placeholder locatie</h5>
  </div>
  <div class="service">
    <h3>Onze service</h3>
    <ul class="l2">
      <li class="i2"><a href="service.php">Service</a></li>
      <li class="i2"><a href="medoverview.php">Medicijn overzicht</a></li>
      <li class="i2"><a href="login.php">Mijn APO</a></li>
    </ul>
  </div>
  <div class="time">
    <p>openingstijden</p>
  </div>
  <div class="adres">
    <p>adres</p>
  </div>
  <div class="news">
    <p>
      <?php
        $sql = "SELECT * FROM news ORDER BY news. ins_date DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo $row["title"]. "<br>";
          }
        } else {
          echo "er zijn geen resultaten";
        }

        mysqli_close($conn);
      ?>
    </p>
  </div>
</body>
</html>
