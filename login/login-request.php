<head>
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/login-form.css">
</head>
<?php
if (isset($_COOKIE['korisnickoIme'])) {
    unset($_COOKIE['korisnickoIme']);
    setcookie('korisnickoIme', null, -1, '/');
    header("Location: ../login/login.php");
}
if (isset($_POST['korisnickoIme']) && isset($_POST['sifra'])) {

    include_once("../constants.php");
    $connection = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);

    $username = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['sifra']);

    $sql = "SELECT KorisnickoIme, Sifra, RolaId FROM `korisnik` WHERE KorisnickoIme='$username'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbime = $row['KorisnickoIme'];
        $dbsifra = $row['Sifra'];
        $dbrola = $row['RolaId'];

        if (password_verify($password, $dbsifra)) {
            setcookie('korisnickoIme', htmlspecialchars($_POST['korisnickoIme']), time() + 3600, '/');
            setcookie('rola', $dbrola, time() + 3600, '/');
            $_COOKIE['korisnickoIme'] = $korisnickoIme;
            $_COOKIE['rola'] = $dbrola;
            if ($dbime ==$username && $dbrola == 1) {
                header("Location: ../admin/artikli-a.php");
                exit;
            } else{
                header("Location: ../radnik/artikli-r.php");
                exit;
            }
        }
        
        if (password_verify($password, $dbsifra) == false) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once("login.php");
            }
        }
    } else {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once("login.php");
        }
    }
    if (isset($_POST['logout'])) {
        require_once("login.php");
    }
}

?>