<body>
    <div id="dodaj-radnika-modal" class="modal" style="top:4%;width:60%; height:80%">
        
<!-- Modal content -->
<div class="entire-modal-content" style="height: 89%;">
    <span class="close" onclick="zatvoriModal()">&times;</span>
    
    <div class="modal-content">
        
        <form id="dodaj-forma" action="radnici-add-request.php" method="post">
            <div id="add-heading">
                <h3>Dodaj novog radnika</h3>
            </div>
            <div id="artikli-add-inputs">
            <select name="korisnik" id="korisnik">
                            <option selected disabled value="0">Korisničko ime radnika</option>
                            <?php
                            include_once("../constants.php");
                            $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
                            $query = "
        SELECT `KorisnickoIme`,`KorisnikId`
        FROM `korisnik`
        ORDER BY `KorisnikId`
        ";
                            $response = $conn->query($query);

                            if (!empty($response) && $response->num_rows > 0) {
                                while ($korisnik = $response->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $korisnik['KorisnikId'] ?>">
                                        <?php echo $korisnik['KorisnikId'] . " - " . $korisnik['KorisnickoIme']  ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                <div>
                    <input name="ime" type="text" placeholder="Ime radnika" required>
                    <div>
                        <input name="prezime" type="text" placeholder="Prezime radnika" required>
                    </div>
                </div>
                <div>
                    <input name="brojTelefona" type="text" placeholder="Broj telefona">
                </div>
                <div>
                    <input name="adresa" type="text" placeholder="Adresa" required>
                </div>
                <div>
                    <input name="grad" type="text" placeholder="Grad" required>
                </div>
                <div>
                    <input name="email" type="text" placeholder="E-mail" required>
                </div>
                <div>
                    <input name="jmbg" type="text" placeholder="JMBG" required>
                </div>

            </div>

            <div>
                <input type="submit" id="add-btn" value="Dodaj">
            </div>
            
        </form>
    </div>
</div>
</div>

</body>