<?php
          require_once('elements/config.php');

          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          $id = $_GET["id"]; 
          $sql = "SELECT  i.id AS i_id, v.id AS v_id, v.nimi,v.sarja_id,i.numero, v.vuosi FROM hahmo AS h
          INNER JOIN hahmo_numero AS hn ON h.id = hn.hahmo_id  
          INNER JOIN issue AS i ON hn.tex_id = i.id
          INNER JOIN vuosikerta AS v ON i.vuosikerta_id = v.id
          WHERE h.id = $id ORDER BY v.sarja_id Desc, v.vuosi Desc , i.numero Desc ";
         
          $result = $conn->query($sql);

          function printSeries($serie) {
            $id = $serie['sarja_id'];
            $numero = $serie['numero']; 
            $vuosikerta = $serie['nimi']; 
            $tex_id = $serie['i_id'];
            $vuosikerta_id = $serie['v_id'];

            $vuosi = $serie['vuosi']; 
            $kuva = "";
            include 'elements/kuvataulukko.php';
           

            echo <<<EOD
            <a href="tieto.php?id={$tex_id}&sarja={$id}&vuosikerta={$vuosi}&vuosikerta_id={$vuosikerta_id}" target="blank" class="card-tex">
              <div class="card card-1">
                <img
                  class="card-img-top sarjat-img-1"
                  src="https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}{$numero}.jpg"
                  data-image-url="https://geronimo.okol.org/~koiton/tex/css/images/{$kuva}{$numero}.jpg"
                />
                <div class="card-body">
                  <p class="card-text">Nro.{$numero}/{$vuosikerta}</p>
                </div>
              </div>
            </a>
          EOD;
          }

          function printSeriesForm($result) {
            if ($result->num_rows == 0) {
              echo "0 numeroa";
              return;
            }

            while($row = $result->fetch_assoc()) {
              printSeries($row);
            }
          }

          printSeriesForm($result);
          ?>