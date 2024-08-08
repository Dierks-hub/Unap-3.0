const temaOscuro = () => {
    document.body.classList.replace("bg-light", "bg-dark");
    document.body.setAttribute("data-bs-theme", "dark");
    document.querySelector("#navbar").classList.replace("bg-body-secondary", "bg-dark");
    document.querySelector("#footer").classList.replace("bg-body-secondary", "bg-dark");
}

const temaClaro = () => {
    document.body.classList.replace("bg-dark", "bg-light");
    document.body.setAttribute("data-bs-theme", "light");
    document.querySelector("#navbar").classList.replace("bg-dark", "bg-body-secondary");
    document.querySelector("#footer").classList.replace("bg-dark", "bg-body-secondary");

    const icono = document.querySelector("#dl-icon");
    icono.classList.remove("bi-sun");gi 
    icono.classList.add("bi-moon");
}

const cambiarTema = () => {
    document.body.getAttribute("data-bs-theme") === "light" ? temaOscuro() : temaClaro();
}