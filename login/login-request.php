<head>
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/login-form.css">
</head>
<?php
// if (!isset($_POST['korisnickoIme']) || !isset($_POST['sifra'])) {
//     header("Location: login.php");
//     exit;
// }

// $korisnickoIme = htmlspecialchars($_POST['korisnickoIme']);
// $sifra = htmlspecialchars($_POST['sifra']);

// $connection = new mysqli("localhost", "root", "", "prodavnica_db");

// if ($connection->connect_error) {
//     die("Greška pri konekciji sa bazom podataka: " . $connection->connect_error);
// }

// $sql = "SELECT KorisnickoIme, Sifra FROM `korisnik` WHERE KorisnickoIme='$korisnickoIme'";
// $result = $connection->query($sql);

// if ($result->num_rows ==1 ) {
//     $row = $result->fetch_assoc();
//     $hashed_password = $row['Sifra'];

//     if (password_verify($sifra, $hashed_password)) {
//         setcookie('korisnickoIme', $korisnickoIme, time() + 3600);
//         header("Location: ../pocetna-stranica.php");
//         exit;
//     } else {
//         require_once("login.php");
//         echo "<p>Pogresna sifra</p>";
//     }
// } else {
//     require_once("login.php");
//     echo "<p>Ovaj korisnik ne postoji</p>";
// }

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
        if (password_verify($password, $dbsifra)) {
            setcookie('korisnickoIme', htmlspecialchars($_POST['korisnickoIme']), time() + 3600, '/');
            $_COOKIE['korisnickoIme'] = $korisnickoIme;

            header("Location: ../pocetna-stranica.php");
            exit;
        }
        if (password_verify($password, $dbsifra) == false) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                include_once("../constants.php");
                $connection = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
                $password = htmlspecialchars($_POST['sifra']);
                $sql = "SELECT KorisnickoIme,  Sifra FROM `korisnik` ";
                $result = $connection->query($sql);

                $row = $result->fetch_assoc();
                $dbsifra = $row['Sifra'];
                if (password_verify($password, $dbsifra) == false) {
                    require_once("login.php");
                    require_once("forgot-password.php");
                    require_once("password-recovery.php");
                }
            }
        }
    } else {
        require_once("login.php");
        echo "<p>Ovaj korisnik ne postoji</p>";
    };

    if (isset($_POST['logout'])) {
        require_once("login.php");
    }
}

?>