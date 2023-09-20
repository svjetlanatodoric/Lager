<head>
    <link rel="stylesheet" href="../css/form-edit.css">
</head>

<body>

    <div class="modal" id="edit-lager">

        <div class="entire-modal-content">

            <span class="close" onclick="zatvoriLagerEdit()">&times;</span>

            <div class="modal-content">

                <form action="lager-edit-request.php" id="form-edit" method="POST">
                    <h3 class="edit-heading">Izmjena lagera</h3>
                    <div id="artikli-edit-inputs">


                        <select name="idArtikla" id="nazivArtikla">
                            <option selected disabled value="0">ID artikla</option>
                            <?php
                            include_once("../constants.php");
                            $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
                            $query = "
        SELECT `ArtikalId`,`Naziv`
        FROM `artikal`
        ORDER BY `ArtikalId`
        ";
                            $response = $conn->query($query);

                            if (!empty($response) && $response->num_rows > 0) {
                                while ($artikal = $response->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $artikal['ArtikalId'] ?>">
                                        <?php echo $artikal['ArtikalId'] . " - " . $artikal['Naziv']  ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>

                        <div>
                            <input name="raspolozivaKolicina" id="raspolozivaKolicina"  type="text" placeholder="Raspoloživa količina" required>
                        </div>
                        <div>
                            <input id="lokacija" name="lokacija" type="text" placeholder="Lokacija">
                        </div>

                    </div>

                    <div>
                        <input type="submit" class="form-button" value="Izmijeni">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="../js/edit-lager.js"></script>
</body>