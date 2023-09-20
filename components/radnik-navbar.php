<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    
<div class="header"></div>
    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner diagonal part-1"></div>
        <div class="spinner horizontal"></div>
        <div class="spinner diagonal part-2"></div>
    </label>
    <div id="sidebarMenu">
        <ul class="sidebarMenuInner">
        <a href="../radnik/artikli-r.php"><li>Artikal</li></a>
            <a href="../radnik/lager-r.php"><li>Lager</li></a>
            <a href="../radnik/racun-r.php"><li>Račun</li></a>
            <a href="../radnik/radnici-r.php"><li>Radnik</li></a>
            <li>
                <form action="../logout/logout.php">
                    <button>odjavi se</button>
                </form>
            </li>
        </ul>
    </div>
  
</body>
</html>