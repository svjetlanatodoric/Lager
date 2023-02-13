<?php
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
    header("Location: ../pocetna-stranica.php");

    $db->close();
    die();
}
?>