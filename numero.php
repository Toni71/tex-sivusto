
<html>
  <head>

  <?php include 'elements/head.php'; ?>
   <!--head-->
   

    <title>Numero</title>
  </head>
  <body>
  <?php include 'elements/navbar.php'; ?>
    <!--navbar-->

      <div class="container sarjat">
      <div  style="padding-top: 20px; ">

 <?php include 'php/numero/numero_lisaa.php'; ?>
  </div>
      <div style=" text-align:center; padding-top:20px;">

      <?php include 'php/numero/numero_nimi_haku.php'; ?>

      <h1><?php echo   $_SESSION['vuosikerta']; ?></h1><hr><br>

   <?php   include 'php/numero/vuosikerta_navigointi.php'; ?>

 <div><br>
        <div class="flex-container sarjat-div">
               <!--Tex willer-->
              <?php  include 'php/numero/numero_haku.php'; ?>
          </div><br>
        </div>
      </div>
      <!--container-->
    </div><br><br>

    <?php include 'elements/scripts.php'; ?>

  </body>
</html>
