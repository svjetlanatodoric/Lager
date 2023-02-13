   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="../css/login-form.css">
       <link rel="stylesheet" href="../css/modal.css">
   </head>

   <body>
       <!-- Modal -->
       <div id="modal" class="modal" style="display: block;">

           <!-- Sadržaj modala -->
           <div class="entire-modal-content">
               <span id="close" onclick="modalExit()">&times;</span>
               <div class="modal-content">
                   <form id="recovery-form" action="password-recovery-request.php" method="post">
                       <h3>Promijenite lozinku</h3>
                       <div>
                           <labe>Unesite korisnicko ime:</label> <br>
                               <input type="text" id="korisnickoIme" name="korisnickoIme" required><br>
                       </div>
                       <div>
                           <label>Unesite novu lozinku: </label> <br>
                           <input type="password" id="newPassword" name="newPassword" required><br>
                       </div>
                       <div>
                           <label>Ponovo unesite lozinku: </label> <br>
                           <input type="password" id="confirmPassword" name="passwordConfirm" required> <br>
                       </div>
                       <?php
                       if (isset($korisnickoIme)) {
                        $korisnickoIme = htmlspecialchars($_POST['korisnickoIme'], ENT_QUOTES, 'UTF-8');

                            $newPassword = htmlspecialchars($_POST['newPassword'], ENT_QUOTES, 'UTF-8');
                            $passwordConfirm = htmlspecialchars($_POST['passwordConfirm'], ENT_QUOTES, 'UTF-8');
                            if ($passwordConfirm != $newPassword) {
                                require_once("equal-passwords.php");
                            }
                        }



                        ?>
                       <input type="submit" value ="potvrdi">
               </div>
               </form>
           </div>

       </div>
       <script src="../js/modal.js"></script>

   </body>