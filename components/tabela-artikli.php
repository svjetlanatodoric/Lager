<head>
    <link rel="stylesheet" href="../css/form-edit.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>

<body>

    <section id="artikli" class="table-sections">
        <header class="heading-container">
            <h1>
                Artikli
            </h1>
        </header>
        <?php
        if (isset($_COOKIE['korisnickoIme'])) {
            include_once("../constants.php");

            //adding appropriate navbar depending on user level
            $db = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
            $sql_query =  "
            SELECT KorisnickoIme, RolaId
             FROM `korisnik`";
            $response = $db->query($sql_query);
            $row = $response->fetch_assoc();
            $dbrola = $row['RolaId'];
            if (!empty($response) &&  $response->num_rows > 0 && $dbrola == 2) {
                include_once("radnik-navbar.php");
                include_once("../radnik/artikli-r.php");
            }
        } else if ($dbrola == 1) {
            include_once("admin-navbar.php");
            require_once("../admin/artikli-a.php");
        }


        $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

        $query =
            "SELECT 
        ArtikalId as 'id',
        Sifra,
        Naziv,
        JedinicaMjere,
        Barkod,
        PLU_KOD
        FROM `artikal`";

        $response = $conn->query($query);

        if (!empty($response) && $response->num_rows > 0) {
        ?>
            <div class="tabela-container">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Šifra</th>
                            <th>Naziv</th>
                            <th>JedinicaMjere</th>
                            <th>Barkod</th>
                            <th>PLU_KOD</th>
                            <!-- check if user is admin, because only him is allowed to edit data -->
                            <?php
                            if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
                            ?>
                                <th>Uredi</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php

                    while ($artikal = $response->fetch_assoc()) { ?>
                        <tbody>
                            <tr>
                                <td class="id" style="display: none;"><?php echo ($artikal['id']) ?></td>
                                <td class="sifra">
                                    <?php echo ($artikal['Sifra']) ?>
                                </td>
                                <td class="naziv"><?php echo ($artikal['Naziv']) ?></td>
                                <td class="jedinicaMjere"><?php echo ($artikal['JedinicaMjere']) ?></td>
                                <td class="barkod"><?php echo ($artikal['Barkod']) ?></td>
                                <td class="pluKod"><?php echo ($artikal['PLU_KOD']) ?></td>
                                <?php
                                if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
                                ?>
                                    <td id="artikli-edit-btn" onclick="izmijeniArtikal(this)">

                                        <button class="table-button edit-btn">Uredi</button>
                                    </td>
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
            echo "<h2>NEMA ARTIKALA ZA PRIKAZ!</h2>";
        }
        ?>


    </section>

</body>