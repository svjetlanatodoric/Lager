<head>
    <link rel="stylesheet" href="../css/artikli-add.css">
</head>
<div id="dodaj-artikal-modal" class="modal">

    <div class="entire-modal-content">
        <span class="close" onclick="zatvoriModal()">&times;</span>

        <div class="modal-content">

            <form id="dodaj-forma" action="artikli-add-request.php" method="post">
                <div id="add-heading">
                    <h3>Dodaj novi artikal</h3>
                </div>
                <div id="artikli-add-inputs">
                    <div>
                        <input name="sifra" type="text" placeholder="Šifra artikla" required>
                        <div>
                            <input name="naziv" type="text" placeholder="Naziv artikla" required>
                        </div>
                    </div>
                    <div>
                        <input name="jedinicaMjere" type="text" placeholder="Jedinica mjere">
                    </div>
                    <div>
                        <input name="barkod" type="text" placeholder="Barkod" required>
                    </div>
                    <div>
                        <input name="pluKod" type="text" placeholder="PLU kod" required>
                    </div>

                </div>

                <div>
                    <input type="submit" id="add-btn" value="Dodaj">
                </div>

            </form>
        </div>
    </div>

</div>