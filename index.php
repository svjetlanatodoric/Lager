<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Prodavnica</title>
<link rel="stylesheet" href="css/landing-page.css">
</head>

<body>
     <div class="body-container">
          <div class="login">
               <h1>Već imate nalog?</h1>
               <span onclick="hideRecovery()"> <a href="login/login.php"><input type="button" value="Prijavite se!"></a> </span>
          </div>

<div></div>

          <div class="register">
               <h1>Novi ste korisnik?</h1>
               <form action="register/register.php" method="POST">
                    <input type="submit" value="Registrujte se!">
               </form>
          </div>

     </div>
</body>

</html>