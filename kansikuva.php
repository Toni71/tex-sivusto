<!DOCTYPE html>
<html>
<head>
  <?php include 'elements/head.php'; ?>
  <!-- head -->
  <title>Kansikuvat</title>
</head>
<body>
  <?php include 'elements/navbar.php'; ?>
  <!-- navbar -->

  <div class="container sarjat">
    <div style="padding-top: 20px;">
      <a href="index.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    </div>
    <div style="text-align: center; padding-top: 20px;">
      <h1>Kansikuvat</h1>
      <hr>
      <br>
      <div class="infobox">Valitse kategoria</div>
      <div><br>
        <div class="flex-container sarjat-div">
        <?php include 'php/kansikuva/sarja_haku.php'; ?>
        </div><br>
      </div>
    </div>
    <!-- container -->
  </div>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>
