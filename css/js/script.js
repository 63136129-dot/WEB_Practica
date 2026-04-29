// Esperar a que el HTML cargue
document.addEventListener("DOMContentLoaded", function() {
    const btn = document.getElementById("btnTop");

    // Función que se ejecuta cada vez que mueves el scroll
    window.onscroll = function() {
        // Si el usuario baja más de 400 pixeles de la parte superior
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            btn.style.display = "block"; // Aquí aparece
        } else {
            btn.style.display = "none";  // Aquí desaparece
        }
    };

    // Función para el clic
    btn.onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };
});