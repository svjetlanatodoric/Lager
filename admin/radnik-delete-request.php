<?php
if (isset($_COOKIE['korisnickoIme']) && isset($_POST['obrisiRadnika'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    $radnikId = htmlspecialchars($_POST['radnikId'], ENT_QUOTES, 'UTF-8');

    $sql_query = "DELETE FROM radnik WHERE `RadnikId` = '$radnikId'";

    $conn->query($sql_query);

    $conn->close();
    header("Location: radnici-a.php");
}

?>