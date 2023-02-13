<head>
   <link rel="stylesheet" href="../css/admin-modal.css">
</head>

<body>

    <div id="adminModal" class="modal" style="display:block !important">

            <!-- Sadržaj modala -->
            <div class="entire-modal-content">
                <span onclick = "modalExit()" id="closeModal">&times;</span>
                <div class="modal-content">
                    <form id="admin-verify-form" action="admin-verify.php" method="post">
                        <h3>Admin?</h3>
                        <div>
                           <p>Da biste potvrdili registraciju kao administrator, molimo unesite identifikacioni broj administratora:</p>
                                <input type="text" id="idAdmin" name="idAdmin" required><br>
                        </div>
                        <input type="submit" name="submit-in-modal" value="Potvrdi">
                      
              
                </div>
                </form>
            </div>

        </div>
       <script src="../js/rola.js"></script>
</body>
