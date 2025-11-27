@extends('layouts.template')

@section('content')

<div class="container py-5">

    <h1 class="mb-5">Servicio al Cliente</h1>

    <!-- Preguntas frecuentes -->
    <section id="faq" class="mb-5">
        <h2>Preguntas Frecuentes</h2>
        <p>
            1. ¿Puedo surtir una receta desde cualquier farmacia?
            Sí, TAS busca disponibilidad en todas las farmacias afiliadas y te muestra las opciones más cercanas.

            2. ¿Cuánto tarda en confirmarse mi pedido?
            Depende de la farmacia seleccionada; normalmente entre 5 y 15 minutos.

            3. ¿Puedo subir una foto de receta?
            Sí, aceptamos fotografías claras y legibles de la receta.

            4. ¿Tienen costo sus servicios?
            No, TAS es completamente gratuito para los usuarios.

            5. ¿Qué pasa si una farmacia no tiene stock?
            La plataforma te ofrecerá otras sucursales compatibles o alternativas cercanas.
        </p>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="mb-5">
        <h2>Contacto</h2>
        <p>
            Si necesitas ayuda, soporte o tienes alguna duda, puedes comunicarte con nosotros a través de:

            📩 Correo: soporte@tas.com

            📞 Teléfono: 800-123-4567
            💬 Chat en línea: Disponible dentro de la app
            📍 Horario: Lunes a sábado de 9 AM a 8 PM

            Nuestro equipo está listo para ayudarte.
        </p>
    </section>

    <!-- Retiro en sucursal -->
    <section id="retiro" class="mb-5">
        <h2>Retiro en Sucursal</h2>
        <p>
            Si eliges retirar tu compra directamente:

            Selecciona la farmacia más cercana

            Sube tu receta (si aplica)

            Espera la confirmación de disponibilidad

            Acude a la sucursal con tu identificación y número de folio

            Recoge tus medicamentos sin hacer filas innecesarias

            Este proceso permite ahorrar tiempo y asegurar que el medicamento esté listo al llegar.
        </p>
    </section>

</div>

@endsection
