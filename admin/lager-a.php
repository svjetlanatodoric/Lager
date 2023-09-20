<head>
     <link rel="stylesheet" href="../css/tabela.css">
     <link rel="stylesheet" href="../css/form-edit.css">

</head>

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
                    require_once("../components/tabela-lager.php");
     ?>
                    <section class="section-btns">
                         <?php
                         require_once("lager-add.php");
                         require_once("lager-edit.php");
                         ?>
                    </section>
     <?php
               }
          }
     } else {
          header("Location: ../login/login.php");
     }
     ?>
     <script src="../js/lager-delete.js"></script>
     <script src="../js/edit-lager.js"></script>
     <script src="../js/lager-add.js"></script>
     <script src="../js/artikli-add.js"></script>
</body>