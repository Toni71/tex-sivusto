<?php
require_once('elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}

$id2 = $_GET["id"]; 
$id = $_GET["sarja"]; 

$sql = "SELECT * FROM issue INNER JOIN vuosikerta ON issue.vuosikerta_id = vuosikerta.id where issue.id='$id2' ORDER BY issue.numero";
$result = mysqli_query($conn, $sql);
session_start();
if (!isset($_SESSION["login"]) || !$_SESSION["login"]) {
    header("Location: login.php");
    exit;
}

if ($result) {
    $row = mysqli_fetch_assoc($result);

   
    $_SESSION['tiedot'] = $row;
    $vuosi = $_SESSION['tiedot']['vuosi'];
    include 'elements/kuvataulukko.php';
	 
    $_SESSION['kuva'] = $kuva;
    $_SESSION['x'] = $_SESSION['tiedot']['numero'];
    $_SESSION['sarja'] = $_GET["sarja"]; 

    
     
    mysqli_close($conn);
} else {
    echo "Tietojen haku epäonnistui.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["kuva"])) {
    $tiedostonimi = $_FILES["kuva"]["name"];
    $tiedostotemp = $_FILES["kuva"]["tmp_name"];

    $kohdekansio = "css/images/{$kuva}"; // Kohdekansio tiedostojen tallentamiseen
    $uusiTiedostonimi = $_SESSION['x'] . '.jpg'; // Uusi tiedostonimi

    // Tarkistetaan, että tiedosto on kuva (voit muuttaa tätä ehtoa tarpeidesi mukaan)
    $sallitut_tiedostotyypit = array("jpg", "jpeg", "png", "gif");
    $tiedostotyyppi = strtolower(pathinfo($tiedostonimi, PATHINFO_EXTENSION));
    
    if (in_array($tiedostotyyppi, $sallitut_tiedostotyypit)) {
        // Luo täydellinen tiedostopolku
        $tiedostopolku = $kohdekansio . $uusiTiedostonimi;
        
        // Tallenna tiedosto palvelimelle
        if (move_uploaded_file($tiedostotemp, $tiedostopolku)) {
            $ilmoitus = "Kuva on ladattu onnistuneesti ja tallennettu nimellä: " . $tiedostopolku. $uusiTiedostonimi;
            echo "<script>alert('$ilmoitus');</script>";
        } else {
            $ilmoitus = "Virhe tallennettaessa tiedostoa.";
            echo "<script>alert('$ilmoitus');</script>";
        }
    } else {
        $ilmoitus = "Virhe: Tiedoston tyyppi ei ole sallittu.";
        echo "<script>alert(' $ilmoitus');</script>";
    }
}
?>	