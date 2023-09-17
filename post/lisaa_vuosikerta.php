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


$nimi = $_POST['nimi'];
$vuosikerta = $_POST['vuosikerta'];
$kuva = $_POST['kuva'];
$sarja = $_POST['sarja'];

     
$sql = "INSERT INTO vuosikerta (vuosi, kuva, sarja_id, nimi) 
        VALUES ('$vuosikerta', '$kuva ', '$sarja', '$nimi')";

if (mysqli_query($conn, $sql)) {
    echo "Vuosikerta tallennettu onnistuneesti.";
   
    header("Location: ../vuosikerta.php?id=$sarja");
    exit();

} else {
    echo "Virhe tallennettaessa tietoja: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
