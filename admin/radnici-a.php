<head>
     <link rel="stylesheet" href="../css/tabela.css">
     <link rel="stylesheet" href="../css/artikli-add.css">
     <link rel="stylesheet" href="../css/radnici.css">
</head>

<body>

     <?php

     if (isset($_COOKIE['korisnickoIme'])) {
          if ($_COOKIE['rola'] == 1) {
               require_once("../components/admin-navbar.php");
               require_once("../components/tabela-radnici.php");
               require_once("radnici-add.php");
               require_once("radnici-edit.php");
     ?>

     <?php
          } else if ($_COOKIE['rola'] == 2) {
               require_once("../components/radnik-navbar.php");
               require_once("../components/tabela-radnici.php");
          }
     } else {
          header("Location: ../login/login.php");
     }
     ?>
     <script src="../js/radnici.js"></script>

</body>