<?php
if (isset($_COOKIE['korisnickoIme'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    $artikalid = htmlspecialchars($_POST['artikalid'], ENT_QUOTES, 'UTF-8');
    $kolicina = htmlspecialchars($_POST['kolicina'], ENT_QUOTES, 'UTF-8');
    $cijena = htmlspecialchars($_POST['cijena'], ENT_QUOTES, 'UTF-8');

    $sql_query =
        "INSERT INTO `racunstavka`
                 (`RacunId`, `StavkaId`, `ArtikalId`, `Kolicina`, `Cijena`) 

        VALUES
        (NULL, NULL, '$artikalid', '$kolicina', '$cijena')";
    $conn->query($sql_query);

    $conn->close();
    header("Location: racun.php");
}
