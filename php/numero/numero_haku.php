<?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"]; 
$sarja = $_GET["sarja"]; 

$_SESSION['numero'] = $id;
$_SESSION['sarja'] = $sarja;
$sql = "SELECT issue.id, issue.numero, issue.vuosikerta_id, vuosikerta.vuosi FROM issue INNER JOIN vuosikerta ON issue.vuosikerta_id = vuosikerta.id where vuosikerta.vuosi='$id' AND vuosikerta.sarja_id='$sarja' ORDER BY issue.numero  + 0 DESC";
$result = mysqli_query($conn, $sql);

$result = $conn->query($sql);

// Inside the printvuosikerta function
function printvuosikerta($vuosikerta, $conn) {
  // ... (muu koodi)
  $x = $vuosikerta['numero'];
  $id =  $_GET["sarja"]; 
  $nimi = $vuosikerta['vuosi']; 
  if ($id == 3) {
    $kuvakoko = 2;
  } else {
    $kuvakoko = 1;
  } 
  $vuosi = $vuosikerta['vuosi']; 

  $num = $vuosikerta['id']; 
  include 'elements/kuvataulukko.php';
 

  $vuosikerta_id = $_GET["vuosikerta_id"]; 
  echo <<<EOD
  <a href='tieto.php?id={$num}&sarja={$id}&vuosikerta={$nimi}&vuosikerta_id={$vuosikerta_id}' class='card-tex'>
  <div class='card card-1'>
  <!-- ... (muu koodi) -->
  <img class='card-img-top sarjat-img-{$kuvakoko}' src='https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}{$x}.jpg'/>
  EOD;

  if (isset($_SESSION["login"]) && $_SESSION["login"]) {
    $cover_id = $vuosikerta['id'];
    $is_owned = checkCoverOwnership($conn, $cover_id);
    $omistettu = $is_owned ? 'checked' : '';
  
    echo <<<EOD
    <input type='checkbox' class='cover-checkbox cover-checkboxs' data-cover-id='{$cover_id}' 
    value='1' name='cover_status' $omistettu>
EOD;
}

echo <<<EOD
  <div class='card-body'>
  <p class='card-text'>Nro.{$vuosikerta['numero']}</p>

</div>
  </div>
  </a>
EOD;

}

if (isset($_SESSION["login"]) && $_SESSION["login"]) {
  function checkCoverOwnership($conn, $cover_id) {
    $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM user_cover_status WHERE user_id='$user_id' AND tex_id = '$cover_id' AND status = 1";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
  }
  }

function printvuosikertaForm($result, $conn) {
  if ($result->num_rows == 0) {
    echo "0 numeroa";
    return;
  }

  while($row = $result->fetch_assoc()) {
    printvuosikerta($row, $conn);
  }
}

printvuosikertaForm($result, $conn);
// Sulje yhteys
mysqli_close($conn);
?>