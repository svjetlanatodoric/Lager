<?php
if ($rola == 1) {
    if (!empty($response) && $response->num_rows >= 1) {
        header("Location: ../account-already-exists.php");
    } else {
        header("Location: modal.php");
        include_once("../constants.php");
        $korisnickoIme = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rola = htmlspecialchars($_POST['rola'], ENT_QUOTES, 'UTF-8');
    
        $db = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    
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
        // setcookie('korisnickoIme', htmlspecialchars($_POST['korisnickoIme']), time() + 3600, '/');
        // $_COOKIE['korisnickoIme'] = $korisnickoIme;
        // header("Location: ../pocetna-stranica.php");
        
        // $sql_query = "
        // INSERT INTO `korisnik`
        // (`KorisnickoIme`,
        // `Sifra`,
        // `RolaId`)
        // VALUES
        // ('$korisnickoIme',
        // '$password',
        // '$rola')";
        
        require_once("admin-verify.php");
        $db->close();
        die();
    }
    $db->query($sql_query);
}
