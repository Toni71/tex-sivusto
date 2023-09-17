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

$hahmo = $_POST['hahmo'];

$id = $_GET['id'];
$vuosi = $_GET['vuosikerta'];
$vuosikerta_id = $_GET['vuosikerta_id'];
$sarja = $_GET['sarja'];

// Tarkista ensin, onko kyseinen numero jo kyseisellä hahmolla
$existingSql = "SELECT * FROM hahmo_numero INNER JOIN hahmo ON hahmo.id = hahmo_numero.hahmo_id WHERE tex_id = '$id' AND hahmo_id = '$hahmo'";
$existingResult = mysqli_query($conn, $existingSql);

$hahmo_nimi = "";


$hahmo_nimi = ""; // Alustetaan oletusarvoksi tyhjä merkkijono

if (mysqli_num_rows($existingResult) > 0) {
    $row = mysqli_fetch_assoc($existingResult);
    $hahmo_nimi = $row['nimi'];
    $ilmoitus = "Kyseinen numero on jo hahmolla: ". $hahmo_nimi ;
    echo "<script>alert('$ilmoitus');</script>";
    echo "<script>
        setTimeout(function() {
            window.history.go(-1); // Siirry takaisin edelliselle sivulle
        }, 0000); // Aikaviive 2 sekuntia (2000 ms)
    </script>";
} else {
    // Numeroa ei ole vielä kyseisellä hahmolla, voit lisätä sen tietokantaan
    $sql = "INSERT INTO hahmo_numero (tex_id, hahmo_id) 
            VALUES ('$id', '$hahmo')";
    if (mysqli_query($conn, $sql)) {
        // Hae hahmon nimi tietokannasta sen id:n perusteella
        $hahmo_nimi_sql = "SELECT nimi FROM hahmo WHERE id = '$hahmo'";
        $hahmo_nimi_result = mysqli_query($conn, $hahmo_nimi_sql);
        if ($hahmo_nimi_result) {
            $hahmo_row = mysqli_fetch_assoc($hahmo_nimi_result);
            $hahmo_nimi = $hahmo_row['nimi'];
        }
        
        $ilmoitus = "Numero lisätty onnistuneesti hahmolle: ". $hahmo_nimi ;
        echo "<script>alert('$ilmoitus');</script>";
        echo "<script>
        setTimeout(function() {
            window.history.go(-1); // Siirry takaisin edelliselle sivulle
        }, 0000); // Aikaviive 2 sekuntia (2000 ms)
    </script>";
        exit();
    } else {
        echo "Virhe tallennettaessa numeroa hahmolle: " . mysqli_error($conn);
    }
}


mysqli_close($conn);

?>
