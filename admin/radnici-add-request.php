<?php
if (isset($_POST['ime'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $brojTelefona = htmlspecialchars($_POST['brojTelefona']);
    $adresa = htmlspecialchars($_POST['adresa']);
    $grad = htmlspecialchars($_POST['grad']);
    $email = htmlspecialchars($_POST['email']);
    $jmbg = htmlspecialchars($_POST['jmbg']);
    $korisnik = htmlspecialchars($_POST['korisnik']);
    $sql_query =
        "SELECT 
k.KorisnickoIme,
k.KorisnikId,
r.KorisnikId
FROM
korisnik as k
JOIN radnik as r
ON k.KorisnikId=r.KorisnikId
";
    $response = $conn->query($sql_query);
    if (!empty($response) && $response->num_rows > 0) {
        $sql_query =
            "INSERT INTO `radnik`
            (RadnikId,
             Ime,
             Prezime,
             BrojTelefona,
             Adresa,
             Grad,
             Email,
             JMBG,
             KorisnikId)
        VALUES
            (null,
            '$ime', 
            '$prezime', 
            '$brojTelefona', 
            '$adresa', 
            '$grad', 
            '$email', 
            '$jmbg', 
            '$korisnik')";

        $conn->query($sql_query);

        $conn->close();
        header("Location: radnici-a.php");
    }
}
?>
