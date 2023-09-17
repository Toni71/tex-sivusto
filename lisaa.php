<!DOCTYPE html>
<html>
<head>
<link href="css/muokkaa.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<?php include 'elements/head.php'; ?>
   <!--head-->
    <style>

    </style>
    <title>Lisää numero</title>
</head>
<body>
<?php include 'elements/navbar.php'; ?>
    <!--navbar-->

    <div class="container sarjat">
    <div style="padding: 20px; ">
<?php include 'php/lisaa/takaisin_linkki.php' ?>
    </div>
      
        <div class="container d-flex justify-content-center">
            <div class="form-container container">
    <h1 class="mb-4">Lisäys lomake</h1><hr>
<div class=" flex-container">
    <div class="flex-item-left">
                <form action="post/lisaa_numero.php?vuosikerta=<?php echo $_GET["id"]; ?>&sarja=<?php echo $_GET["sarja"]; ?>" method="POST" enctype="multipart/form-data">
                    <label for="numero">Numero:</label>
        <input class="form-input-text" id="numero" name="numero" type="text" placeholder="Numero" required ><br>
        
        <label for="nimike">Nimike:</label>
        <input class="form-input-text" id="nimike" name="nimike" type="text" placeholder="Nimike"  ><br>

        <label for="vuosikerta">vuosikerta_id:</label>
        <input class="form-input-text" id="vuosikerta" name="vuosikerta" type="text" placeholder="vuosikerta" value="<?php echo $_GET['vuosikerta_id']; ?>" readonly required><br>

        <label for="tarina">Tarina:</label>
        <input class="form-input-text" id="tarina" name="tarina" type="text" placeholder="Tarina"  ><br>

        <label for="alkuperäisjulkaisu">Alkuperäisjulkaisu:</label>
        <input class="form-input-text" id="alkuperäisjulkaisu" name="alkuperäisjulkaisu" type="text" placeholder="Alkuperäisjulkaisu"  ><br>
        
        <label for="kirjoittaja">Kirjoittaja:</label>
        <input class="form-input-text" id="kirjoittaja" name="kirjoittaja" type="text" placeholder="Kirjoittaja" ><br>
        
        <label for="kuvittaja">Kuvittaja:</label>
        <input class="form-input-text" id="kuvittaja" name="kuvittaja" type="text" placeholder="Kuvittaja"><br>
        
        <label for="suomentaja">Suomentaja:</label>
        <input class="form-input-text" id="suomentaja" name="suomentaja" type="text" placeholder="Suomentaja"  ><br>

        <label for="varittaja">Värittäjä:</label>
        <input class="form-input-text" id="varittaja" name="varittaja" type="text" placeholder="Värittäjä"  ><br>
        
        <label for="sivumaara">Sivumäärä:</label>
        <input class="form-input-text" id="sivumaara" name="sivumaara" type="number" placeholder="Sivumäärä"  value="0"><br>
        
        <label for="varitys">Väritys:</label>
        <input class="form-input-text" id="varitys" name="varitys" type="text" placeholder="Väritys"  ><br>
        
        <label  for="kertaus">Kertaus:</label><br>
        
                    <textarea class="form-input-text" id="kertaus" name="kertaus" placeholder="Kertaus"style="height: auto; max-height: 300px; width: 100%;"></textarea><br>
                    <button class="btn btn-primary form-button" type="submit">Tallenna numero</button>
                </div>    
                <div class="flex-item-right"><h3 style="text-align:center;">Numeron kuva:</h3><hr>
                <img style='border: solid #b9b9b9 2px; ' class='test4567 img-fluid kuvake' src='https://geronimo.okol.org/~koiton/tex/css/images/.jpg'><br><br>        
                 <input type="file" name="kuva" ><br><br>   
                 </form>
                </div>
            </div>
            </div>
        </div>
    </div>

<?php include 'elements/scripts.php'; ?>
</body>
</html>