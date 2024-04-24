<?php
if (isset($_POST['sifra'])) {
    include_once("../constants.php");
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    //  $sifraSelect = htmlspecialchars($_POST['sifraArtikla'], ENT_QUOTES, 'UTF-8');
    $artikalId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $sifra = htmlspecialchars($_POST['sifra'], ENT_QUOTES, 'UTF-8');
    $naziv = htmlspecialchars($_POST['naziv'], ENT_QUOTES, 'UTF-8');
    $mjera = htmlspecialchars($_POST['jedinicaMjere'], ENT_QUOTES, 'UTF-8');
    $barkod = htmlspecialchars($_POST['barkod'], ENT_QUOTES, 'UTF-8');
    $plu = htmlspecialchars($_POST['pluKod'], ENT_QUOTES, 'UTF-8');

    try {
        $sql_query = "
    SELECT
    *
FROM
    artikal
WHERE
    ArtikalId = '$artikalId' ";
        $response = $conn->query($sql_query);

        if (!empty($response) && $response->num_rows > 0) {
            $sql_query = "
        UPDATE 
            `artikal`
        SET
            `Sifra` = '" . $sifra . "',
            `Naziv` = '" . $naziv . "',
            `JedinicaMjere` =  '" . $mjera . "',
            `Barkod` = '" . $barkod . "',
            `PLU_KOD` = '" . $plu . "'
        
        WHERE `ArtikalId` = '$artikalId'";
            $conn->query($sql_query);
        }
    } catch (mysqli_sql_exception $e) {
        echo "MySQLi error: " . $e->getMessage();
    } catch (Exception $e) {
        // handle all other exceptions
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
    header("Location: artikli-a.php");
}
