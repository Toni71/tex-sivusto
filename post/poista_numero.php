<?php
require_once('../elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}

$vuosikerta_id = $_GET['vuosikerta'];
$vuosikerta = $_GET['vuosikerta'];
$sarja = $_GET['sarja'];
$tex_id = $_GET['tex_id'];
$sql = "DELETE FROM issue WHERE id ='$tex_id'";

if (mysqli_query($conn, $sql)) {
    echo "Numero poistettu onnistuneesti";
    header("Location: ../numero.php?id=$vuosikerta&sarja=$sarja&vuosikerta_id=$vuosikerta_id");
    exit();

} else {
    echo "Virhe tallennettaessa tietoja: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
