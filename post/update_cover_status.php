<?php
// update_cover_status.php
require_once('../elements/config.php');
session_start();
// Tietokantayhteys
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Varmista tietokantayhteyden onnistuminen
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Vastaanota POST-data
$data = json_decode(file_get_contents('php://input'), true);

$coverId = $data['coverId'];
$status = $data['status'];
$user_id = $_SESSION["user_id"];
// Päivitä omistustila tietokantaan
$query = "INSERT IGNORE INTO user_cover_status (tex_id, user_id, status) VALUES ('$coverId', '$user_id', '$status')ON DUPLICATE KEY UPDATE status = '$status'";

$result = mysqli_query($conn, $query);

$response = ['success' => false];

if ($result) {
  $response = ['success' => true];
}

// Palauta vastaus JSON-muodossa
header('Content-Type: application/json');
echo json_encode($response);
?>
