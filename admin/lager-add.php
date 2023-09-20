<body>
    

<div id="dodaj-lager-modal" class="modal">

    <div class="entire-modal-content">
        <span class="close" onclick="zatvoriLagerModal()">&times;</span>

        <div class="modal-content">

            <form id="dodaj-lager-forma" action="lager-add-request.php" method="post">
                <div id="add-heading">
                    <h3>Dodaj novi lager</h3>
                </div>
                <div id="artikli-lager-inputs">
                    <div>
                        <select name="idArtikla" id="idArtikla">
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
                    </div>
                    <div>
                        <input name="raspolozivaKolicina" type="text" placeholder="Raspoloziva kolicina">
                    </div>
                    <div>
                        <input name="lokacija" type="text" placeholder="Lokacija" required>
                    </div>
                </div>

                <div>
                    <input type="submit" id="add-lager-btn" value="Dodaj">
                </div>

            </form>
        </div>
    </div>

</div>
</body>