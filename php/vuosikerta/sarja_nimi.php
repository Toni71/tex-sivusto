<?php   
      $id = $_GET["id"]; 
  $titletable = [
    1 => "Tex Willer",
    2 => "Nuori Tex Willer",
    3 => "Liuska Tex",
    4 => "Maxi-Tex",
    5 => "Suuralbumi",
    6 => "Kronikka",
    7 => "Värialbumi",
    8 => "Kirjasto",
    9 => "Juhlajulkaisut",
    10 => "Italian kieliset julkaisut"
];
 echo isset($titletable[$id]) ? $titletable[$id] : "";   
 
  ?>