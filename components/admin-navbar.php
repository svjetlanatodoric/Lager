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

            <!-- Artikli dropdown -->

            <div class="dropdown">
                <div class="arrow"></div>
                <li>Artikli</li>
                <?php
                include_once("../constants.php");
                $connection = mysqli_connect(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
                $sql = "SELECT RolaId FROM `korisnik`";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $dbrola = $row['RolaId'];
                    if ($dbrola == 1) {
                ?>
                        <div class="dropdown-content">

                            <a href="../admin/artikli-a.php">
                                <li>Lista artikala</li>
                            </a>

                            <li onclick="dodajArtikal()">Dodaj novi artikal</li>

                        </div>
                <?php  }
                } ?>
            </div>

            <!-- Lager dropdown -->

            <div class="dropdown">
                <div class="arrow"></div>
                <li>Lager</li>
                <?php
                if ($dbrola == 1) {
                ?>
                    <div class="dropdown-content">

                        <a href="../admin/lager-a.php">
                            <li>Pregled stanja</li>
                        </a>
                        <li onclick="dodajLager()">Dodaj novi lager</li>


                    </div>
                <?php
                } ?>
            </div>
            <!-- Račun -->
            <a href="../admin/racun-a.php">
                <li>Račun</li>
            </a>

            <!-- Radnik dropdown -->
            <div class="dropdown">
                <div class="arrow"></div>
                <li>Radnik</li>
                <?php
                if ($dbrola == 1) {
                ?>
                    <div class="dropdown-content">

                        <a href="../admin/radnici-a.php">
                            <li>Pregled radnika</li>
                        </a>
                        <li onclick="dodajRadnika()">Dodaj radnika</li>


                    </div>
                <?php
                } ?>
            </div>
            <!-- <a href="../admin/radnici-a.php">
                    </a> -->
            <li>
                <form action="../logout/logout.php">
                    <button class="logout">Odjavi se</button>
                </form>
            </li>
        </ul>
    </div>

</body>
<script src="../js/artikli-add.js"></script>
<script src="../js/lager-add.js"></script>
<script src="../js/radnici.js"></script>
<script src="../js/navbar.js"></script>


</html>