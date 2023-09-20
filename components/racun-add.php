 <head>
     <link rel="stylesheet" href="../css/racun.css">
 </head>

 <body>
     <div id="dodaj-stavku-section">
         <form id="dodaj-racun-forma" method="post">
             <div id="add-heading">
                 <h3>Dodaj stavku</h3>
             </div>
             <div id="artikli-racun-inputs">
                 <div>
                     <select name="artikalid" id="artikalid">
                         <option selected disabled value="0">ID artikla</option>
                         <?php
                            include_once("../constants.php");
                            $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
                            $query = "
                    SELECT
                    a.ArtikalId,
                    a.Naziv
                    FROM artikal as a
                    
                            ORDER BY
                            `ArtikalId`";
                            $response = $conn->query($query);

                            if (!empty($response) && $response->num_rows > 0) {
                                while ($artikal = $response->fetch_assoc()) {
                            ?>
                                 <option required value="<?php echo $artikal['ArtikalId'] ?>">
                                     <?php echo $artikal['ArtikalId'] . " - " . $artikal['Naziv'] ?>
                                 </option>
                         <?php
                                }
                            }
                            ?>
                     </select>
                 </div>
                 <div>
                     <input name="kolicina" type="number" pattern="[-+]?[0-9]*\.?[0-9]+" placeholder="Kolicina" required>
                 </div>
                 <div>
                     <input name="cijena" type="number" pattern="[-+]?[0-9]*\.?[0-9]+" placeholder="Cijena" required>
                 </div>
                 <input name="ukupno" type="hidden" value="">

                 <div class="dodaj-stavku">
                     <input type="submit" onclick="dodajStavku()" id="dodaj-stavku" name="dodajStavku" value="Dodaj stavku">
                 </div>
             </div>

         </form>


     </div>


     <!-- List of invoice articles -->
     <div id="lista-stavki">
         <?php
       //     session_start();

            if (isset($_POST['dodajStavku'])) {
                $stavke = isset($_SESSION['stavke']) ? $_SESSION['stavke'] : array();
                $stavka = array(
                    'artikalid' => $_POST['artikalid'],
                    'kolicina' => $_POST['kolicina'],
                    'cijena' => $_POST['cijena'],
                    'ukupno' => $_POST['cijena'] * $_POST['kolicina']
                );
                array_push($stavke, $stavka);
                $_SESSION['stavke'] = $stavke;
            }

            if (isset($_GET['delete'])) {
                $stavke = isset($_SESSION['stavke']) ? $_SESSION['stavke'] : array();
                $index = $_GET['delete'];
                if (isset($stavke[$index])) {
                    unset($stavke[$index]);
                    $_SESSION['stavke'] = $stavke;
                }
            }
            ?>
         <?php if (isset($_SESSION['stavke'])) : ?>
             <div id="add-stavka">

                 <form action="../components/create-invoice-request.php" method="POST">
                     <table>
                         <thead>
                             <tr>
                                 <th>ID artikla</th>
                                 <th>Količina</th>
                                 <th>Cijena</th>
                                 <th>Ukupno bez PDV-a</th>
                                 <th>Delete</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($_SESSION['stavke'] as $index => $stavka) : ?>
                                 <tr>
                                     <td><input type="hidden" name="artikalid" value="<?php echo $stavka['artikalid']; ?>"> <?php echo $stavka['artikalid']; ?> </td>
                                     <td> <input type="hidden" name="kolicina" value="<?php echo $stavka['kolicina']; ?>"> <?php echo $stavka['kolicina']; ?></td>
                                     <td> <input type="hidden" name="cijena" value="<?php echo $stavka['cijena']; ?>"> <?php echo $stavka['cijena']; ?></td>
                                     <td> <input type="hidden" name="ukupno" value="<?php echo ($stavka['cijena'] * $stavka['kolicina']); ?>"> <?php echo ($stavka['cijena'] * $stavka['kolicina']); ?></td>

                                     <!-- check if user is admin or user, so the URL can adapt -->
                                     <?php
                                        if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) {
                                        ?>
                                         <td><a id="del" href="racun-a.php?delete=<?php echo $index; ?>">Obriši stavku</a></td>
                                     <?php
                                        } else if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 2) {
                                        ?>
                                         <td><a id="del" href="racun-r.php?delete=<?php echo $index; ?>">Obriši stavku</a></td>
                                     <?php
                                        }
                                        ?>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>
                     <input type="submit" name="kreirajRacun" value="Kreiraj račun ">
                 </form>
                 <form action="../components/ponisti-stavke.php" method="POST">
                     <input type="submit" id="ponisti" name="ponisti" value="Poništi sve stavke">
                 </form>
             </div>

     </div>
 <?php endif; ?>
 <script src="../js/racun.js"></script>
 </body>