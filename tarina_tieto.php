
<!DOCTYPE html>
<html>
<head>

<?php include 'elements/head.php'; ?>
    <title>Tietoa</title>
    
</head>
<body>
<?php include 'elements/navbar.php'; ?>
    <!--navbar-->

		<div class="container sarjat">
    <div style="padding-top: 20px; ">
    <?php

if (!isset($_GET['id']) || !isset($_GET['sarja'])|| !isset($_GET['vuosikerta'])|| !isset($_GET['vuosikerta_id'])) {
  header("Location: kansikuva.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>
 <?php
        $sarja = $_GET['sarja']; 
        $vuosikerta = $_GET['vuosikerta']; 
        $vuosikerta_id = $_GET['vuosikerta_id']; 
        echo  '<a id="back" href="tarina.php?id='.$vuosikerta.'&sarja='.$sarja. '&vuosikerta_id='.$vuosikerta_id.'"> &nbsp;<i class="bi bi-arrow-left"></i> Palaa takaisin</a>';
      ?>
    </div><br>
	  <div class="flex-container ">
		
			<?php

require_once('elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Tarkista yhteyden onnistuminen
if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}
$id = $_GET["id"]; 
// Suorita kysely
$sql = "SELECT * FROM tarina INNER JOIN tarina_vuosikerta ON tarina.tarina_vuosikerta_id = tarina_vuosikerta.id where tarina.id='$id' ORDER BY tarina.numero";
$result = mysqli_query($conn, $sql);

$result = $conn->query($sql);

function urlExists($url) {
  $headers = @get_headers($url);
  return is_array($headers) ? strpos($headers[0], '200') !== false : false;
}

function printvuosikerta($vuosikerta) {


echo <<<EOD
    <div style="width:100%;">        
    <h6 >{$vuosikerta['vuosi']}</h6>
        <h1 style=" font-size: 1.9em;
        font-weight: bold;
      ">{$vuosikerta['nimi']}</h1><hr>
        <p class="info-text"><b>Tarina</b>:      <div style="background-color:white; padding:10px;   border: solid #b9b9b9 2px;">{$vuosikerta['info']}</div></p>
   
    </div>
    EOD;
}

function printvuosikertaForm($result) {
    if ($result->num_rows == 0) {
        echo "0 numeroa";
        return;
    }

    while($row = $result->fetch_assoc()) {
        printvuosikerta($row);
    }
}

printvuosikertaForm($result);
// Sulje yhteys
mysqli_close($conn);
?>

</div>
</div>

<?php include 'elements/scripts.php';?>
</body>
</html>
