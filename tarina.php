
<html>
  <head>
  <link href="css/tarina.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <?php include 'elements/head.php'; ?>
   <!--head-->
   

    <title>Numero</title>
  </head>
  <body>
  <?php include 'elements/navbar.php'; ?>
    <!--navbar-->

      <div class="container sarjat">
      <div  style="padding-top: 20px; ">

      <?php
  $sarja = $_GET["sarja"]; 
  echo  '<a  id="back" href="tarina_vuosikerta.php?id='.$sarja.'"> &nbsp;<i class="bi bi-arrow-left"></i> Palaa vuosikertoihin</a>';
?>
  </div>
      <div style=" text-align:center; padding-top:20px;">

      <?php
if (!isset($_GET['id']) || !isset($_GET['sarja'])|| !isset($_GET['vuosikerta_id'])) {
  header("Location: kansikuva.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>

<?php 	

      require_once('elements/config.php');
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $id = $_GET["id"];
      $sarja = $_GET["sarja"]; 
      $sql = "SELECT * FROM vuosikerta where vuosi='$id' AND sarja_id='$sarja'";

          // Suoritetaan SQL-kysely
          $result = $conn->query($sql);
      
          // Tarkistetaan onko käyttäjä löydetty
          if ($result->num_rows === 1) {
              // Käyttäjä on löydetty, aloitetaan istunto ja ohjataan käyttäjä etusivulle
              $row = $result->fetch_assoc();
            
              $_SESSION['vuosikerta'] = $row['nimi']; 
           
          }
          // Suljetaan tietokantayhteys
          $conn->close();
      ?>

      <h1>Tarina[<?php echo   $_SESSION['vuosikerta']; ?>] </h1><hr><br>

      <?php
// Tämän avulla pystytään navigoita  vuosikertojen välillä, 
// eikä voi mennä sellaiseen vuosikerttaan mitä ei vielä ole.
    $id = $_GET["id"];
    $sarja = $_GET["sarja"];
    $rajat = [
        1 => ["yla" => 2024, "ala" => 1971], // Tex Willer
        2 => ["yla" => 2024, "ala" => 2020],// Nuori Tex Willer
        3 => ["yla" => 1965, "ala" => 1952],// Liuska Tex
        4 => ["yla" => 5, "ala" => 1],// MAXI-Tex
        5 => ["yla" => 5, "ala" => 1],// Suuralbumi
        6 => ["yla" => 8, "ala" => 1],// Kronikka
        7 => ["yla" => 2, "ala" => 1],// Väri albumi
        8 => ["yla" => 8, "ala" => 1],// Kirjasto
        9 => ["yla" => 5, "ala" => 1],// Juhlajulkaisut
        10 => ["yla" => 4, "ala" => 1]// Italian kieliset julkaisut
    ];

    $yla = $rajat[$sarja]["yla"];
    $ala = $rajat[$sarja]["ala"];
$vuosikerta = $_GET["vuosikerta_id"]; 
    $numPlus = $id + 1;
    $numMinus = $id - 1;

    if ($id < $yla) {
        echo '<a style="margin-right:5px;" href="tarina.php?id=' . $numPlus . '&sarja=' . $sarja .'&vuosikerta_id='.$vuosikerta. '"> <div class="next"><i class="bi bi-arrow-left-circle-fill"></i> </div></a>';
    } else {
        echo ' <div style="margin-right:5px;" class="next next2"><i class="fas fa-times-circle"></i> </div>';
    }
echo '<div class="infobox">Valitse Tarina</div>';

    if ($id > $ala) {
        echo '<a style="margin-left:0.9px;" href="tarina.php?id=' . $numMinus . '&sarja=' . $sarja . '&vuosikerta_id='.$vuosikerta. '"> <div class="next"><i class="bi bi-arrow-right-circle-fill"></i></div></a>';
    } else {
        echo '<div style="margin-left:5px;" class="next next2"><i class="fas fa-times-circle"></i> </div>';
    }
    ?>


 <div><br>
        <div class="flex-container sarjat-div">
               <!--Tex willer-->
               <?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"]; 
$sarja = $_GET["sarja"]; 


$sql = "SELECT tarina.numero, tarina.nimi, tarina.id, tarina.tarina_vuosikerta_id, tarina_vuosikerta.vuosi FROM tarina INNER JOIN tarina_vuosikerta ON tarina.tarina_vuosikerta_id = tarina_vuosikerta.id where tarina_vuosikerta.vuosi='$id' AND tarina_vuosikerta.sarja_id='$sarja' ORDER BY tarina.numero DESC";
$result = mysqli_query($conn, $sql);

$result = $conn->query($sql);

// Inside the printvuosikerta function
function printvuosikerta($vuosikerta, $conn) {
  // ... (muu koodi)
 
  $id =  $_GET["sarja"]; 
  $nimi = $vuosikerta['vuosi']; 
  $num = $vuosikerta['id']; 


  $vuosikerta_id = $_GET["vuosikerta_id"]; 
  echo <<<EOD
  <a href='tarina_tieto.php?id={$num}&sarja={$id}&vuosikerta={$nimi}&vuosikerta_id={$vuosikerta_id}' class='card-tex'>
  <div class='card tarina-card'>
  <div class='card-body'>
  <p class='tarina-card-text'>{$vuosikerta['numero']}. {$vuosikerta['nimi']}</p>
</div>
  </div>
  </a>
EOD;

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
          </div><br>
        </div>
      </div>
      <!--container-->
    </div>

    <?php include 'elements/scripts.php'; ?>

  </body>
</html>
