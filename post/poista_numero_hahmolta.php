<?php
require_once('../elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}


$id = $_GET['id'];
$hahmo = $_GET['hahmo'];
$sql = "DELETE FROM hahmo_numero WHERE tex_id ='$id' AND hahmo_id = '$hahmo'";

if (mysqli_query($conn, $sql)) {
    $ilmoitus = "Numero poistettu hahmolta onnistuneesti". $hahmo_nimi ;
    echo "<script>alert('$ilmoitus');</script>";
    echo "<script>
    setTimeout(function() {
        window.history.go(-1); // Siirry takaisin edelliselle sivulle
    }, 0000); // Aikaviive 2 sekuntia (2000 ms)
</script>";
    exit();

} else {
    echo "Virhe tallennettaessa tietoja: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
