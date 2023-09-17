<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}

session_start();

$numero = $_POST['numero'];
$nimike = $_POST['nimike'];
$alkuperäisjulkaisu = $_POST['alkuperäisjulkaisu'];
$kirjoittaja = $_POST['kirjoittaja'];
$kuvittaja = $_POST['kuvittaja'];
$suomentaja = $_POST['suomentaja'];
$sivumaara = $_POST['sivumaara'];
$varitys = $_POST['varitys'];
$kertaus = $_POST['kertaus'];
$tarina = $_POST['tarina'];
$varittaja = $_POST['varittaja'];


$vuosikerta_id = $_POST['vuosikerta'];
$vuosi = $_GET['vuosikerta'];
$id = $_GET['sarja'];


    include '../elements/kuvataulukko.php';

  

        
    

$sql = "INSERT INTO issue (vuosikerta_id, numero, nimike, tarina, alkuperaisjulkaisu, kirjoittaja, kuvittaja, suomentaja, varittaja, sivumaara, vari, kertaus) 
        VALUES ('$vuosikerta_id', '$numero', '$nimike', '$tarina', '$alkuperäisjulkaisu', '$kirjoittaja', '$kuvittaja', '$suomentaja','$varittaja', '$sivumaara', '$varitys', '$kertaus')";

if (mysqli_query($conn, $sql)) {
    echo "Tiedot tallennettu onnistuneesti.";
   
 if (!isset($_FILES["kuva"]["name"])){

} else{
$tiedostonimi = $_FILES["kuva"]["name"];
        $tiedostotemp = $_FILES["kuva"]["tmp_name"];
        $x = $_POST['img_name'];
        $kohdekansio = "../css/images/{$kuva}"; // Kohdekansio tiedostojen tallentamiseen
        $uusiTiedostonimi = $numero . '.jpg'; // Uusi tiedostonimi
        
        // Tarkistetaan, että tiedosto on kuva (voit muuttaa tätä ehtoa tarpeidesi mukaan)
        $sallitut_tiedostotyypit = array("jpg", "jpeg", "png", "gif");
        $tiedostotyyppi = strtolower(pathinfo($tiedostonimi, PATHINFO_EXTENSION));
        
        if (in_array($tiedostotyyppi, $sallitut_tiedostotyypit)) {
            // Luo täydellinen tiedostopolku
            $tiedostopolku = $kohdekansio . $uusiTiedostonimi;
            
            // Tallenna tiedosto palvelimelle
            if (move_uploaded_file($tiedostotemp, $tiedostopolku)) {
                $ilmoitus = "Kuva on ladattu onnistuneesti ja tallennettu nimellä: " . $uusiTiedostonimi;
                echo "<script>alert('$ilmoitus');</script>";
            } else {
                $ilmoitus = "Virhe tallennettaessa tiedostoa.";
                echo "<script>alert('$ilmoitus');</script>";
            }
        } else {
            $ilmoitus = "Virhe: Tiedoston tyyppi ei ole sallittu.";
            echo "<script>alert('$ilmoitus');</script>";
        }
}

    header("Location: ../numero.php?id=$vuosi&sarja=$id&vuosikerta_id=$vuosikerta_id");
    exit();

} else {
    echo "Virhe tallennettaessa tietoja: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
