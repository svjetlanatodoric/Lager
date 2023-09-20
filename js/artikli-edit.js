var editModal = document.getElementById("edit-modal");

function izmijeniArtikal(button) {
  var row = button.parentNode.parentNode;


  // get the Sifra, Naziv, JedinicaMjere, Barkod, and PLU_KOD values from the current row
  var sifra = row.querySelector('.sifra').textContent.trim();
   var naziv = row.querySelector('.naziv').textContent.trim();
   var jedinicaMjere = row.querySelector('.jedinicaMjere').textContent.trim();
   var barkod = row.querySelector('.barkod').textContent.trim();
   var pluKod = row.querySelector('.pluKod').textContent.trim();


  console.log(sifra)
  // populate the form fields with the values
  document.getElementById('sifra').value = sifra;
  document.getElementById('naziv').value = naziv;
  document.getElementById('jedinicaMjere').value = jedinicaMjere;
  document.getElementById('barkod').value = barkod;
  document.getElementById('pluKod').value = pluKod;
  editModal.classList.add('show');
  editModal.style.display = "block";

  // console.log(naziv)
}

function zatvoriEditModal() {
  editModal.style.display = "none";

}

window.onclick = function (event) {
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
}
