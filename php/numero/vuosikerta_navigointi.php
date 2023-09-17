<?php
// Tämän avulla pystytään navigoita  vuosikertojen välillä, 
// eikä voi mennä sellaiseen vuosikerttaan mitä ei vielä ole.
    $id = $_GET["id"];
    $sarja = $_GET["sarja"];
    $rajat = [
        1 => ["yla" => 2024, "ala" => 1971], // Tex Willer
        2 => ["yla" => 2024, "ala" => 2020],// Nuori Tex Willer
        3 => ["yla" => 1965, "ala" => 1952],// Liuska Tex
        4 => ["yla" => 5, "ala" => 1],// MAXI-Tex
        5 => ["yla" => 5, "ala" => 1],// Suuralbumi
        6 => ["yla" => 8, "ala" => 1],// Kronikka
        7 => ["yla" => 2, "ala" => 1],// Väri albumi
        8 => ["yla" => 8, "ala" => 1],// Kirjasto
        9 => ["yla" => 5, "ala" => 1],// Juhlajulkaisut
        10 => ["yla" => 4, "ala" => 1]// Italian kieliset julkaisut
    ];

    $yla = $rajat[$sarja]["yla"];
    $ala = $rajat[$sarja]["ala"];
$vuosikerta = $_GET["vuosikerta_id"]; 
    $numPlus = $id + 1;
    $numMinus = $id - 1;

    if ($id < $yla) {
        echo '<a style="margin-right:5px;" href="numero.php?id=' . $numPlus . '&sarja=' . $sarja .'&vuosikerta_id='.$vuosikerta. '"> <div class="next"><i class="bi bi-arrow-left-circle-fill"></i> </div></a>';
    } else {
        echo ' <div style="margin-right:5px;" class="next next2"><i class="fas fa-times-circle"></i> </div>';
    }
echo '<div class="infobox">Valitse numero</div>';

    if ($id > $ala) {
        echo '<a style="margin-left:0.9px;" href="numero.php?id=' . $numMinus . '&sarja=' . $sarja . '&vuosikerta_id='.$vuosikerta. '"> <div class="next"><i class="bi bi-arrow-right-circle-fill"></i></div></a>';
    } else {
        echo '<div style="margin-left:5px;" class="next next2"><i class="fas fa-times-circle"></i> </div>';
    }
    ?>
