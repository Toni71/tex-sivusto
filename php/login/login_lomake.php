<?php 
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"]) {
  echo "<br><h5>Olet jo kirjautunut sisään</h5>
  <br>
  <form method='post' action='post/kirjaudu_ulos.php'>
  <input type='submit' value='Kirjaudu ulos'></form><br>";
} else{
  echo <<<EOD
  <form method="post" action="post/kirjautuminen.php">
  <label for="kayttajatunnus">Käyttäjätunnus:</label><br>
  <input type="text" id="kayttajatunnus" name="kayttajatunnus" required><br><br>
  <label for="salasana">Salasana:</label><br>
  <input type="password" id="salasana" name="salasana" required><br><br>
  <input type="submit" value="Kirjaudu"></form><br>

  EOD;
}
?>