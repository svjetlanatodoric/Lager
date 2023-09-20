var addLagerModal = document.getElementById("dodaj-lager-modal");
function dodajLager() {
  var filename = (location.href).split("/")[6];
  if (filename != "lager-a.php") {
    window.location.pathname = "/projects/Lager/admin/lager-a.php";
    setTimeout(function () {
      addLagerModal.classList.add('show');
      addLagerModal.style.display = "block";
    }, 100)

  } else {
    addLagerModal.classList.add('show');
    addLagerModal.style.display = "block";
  }
}

function zatvoriLagerModal() {
  addLagerModal.style.display = "none";

}
window.onclick = function (event) {
  if (event.target == addLagerModal) {
    addLagerModal.style.display = "none";
  }
}