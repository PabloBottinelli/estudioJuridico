document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.querySelector(".menu-toggle");
    const menu = document.getElementById("menu");
    const links = menu.querySelectorAll("a");

    toggle.addEventListener("click", () => {
        menu.classList.toggle("active");
    });

    links.forEach(link => {
        link.addEventListener("click", () => {
            menu.classList.remove("active");
        });
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth > 768) {
            menu.classList.remove("active");
        }
    });
});