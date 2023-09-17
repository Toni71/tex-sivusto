<?php
 
 require_once('elements/config.php');

 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

  // Check connection
  if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }

 // Suorita tietokantakysely hahmojen hakemiseksi
 $sql = "SELECT id, nimi FROM hahmo";
 $result = $conn->query($sql);

 // Tarkista, onko hakutulos olemassa ja tulosta option-elementit
 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         echo '<option value="' . $row["id"] . '">' . $row["nimi"] . '</option>';
     }
 } else {
     echo "Hahmoja ei löytynyt tietokannasta.";
 }

 // Sulje tietokantayhteys
 $conn->close();
 ?>