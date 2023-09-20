<?php
if (isset($_COOKIE['korisnickoIme'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    $lagerId = htmlspecialchars($_POST['lagerId'], ENT_QUOTES, 'UTF-8');

    $sql_query = "DELETE FROM lager WHERE `LagerId` = '$lagerId'";

    $conn->query($sql_query);

    $conn->close();
    header("Location: lager-a.php");
}

?>