<head>
    <link rel="stylesheet" href="../css/tabela.css">
    <link rel="stylesheet" href="../css/artikli-add.css">
    <link rel="stylesheet" href="../css/racun.css">
    <link rel="stylesheet" href="../css/modal.css">

</head>

<body>
    <section class="table-sections" id="tabela-racun">
        <header class="heading-container">
            <h1>
                Računi
            </h1>
        </header>
        <?php
        // if (isset($_COOKIE['korisnickoIme'])) {
             include_once("../constants.php");

        //     $db = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
        //     $sql_query =  "
        //     SELECT KorisnickoIme, RolaId
        //      FROM `korisnik`";
        //     $response = $db->query($sql_query);
        //     $row = $response->fetch_assoc();
        //     $dbrola = $row['RolaId'];
        //     if (!empty($response) &&  $response->num_rows > 0 && $dbrola == 2) {
        //       //  include_once("../radnik/racun-r.php");
        //     } else if ($dbrola == 1) {
        //         require_once("../admin/racun-a.php");
        //     }
        // }
        ?>
       
        <!-- INVOICE TABLE -->

        <?php
        require_once("racun-add.php");
       // require_once("racun-dodaj-stavku.php");
        $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

        $query =
            "SELECT 
       RacunId,
       RadnikIdIzdao,
       DatumRacuna,
       BrojRacuna,
       UkupniIznos,
       IznosPDV,
       IznosBezPDV
        FROM `racun`";

        $response = $conn->query($query);

        if (!empty($response) && $response->num_rows > 0) {

        ?>
            <div id="racun-container" class="tabela-container">
                <table class="tabela">

                    <thead>
                        <tr>
                            <th>ID računa</th>
                            <th>ID radnika</th>
                            <th>Datum izdavanja računa</th>
                            <th>Broj računa</th>
                            <th>Ukupni iznos</th>
                            <th>PDV</th>
                            <th>Iznos bez PDV-a</th>
                        </tr>
                    </thead>

                    <?php while ($racun = $response->fetch_assoc()) { ?>
                        <tbody>

                            <tr class="invoice-row" ondblclick="viewDetails()">
                                <td> <input type="hidden" id="racunId" name = "racunId" value= "<?php echo ($racun['RacunId']) ?>" ><?php echo ($racun['RacunId']) ?></td>
                                <td><?php echo ($racun['RadnikIdIzdao']) ?></td>
                                <td><?php echo ($racun['DatumRacuna']) ?></td>
                                <td><?php echo ($racun['BrojRacuna']) ?></td>
                                <td><?php echo ($racun['UkupniIznos']) ?></td>
                                <td><?php echo ($racun['IznosPDV']) ?></td>
                                <td><?php echo ($racun['IznosBezPDV']) ?></td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            <?php
            $conn->close();
        } else {
            echo "<h2>NEMA RAČUNA ZA PRIKAZ!</h2>";
        }
            ?>
            </div>
    </section>
    <script src="../js/racun.js"></script>
</body>