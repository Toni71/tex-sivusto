<!DOCTYPE html>
<html>
<head>
<link href="css/tarina_vuosikerta.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <?php include 'elements/head.php'; ?>
  <!-- head -->
  <title>Tarinat</title>
</head>
<body>
  <?php include 'elements/navbar.php'; ?>
  <!-- navbar -->

  <div class="container sarjat">
    <div style="padding-top: 20px;">
      <a href="tarina_sarja.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa Takaisin</a>
    </div>

    <div style="text-align: center; padding-top: 20px;">

    <h1>Tarinat/<?php   
      $id = $_GET["id"]; 
  $titletable = [
    1 => "Tex Willer",
    2 => "Nuori Tex Willer",
    3 => "Liuska Tex",
    4 => "Maxi-Tex",
    5 => "Suuralbumi",
    6 => "Kronikka",
    7 => "Värialbumi",
    8 => "Kirjasto",
    9 => "Juhlajulkaisut",
    10 => "Italian kieliset julkaisut"
];
 echo isset($titletable[$id]) ? $titletable[$id] : "";   
 
  ?> </h1>

      <hr>
<br>
      <div class="infobox">Valitse Vuosikerta</div>
      <div><br>
        <div class="flex-container sarjat-div">
        <?php

require_once('elements/config.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"]; 
$sql = "SELECT * FROM tarina_vuosikerta WHERE sarja_id = '$id' ORDER BY vuosi DESC";
$result = mysqli_query($conn, $sql);
    
$result = $conn->query($sql);

function printvuosikerta($vuosikerta) {

  echo <<<EOD
  <a href='tarina.php?id={$vuosikerta['vuosi']}&sarja={$vuosikerta['sarja_id']}&vuosikerta_id={$vuosikerta['id']}' class='card-tex'>
  <div class='card tarina-card'>
  <div class='card-body'>
  <p class='card-text' style=" white-space: nowrap; overflow-x: hidden;">{$vuosikerta['nimike']}</p>
  </div>
  </div>
  </a>
  EOD;
}

function printvuosikertaForm($result) {
  if ($result->num_rows == 0) {
    echo "0 vuosikertaa";
    return;
  }

  while($row = $result->fetch_assoc()) {
    printvuosikerta($row);
  }
}

printvuosikertaForm($result);
?>
        </div><br>
      </div>
    </div>
    <!-- container -->
  </div>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>
