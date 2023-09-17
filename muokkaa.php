<!DOCTYPE html>
<html>
<head>
<link href="css/muokkaa.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<?php include 'elements/head.php'; ?>
   <!--head-->
    <style>

    </style>
    <title>Muokkaa</title>
</head>
<body>
<?php include 'elements/navbar.php'; ?>
    <!--navbar-->
    <div class="container sarjat">
    <div style="padding: 20px; ">

      <?php include 'php/muokkaa/takaisin_linkki.php'; ?>
  </div>
        <div class="container d-flex justify-content-center">
            <div class="form-container container">

    <h1 class="mb-4">Muokkauslomake</h1><hr>
    <?php include 'php/muokkaa/muokkaa_numero_tieto_haku.php'; ?>

    <div class=" flex-container">

    <div class="flex-item-left">
                <form action="post/tallenna_muutokset.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <label for="numero">Numero:</label>
        <input class="form-input-text" id="numero" name="numero" type="text" placeholder="Numero" required value="<?php echo $_SESSION['tiedot']['numero']; ?>"><br>
        
        <label for="nimike">Nimike:</label>
        <input class="form-input-text" id="nimike" name="nimike" type="text" placeholder="Nimike"  value="<?php echo $_SESSION['tiedot']['nimike']; ?>"><br>

        <label for="vuosikerta">vuosikerta_id:</label>
        <input class="form-input-text" id="vuosikerta" name="vuosikerta" type="text" placeholder="vuosikerta" value="<?php echo $_GET['vuosikerta_id']; ?>" readonly required><br>

        <label for="tarina">Tarina:</label>
        <input class="form-input-text" id="tarina" name="tarina" type="text" placeholder="Tarina"  value="<?php echo $_SESSION['tiedot']['tarina']; ?>"><br>

        <label for="alkuperäisjulkaisu">Alkuperäisjulkaisu:</label>
        <input class="form-input-text" id="alkuperäisjulkaisu" name="alkuperäisjulkaisu" type="text" placeholder="Alkuperäisjulkaisu"  value="<?php echo $_SESSION['tiedot']['alkuperaisjulkaisu']; ?>"><br>
        
        <label for="kirjoittaja">Kirjoittaja:</label>
        <input class="form-input-text" id="kirjoittaja" name="kirjoittaja" type="text" placeholder="Kirjoittaja"  value="<?php echo $_SESSION['tiedot']['kirjoittaja']; ?>"><br>
        
        <label for="kuvittaja">Kuvittaja:</label>
        <input class="form-input-text" id="kuvittaja" name="kuvittaja" type="text" placeholder="Kuvittaja"  value="<?php echo $_SESSION['tiedot']['kuvittaja']; ?>"><br>
        
        <label for="suomentaja">Suomentaja:</label>
        <input class="form-input-text" id="suomentaja" name="suomentaja" type="text" placeholder="Suomentaja"  value="<?php echo $_SESSION['tiedot']['suomentaja']; ?>"><br>
        
        <label for="varittaja">Värittäjä:</label>
        <input class="form-input-text" id="varittaja" name="varittaja" type="text" placeholder="Värittäjä"  value="<?php echo $_SESSION['tiedot']['varittaja']; ?>"><br>

        <label for="sivumaara">Sivumäärä:</label>
        <input class="form-input-text" id="sivumaara" name="sivumaara" type="text" placeholder="Sivumäärä"  value="<?php echo $_SESSION['tiedot']['sivumaara']; ?>"><br>
        
        <label for="varitys">Väritys:</label>
        <input class="form-input-text" id="varitys" name="varitys" type="text" placeholder="Väritys"  value="<?php echo $_SESSION['tiedot']['vari']; ?>" ><br>
        
        <label  for="kertaus">Kertaus:</label><br>
        
                    <textarea class="form-input-text" id="kertaus" name="kertaus" placeholder="Kertaus"style="height: auto; max-height: 300px; width: 100%;"><?php echo $_SESSION['tiedot']['kertaus']; ?></textarea><br>
                    <button class="btn btn-primary form-button" type="submit"><i class="bi bi-file-earmark-arrow-up"></i> Tallenna muokkaukset</button>
                </form><br>
                <form method="POST" action="post/poista_numero.php?tex_id=<?php echo $_GET["id"]; ?>&vuosikerta=<?php echo $_GET["vuosikerta"]; ?>&sarja=<?php echo $_GET["sarja"]; ?>&vuosikerta_id=<?php echo $_GET["vuosikerta_id"]; ?>">
                <button class="btn btn-primary form-button" type="submit"><i class="bi bi-trash"></i> Poista numero </button>
                 </form>
                </div>    
                <div class="flex-item-right"><h3 style="text-align:center;">Numeron kuva:</h3><hr>
                <img style='border: solid #b9b9b9 2px; ' class='test4567 img-fluid kuvake' src='https://geronimo.okol.org/~koiton/tex/css/images/<?php echo $_SESSION['kuva']; ?><?php echo $_SESSION['x']; ?>.jpg'><br><br>
                <form method="POST" enctype="multipart/form-data">
                 <input type="file" name="kuva" required><br><br>
                 <button type="submit" name="vaihda_kuva">Vaihda ja Tallenna kuva</button>
                 </form><br><hr><br>
                 <h5> Numero on jo näillä hahmoilla:</h5><br>
                 <?php include 'php/muokkaa/hahmo_numero_haku.php'; ?>

                 <br><br><hr>
 
<h5> Lisää numero jollekin hahmolle</h5><br>
                 <form method="POST" action="post/lisaa_numero_hahmolle.php?id=<?php echo $_GET['id']; ?>&vuosikerta=<?php echo $_GET["vuosikerta"]; ?>&sarja=<?php echo $_GET["sarja"]; ?>&vuosikerta_id=<?php echo $_GET["vuosikerta_id"]; ?>" enctype="multipart/form-data">
         
                 <select name="hahmo" id="hahmo" required>
                 <?php include 'php/muokkaa/hahmo_haku.php'; ?>
          
        </select>
<br><br>
                 <button type="submit" name="lisaa_numero_hahmolle">Lisää numero hahmolle</button>
                 </form><br><hr>

                </div>
            </div>
            </div>
        </div>
    </div>


<?php include 'elements/scripts.php'; ?>
</body>
</html>
