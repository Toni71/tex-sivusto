<!DOCTYPE html>
<html>
<head>
  <?php include 'elements/head.php'; ?>
  <link href="css/etusivu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <!-- head -->
  <title>Etusivu</title>
</head>
<body>
  <?php include 'elements/navbar.php'; ?>
  <!-- navbar -->

  <div class="container sarjat"><br>
  
    <div style="text-align: center; padding-top: 20px;">
      <h1>Tex willer Tietosivusto</h1>
      <hr>
    </div>
        <div class="flex-container sarjat-div">
        <div class="flex-item-left">
         <img class="img-fluid kuvake " src="https://geronimo.okol.org/~koiton/tex/css/images/tex.jpg">
       </div>
<div class="flex-item-right">
    <p>Tervetuloa Tex Willer -aiheiselle tietosivulle! Tex Willer on legendaarinen italialainen sarjakuvahahmo, 
        joka seikkailee villin lännen armottomissa maisemissa. Hän on kovaotteinen ja oikeudenmukainen sankari, 
        joka on voittanut lukijoiden sydämet ympäri maailmaa jo vuosikymmenten ajan. Tex Willer on luotu vuonna 1948 ja
         hän seikkailee edelleen nykypäivänäkin. Sarjakuva kertoo Texin ja hänen uskollisten ystäviensä, kuten Kit Carsonin ja Tiger Jackin, 
         seikkailuista vaarallisissa tilanteissa, taisteluista roistoja vastaan ja oikeudenmukaisuuden puolesta. 
         Tex Willer edustaa rehellisyyttä, oikeutta ja sankaruutta, ja hänen tarinansa ovat täynnä jännitystä, toimintaa ja 
         inhimillisiä piirteitä.<br><br>

Tietosivultamme löydät kattavan kokoelman tietoa Tex Willeristä. Tutustu Texin historiaan, 
hänen luojansa Gian Luigi Bonellin ja Aurelio Galleppinin työhön, sekä sarjakuvan merkittäviin juoniin ja hahmoihin. 
Saat myös tietoa Tex Willerin vaikutuksesta koko sarjakuvamaailmaan ja populaarikulttuuriin.<br><br>

Tex Willer on jatkuvasti elossa fanien sydämissä, ja tämä tietosivu on omistettu kunnioituksella tälle legendaariselle hahmolle. 
Olen kerännyt tänne kaiken tarvittavan tiedon, jotta voit sukeltaa syvemmälle Tex Willerin maailmaan ja 
jakaa intohimosi muiden faneiden kanssa. Tervetuloa tutkimaan Tex Willerin villiä ja jännittävää maailmaa!</p>
</div>


        </div>
       <div  style="text-align: center; "><hr> <br><div class="infobox">Valitse aihekortti</div><br><br>
       <div class="flex-container sarjat-div">
            <a href="kansikuva.php" class="card-tex">
              <div class="card card-2">
                <img
                  class="card-img-top sarjat-img-3"
                  src="https://geronimo.okol.org/~koiton/tex/css/images/numerot.jpg"
                />
                <div class="card-body">
                  <p class="card-text">Numerot/kansikuvat</p>
                </div>
              </div>
            </a>

            <a href="tarina_sarja.php" class="card-tex">
              <div class="card card-2">
                <img
                  class="card-img-top sarjat-img-3"
                  src="https://geronimo.okol.org/~koiton/tex/css/images/tarinat.jpg"
                />
                <div class="card-body">
                  <p class="card-text">Tarinat</p>
                </div>
              </div>
            </a>

            <a href="hahmot.php" class="card-tex">
              <div class="card card-2">
                <img
                  class="card-img-top sarjat-img-3"
                  src="https://geronimo.okol.org/~koiton/tex/css/images/hahmot.jpg"
                />
                <div class="card-body">
                  <p class="card-text">Hahmot</p>
                </div>
              </div>
            </a>
      
            <a href="kalenteri.php" class="card-tex">
              <div class="card card-2">
                <img
                  class="card-img-top sarjat-img-3"
                  src="css/images/kalenteri.jpg"
                />
                <div class="card-body">
                  <p class="card-text">Tulevat julkaisut</p>
                </div>
              </div>
            </a>
    </div></div><br>
</div><br><br>

  <?php include 'elements/scripts.php'; ?>
</body>
</html>
