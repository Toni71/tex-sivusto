<?php
session_start();
if (isset($_SESSION["login"])) {
    // Kirjaudutaan käyttäjä ulos poistamalla istunnon tiedot
    $ilmoitus = "Kirjauduttu ulos käyttäjältä: " . $_SESSION['user_name'];
    echo "<script>alert('$ilmoitus');</script>";
    session_unset();
    session_destroy();
    
    // Lisätään aikaviive ja sitten ohjataan käyttäjä takaisin kirjautumissivulle
    echo "<script>
            setTimeout(function() {
                window.location.href = '../login.php';
            }, 0000); // Aikaviive 2 sekuntia (2000 ms)
          </script>";
    exit;
} else {
    // Ohjataan käyttäjä takaisin kirjautumissivulle
    header("Location: ../login.php");
    exit;
}


?>
