<?php

require_once('elements/config.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$currentDate = date('Y-m-d');

$sql = "SELECT * FROM julkaisu WHERE pvm > '$currentDate' ORDER BY pvm ";
$result = mysqli_query($conn, $sql);
    
$result = $conn->query($sql);

function printvuosikerta($vuosikerta) {
  $numero = $vuosikerta['numero'];
  $vuosi = $vuosikerta['vuosi']; 
  $nimi = $vuosikerta['nimi']; 
  $pvm = date('d.m', strtotime($vuosikerta['pvm']));
  $id = $vuosikerta['sarja_id']; 

 include 'elements/kuvataulukko.php';
  
  echo <<<EOD
  <div class='card-tex'>
  <div class='card-body' style='text-align: center;'>
      <p class='card-text' style='font-weight: bold;'>{$pvm}</p>
    </div>
  <div class='card card-1'>
    <img class='card-img-top sarjat-img-1' src='https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}/{$numero}.jpg'/>
    <div class='card-body'>
      <p class='card-text' style=" white-space: nowrap; overflow-x: hidden; font-size:13px;">{$nimi} #{$numero}</p>
    </div>
  </div></div>
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