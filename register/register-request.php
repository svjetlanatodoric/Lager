<?php
if (isset($_COOKIE['korisnickoIme'])) {
    setcookie('korisnickoIme', '', time() - 3600);
}

if (isset($_POST['korisnickoIme'])) {
    include_once("../constants.php");
    $korisnickoIme = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rola = htmlspecialchars($_POST['rola'], ENT_QUOTES, 'UTF-8');

    $db = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    $sql_query =
        "SELECT * 
        FROM `korisnik` 
        WHERE `KorisnickoIme` = '$korisnickoIme'";

    $response = $db->query($sql_query);

    if (!empty($response) && $response->num_rows >= 1) {
        header("Location: ../account-already-exists.php");
    }
    if ($rola == 1) {
        if (!empty($response) && $response->num_rows >= 1) {
            header("Location: ../account-already-exists.php");
        } else {
            require_once("if-admin-selected.php");
        }
    }
    if ($rola != 1 && $rola == 2) {
        if (!empty($response) && $response->num_rows >= 1) {
            header("Location: ../account-already-exists.php");
        }
        require_once("if-radnik-selected.php");
        header("Location:../pocetna-stranica.php");
    }
}
