<head>
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/login-form.css">
</head>
<?php
if (isset($_COOKIE['korisnickoIme'])&&isset($_COOKIE['rola'])) {  
    unset($_COOKIE['korisnickoIme']); 
    unset($_COOKIE['rola']); 
    setcookie('korisnickoIme', null, -1, '/'); 
    setcookie('rola', null, -1, '/'); 
    header("Location: ../login/login.php");
    return true;
}
?>

<body>
    <div class="div-1"></div>
    <div class="div-2"></div>
    <div class="div-3"></div>
    <div></div>
    <div id="login-form">
        <form action="login-request.php" method="POST">
            <div class="prijavite-se">
                <h2>Prijavite se</h2>
            </div>
            <div class="inputs">
                <!-- inputs -->
                <div>
                    <input class="no-outline" name="korisnickoIme" type="text" placeholder="Unesite korisničko ime..." required>
                </div>
                <div>
                    <input class="no-outline" name="sifra" type="password" placeholder="Unesite lozinku..." required>
                </div>
                <?php
                if (isset($_POST['korisnickoIme']) && isset($_POST['sifra'])) {

                    include_once("../constants.php");
                    $connection = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

                    $username = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');
                    $password = htmlspecialchars($_POST['sifra']);

                    $sql = "SELECT KorisnickoIme, Sifra FROM `korisnik` WHERE KorisnickoIme='$username'";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $dbime = $row['KorisnickoIme'];
                        $dbsifra = $row['Sifra'];
                        if (password_verify($password, $dbsifra) == false) {
                            require_once("wrong-password.php");
                            require_once("forgot-password.php");
                        }
                       
                    } else  {
                        require_once("user-not-found.php");
                        require_once("forgot-password.php");
                        
                    }
                }
                ?>

                <div>
                    <input type="submit" class="login-btn" value="LOG IN">
                </div>
                <p>Nemate nalog? <a href="../register/register.php">Registrujte se</a></p>
            </div>

        </form>

    </div>


    <script src="../js/modal.js"></script>
</body>