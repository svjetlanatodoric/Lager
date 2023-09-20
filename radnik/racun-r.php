 <?php
   if (isset($_COOKIE['korisnickoIme'])) {
      require_once("../components/radnik-navbar.php");
      require_once("../components/racun.php");
   } else {
      header("Location: ../login/login.php");
   }
   ?>