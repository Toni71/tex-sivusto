<!DOCTYPE html>
<html>
<head>
<link href="css/muokkaa.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<?php include 'elements/head.php'; ?>
   <!--head-->
    <title>Lisää vuosikerta</title>
</head>
<body>

<?php include 'elements/navbar.php'; ?>
    <!--navbar--> 
    <div class="container sarjat">
    <div style="padding: 20px; ">
    <?php include 'php/lisaa_vuosikerta/takaisin_linkki.php'; ?>

    </div>
        <div class="container d-flex justify-content-center">
            <div class="form-container container">
    <h1 class="mb-4">Lisäys lomake</h1><hr>
<div class=" flex-container">

    <div class="flex-item-left">
                <form action="post/lisaa_vuosikerta.php?sarja=<?php echo $_GET["sarja"]; ?>" method="POST" enctype="multipart/form-data">
                    <label for="vuosikerta">Vuosikerta:</label>
        <input class="form-input-text" id="vuosikerta" name="vuosikerta" type="text" placeholder="Vuosikerta" required ><br>
        
        <label for="kuva">Kuva:</label>
        <input class="form-input-text" id="kuva" name="kuva" type="text" placeholder="Kuva"  ><br>

        <label for="sarja">Sarja_id:</label>
        <input class="form-input-text" id="sarja" name="sarja" type="number" placeholder="sarja" value="<?php echo $_GET['sarja']; ?>" readonly required><br>

        <label for="nimi">Nimi:</label>
        <input class="form-input-text" id="nimi" name="nimi" type="text" placeholder="Nimi"  ><br>
      
                    <button class="btn btn-primary form-button" type="submit">Tallenna vuosikerta</button>
</form>
                </div>    
                <div class="flex-item-right"><h3 style="text-align:center;">Infoa:</h3><hr>
                <p><b>Vuosikerta</b> Syötä vuosikerta vuosina esim. 2013, jos kyseessä on tex willer, 
                nuori tex willer tai liuska, muutoin seuraava numero kuinka monta vuosikertaa on esim. maxi-tex
                vuosikertoja on 5 silloin syötä 6 jne.</p>

         <p><b>Kuva</b> on se joka näkyy vuosikerta korteissa. Syötä kyseisen vuosikerran uusin numero esim.7</p>

         <p><b>Nimi</b> on se joka näkyy vuosikerta korteissa esim.2024</p>       
                </div>
            </div>
            </div>
        </div>
    </div>

<?php include 'elements/scripts.php'; ?>
</body>
</html>
