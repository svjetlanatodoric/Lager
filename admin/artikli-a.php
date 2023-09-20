<body>
     <?php
     if (isset($_COOKIE['korisnickoIme'])) {
          include_once("../constants.php");
          $connection = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
          $sql = "SELECT RolaId FROM `korisnik`";
          $result = $connection->query($sql);

          if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $dbrola = $row['RolaId'];
               if ($dbrola == 1) {
                    require_once("../components/admin-navbar.php");
                    require_once("../components/tabela-artikli.php");
                    require_once("artikli-add.php");
                    require_once("artikli-edit.php")
     ?>

     <?php

               };
          }
     } else {
          header("Location: ../login/login.php");
     }
     ?>
     <script src="../js/artikli-add.js"></script>
     <script src="../js/artikli-edit.js"></script>
</body>