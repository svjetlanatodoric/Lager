<?php

if (isset($_POST['artikalid'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $artikalid = htmlspecialchars($_POST['artikalid'], ENT_QUOTES, 'UTF-8');
    $kolicina = htmlspecialchars($_POST['kolicina'], ENT_QUOTES, 'UTF-8');
    $cijena = htmlspecialchars($_POST['cijena'], ENT_QUOTES, 'UTF-8');
    $ukupno = htmlspecialchars($_POST['ukupno'], ENT_QUOTES, 'UTF-8');


    $PDV = 0.17; // 17% VAT
    $PDV_formatted = number_format($PDV, 2, '.', ''); // format to 2 decimal places


    try {

        //Calculating the unique number of invoice 
        // Retrieve the highest RacunId value from the racun table
        $response = $conn->query("SELECT MAX(RacunId) AS max_racun_id FROM racun");
        $max_racun_id = $response->fetch_assoc()['max_racun_id'];
        // Generate the next BrojRacuna value by incrementing the highest RacunId
        $next_racun_id = $max_racun_id + 1;
        $broj_racuna = '00-R-' . str_pad($next_racun_id, 5, '0', STR_PAD_LEFT);

        session_start();
        $ukupniIznos = 0;

        foreach ($_SESSION['stavke'] as $s) {
            // Calculate the subtotal for the current row and add it to the total
            $ukupniIznos += $s['ukupno'];
            $ukupniIznosPDV =  $ukupniIznos + $PDV_formatted * $ukupniIznos;
            $iznosPDV = $ukupniIznos * $PDV_formatted;
        }
        
        // Update the raspoloziva kolicina in the lager table
        $update_query = "UPDATE lager SET raspolozivakolicina = raspolozivakolicina - $s[kolicina] WHERE artikalid = $s[artikalid]";
        if (!$conn->query($update_query)) {
            throw new Exception("Error executing query: " . $conn->error);
        }

        $user = null;
        $username = $_COOKIE['korisnickoIme'];
        $sql = "SELECT
    r.RadnikId,
    r.KorisnikId,
    k.KorisnikId
FROM
    Radnik AS r
LEFT JOIN korisnik AS k
ON
    k.KorisnikId = r.KorisnikId
    WHERE KorisnickoIme = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = $row['RadnikId'];
        }

        if (isset($_COOKIE['korisnickoIme']) && isset($_POST['kreirajRacun'])) {

            //Insert values in `racun` table

            $sql_racun = "INSERT INTO racun
        (
        RacunId,
        RadnikIdIzdao,
        DatumRacuna,
        BrojRacuna,
        UkupniIznos,
        IznosPDV,
        IznosBezPDV
    )
    VALUES(NULL, $user, NOW(),' $broj_racuna ', $ukupniIznosPDV, $iznosPDV, $ukupniIznos)";
            $conn->query($sql_racun);


            // Inserting data about items in racunstavka table
            foreach ($_SESSION['stavke'] as $s) {
                $stavka_query = "INSERT INTO racunstavka (RacunId, StavkaId, ArtikalId, Kolicina, Cijena)
        VALUES($next_racun_id, NULL, '$s[artikalid]', '$s[kolicina]', '$s[cijena]')";
                // handling possible errors
                if (!$conn->query($stavka_query)) {
                    throw new Exception("Error executing query: " . $conn->error);
                }
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo "MySQLi error: " . $e->getMessage();
    } catch (Exception $e) {
        // handle all other exceptions
        echo "Error: " . $e->getMessage();
    }

    if (isset($_POST['kreirajRacun']) && isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
        header("Location: ../admin/racun-a.php");
        exit; //prevent further execution of the script
    }
    if (isset($_POST['kreirajRacun']) && isset($_COOKIE['rola']) && $_COOKIE['rola'] == 2) {
        header("Location: ../radnik/racun-r.php");
        exit;
    }
}
