<?php
if (!isset($_GET['id']) || !isset($_GET['sarja'])|| !isset($_GET['vuosikerta_id'])) {
  header("Location: kansikuva.php"); // Ohjaa k�ytt�j� toiselle sivulle
  exit(); // Lopeta t�m�n sivun suoritus
}
?>

<?php 	

      require_once('elements/config.php');
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $id = $_GET["id"];
      $sarja = $_GET["sarja"]; 
      $sql = "SELECT * FROM vuosikerta where vuosi='$id' AND sarja_id='$sarja'";

          // Suoritetaan SQL-kysely
          $result = $conn->query($sql);
      
          // Tarkistetaan onko käyttäjä löydetty
          if ($result->num_rows === 1) {
              // Käyttäjä on löydetty, aloitetaan istunto ja ohjataan käyttäjä etusivulle
              $row = $result->fetch_assoc();
            
              $_SESSION['vuosikerta'] = $row['nimi']; 
           
          }
          // Suljetaan tietokantayhteys
          $conn->close();
      ?>