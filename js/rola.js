
var rola = document.querySelector("#rola-select").value;
console.log(rola)
var submit = document.getElementById("register-submit");
var modal = document.getElementById("adminModal");
var registerForm = document.getElementById("register-form");
var span = document.getElementById("closeModal");

submit.addEventListener("click", function () {
  modal.style.display = "block";
  registerForm.style.display = "none";
});
function modalExit() {
  window.location=("register.php")
}


window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

