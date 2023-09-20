<head>
    <link rel="stylesheet" href="../css/admin-modal.css">
    <link rel="stylesheet" href="../css/register-form.css">
</head>

<body>
    <div class="div-1"></div>
    <div class="div-2"></div>
    <div class="div-3"></div>
    <div id="register-form">
        <form action="register-request.php" method="post">
            <div id="registrujte-se">
                <h2>Registrujte se</h2>
            </div>
            <div class="inputs">
                <div>
                    <input class="no-outline" name="korisnickoIme" type="text" placeholder="Unesite korisničko ime..." required>
                </div>
                <div>
                    <input class="no-outline" name="password" type="password" placeholder="Unesite lozinku..." required>
                </div>
                <div>
                    <select name="rola" id="rola-select">
                        <option selected disabled value="0">Izaberite ulogu</option>
                        <?php
                        include_once("../constants.php");
                        $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

                        $query = "
                SELECT
                `RolaId`,
                    `NazivRole`
                FROM
                    `rola`";

                        $response = $conn->query($query);

                        if (!empty($response) && $response->num_rows > 0) {
                            while ($korisnik = $response->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $korisnik['RolaId'] ?>">
                                    <?php echo $korisnik['NazivRole'] ?>
                                </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input id="register-submit" type="submit" value="REGISTER">
                </div>

        </form>
    </div>
    <p>Imate nalog? <a href="../login/login.php">Prijavite se</a></p>
    </div>
    <script src="../js/rola.js"></script>
    <script src="../js/modal.js"></script>
</body>