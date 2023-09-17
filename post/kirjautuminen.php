<?php
session_start();
// Tarkista, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan käyttäjän syöttämät tiedot
    $kayttajatunnus = $_POST["kayttajatunnus"];
    $salasana = $_POST["salasana"];

    // Yhdistä tietokantaan
    require_once('../elements/config.php');

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Suorita sql
    $sql = "SELECT * FROM user WHERE name = '$kayttajatunnus' AND password = '$salasana'";
    $result = $conn->query($sql);

    // Tarkista, onko käyttäjä oikeutettu
    if ($result->num_rows > 0) {
      

        $row = $result->fetch_assoc();
    
        // Tallenna käyttäjän ID istuntoon
        $_SESSION["user_id"] = $row["id"];
        
        if ((int)$row["admin"] === 1){
          $_SESSION["admin"] = true;
        } 
        $_SESSION["login"] = true;
        $_SESSION["user_name"] = $kayttajatunnus;
        
       
        $ilmoitus = "Kirjautuminen onnistui!";
        echo "<script>alert('$ilmoitus');</script>";
        echo "<script>
        setTimeout(function() {
            window.location.href = '../index.php';
        }, 0000); // Aikaviive 2 sekuntia (2000 ms)
      </script>";
        exit;
    } else {
        $ilmoitus = "Kirjautuminen epäonnistui!, käyttäjätunnus tai salasana on väärin.";
        echo "<script>alert('$ilmoitus');</script>";
        echo "<script>
        setTimeout(function() {
            window.location.href = '../login.php';
        }, 0000); // Aikaviive 2 sekuntia (2000 ms)
      </script>";
       
    }

    // Sulje tietokantaconn
    $conn->close();
}


?>