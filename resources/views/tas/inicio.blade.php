@extends('layouts.template')

@section('title', 'Inicio')

@section('content')
    <div class="container py-5 vh-100 d-flex justify-content-center">
    <div class="container py-5">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8 text-center">
                <div class="mb-4">
                    <img src="/images/logo.png" alt="TAS Logo" class="img-fluid" style="max-height: 200px;">
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
                        <!--
                        <div class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2">
                            <span class="me-1">🤝</span>Alianza con atención humana
                        </div>
                         -->
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






    
@endsection

@push('styles')
    <style>
        .partner-carousel {
            background: #f8fafc;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .partner-carousel .logo-strip {
            position: relative;
        }

        .partner-carousel .logo-track {
            display: flex;
            gap: 1.5rem;
            animation: scroll-logos 26s linear infinite;
            width: max-content;
        }

        .partner-carousel .logo-card {
            min-width: 180px;
            background: #fff;
            border-radius: 14px;
            padding: 14px 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .partner-carousel .logo-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .partner-carousel .logo-wrapper {
            height: 80px;
        }

        .partner-carousel img {
            max-height: 70px;
        }

        .partner-carousel .fade-edge {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 80px;
            pointer-events: none;
            z-index: 2;
        }

        .partner-carousel .fade-edge.start {
            left: 0;
            background: linear-gradient(90deg, #f8fafc 0%, rgba(248, 250, 252, 0) 100%);
        }

        .partner-carousel .fade-edge.end {
            right: 0;
            background: linear-gradient(270deg, #f8fafc 0%, rgba(248, 250, 252, 0) 100%);
        }

        .partner-carousel .logo-strip:hover .logo-track {
            animation-play-state: paused;
        }

        @keyframes scroll-logos {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }
    </style>
@endpush