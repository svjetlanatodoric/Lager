<head>
    <link rel="stylesheet" href="../css/form-edit.css">
    <link rel="stylesheet" href="../css/logout-btn.css">
</head>

</head>

<body>
    <div class="modal" id="edit-radnika-modal">

        <div class="entire-modal-content">

            <span class="close" onclick="zatvoriEditModal()">&times;</span>

            <div class="modal-content">

                <form action="radnici-edit-request.php" id="radnici-form-edit" method="POST">
                    <h3 id="edit-heading">Izmjena podataka o radniku</h3>
                    <div id="radnik-edit-inputs">
                        <input type="hidden" name="radnikId" id="radnikId" >
                        <div>
                            <input id="imeRadnika" name="ime" type="text" placeholder="Ime radnika" required>
                        </div>
                        <div>
                            <input id="prezimeRadnika" name="prezime" type="text" placeholder="Prezime radnika" required>
                        </div>
                        <div>
                            <input id="brTel" name="brojTelefona" type="text" placeholder="Broj telefona">
                        </div>
                        <div>
                            <input id="adresa" name="adresa" type="text" placeholder="Adresa" required>
                        </div>
                        <div>
                            <input id="grad" name="grad" type="text" placeholder="Grad" required>
                        </div>
                        <div>
                            <input id="emailRadnika" name="email" type="text" placeholder="E-mail" required>
                        </div>
                        <div>
                            <input id="jmbg" name="jmbg" type="text" placeholder="JMBG" required>
                        </div>


                    </div>

                    <div style="margin: auto;">
                        <input type="submit" name="izmjenaRadnika" id="edit-btn" value="Izmijeni">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="../js/radnici.js"></script>
</body>