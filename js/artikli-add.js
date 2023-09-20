var modal = document.getElementById("dodaj-artikal-modal");
var menu = document.getElementById("sidebarMenu");
var checkbox = document.getElementById("openSidebarMenu")
var artikliSection = document.getElementById("artikli");

// if the current filename is not "artikli-a.php", we're redirecting the user to the new URL; if it is, we're displaying the modal

function dodajArtikal() {
  var filename = (location.href).split("/")[6];
  if (filename != "artikli-a.php") {
    window.location.pathname = "/projects/Lager/admin/artikli-a.php";
    setTimeout(function () {
      modal.classList.add('show');
      modal.style.display = "block";
    }, 100)

  } else {
    modal.classList.add('show');
    modal.style.display = "block";

  }
}

//close the modal

function zatvoriModal() {
  modal.style.display = "none";
}
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}