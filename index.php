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
    <img class="slide" src="img/placeholder1.png" alt="a placeholder image" width="100" height="100">
    <img class="slide" src="img/placeholder.png" alt="a placeholder image" width="100" height="100">
    <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("slide");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 2000);
  }
</script>
  </div>
  <div class="location">
    <iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=500&amp;height=500&amp;hl=nl&amp;q=Hofstraat%2013,%201741%20CD%20Schagen+(ROC%20Kop%20Noord-Holland)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
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
    <h5>Openingstijden</h5>
    <p>
      Maandag-Vrijdag 00:00 <br>
      Zaterdag 00:00 <br>
      Zondag 00:00 <br>
    </p>
  </div>
  <div class="adres">
    <h5>Adres</h5>
    <p>Hofstraat 13, 1741 CD Schagen</p>
  </div>
  <div class="news">
    <p>
      <?php
        $sql = "SELECT * FROM news ORDER BY news. ins_date DESC LIMIT 3";
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
