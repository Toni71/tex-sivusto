<?php

require_once('elements/config.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Tarkista yhteyden onnistuminen
if (!$conn) {
    die("Yhteys epäonnistui: " . mysqli_connect_error());
}
$id = $_GET["id"]; 
// Suorita kysely
$sql = "SELECT * FROM issue INNER JOIN vuosikerta ON issue.vuosikerta_id = vuosikerta.id where issue.id='$id' ORDER BY issue.numero";
$result = mysqli_query($conn, $sql);

$result = $conn->query($sql);

function urlExists($url) {
  $headers = @get_headers($url);
  return is_array($headers) ? strpos($headers[0], '200') !== false : false;
}

function printvuosikerta($vuosikerta) {
    $x = $vuosikerta['numero'];
    $id = $vuosikerta['sarja_id']; 
 
    $vuosi = $vuosikerta['vuosi']; 
    include 'elements/kuvataulukko.php';
	 
	
	  function getImageUrlsForNumber($conn, $numero, $kuva, $x, $kuvakoko) {
		$imageUrls = array();
		// Hae pääkuva erikseen
		$mainSql = "SELECT img FROM kuva WHERE tex_id = '$numero' ";
		$imageUrls['main'] = "https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}{$x}.jpg";
		$imageUrls['kuvakoko'] = $kuvakoko;
	
		// Hae muut kuvat ja järjestä ne
		$sql = "SELECT img FROM kuva WHERE tex_id = '$numero' AND img  ORDER BY img";
		$result = mysqli_query($conn, $sql);
	
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$imageUrls['small'][] = "https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}{$row['img']}.jpg";
			}		}
	
		return $imageUrls;
	}
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if ($id == 3) {
      $kuvakoko = 2;
    } else {
      $kuvakoko = 1;
    } 
	$idt = $_GET["id"]; 
	// Kutsu tätä funktiota ja lisää tulokset imageUrls-taulukkoon
	$imageUrls = getImageUrlsForNumber($conn, $idt, $kuva, $x, $kuvakoko);
  $vuosikerta_id = $_GET["vuosikerta_id"]; 
  if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    $edit ="";
} else{
  $edit ="<a href='muokkaa.php?id={$_GET['id']}&sarja={$vuosikerta['sarja_id']}&vuosikerta={$vuosikerta['vuosi']}&vuosikerta_id={$vuosikerta['vuosikerta_id']}'> <i style='font-size:30px;' class='bi bi-pencil-square'></i></a>";
}
  
echo <<<EOD
<div class="flex-item-left">
<div class="test">
<div class="product-img" style="position: relative; ">

<img class="test4567 img-fluid kuvake main-{$imageUrls['kuvakoko']}" src='{$imageUrls['main']}' data-image-url='{$imageUrls['main']}'  id="main-image" ><hr>
<div class="magnifier"></div>
EOD;

if (isset($_SESSION["login"]) && $_SESSION["login"]) {
  $cover_id = $_GET['id'];
  $is_owned = checkCoverOwnership($conn, $cover_id);
  $omistettu = $is_owned ? 'checked' : '';

  echo <<<EOD
  <input type='checkbox' class='cover-checkbox2 cover-checkboxs' data-cover-id='{$cover_id}' 
  value='1' name='cover_status' $omistettu>
EOD;
}

echo <<<EOD
</div></div>

<div class="small-images">
                <img class=" small-image small-{$imageUrls['kuvakoko']}" src='{$imageUrls['main']}' id="main-small-image" />
           
EOD;
 if (is_array($imageUrls) && array_key_exists('small', $imageUrls)) {
  foreach ($imageUrls['small'] as $smallImageUrl) {
      echo "<img class='small-image small-{$imageUrls['kuvakoko']}' src='$smallImageUrl' />";
  }
}  
    echo <<<EOD
            <hr>
        </div>
    </div>
    <div class="flex-item-right">        
    <h6 ><b>Nro.</b>{$x}/{$vuosikerta['nimi']}</h6>
        <h1 style=" font-size: 1.9em;
        font-weight: bold;
      ">{$vuosikerta['nimike']}</h1><hr>
        <p class="info-text">Tarina: <b>{$vuosikerta['tarina']}</b></p>
        <p class="info-text">Alkuperäisjulkaisu:<b> {$vuosikerta['alkuperaisjulkaisu']}</b></p>
        <p class="info-text">Teksti:<b> {$vuosikerta['kirjoittaja']}</b></p>
        <p class="info-text">Kuvitus: <b>{$vuosikerta['kuvittaja']}</b></p>
        <p class="info-text">Suomennos: <b>{$vuosikerta['suomentaja']}</b></p>
        <p class="info-text">Värit: <b>{$vuosikerta['varittaja']}</b></p>
        <p class="info-text">Sivumaara: <b>{$vuosikerta['sivumaara']}</b></p>
        <p class="info-text">Väritys: <b>{$vuosikerta['vari']}</b></p>
        <p class="info-text">Kertaus: <div style="background-color:white; padding:10px;   border: solid #b9b9b9 2px;">{$vuosikerta['kertaus']}</div> </p>
       {$edit}
    </div>
    EOD;
}


if (isset($_SESSION["login"]) && $_SESSION["login"]) {
function checkCoverOwnership($conn, $cover_id) {
  $user_id = $_SESSION["user_id"];
  $query = "SELECT * FROM user_cover_status WHERE user_id='$user_id' AND tex_id = '$cover_id' AND status = 1";
  $result = mysqli_query($conn, $query);
  return mysqli_num_rows($result) > 0;
}
}
function printvuosikertaForm($result) {
    if ($result->num_rows == 0) {
        echo "0 numeroa";
        return;
    }

    while($row = $result->fetch_assoc()) {
        printvuosikerta($row);
    }
}

printvuosikertaForm($result);
// Sulje yhteys
mysqli_close($conn);
?>