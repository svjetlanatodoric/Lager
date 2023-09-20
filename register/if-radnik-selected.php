<?php
 if (!empty($response) && $response->num_rows >= 1 && $rola==2) {
    header("Location: ../account-already-exists.php");
}
if ($rola == 2) {
$sql_query = "
INSERT INTO `korisnik`
    (`KorisnickoIme`,
     `Sifra`,
     `RolaId`)
    VALUES
    ('$korisnickoIme',
     '$password',
     '$rola')";
    $db->query($sql_query);
    setcookie('korisnickoIme', htmlspecialchars($_POST['korisnickoIme']), time() + 3600, '/');
    $_COOKIE['korisnickoIme'] = $korisnickoIme;
    header("Location: ../radnik/artikli-r.php");

    $db->close();
    die();
}
?>