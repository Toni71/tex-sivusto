<?php
// Tämän avulla saadan tietoon missä kansiossa issuen kuva on

$kuvaTaulukko = [
                  1 => "pokkari/{$vuosi}/",
                  2 => "nuori/{$vuosi}/",
                  3 => "liuska/{$vuosi}/",
                  4 => "maxi/{$vuosi}/",
                  5 => "suuralbumi/{$vuosi}/",
                  6 => "kronikka/{$vuosi}/",
                  7 => "varialbumi/{$vuosi}/",
                  8 => "kirjasto/{$vuosi}/",
              9 => "juhlajulkaisu/{$vuosi}/",
              10 => "italia/{$vuosi}/"
          ];
          $kuva ="";
          $kuva = isset($kuvaTaulukko[$id]) ? $kuvaTaulukko[$id] : "";  
// $kuva antaa id avulla oikean kansio polun
        ?>