<?php
if (isset($_POST['izmjenaRadnika'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $radnikId = htmlspecialchars($_POST['radnikId']);
    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $brojTelefona = htmlspecialchars($_POST['brojTelefona']);
    $adresa = htmlspecialchars($_POST['adresa']);
    $grad = htmlspecialchars($_POST['grad']);
    $email = htmlspecialchars($_POST['email']);
    $jmbg = htmlspecialchars($_POST['jmbg']);

    $sql_query = "
    SELECT
        *
    FROM
        `radnik`
        WHERE RadnikId = '$radnikId'";
    echo $radnikId;
    $response = $conn->query($sql_query);
    if (!empty($response) && $response->num_rows > 0) {
        // use data from SELECT query to update row
        $row = $response->fetch_assoc();
        $sql_query = "
            UPDATE
                `radnik`
            SET
                `Ime` = '" . $ime . "',
                `Prezime` = '" . $prezime . "',
                `BrojTelefona` =  '" . $brojTelefona . "',
                `Adresa` =  '" . $adresa . "',
                `Grad` = '" . $grad . "',
                `Email` = '" . $email . "',
                `JMBG` = '" . $jmbg . "'
                WHERE RadnikId = '$radnikId'";

        $conn->query($sql_query);

        $conn->close();
        header("Location: radnici-a.php");
    }
}
