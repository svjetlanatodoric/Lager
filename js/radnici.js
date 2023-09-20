var span = document.getElementsByClassName("close")[0];
var modal = document.getElementById('dodaj-radnika-modal');

//--------------MODAL FOR ADDING NEW EMPLOYEES-----------------

function dodajRadnika() {
  var filename = (location.href).split("/")[6];
  if (filename != "radnici-a.php") {
    window.location.pathname = "/projects/Lager/admin/radnici-a.php";
    setTimeout(function () {
      modal.classList.add('show');
      modal.style.display = "block";
    }, 100)

  } else {
    modal.classList.add('show');
    modal.style.display = "block";

  }
}
function zatvoriModal() {
  modal.style.display = "none";
}

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


//--------------MODAL FOR EDITING DATA ABOUT EMPLOYEES-----------------

var editModal = document.getElementById("edit-radnika-modal");
function izmijeniRadnika(button) {
  editModal.classList.add('show');
  editModal.style.display = "block";

  var row = button.parentNode.parentNode;

  // get the imeRadnika, prezimeRadnika, brTel, adresa, grad, emailRadnika and jmbg values from the current row
  var radnikId = row.querySelector('.radnikId').textContent.trim();
  var imeRadnika = row.querySelector('.imeRadnika').textContent.trim();
  var prezimeRadnika = row.querySelector('.prezimeRadnika').textContent.trim();
  var brTel = row.querySelector('.brTel').textContent.trim();
  var adresa = row.querySelector('.adresa').textContent.trim();
  var grad = row.querySelector('.grad').textContent.trim();
  var emailRadnika = row.querySelector('.emailRadnika').textContent.trim();
  var jmbg = row.querySelector('.jmbg').textContent.trim();


  // populate the form fields with the values
  document.getElementById('radnikId').value = radnikId;
  document.getElementById('imeRadnika').value = imeRadnika;
  document.getElementById('prezimeRadnika').value = prezimeRadnika;
  document.getElementById('brTel').value = brTel;
  document.getElementById('adresa').value = adresa;
  document.getElementById('grad').value = grad;
  document.getElementById('emailRadnika').value = emailRadnika;
  document.getElementById('jmbg').value = jmbg;
}

function zatvoriEditModal() {
  editModal.style.display = "none";

}

window.onclick = function (event) {
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
}
