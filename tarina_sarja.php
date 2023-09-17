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
      <a href="index.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    </div>
    <div style="text-align: center; padding-top: 20px;">
      <h1>Tarinat</h1>
      <hr><br>

      <div class="infobox">Valitse Kategoria</div>
      <div><br>
        <div class="flex-container sarjat-div">
        <?php 

require_once('elements/config.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM sarja";
$result = $conn->query($sql);

function printSeries($serie) {
  $id = $serie['id'];
  $name = $serie['nimi']; 

  echo <<<EOD
  <a href="tarina_vuosikerta.php?id={$id}" class="card-tex">
    <div class="card tarina-card">
      <div class="card-body">
        <p class="card-text">{$name}</p>
      </div>
    </div>
  </a>
EOD;
}

function printSeriesForm($result) {
  if ($result->num_rows == 0) {
    echo "0 sarjaa";
    return;
  }

  while($row = $result->fetch_assoc()) {
    printSeries($row);
  }
}

printSeriesForm($result);
?>
        </div><br>
      </div>
    </div>
    <!-- container -->
  </div>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>
