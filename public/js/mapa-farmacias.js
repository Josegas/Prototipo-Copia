document.addEventListener("DOMContentLoaded", async () => {
    const map = L.map("map").setView([24.8091, -107.394], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);

    let sucursales = [];
    let markers = [];
    const filtro = document.getElementById("filtro_cadena");

    try {
        const res = await fetch("/sucursales");
        sucursales = await res.json();

        if (!Array.isArray(sucursales)) throw new Error("Respuesta no válida");

        llenarFiltros(sucursales);
        mostrarSucursales(sucursales);
    } catch (err) {
        console.error("Error cargando sucursales:", err);
    }

    function llenarFiltros(data) {
        const cadenas = [
            ...new Set(
                data.filter((s) => s.cadena).map((s) => s.cadena.nombre)
            ),
        ];

        cadenas.forEach((c) => {
            const op = document.createElement("option");
            op.value = c;
            op.textContent = c;
            filtro.appendChild(op);
        });
    }

    filtro.addEventListener("change", () => {
        const cadena = filtro.value;

        if (cadena === "") {
            mostrarSucursales(sucursales);
        } else {
            const filtradas = sucursales.filter(
                (s) => s.cadena?.nombre === cadena
            );
            mostrarSucursales(filtradas);
        }
    });

    function mostrarSucursales(lista) {
        markers.forEach((m) => map.removeLayer(m));
        markers = [];

        lista.forEach((f) => {
            const marker = L.marker([f.latitud, f.longitud]).addTo(map);
            markers.push(marker);

            marker.bindPopup(`
                <div style="text-align:center;">
                    <strong>${f.nombre}</strong><br>
                    <small>${f.cadena?.nombre ?? "Sin cadena"}</small><br>
                    <button class='btn btn-sm btn-tas-outline mt-2'
                        onclick="seleccionarFarmacia('${f.cadena?.nombre}', '${f.nombre}')">
                        <i class="fas fa-check-circle me-1"></i>Seleccionar
                    </button>
                </div>
            `);
        });
    }
});

function seleccionarFarmacia(cadena, nombre) {
    const nombreCompleto = `${cadena} — Sucursal ${nombre}`;
    
    Swal.fire({
        title: "¿Confirmar selección?",
        html: `Has elegido:<br><strong>${nombreCompleto}</strong>`,
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Sí, continuar",
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#005B96",
        cancelButtonColor: "#6c757d",
    }).then((result) => {
        if (result.isConfirmed) {
            // Guardar en localStorage
            localStorage.setItem("farmaciaCadena", cadena);
            localStorage.setItem("farmaciaSucursal", nombre);

            // Mostrar en la página si el elemento existe
            const elementoFarmacia = document.getElementById('farmacia-seleccionada');
            if (elementoFarmacia) {
                elementoFarmacia.textContent = nombreCompleto;
            }

            // Cambiar secciones si existen
            const mapSection = document.getElementById('map-section');
            const formSection = document.getElementById('form-section');
            
            if (mapSection && formSection) {
                mapSection.classList.add('d-none');
                formSection.classList.remove('d-none');

                // Actualizar stepper si existe
                const stepperContainer = document.querySelector('.stepper-container');
                if (stepperContainer) {
                    stepperContainer.innerHTML = `
                        <div class='stepper-wrapper'>
                            <div class='stepper-item completed'>
                                <div class='step-counter'>1</div>
                                <div class='step-name'>Seleccionar<br>Sucursal</div>
                            </div>
                            <div class='stepper-line completed'></div>
                            <div class='stepper-item active'>
                                <div class='step-counter'>2</div>
                                <div class='step-name'>Subir<br>Receta</div>
                            </div>
                            <div class='stepper-line'></div>
                            <div class='stepper-item'>
                                <div class='step-counter'>3</div>
                                <div class='step-name'>Confirmar<br>Pedido</div>
                            </div>
                        </div>
                    `;
                }
            } else {
                // Si no hay secciones, redirigir
                Swal.fire({
                    title: "¡Farmacia seleccionada!",
                    html: `
                        <i class="fas fa-check-circle text-success fa-3x mb-3"></i><br>
                        Redirigiendo al siguiente paso...
                    `,
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false,
                }).then(() => {
                    window.location.href = "/subir_receta";
                });
            }
        }
    });
}

function toggleTextarea() {
    const container = document.getElementById('textarea-container');
    if (container) {
        container.classList.toggle('d-none');
    }
}