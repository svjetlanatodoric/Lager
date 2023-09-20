<head>
    <link rel="stylesheet" href="../css/form-edit.css">
    <link rel="stylesheet" href="../css/logout-btn.css">
</head>

<body>
    <div class="modal" id="edit-modal">

        <div class="entire-modal-content">

            <span class="close" onclick="zatvoriEditModal()">&times;</span>

            <div class="modal-content">
                <form action="artikli-edit-request.php" id="form-edit" method="POST">
                    <h3 class="edit-heading">Izmjena artikla</h3>
                    <div id="artikli-edit-inputs">
                        <!-- Password -->
                        <div>
                            <div>
                                <label for="sifra">Šifra</label>
                            </div>
                            <input name="sifra" id="sifra" type="text" value="">
                        </div>
                        <div>
                            <!-- Name -->
                            <div>
                                <label for="naziv">Naziv</label>
                            </div>
                            <input name="naziv" id="naziv" type="text" value="">
                        </div>
                        <!-- Jedinica mjere -->
                        <div>
                            <div>
                                <label for="jedinicaMjere">Jedinica mjere</label>
                            </div>
                            <input name="jedinicaMjere" id="jedinicaMjere" type="text" value="">
                        </div>
                        <!-- Barkod -->
                        <div>
                            <div>
                                <label for="barkod">Barkod</label>
                            </div>
                            <input name="barkod" id="barkod" type="text" value="">
                        </div>
                        <!-- PLU KOD -->
                        <div>
                            <div>
                                <label for="pluKod">PLU kod</label>
                            </div>
                            <input name="pluKod" id="pluKod" type="number" value="">
                        </div>

                    </div>

                    <div>
                        <input type="submit" onsubmit="return false" id="edit-btn" value="Izmijeni">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="../js/artikli-edit.js"></script>
</body>