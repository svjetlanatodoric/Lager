// var forma = document.getElementById("dodaj-stavku-section");
var lista = document.getElementById("lista-stavki")
// var delItem=document.getElementById("del");
// var ponisti = document.getElementById("ponisti");
function dodajStavku() {
   lista.style.display = "block";
}

// add click event listener to each row
var rows = document.querySelectorAll(".invoice-row");
for (var i = 0; i < rows.length; i++) {
   rows[i].addEventListener("click", function () {
      var row = this;
      var racunId = row.querySelector("#racunId").value;

     // check if the row has already been expanded
    if (row.classList.contains("expanded")) {
      // if the row has already been expanded, remove the expanded class and hide the additional rows
      row.classList.remove("expanded");
      var nextRow = row.nextElementSibling;
      while (nextRow.classList.contains("additional-row")) {
        row.parentNode.removeChild(nextRow);
        nextRow = row.nextElementSibling;
      }
    } else {
      // make AJAX request to get additional data
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
         if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText)
            var data = JSON.parse(xhr.responseText);

            // loop through the data and create new rows to display additional data
            for (var i = 0; i < data.length; i++) {

               // create new rows to display additional data
               var newRow = document.createElement("tr");
               newRow.classList.add("additional-row");
               var newCell1 = document.createElement("td");
               var newCell2 = document.createElement("td");
               var newCell3 = document.createElement("td");
               var newCell4 = document.createElement("td");
               newCell1.textContent = data[i].artikalId;
               newCell2.textContent = data[i].naziv;
               newCell3.textContent = data[i].kolicina;
               newCell4.textContent = data[i].cijena;
               newRow.appendChild(newCell1);
               newRow.appendChild(newCell2);
               newRow.appendChild(newCell3);
               newRow.appendChild(newCell4);
               // insert new rows after clicked row
               row.insertAdjacentElement("afterend", newRow);
            }
            // add the expanded class to the row
            row.classList.add("expanded");
         }
      };
   }
      xhr.open("GET", "../components/details.php?racunId=" + racunId, true);
      xhr.send();
   });
}


// console.log(delItem)
// delItem.addEventListener("click", function(){
//     forma.style.display = "block";
//     tabela.style.display = "block";

// }
// )
// if(window.location.pathname==('/projects/Lager/components/racun-dodaj-stavku.php') || window.location.pathname==('components/racun-dodaj-stavku.php/delete') ){
//     forma.style.display = "block";
//     tabela.style.display = "block";

// }
// console.log(window.location.pathname )

// function deleteStavka(id) {
//     if (window.confirm("Are you sure you want to delete this stavka?")) {
//         // Send an AJAX request to delete the stavka with the specified ID
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "racun-obrisi-stavku.php", true);
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.send("stavkaId=" + id);

//         // Remove the deleted stavka from the HTML table
//         let stavkaRow = document.getElementById("stavka-" + id);
//         stavkaRow.parentNode.removeChild(stavkaRow);
//     }
// }

// ponisti.addEventListener("click", function(){
//     fetch("racun-clear-session.php");
//     document.querySelector("tbody").innerHTML = "";
// }
// )
