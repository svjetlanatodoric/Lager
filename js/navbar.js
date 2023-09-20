const dropdown = document.querySelectorAll('.dropdown');
const dropdownContent = document.querySelectorAll('.dropdown-content');
const arrow = document.querySelectorAll('.arrow');

dropdown.forEach((menu, index) => {
    menu.addEventListener('click', () => {
        dropdownContent[index].classList.toggle('show');
        arrow[index].classList.toggle('active');
        console.log(menu)
    });
});

