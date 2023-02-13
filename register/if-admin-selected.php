<?php

if ($rola == 1) {
    if (!empty($response) && $response->num_rows >= 1) {
        header("Location: ../account-already-exists.php");
    } else {
        header("Location: modal.php");

    require_once("admin-verify.php");
        setcookie('korisnickoIme', htmlspecialchars($_POST['korisnickoIme']), time() + 3600, '/');
        $_COOKIE['korisnickoIme'] = $korisnickoIme;
        if (isset($_COOKIE['korisnickoIme'])) {
            //  header("Location: ../pocetna-stranica.php");
            
        $sql_query = "
        INSERT INTO `korisnik`
        (`KorisnickoIme`,
        `Sifra`,
        `RolaId`)
        VALUES
        ('$korisnickoIme',
        '$password',
        '$rola')";
    
            $db->close();
            die();
        }
        $db->query($sql_query);
    }
}
?>
