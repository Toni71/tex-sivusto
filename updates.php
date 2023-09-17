
<!DOCTYPE html>
<html>
<head>
  <?php include 'elements/head.php'; ?>
  <!-- head -->
  <title>Päivitykset</title>
</head>
<body>
  <?php include 'elements/navbar.php'; ?>
  <!-- navbar -->

  <div class="container sarjat">
    <div style="padding-top: 20px;">
      <a href="index.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    </div>
    <div style=" padding-top: 20px;">
      <h1>Päivitykset</h1>
      <hr><br>




   <?php
require_once('elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}


$sql = "SELECT * FROM updates ORDER BY pvm DESC";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Käsittele ja tulosta tiedot tarpeen mukaan
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Versio: <b>" . $row["versio"] . "</b><br>";
        echo "Päivämäärä: <b>" . date('d.m.y', strtotime($row["pvm"])) . "</b><br>";
        echo "<b>Sisältö:</b><br> " . $row["info"] . "<br><hr>";
    }
   
    // Sulje tietokantayhteys vasta, kun olet käyttänyt kaikki tarvitsemasi tiedot
    mysqli_close($conn);
} else {
    echo "Tietojen haku epäonnistui.";
}
?>
<br>
      </div>
    </div>
    <!-- container -->
  </div>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>

