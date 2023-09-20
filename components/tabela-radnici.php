<head>
    <link rel="stylesheet" href="../css/radnici.css">
    <link rel="stylesheet" href="../css/modal.css">

    <!-- <link rel="stylesheet" href="../css/logout-btn.css">
    <link rel="stylesheet" href="../css/tabela.css"> -->

</head>

<body>
    <section class="table-sections">
        <header class="heading-container">
            <h1>
                Radnici
            </h1>
        </header>
        <?php

        if (isset($_COOKIE['rola']) && ($_COOKIE['rola'] == 2)) {
   include_once("radnik-navbar.php");
            include_once("../radnik/radnici-r.php");
        } else if (isset($_COOKIE['rola']) && ($_COOKIE['rola'] == 1)) {
            include_once("admin-navbar.php");
            require_once("../admin/radnici-a.php");
       };

        if (isset($_COOKIE['korisnickoIme'])) {
            include_once("../constants.php");
            $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

            $query =
                "SELECT
        *
    FROM
        `radnik` as r
        join korisnik as k
        on r.KorisnikId = k.KorisnikId";

            $response = $conn->query($query);

            if (!empty($response) && $response->num_rows > 0) {
        ?>
                <div class="tabela-container">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Radnik ID</th>
                                <th>Ime</th>
                                <th>Prezime</th>
                                <th>Broj telefona</th>
                                <th>Adresa</th>
                                <th>Grad</th>
                                <th>E-mail</th>
                                <th>JMBG</th>
                                <?php
                                if ($_COOKIE['rola'] == 1) {
                                ?>
                                    <th>Uredi</th>
                                    <th>Ukloni</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <?php

                        while ($radnik = $response->fetch_assoc()) { ?>
                            <tbody>

                                <tr>
                                    <td class="radnikId"> <?php echo ($radnik['RadnikId']) ?></td>
                                    <td class="imeRadnika"><?php echo ($radnik['Ime']) ?></td>
                                    <td class="prezimeRadnika"><?php echo ($radnik['Prezime']) ?></td>
                                    <td class="brTel"><?php echo ($radnik['BrojTelefona']) ?></td>
                                    <td class="adresa"><?php echo ($radnik['Adresa']) ?></td>
                                    <td class="grad"><?php echo ($radnik['Grad']) ?></td>
                                    <td class="emailRadnika"><?php echo ($radnik['Email']) ?></td>
                                    <td class="jmbg"><?php echo ($radnik['JMBG']) ?></td>
                                    <?php
                                    if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
                                    ?>
                                        <td onclick="izmijeniRadnika(this)"><button class="table-button edit-btn">
                                                <input type='hidden' class="radnikId-edit" name='radnikId-edit' value="<?php echo htmlspecialchars($radnik['RadnikId']) ?>">Uredi
                                            </button>
                                        </td>

                                        <form action="radnik-delete-request.php" id="form-delete-radnik" method="POST">
                                            <input type='hidden' name='radnikId-delete' value="<?php echo htmlspecialchars($radnik['RadnikId']) ?>">
                                            <td><button class="table-button delete-btn" name="obrisiRadnika" value="<?php echo htmlspecialchars($radnik['RadnikId']) ?>">Ukloni</button> </td>
                                        </form>

                                    <?php
                                    }
                                    ?>
                                </tr>

                            </tbody>
                        <?php
                        }

                        ?>
                    </table>
                </div>
        <?php
                $conn->close();
            }
        } else {
            echo "<h2>NEMA RADNIKA ZA PRIKAZ!</h2>";
        }

        ?>


    </section>

</body>