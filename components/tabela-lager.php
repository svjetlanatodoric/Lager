<head>
    <link rel="stylesheet" href="../css/form-edit.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>

<body>
    <section class="table-sections">
        <header class="heading-container">
            <h1>
                Lager
            </h1>
        </header>
        <?php

        if (isset($_COOKIE['korisnickoIme'])) {
            include_once("../constants.php");

            $db = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
            $sql_query =  "
            SELECT KorisnickoIme, RolaId
             FROM `korisnik`";
            $response = $db->query($sql_query);
            $row = $response->fetch_assoc();
            $dbrola = $row['RolaId'];
            if (!empty($response) &&  $response->num_rows > 0 && $dbrola == 2) {
                include_once("radnik-navbar.php");
                include_once("../radnik/lager-r.php");
            } else if ($dbrola == 1) {
                include_once("admin-navbar.php");
                require_once("../admin/lager-a.php");
            }
        }

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
            <div class="tabela-container">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Lager ID</th>
                            <th>Artikal</th>
                            <th>Raspoloziva kolicina</th>
                            <th>Lokacija</th>
                            <?php
                            if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
                            ?>
                                <th>Uredi</th>
                                <th>Obriši</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php

                    while ($lager = $response->fetch_assoc()) { ?>
                        <tbody>

                            <tr>
                                <td class="lagerId"> <?php echo ($lager['LagerId']) ?></td>
                                <td class="nazivArtikla"><?php echo ($lager['Naziv']) ?></td>
                                <td class="raspolozivaKolicina"><?php echo ($lager['RaspolozivaKolicina']) ?></td>
                                <td class="lokacija"><?php echo ($lager['Lokacija']) ?></td>

                                <!-- check if user is admin, because only him is allowed to edit and delete data -->
                                <?php
                                if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
                                ?>
                                    <td onclick="izmijeniLager(this)"> <button class="table-button edit-btn">Uredi</button> </td>
                                    <form action="lager-delete-request.php" id="form-delete-lager" method="POST">
                                        <input type='hidden' name='lagerId' value="<?php echo htmlspecialchars($lager['LagerId']) ?>">
                                        <td><button class="table-button delete-btn" name="obrisi" value="<?php echo htmlspecialchars($lager['LagerId']) ?>">Obrisi</button> </td>
                                    </form>
                                <?php
                                }
                                ?>
                        </tbody>
                    <?php
                    }

                    ?>
                </table>
            </div>
        <?php
            $conn->close();
        } else {
            echo "<h2>NEMA LAGERA ZA PRIKAZ!</h2>";
        }

        // if (isset($_COOKIE['korisnickoIme'])) {

        //     $db = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
        //     $sql_query =  "
        //     SELECT KorisnickoIme, RolaId
        //      FROM `korisnik`";
        //     $response = $db->query($sql_query);
        //     $row = $response->fetch_assoc();
        //     $dbrola = $row['RolaId'];
        //     if (!empty($response) &&  $response->num_rows > 0 && $dbrola == 2) {
        //         include_once("../radnik/tabela-lager-radnik.php");
        //     }
        // } else if ($dbrola == 1) {
        //     require_once("../admin/tabela-lager-admin.php");
        // }
        ?>


    </section>

</body>

</html>