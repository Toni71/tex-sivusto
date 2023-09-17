<?php

require_once('elements/config.php');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"]; 
$sql = "SELECT * FROM vuosikerta WHERE sarja_id = '$id' ORDER BY vuosi DESC";
$result = mysqli_query($conn, $sql);
    
$result = $conn->query($sql);

function printvuosikerta($vuosikerta) {
  $x = $vuosikerta['kuva'];
  $id = $vuosikerta['sarja_id']; 
  $vuosi = $vuosikerta['vuosi']; 

  if ($id == 3) {
    $kuvakoko = 2;
  } else {
    $kuvakoko = 1;
  }

  include 'elements/kuvataulukko.php';

  echo <<<EOD
  <a href='numero.php?id={$vuosikerta['vuosi']}&sarja={$vuosikerta['sarja_id']}&vuosikerta_id={$vuosikerta['id']}' class='card-tex'>
  <div class='card card-1'>
  <img class='card-img-top sarjat-img-{$kuvakoko}' src='https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}{$x}.jpg'/>
  <div class='card-body'>
  <p class='card-text' style=" white-space: nowrap; overflow-x: hidden;">{$vuosikerta['nimi']}</p>
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