<?php
if (isset($_COOKIE['korisnickoIme'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $sql_query =
        "INSERT INTO `lager`
            (LagerId,
             ArtikalId,
             RaspolozivaKolicina,
              Lokacija)
        VALUES
            (LagerId,
              '$_POST[idArtikla]', 
            '$_POST[raspolozivaKolicina]', 
           ' $_POST[lokacija]')";


    $conn->query($sql_query);

    $conn->close();
    header("Location: lager-a.php");
}

