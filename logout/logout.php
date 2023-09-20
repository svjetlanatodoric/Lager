<?php
if (isset($_COOKIE['korisnickoIme'])&&isset($_COOKIE['rola'])) {  
    unset($_COOKIE['korisnickoIme']); 
    unset($_COOKIE['rola']); 
    setcookie('korisnickoIme', null, -1, '/'); 
    setcookie('rola', null, -1, '/'); 
    header("Location: ../login/login.php");
    return true;
} 
else {
    header("Location: ../login/login.php");

    return false;
}
?>