var loginForm = document.getElementById("login-form");
var recoveryForm = document.getElementById("recovery-form");

var modal = document.getElementById("modal");
var btn = document.getElementById("modal-button");
var span = document.getElementById("close");

function modalExit(){
  window.location=("login.php")
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function hideLogin() {
  window.location=("password-recovery.php")
}
