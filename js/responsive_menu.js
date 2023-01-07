const burger = document.querySelector(".burger");
const menu = document.querySelector(".menu-links");
const body = document.querySelector("body");

burger.addEventListener("click", () => {
    menu.classList.toggle("active");
    burger.classList.toggle("active-burger");
    body.classList.toggle("js-mobile-menu-open");
});

menu.addEventListener("click", () => {
    menu.classList.remove("active");
    body.classList.remove("js-mobile-menu-open");
    burger.classList.remove("active-burger");
});
