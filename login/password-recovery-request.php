<head>
    <link rel="stylesheet" href="../css/modal.css">
</head>
<?php
include_once("../constants.php");
$korisnickoIme = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');
if (isset($korisnickoIme)) {

    $newPassword = htmlspecialchars($_POST['newPassword'], ENT_QUOTES, 'UTF-8');
    $passwordConfirm = htmlspecialchars($_POST['passwordConfirm'], ENT_QUOTES, 'UTF-8');

    $connection = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);


    if ($passwordConfirm === $newPassword) {
        $sql_query =
            "UPDATE `korisnik` 
         SET 
         Sifra='" . password_hash($newPassword, PASSWORD_BCRYPT) . "'
          WHERE 
          KorisnickoIme='$korisnickoIme'";
        $response = $connection->query($sql_query);
        header("Location: login.php");
    }
    if ($passwordConfirm != $newPassword) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once("password-recovery.php");
        }
    }
}
?>