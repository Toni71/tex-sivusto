
<!DOCTYPE html>
<html>
<head>
<link href="css/esittely.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<?php include 'elements/head.php'; ?>
    <title>Tietoa</title>
</head>
<body>
<?php include 'elements/navbar.php'; ?>
    <!--navbar-->
    <?php include 'php/esittely/hahmo_tieto_haku.php'; ?>
    
		<div class="container sarjat">
    <div style="padding-top: 20px; ">
   
       <a id="back" href="hahmot.php"> &nbsp;<i class="bi bi-arrow-left"></i> Palaa takaisin</a>
    </div>
    <div style="text-align: center; padding-top: 20px;">
      <h1><?php echo $_SESSION['tiedot']['nimi']; ?></h1>
      <hr>
    </div>
	  <div class="flex-container sarjat-div">
      <div class="flex-item-left">
        <div class="esittely-img">
         <img class=" img-fluid esittely-kuva " src="https://geronimo.okol.org/~koiton/tex/css/images/hahmot/<?php echo $_SESSION['tiedot']['id']; ?>.jpg">
</div>
        </div>
<div class="flex-item-right">
    <p><?php echo $_SESSION['tiedot']['info']; ?></p>
</div>	
</div>

<div style="text-align: center; "><hr><br> <div class="infobox">Tunnetuimmat tarinat/numerot:</div><br><br>
<div class="flex-container sarjat-div">
<?php include 'php/esittely/hahmo_numero_haku.php';?>  
        </div>
</div>
</div><br><br>
<?php include 'elements/scripts.php';?>
</body>
</html>
