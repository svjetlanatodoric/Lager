<?php
if (isset($_COOKIE['korisnickoIme'])) {
    include_once("../components/admin-navbar.php");
    require_once("../components/racun.php");
} else {
    header("Location: ../login/login.php");
}
