<head>
    <link rel="stylesheet" href="../css/pocetna-stranica.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <link rel="stylesheet" href="../css/artikli-add-modal.css">
    <link rel="stylesheet" href="../css/logout-btn.css">
</head>

<body>
    <?php   
     if (isset($_COOKIE['korisnickoIme'])) {

    require_once("../components/radnik-navbar.php");
    ?>

    <section class="table-sections">
    <div class="heading-container">
            <h1>
                Lager
            </h1>
        </div>
        <?php
        include_once("../constants.php");


        $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

        $query = "
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
        l.ArtikalId = a.ArtikalId";

        $response = $conn->query($query);

        if (!empty($response) && $response->num_rows > 0) {
        ?>
            <div id="tabela-lager-container">
                <table id="tabela-lager">
                    <thead>
                        <tr>
                            <th>Lager ID</th>
                            <th>Naziv artikla</th>
                            <th>Raspoloziva kolicina</th>
                            <th>Lokacija</th>
                        </tr>
                    </thead>
                    <?php

                    while ($lager = $response->fetch_assoc()) { ?>
                        <div class="tbody-container">
                            <tbody>

                                <tr>
                                    <td> <?php echo ($lager['LagerId']) ?></td>
                                    <td><?php echo ($lager['Naziv']) ?></td>
                                    <td><?php echo ($lager['RaspolozivaKolicina']) ?></td>
                                    <td><?php echo ($lager['Lokacija']) ?></td>


                            </tbody>
                        </div>

                    <?php
                    }

                    ?>
                </table>
            </div>
        <?php
            $conn->close();
        } 
    } else {
            echo "<h2>NEMA LAGERA ZA PRIKAZ!</h2>";
        }
        if (!isset($_COOKIE['korisnickoIme'])) {
            header("Location: ../login/login.php");

        }

?>
</body>