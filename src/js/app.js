document.addEventListener("DOMContentLoaded", function () {
    eventListeners();

    toggleDarkMode();
});

function eventListeners() {
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navegacionResponsiva);

    // Muestro campos condicionales
    const metodoContacto = document.querySelectorAll(
        "input[name='contacto[contacto]']"
    );

    metodoContacto.forEach((input) =>
        input.addEventListener("click", mostrarMetodosContacto)
    );
}

function navegacionResponsiva() {
    const navegacion = document.querySelector(".navegacion");

    navegacion.classList.toggle("mostrar");
}

function toggleDarkMode() {
    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    if (prefiereDarkMode.matches) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }

    prefiereDarkMode.addEventListener("change", function () {
        if (prefiereDarkMode.matches) {
            document.body.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
        }
    });

    const darkModeBoton = document.querySelector(".dark-mode-boton");

    darkModeBoton.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
    });
}

function mostrarMetodosContacto(event) {
    const divContacto = document.querySelector("#metodo-contacto");

    if (event.target.value === "telefono") {
        divContacto.innerHTML = `
			<label for="telefono">Teléfono</label>
                        <input data-cy="input-telefono" type="tel" id="telefono" placeholder="Tu Teléfono" name="contacto[telefono]" />

			<label for="fecha">Fecha:</label>
			<input  data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]" />

			<label for="hora">Hora:</label>
			<input data-cy="input-hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" />
        `;
    } else if (event.target.value === "email") {
        divContacto.innerHTML = `
			<label for="email">E-mail</label>
			<input data-cy="input-email" type="email" id="email" placeholder="Tu Email" name="contacto[email]" required />
        `;
    }
}
