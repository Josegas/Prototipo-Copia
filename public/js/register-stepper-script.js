document.addEventListener("DOMContentLoaded", function () {

    const paso1 = document.getElementById("formPaso1");
    const paso2 = document.getElementById("formPaso2");

    const btnContinuar = document.getElementById("btnContinuar");
    const btnVolver = document.getElementById("btnVolver");
    const btnOmitir = document.getElementById("btnOmitir");

    const contErrorsPaso1 = document.getElementById("erroresPaso1");
    const erroresPaso2 = document.getElementById("erroresPaso2");

    /* ============================================================
       SI HAY ERRORES DE LARAVEL → MOSTRAR PASO 2 AUTOMÁTICAMENTE
    ============================================================ */
    if (erroresPaso2) {
        paso1.style.display = "none";
        paso2.style.display = "flex";
        actualizarStepper(2);
    }

    /* ===================== CAMBIO DE PASOS ===================== */

    function cambiarPaso(actual, siguiente, dir) {
        actual.classList.remove("active");
        siguiente.classList.remove("active");

        actual.style.display = "none";
        siguiente.style.display = "flex";

        actualizarStepper(siguiente === paso2 ? 2 : 1);
    }

    function actualizarStepper(paso) {
        const items = document.querySelectorAll(".stepper-item");
        const lines = document.querySelectorAll(".stepper-line");

        items.forEach((item, idx) => {
            item.classList.remove("active", "completed");

            if (idx + 1 < paso) item.classList.add("completed");
            if (idx + 1 === paso) item.classList.add("active");
        });

        lines.forEach((line, idx) => {
            line.classList.remove("completed");
            if (idx < paso - 1) line.classList.add("completed");
        });
    }

    /* ===================== VALIDAR PASO 1 (AJAX) ===================== */

    btnContinuar.addEventListener("click", function () {

        contErrorsPaso1.style.display = "none";
        contErrorsPaso1.innerHTML = "";

        let formData = new FormData(paso1);

        fetch("/registro/validar-cliente", {
            method: "POST",
            headers: { "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value },
            body: formData
        })
        .then(res => res.json())
        .then(data => {

            if (data.ok) {
                document.getElementById("correoHidden").value = paso1.correo.value;
                document.getElementById("nombreHidden").value = paso1.nombre.value;
                document.getElementById("apellidoHidden").value = paso1.apellido.value;
                document.getElementById("nipHidden").value = paso1.nip.value;

                cambiarPaso(paso1, paso2);
            }
            else {
                contErrorsPaso1.innerHTML =
                    "<ul>" + data.errores.map(e => `<li>${e}</li>`).join("") + "</ul>";
                contErrorsPaso1.style.display = "block";
            }
        })
        .catch(() => {
            contErrorsPaso1.innerHTML = "<li>Error al procesar la solicitud</li>";
            contErrorsPaso1.style.display = "block";
        });
    });

    /* ===================== BOTÓN VOLVER ===================== */

    btnVolver.addEventListener("click", () => cambiarPaso(paso2, paso1));

    /* ===================== BOTÓN OMITIR ===================== */

    btnOmitir.addEventListener("click", function () {
        document.getElementById("omitir_pago").value = "1";
        paso2.submit();
    });

    /* ===================== FORMATO TARJETA ===================== */

    const inputTarjeta = document.getElementById("numero_tarjeta");
    const imgBrand = document.getElementById("cardBrand");

    function detectarMarca(num) {
        num = num.replace(/\s+/g, "");

        if (/^4/.test(num)) return "visa";
        if (/^5[1-5]/.test(num)) return "mastercard";
        if (/^3[47]/.test(num)) return "amex";
        return null;
    }

    if (inputTarjeta) {
        inputTarjeta.addEventListener("input", function (e) {

            let num = e.target.value.replace(/\s/g, "");
            let blocks = num.match(/.{1,4}/g);
            e.target.value = blocks ? blocks.join(" ") : num;

            const marca = detectarMarca(num);

            if (marca) {
                const rutas = {
                    visa: "/images/cards/visa.png",
                    mastercard: "/images/cards/mastercard.png",
                    amex: "/images/cards/amex.png"
                };

                imgBrand.src = rutas[marca];
                imgBrand.classList.remove("d-none");

                // tamaño fijo mediante JS
                imgBrand.style.width = "30px";
                imgBrand.style.height = "20px";
                imgBrand.style.objectFit = "contain";
            } else {
                imgBrand.classList.add("d-none");
                imgBrand.src = "";
            }
        });
    }

    /* ===================== FORMATO FECHA MM/AA ===================== */

    const fechaInput = document.getElementById("fecha_vencimiento");

    if (fechaInput) {
        fechaInput.addEventListener("input", function (e) {
            let val = e.target.value.replace(/\D/g, "");
            if (val.length >= 2) {
                val = val.slice(0, 2) + "/" + val.slice(2, 4);
            }
            e.target.value = val;
        });
    }

});
