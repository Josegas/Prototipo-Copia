@extends('layouts.template')

@section('title', request()->routeIs('tas_registroView') ? 'Registro' : 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register-stepper-styles.css') }}">
@endpush

@section('body-class', 'login-page')

@section('content')

<div class="login-container {{ request()->routeIs('tas_registroView') ? 'active' : '' }}" id="container">

    {{-- ======================= FORMULARIO DE REGISTRO ======================= --}}
    <div class="form-container sign-up">

        {{-- ======================= PASO 1 ======================= --}}
        <form id="formPaso1">
            @csrf

            <x-register_stepper :currentStep="1" />

            <div id="erroresPaso1" class="alert alert-danger" style="display:none;"></div>

            <h1>Crear Cuenta</h1>

            <input type="text" name="correo" placeholder="Correo electrónico" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="password" name="nip" placeholder="Contraseña" required>

            <button type="button" id="btnContinuar">Continuar</button>
        </form>

        {{-- ======================= PASO 2 ======================= --}}
        <form id="formPaso2" method="POST" action="{{ route('tas_crearCuenta') }}"
              style="display: none;">
            @csrf

            <x-register_stepper :currentStep="2" />

            {{-- Mostrar errores del Paso 2 --}}
            @if ($errors->any())
                <div class="alert alert-danger" id="erroresPaso2">
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1>Método de Pago</h1>
            <p class="step-description">Agrega una tarjeta para agilizar tus compras (opcional)</p>

            <div class="card-number-wrapper">
                <img id="cardBrand" class="card-brand-logo d-none">
                <input type="text" name="numero_tarjeta" id="numero_tarjeta"
                       placeholder="Número de tarjeta" maxlength="19">
            </div>

            <input type="text" name="nombre_tarjeta" placeholder="Nombre en la tarjeta">

            <div class="input-group">
                <input type="text" name="fecha_vencimiento" id="fecha_vencimiento"
                       placeholder="MM/AA" maxlength="5">
                <input type="text" name="cvv" placeholder="CVV" maxlength="4">
            </div>

            {{-- Campos ocultos del paso 1 --}}
            <input type="hidden" name="correo" id="correoHidden">
            <input type="hidden" name="nombre" id="nombreHidden">
            <input type="hidden" name="apellido" id="apellidoHidden">
            <input type="hidden" name="nip" id="nipHidden">

            <input type="hidden" name="omitir_pago" id="omitir_pago" value="0">

            <div class="button-group">
                <button type="button" class="btn-secondary" id="btnVolver">Volver</button>
                <button type="button" class="btn-skip" id="btnOmitir">Omitir</button>
            </div>

            <button type="submit" id="btnRegistrarse">Registrarse</button>
        </form>

    </div>

    {{-- ======================= LOGIN ======================= --}}
    <div class="form-container sign-in">

        <form method="POST" action="{{ route('tas_inicioSesion') }}">
            @csrf
            <h1>Iniciar Sesión</h1>

            @if (session('success'))
                <div class="alert alert-success"><p>{{ session('success') }}</p></div>
            @endif

            @if (session('error') && request()->routeIs('tas_loginView'))
                <div class="alert alert-danger"><p>{{ session('error') }}</p></div>
            @endif

            <input type="text" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="nip" placeholder="Contraseña" required>

            <a href="#">¿Olvidaste tu contraseña?</a>
            <button type="submit">Ingresar</button>
        </form>
    </div>

    {{-- ======================= PANEL TOGGLE ======================= --}}
    <div class="toggle-container">
        <div class="toggle">

            <div class="toggle-panel toggle-left">
                <h1>Qué gusto verte de nuevo</h1>
                <p>Accede con tu cuenta para continuar usando los servicios de <strong>TAS</strong>.</p>
                <button class="hidden" id="signIn" type="button" data-url="{{ route('tas_loginView') }}">
                    Iniciar Sesión
                </button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Bienvenido a TAS</h1>
                <p>Regístrate y accede a una mejor experiencia en tus compras.</p>
                <button class="hidden" id="signUp" type="button" data-url="{{ route('tas_registroView') }}">
                    Crear Cuenta
                </button>
            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/login-script.js') }}"></script>
    <script src="{{ asset('js/register-stepper-script.js') }}"></script>
@endpush
