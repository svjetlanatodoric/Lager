<?php
if (isset($_POST['idArtikla'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $idArtikla = htmlspecialchars($_POST['idArtikla'], ENT_QUOTES, 'UTF-8');
    $raspolozivaKolicina = htmlspecialchars($_POST['raspolozivaKolicina'], ENT_QUOTES, 'UTF-8');
    $lokacija = htmlspecialchars($_POST['lokacija'], ENT_QUOTES, 'UTF-8');

    $sql_query = "
    SELECT
    l.`LagerId`,
    l.`ArtikalId`,
    a.Naziv,
    l.RaspolozivaKolicina,
    l.Lokacija
FROM
    `lager` AS l
LEFT JOIN artikal AS a
ON
    l.ArtikalId = a.ArtikalId ";
    $response = $conn->query($sql_query);

    if (!empty($response) && $response->num_rows > 0) {
        $sql_query = "
        UPDATE
            `lager`
        SET
            `ArtikalId` = '" . $idArtikla . "',
            `RaspolozivaKolicina` =  '" . $raspolozivaKolicina . "',
            `Lokacija` = '" . $lokacija . "'
";
        $conn->query($sql_query);

        $conn->close();
        header("Location: lager-a.php");
    }
}
