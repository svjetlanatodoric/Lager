<?php
$idAdmin = htmlspecialchars($_POST['idAdmin'], ENT_QUOTES, 'UTF-8');
if (isset($idAdmin) && $idAdmin == 1) {
    header("Location: ../admin/artikli-a.php");

    $db->close();
    die();
} else {
    require_once("modal.php");
?>
    <script>
        alert("Unesite tačan identifikacioni broj!")
    </script>
<?php
}
?>