<?php
if (isset($_POST['sifra'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $sql_query =
        "INSERT INTO `artikal`
            (Sifra,
             Naziv,
             JedinicaMjere,
              Barkod,
             PLU_KOD)
        VALUES
            ('$_POST[sifra]', 
            '$_POST[naziv]', 
            '$_POST[jedinicaMjere]', 
            $_POST[barkod], 
            $_POST[pluKod])";


    $conn->query($sql_query);

    $conn->close();
    header("Location: artikli-a.php");
}

