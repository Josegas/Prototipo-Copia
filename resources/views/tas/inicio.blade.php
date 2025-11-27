
@extends('layouts.template')
@section('title', 'Inicio')

@section('content')
{{-- CONTENIDO DENTRO DEL CONTAINER --}}
<div class="container py-5" style="min-height: calc(100vh - 400px);">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8 text-center">
                <div class="mb-4">
                    <img src="/images/logo.png" alt="TAS Logo" class="img-fluid" style="max-height: 200px; margin-top: 20px;">
                </div>
                <h1 class="display-4 fw-bold mb-3" style="color: #003865;">
                    Todos tus medicamentos, en un solo lugar
                </h1>
                <p class="lead text-muted mb-4 fs-4">
                    Te Acerco Salud (TAS) es una plataforma tecnológica completa que une a pacientes con farmacias de forma
                    eficiente, asegurando que sus recetas médicas estén siempre disponibles. Usando nuestra aplicación en
                    línea y móvil, los usuarios pueden elegir las sucursales, enviar sus recetas y obtener sus medicamentos
                    sin complicaciones, ahorrando tiempo y dinero y garantizando un acceso rápido a los tratamientos. TAS
                    facilita la comunicación entre farmacias y ofrece una experiencia de salud más sencilla, confiable y
                    accesible para todos los pacientes.
                </p>
            </div>
        </div>

        @php
            $partnerLogos = [
                ['name' => 'Farmacias del Ahorro', 'file' => 'aho.png'],
                ['name' => 'Farmacias Guadalajara', 'file' => 'gdl.png'],
                ['name' => 'Farmacias Benavides', 'file' => 'bnv.png'],
                ['name' => 'Farmacias Similares', 'file' => 'sim.png'],
                ['name' => 'Farmacias Farmacon', 'file' => 'far.png'],
            ];
        @endphp

        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="partner-carousel position-relative p-4 p-md-5">
                    <div class="d-flex flex-column align-items-center gap-3 mb-4 text-center">
                        <div>
                            <p class="text-uppercase text-muted fw-semibold mb-1 small">Farmacias colaboradoras</p>
                            <h2 class="h3 fw-bold mb-0" style="color: #003865;">Las marcas que confían en TAS</h2>
                        </div>
                    </div>

                    <div class="logo-strip position-relative overflow-hidden">
                        <div class="fade-edge start"></div>
                        <div class="fade-edge end"></div>
                        <div class="logo-track d-flex align-items-center">
                            @foreach (range(1, 2) as $loopIndex)
                                @foreach ($partnerLogos as $logo)
                                    <div class="logo-card text-center">
                                        <div class="logo-wrapper d-flex align-items-center justify-content-center mb-2">
                                            <img src="{{ asset('images/farmacias/' . $logo['file']) }}" alt="Logo de {{ $logo['name'] }}"
                                                class="img-fluid" loading="lazy">
                                        </div>
                                        <p class="mb-0 fw-semibold text-muted">{{ $logo['name'] }}</p>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-white pt-5 pb-4" style="background-color:#002a45; width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4 text-center text-md-start">
                <img src="{{ asset('images/logo.png') }}" alt="TAS Logo" class="img-fluid mb-2" style="max-height: 60px;">
                <h5 class="fw-bold" style="color: #00a1e0;">TAS - Te Acerco Salud</h5>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Acerca de nosotros</h6>
                <ul class="list-unstyled">
                    <li><a href="{{route('acerca')}}#quienes"class="text-white text-decoration-none">Quiénes somos</a></li>
                    <li><a href="{{route('acerca')}}#privacidad"class="text-white text-decoration-none">Aviso de privacidad</a></li>
                    <li><a href="{{route('acerca')}}#terminos" class="text-white text-decoration-none">Términos y condiciones</a></li>
                    <li><a href="{{route('acerca')}}#blog" class="text-white text-decoration-none">Blog</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Servicio al cliente</h6>
                <ul class="list-unstyled">
                    <li><a href="{{route('servicio')}}#faq" class="text-white text-decoration-none">Preguntas frecuentes</a></li>
                    <li><a href="{{route('servicio')}}#contacto" class="text-white text-decoration-none">Contacto</a></li>
                    <li><a href="{{route('servicio')}}#retiro" class="text-white text-decoration-none">Retiro en sucursal</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4 text-center text-md-start">
                <h6 class="fw-bold">Síguenos</h6>
                <div class="d-flex gap-2 mb-3 justify-content-center justify-content-md-start">
                    <a href="#" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white fs-5"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="text-white fs-5"><i class="fab fa-youtube"></i></a>
                </div>
                <h6 class="fw-bold">Métodos de pago</h6>
                @php
                    $paymentCards = [
                        ['name' =>'Visa', 'file' => 'visa.png'],
                        ['name' =>'MasterCard', 'file' => 'mastercard.png'],
                        ['name' =>'Amex', 'file' => 'amex.png'],
                    ];
                @endphp
                <div class="d-flex align-items-center gap-3 mt-2 justify-content-center justify-content-md-start">
                        @foreach ($paymentCards as $card)
                            <img src="{{ asset('images/cards/' . $card['file']) }}"
                                alt="{{ $card['name'] }}"
                                class="payment-logo">
                        @endforeach 
                </div>
        </div>

        <hr class="border-light">

        <div class="text-center small">
            &copy; {{ date('Y') }} TAS - Te Acerco Salud. Todos los derechos reservados.
        </div>
    </div>
    <a href="#" id="btnScrollTop" class="btn position-fixed"
   style="bottom: 20px; right: 20px; border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; z-index: 1000;">
    <i class="fas fa-arrow-up"></i>
    </a>

</footer>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/carrusel.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endpush

