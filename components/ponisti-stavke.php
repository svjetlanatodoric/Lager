<?php
session_start();

if (isset($_POST['ponisti'])) {
    $stavke = isset($_SESSION['stavke']) ? $_SESSION['stavke'] : array();
    if (isset($stavke)) {
        unset($stavke);
        $_SESSION['stavke'] = $stavke;
    }
}

if (isset($_POST['ponisti']) && isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
    header("Location: ../admin/racun-a.php");
    exit; //prevent further execution of the script
}
if (isset($_POST['ponisti']) && isset($_COOKIE['rola']) && $_COOKIE['rola'] == 2) {
    header("Location: ../radnik/racun-r.php");
    exit;
}
