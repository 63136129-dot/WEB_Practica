document.addEventListener("DOMContentLoaded", function() {
        const btnTop = document.getElementById("btnTop");
        const btnDark = document.getElementById("btnDark");
        const body = document.body;

        // BOTÓN MODO OSCURO
        if (btnDark) {
            btnDark.onclick = function() {
                body.classList.toggle("dark-theme");
                
                // Cambia el icono para saber que hizo algo
                if (body.classList.contains("dark-theme")) {
                    btnDark.textContent = "☀️";
                } else {
                    btnDark.textContent = "🌙";
                }
            };
        }

        // BOTÓN IR ARRIBA
        window.onscroll = function() {
            if (window.scrollY > 300) {
                btnTop.style.display = "block";
            } else {
                btnTop.style.display = "none";
            }
        };

        btnTop.onclick = function() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        };
    })

    const btnDark = document.getElementById("btnDark");

    btnDark.onclick = function() {
    // Esto le pone o le quita la clase "dark-theme" al cuerpo de la web
    document.body.classList.toggle("dark-theme");

    // Cambiamos el icono del botón
    if (document.body.classList.contains("dark-theme")) {
        btnDark.textContent = "☀️";
    } else {
        btnDark.textContent = "🌙";
    }
};

function revelarEfecto() {
    const elementos = document.querySelectorAll(".revelar");

    elementos.forEach(elemento => {
        const alturaPantalla = window.innerHeight / 1.2; // Ajusta cuándo aparece
        const distanciaTop = elemento.getBoundingClientRect().top;

        if (distanciaTop < alturaPantalla) {
            elemento.classList.add("activo");
        }
    });
}

// Escuchamos el scroll para activar la función
window.addEventListener("scroll", revelarEfecto);

// La llamamos una vez al cargar por si ya hay elementos visibles
revelarEfecto();