<head>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <link rel="stylesheet" href="../css/artikli-add-modal.css">
    <link rel="stylesheet" href="../css/logout-btn.css">
</head>

<body>

    <?php
    if (isset($_COOKIE['korisnickoIme'])) {
        require_once("../components/radnik-navbar.php");
        require_once("../components/tabela-artikli.php");
    } 
    else {
        header("Location: ../login/login.php");
    }
    ?>
    <script src="../js/artikli-add.js"></script>
</body>