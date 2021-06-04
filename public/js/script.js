
const themeToggle = document.querySelector("#checkbtn");

const currentTheme = localStorage.getItem("theme");

if (currentTheme === "light") {
    themeToggle.checked = true;
    let body = document.querySelector("#body");
    body.classList.add("light");
    let cards = document.querySelectorAll('.card');
    for (var i = 0; i < cards.length; i++) {
        cards[i].classList.add('card-light');
    }
    let footer = document.querySelector("footer");
    footer.classList.add("footer-light");
}

themeToggle.addEventListener("change", function () {
    if (this.checked == true) {
        let body = document.querySelector("#body");
        body.classList.add("light");
        let cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.add('card-light');
        }
        let footer = document.querySelector("footer");
        footer.classList.add("footer-light");
        localStorage.setItem("theme", "light");
    } else {
        let body = document.querySelector("#body");
        body.classList.remove("light");
        let cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.remove('card-light');
        }
        let footer = document.querySelector("footer");
        footer.classList.remove("footer-light");
        localStorage.setItem("theme", "dark");
    }
})
