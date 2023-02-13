<?php

if ($rola == 1) {
    header("Location: modal.php");
    
    // $sql_query = "
    // INSERT INTO `korisnik`
    // (`KorisnickoIme`,
    // `Sifra`,
    // `RolaId`)
    // VALUES
    // ('$korisnickoIme',
    // '$password',
    // '$rola')";

    //  setcookie('korisnickoIme', htmlspecialchars($_POST['korisnickoIme']), time() + 3600, '/');
    //  $_COOKIE['korisnickoIme'] = $korisnickoIme;
    //  if (isset($_COOKIE['korisnickoIme'])) {
    //      header("Location: ../pocetna-stranica.php");
    //      $db->close();
    //      die();
    //  }
    // $db->query($sql_query);
} 
?>