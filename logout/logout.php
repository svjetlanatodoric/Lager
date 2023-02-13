<?php
if (isset($_COOKIE['korisnickoIme'])) {
    unset($_COOKIE['korisnickoIme']); 
    setcookie('korisnickoIme', null, -1, '/'); 
    header("Location: ../login/login.php");
    return true;
} else {
    return false;
}

?>