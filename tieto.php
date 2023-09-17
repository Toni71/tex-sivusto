
<!DOCTYPE html>
<html>
<head>
<link href="css/tieto.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<?php include 'elements/head.php'; ?>
    <title>Tietoa</title>
    
</head>
<body>
<?php include 'elements/navbar.php'; ?>
    <!--navbar-->

		<div class="container sarjat">
    <div style="padding-top: 20px; ">
    <?php include 'php/tieto/takaisin_linkki.php';?>
    </div>
	  <div class="flex-container sarjat-div">
			<div class="tieto flex-container">
			<?php include 'php/tieto/numero_tieto_haku.php';?>
</div>
</div>
</div><br>

<?php include 'elements/scripts.php';?>
   <script src="js/tieto.js?v=<?php echo time(); ?>"></script>
</body>
</html>
