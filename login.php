
<!DOCTYPE html>
<html>
<head>
  <?php include 'elements/head.php'; ?>
  <!-- head -->
  <title>Kirjautuminen</title>
</head>
<body>
  <?php include 'elements/navbar.php'; ?>
  <!-- navbar -->

  <div class="container sarjat">
    <div style="padding-top: 20px;">
      <a href="index.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    </div>
    <div style="text-align: center; padding-top: 20px;">
      <h1>Kirjautumislomake</h1>
      <hr>
  
       <?php include 'php/login/login_lomake.php'; ?><a href="updates.php" >Katso päivitykset täältä</a><br><br>
      </div>
    </div>
    <!-- container -->
  </div>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>
