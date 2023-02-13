<?php
include_once("../constants.php");
$korisnickoIme = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');
if (isset($korisnickoIme)) {

    $newPassword = htmlspecialchars($_POST['newPassword'], ENT_QUOTES, 'UTF-8');
    $passwordConfirm = htmlspecialchars($_POST['passwordConfirm'], ENT_QUOTES, 'UTF-8');

    $connection = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);


    if ($passwordConfirm === $newPassword) {
        $sql_query = "UPDATE `korisnik` SET Sifra='" . password_hash($newPassword, PASSWORD_BCRYPT) . "' WHERE KorisnickoIme='$korisnickoIme'";
        $response = $connection->query($sql_query);
        echo "<p>Sifra uspesno promenjena</p>";
    } else {
        require_once("login.php");
?>
<head>
     <link rel="stylesheet" href="../css/login-form.css">
     <link rel="stylesheet" href="../css/modal.css">
 </head>
        <body>

            <div id="modal" class="modal">

                <!-- Sadržaj modala -->
                <div class="entire-modal-content">
                    <span id="close" onclick="modalExit()">&times;</span>
                    <div class="modal-content">
                        <form id="recovery-form" action="password-recovery-request.php" method="post">
                            <h3>Promijenite lozinku</h3>
                            <div>
                                <labe>Unesite svoje korisnicko ime:</label> <br>
                                    <input type="text" id="korisnickoIme" name="korisnickoIme" required><br>
                            </div>
                            <div>
                                <label>Unesite novu lozinku: </label> <br>
                                <input type="password" id="newPassword" name="newPassword" required><br>
                            </div>
                            <div>
                                <label>Ponovo unesite novu lozinku: </label> <br>
                                <input type="password" id="confirmPassword" name="passwordConfirm" required> <br>
                            </div>
                            <div>
                                <p>Unesene lozinke moraju biti jednake</p>
                            </div>
                            <button type="submit">Potvrdi</button>
                    </div>
                    </form>
                </div>

            </div>
            <script>
               var modal =document.getElementById("modal")
               modal.style.display="block"
            </script>
            <script src="../js/modal.js"></script>

        </body>
<?php
        
    }
}
?>