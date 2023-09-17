<!DOCTYPE html>
<html>
<head>
<?php include 'elements/head.php'; ?>
    <!--Head sisältö-->
    <title>Kalenteri</title>
</head>
<body>
<?php include 'elements/navbar.php'; ?>
    <!--navbar-->
    
<!-- https://www.commoninja.com/calendar/editor/content-->
<div class="container sarjat">
<div style="padding-top: 20px;">
      <a href="index.php">&nbsp;<i class="bi bi-arrow-left"></i> Palaa etusivulle</a>
    </div>
<div style=" text-align:center; padding-top:20px;">
<h1>Tulevat julkaisut</h1><hr>
</div>
<div class="flex-container sarjat-div">
   
<?php include 'php/kalenteri/julkaisu_haku.php'; ?>

</div></div>
</body>
</html>
