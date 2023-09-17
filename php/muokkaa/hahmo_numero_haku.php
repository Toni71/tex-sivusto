<?php
 
 require_once('elements/config.php');

 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

  // Check connection
  if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
$id = $_GET['id'];
 // Suorita tietokantakysely hahmojen hakemiseksi
 $sql = "SELECT * FROM hahmo_numero INNER JOIN hahmo ON hahmo_numero.hahmo_id =hahmo.id WHERE hahmo_numero.tex_id =$id";
 $result = $conn->query($sql);

 // Tarkista, onko hakutulos olemassa ja tulosta option-elementit
 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
        echo '<p style="display: inline-block;">' ." [". $row["id"] ."] ". $row["nimi"] .'&nbsp;'.' <form method="POST" action="post/poista_numero_hahmolta.php?id='.$id.'&hahmo='.$row["id"].'" enctype="multipart/form-data" style="display: inline-block;"> <button><i style="color:red;" class="bi bi-trash"></i></button></form></p>';

     }
 } else {
     echo "Hahmoja ei löytynyt tietokannasta.";
 }

 // Sulje tietokantayhteys
 $conn->close();
 ?>