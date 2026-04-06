const toggle = document.querySelector(".menu-toggle");
const menu = document.getElementById("menu");

toggle.addEventListener("click", () => {
    menu.classList.toggle("active");
});