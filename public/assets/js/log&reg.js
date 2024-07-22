// VARIABLES INSTANCIATION
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const left_panel = document.querySelector(".left-panel");
const right_panel = document.querySelector(".right-panel");

document.addEventListener('DOMContentLoaded',(e) => {
    try {
        let url = document.URL.split("mod=");
        if (url[1] == "register") {
            container.classList.add("sign-up-mode");
            right_panel.style.pointerEvents = "all";
            left_panel_panel.style.pointerEvents = "none";
        } else {
            container.classList.remove("sign-up-mode");
            left_panel.style.pointerEvents = "all";
            right_panel.style.pointerEvents = "none";
        }
    } catch (error) {

    }
});

sign_up_btn.addEventListener('click',(e) => {
    e.preventDefault();
    let url = document.URL;
    url = url.slice(0, url.search('login')+5);
    url = url.concat("?mod=register");
    window.history.replaceState(null, null, url);
    container.classList.add("sign-up-mode");
    right_panel.style.pointerEvents = "all";
    left_panel.style.pointerEvents = "none";
});

sign_in_btn.addEventListener('click',(e) => {
    e.preventDefault();
    let url = document.URL;
    url = url.slice(0, url.search('login')+5);
    url = url.concat("?mod=login");
    window.history.replaceState(null, null, url);
    container.classList.remove("sign-up-mode");
    left_panel.style.pointerEvents = "all";
    right_panel.style.pointerEvents = "none";
});
