var editLager = document.getElementById("edit-lager");

function izmijeniLager(button) {
  var row = button.parentNode.parentNode;


  // get the raspolozivaKolicina and  lokacija values from the current row
  // var lagerId = row.querySelector('.lagerId').textContent.trim();
  //  var nazivArtikla = row.querySelector('.nazivArtikla').textContent.trim();
  var raspolozivaKolicina = row.querySelector('.raspolozivaKolicina').textContent.trim();
  var lokacija = row.querySelector('.lokacija').textContent.trim();


  // populate the form fields with the values
  // document.getElementById('lagerId').value = lagerId;
  // document.getElementById('nazivArtikla').value = nazivArtikla;
  document.getElementById('raspolozivaKolicina').value = raspolozivaKolicina;
  document.getElementById('lokacija').value = lokacija;

  editLager.classList.add('show');
  editLager.style.display = "block";

}

window.onclick = function (event) {
  if (event.target == editLager) {
    editLager.style.display = "none";
  }
}

function zatvoriLagerEdit() {
  editLager.style.display = "none";

}
