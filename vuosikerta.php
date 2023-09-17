
<html>
  <head>
  <?php include 'elements/head.php'; ?>
   <!--head-->
    <title>Vuosikerta</title>
  </head>
  <body>
  <?php include 'elements/navbar.php'; ?>
    <!--navbar-->

      <div class="container sarjat">
      <div  style="padding-top:20px;">

 <?php include 'php/vuosikerta/takaisin_linkki.php'; ?>
  </div>
      <div style=" text-align:center; padding-top:20px;">
     <h1 > 
     <?php include 'php/vuosikerta/sarja_nimi.php'; ?></h1><hr><br>
      <div class="infobox"
     >Valitse vuosikerta</div><div><br>
        <div class="flex-container sarjat-div">
               <!--Tex willer-->
              
               <?php include 'php/vuosikerta/vuosikerta_haku.php'; ?>
      
          </div><br>
        </div>
      </div>
      <!--container-->
    </div><br><br>
    <?php include 'elements/scripts.php'; ?>
  </body>
</html>
