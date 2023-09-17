<?php
          require_once('elements/config.php');

          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT * FROM hahmo";
          $result = $conn->query($sql);

          function printSeries($serie) {
            $id = $serie['id'];
            $name = $serie['nimi']; 
          

            echo <<<EOD
            <a href="esittely.php?id={$id}" class="card-tex">
              <div class="card card-1">
                <img
                  class="card-img-top sarjat-img-1"
                  src="https://geronimo.okol.org/~koiton/tex/css/images/hahmot/{$id}.jpg"
                />
                <div class="card-body">
                  <p class="card-text">{$name}</p>
                </div>
              </div>
            </a>
          EOD;
          }

          function printSeriesForm($result) {
            if ($result->num_rows == 0) {
              echo "0 sarjaa";
              return;
            }

            while($row = $result->fetch_assoc()) {
              printSeries($row);
            }
          }

          printSeriesForm($result);
          ?>