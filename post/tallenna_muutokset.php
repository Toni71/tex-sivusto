<?php
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
$vuosikerta_id = $_POST['vuosikerta'];
$tarina = $_POST['tarina'];
$varittaja = $_POST['varittaja'];
$sarja = $_SESSION['sarja'];
$tex_id = $_GET['id'];
$vuosikerta = $_SESSION['tiedot']['vuosi'];

$sql = "UPDATE issue SET numero='$numero', nimike='$nimike', tarina='$tarina', alkuperaisjulkaisu='$alkuperäisjulkaisu', kirjoittaja='$kirjoittaja', kuvittaja='$kuvittaja', suomentaja='$suomentaja', varittaja='$varittaja', sivumaara='$sivumaara', vari='$varitys', kertaus='$kertaus' WHERE id='$tex_id'";

if (mysqli_query($conn, $sql)) {
    echo "Tiedot tallennettu onnistuneesti.";
    // Lisää tallennuksen jälkeen ohjaus takaisin tietojen muokkaussivulle
header("Location: ../tieto.php?id=$tex_id&sarja=$sarja&vuosikerta=$vuosikerta&vuosikerta_id=$vuosikerta_id");
exit();

} else {
    echo "Virhe tallennettaessa tietoja: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
