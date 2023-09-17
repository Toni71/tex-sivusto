<?php
if (!isset($_GET['id'])) {
  header("Location: hahmot.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>

<?php
require_once('elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}

$id = $_GET["id"]; 


$sql = "SELECT * FROM hahmo WHERE id =$id";
$result = mysqli_query($conn, $sql);
session_start();

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['tiedot'] = $row;

    mysqli_close($conn);
} else {
    echo "Tietojen haku epäonnistui.";
}
?>