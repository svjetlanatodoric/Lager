<body>
    <?php
    if (isset($_COOKIE['korisnickoIme'])) {
         require_once("../components/radnik-navbar.php");
         require_once("../components/tabela-radnici.php");
    } else {
        header("Location: ../login/login.php");
    }
    ?>
    <!-- <script src="../js/artikli-add.js"></script> -->
</body>