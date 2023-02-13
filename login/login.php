<head>
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/login-form.css">
</head>
<?php
if (isset($_COOKIE['korisnickoIme'])) {
    unset($_COOKIE['korisnickoIme']);
    setcookie('korisnickoIme', '', time() - 3600);
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
            require_once("forgot-password.php");
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