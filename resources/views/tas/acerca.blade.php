@extends('layouts.template')

@section('content')

<div class="container py-5">

    <h1 class="mb-5">Acerca de Nosotros</h1>

    <!-- Quiénes somos -->
    <section id="quienes" class="mb-5">
        <h2>Quiénes somos</h2>
        <p>Te Acerco Salud (TAS) es una plataforma tecnológica diseñada para facilitar el acceso a medicamentos en la ciudad de Culiacán Sinaloa México. Nuestro objetivo es conectar a los pacientes con múltiples farmacias de forma rápida, práctica y confiable, asegurando que sus tratamientos estén disponibles cuando más los necesitan.
            Creemos en un sistema de salud más accesible y eficiente, donde la tecnología sea la herramienta principal para mejorar la experiencia del paciente.
            Nos enfocamos en ofrecer una solución integral que permita consultar disponibilidad, comparar sucursales, enviar recetas y obtener medicamentos sin complicaciones.
        </p>
    </section>

    <!-- Aviso de privacidad -->
    <section id="privacidad" class="mb-5">
        <h2>Aviso de Privacidad</h2>
        <p>
            En TAS - Te Acerco Salud, la protección de tus datos personales es una prioridad.
            Recopilamos únicamente la información necesaria para brindarte un servicio seguro y confiable, cumpliendo con las leyes de protección de datos aplicables en México.

            Tus datos podrán ser utilizados para:

            Verificar recetas médicas

            Gestionar pedidos y envíos

            Comunicar estatus de compra

            Mejorar la experiencia del usuario

            Fines estadísticos internos

            Nunca vendemos ni compartimos tu información con terceros no autorizados.
            Puedes solicitar acceso, modificación o eliminación de tus datos en cualquier momento.
        </p>
    </section>

    <!-- Términos y condiciones -->
    <section id="terminos" class="mb-5">
        <h2>Términos y Condiciones</h2>
        <p>
            Al utilizar TAS, aceptas nuestros lineamientos de uso:

            La información médica proporcionada debe ser verídica.

            El usuario es responsable del correcto uso de la plataforma.

            TAS funge como intermediario entre pacientes y farmacias; no sustituimos a un profesional de salud.

            Los tiempos de surtido y disponibilidad pueden variar según la sucursal.

            Nos reservamos el derecho de actualizar funciones, precios o políticas sin previo aviso.

            El uso de la plataforma implica la aceptación de estos términos.
        </p>
    </section>

    <!-- Blog -->
    <section id="blog" class="mb-5">
        <h2>Blog</h2>
        <p>
            En nuestro blog encontrarás artículos sobre:

            Consejos de salud y bienestar

            Hábitos para mejorar tu tratamiento

            Información sobre medicamentos

            Noticias del sector farmacéutico

            Actualizaciones de TAS

            Nuestro propósito es informarte con contenido claro, confiable y fácil de entender.
        </p>
    </section>

</div>

@endsection
