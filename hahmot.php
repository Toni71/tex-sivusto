<!DOCTYPE html>
<html>
<head>
  <?php include 'elements/head.php'; ?>
  <!-- head -->
  <title>Hahmot</title>
</head>
<body>
  <?php include 'elements/navbar.php'; ?>
  <!-- navbar -->

  <div class="container sarjat">
    <div style="padding-top: 20px;">
      <a href="index.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    </div>
    <div style="text-align: center; padding-top: 20px;">
      <h1>Hahmot</h1>
      <hr>

      <br>  <div class="infobox">Valitse hahmo</div>
      <div><br>
        <div class="flex-container sarjat-div">
        <?php include 'php/hahmot/hahmo_haku.php'; ?>
      
        </div>
      </div>
    </div>
    <!-- container -->
  </div><br><br>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>
