@extends('layouts.layoutPrivado')
 @push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homePageBlade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cardItem.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfilBlade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tomarFoto.css') }}">
@endpush

@section('content')
    <!--comentario-->
    <div class="container" style="height: 800px;">

        <div class="container-Padre" style="height: 100%;">

            <div class="card-contenedor" style="height: 100%; width: 100%; cursor:auto;">

                <div class="contenedorCabeceraPerfil flex1">

                    <div class="flex2" style="width: 33%; height: 100%; flex-wrap: wrap;">
                        <div class="contendorFoto">

                        </div>
                        <div id="upload" style="width: 80%; display: flex; justify-content: flex-end; align-items: center;">
                            <a href="#" style="display: flex;">
                                <img id="img" src="../storage/assets/icons/captura.png" alt="" style="width: 20px; cursor: pointer;">
                            </a>
                        </div>
                        <!--TOMAR FOTO-->
                        <div id="cameraModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>

                                <!-- Vista previa de la cámara -->
                                <video id="camera" autoplay playsinline></video>

                                <!-- Botones -->
                                <div class="buttons">
                                    <button id="takePhoto">Tomar foto</button>
                                    <input type="file" id="uploadFile" accept="image/png, image/jpeg">
                                </div>

                                <!-- Vista previa de la imagen tomada -->
                                <canvas id="snapshot" style="display:none;"></canvas>
                                <button id="savePhoto" style="display:none;">Usar esta foto</button>
                            </div>
                        </div>
                    </div>
                    <!-- Prueba para tomar foto -->
                    <div style="width: 66%; height: 100%;">
                        <div style="height: 30%; align-content: center;">
                            <h1 class="h1">
                                Datos generales
                            </h1>
                        </div>
                        <div class="contenedorDatosPerfil">
                            <div class="subContenedorDatosPerfil">
                                <div class="ultimoContenedorDatosPerfil">
                                    <p style="width: fit-content; margin-right: 1%">Nombre completo: </p>
                                    <p style="width: fit-content">{{ $usuario->nombre }}</p>
                                </div>
                                <div class="ultimoContenedorDatosPerfil">
                                    <p style="width: fit-content; margin-right: 1%">Apodo: </p>
                                    <p style="width: fit-content">{{ $usuario->apodo }}</p>
                                </div>
                            </div>
                            <div class="subContenedorDatosPerfil">
                                <div class="ultimoContenedorDatosPerfil">
                                    <p style="width: fit-content; margin-right: 1%">Creación de cuenta: </p>
                                    <p style="width: fit-content">{{ $usuario->fechaCreacion }}</p>
                                </div>
                                <div class="ultimoContenedorDatosPerfil">
                                    <p style="width: fit-content; margin-right: 1%">Tipo de usuario: </p>
                                    <p style="width: fit-content">{{ $usuario->tipoUser }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="contenedorCardDatos">
                    <div class="botoneraPerfil">
                        <div style="height: 25%; align-content: center; justify-content: center">
                            <p id="btnGeneralData" class="card-cabecera textoBtns" style=" width: 75%; cursor: pointer;">
                                Cambiar datos generales</p>
                        </div>
                        <div style="height: 25%; align-content: center; justify-content: center">
                            <a href="{{ route('logout.controller') }}" id="btnCloseSesion" class="card-cabecera textoBtns">Cerrar sesión</a>
                        </div>
                            @php
                                $isSolicited = false;
                                foreach($solicitudes as $solicitud){
                                    if ($solicitud->usuario->id === Auth::user()->id) {
                                        $isSolicited = true;
                                    }
                                }
                            @endphp

                            @if(Auth::user()->tipoUser === 1 || $isSolicited)
                                    <div style="height: 25%; align-content: center; justify-content: center">
                                        <p id="btnSuperUser" class="card-cabecera textoBtns">Solicitar ser super usuario</p>
                                    </div>
                            @endif
                            
                        <div style="height: 25%; align-content: center; justify-content: center">
                            <p id="btnIncidencias" class="card-cabecera textoBtns">Registrar incidencias</p>
                        </div>
                    </div>
                    <div class="flex2 contenedorModificaciones">
                        <div id="contenedorOcultos" class="card-cabecera"
                            style="width: 100%; height: 80%; margin-inline: 5%;">
                            <!--Datos a modificar y otras pantallas emergentes-->
                            <div id="solicitarSuperUser" class="oculto" style="height: 100%; margin-bottom: 5%;">
                                <div style="margin: 5%;">
                                    <h2 class="h2">
                                        Solicitud
                                    </h2>
                                </div>
                                <div style="margin: 5%; height: 60%;">
                                    <p style="width: 100%;">Introducir password para solicitud de Super User.</p>

                                    <div style="margin-top: 5%;">
                                        <input type="password" id="clave" name="clave"
                                            placeholder="Escribe tu contraseña">
                                    </div>

                                    <div style="margin-top: 5%; display: flex; justify-content: end;">
                                        <button class="botonPersonalizado" style="margin-bottom: 5%">Ok</button>
                                    </div>
                                </div>
                            </div>

                            <div id="modificarDatos" class="" style="height: 100%;">
                                <div style="margin: 5%;">
                                    <h2 class="h2">
                                        Modificación de datos
                                    </h2>
                                </div>
                                <div style="margin: 5%;">
                                    <div style="height: 100%; display: flex; flex-direction: column; gap: 1rem;">
                                        <form action="{{ route('usuarios.update', Auth::user()) }}" method="post">
                                        @csrf
                                        @method('put')
                                            <div style="margin-bottom: 1%" class="flex1">
                                                <p style="width: 40%;">Nombre completo</p>
                                                <textarea class="campoTexto" id="nombre" name="nombre" placeholder="{{ $usuario->nombre }}" value="{{ $usuario->nombre }}"></textarea>
                                            </div>
                                            <div style="margin-bottom: 1%" class="flex1">
                                                <p style="width: 40%;">Apodo</p>
                                                <textarea class="campoTexto" id="apodo" name="apodo" placeholder="{{ $usuario->apodo }}" value="{{ $usuario->apodo }}"></textarea>
                                            </div>
                                            <div style="" class="flex1">
                                                <p style="width: 40%;">Contraseña</p>
                                                <textarea class="campoTexto password-textarea" id="contraseña" name="contraseña" placeholder="••••••••" value="{{ $usuario->contraseña }}"></textarea>
                                            </div>
                                            <div style="margin-top: 5%; display: flex; justify-content: flex-end;">
                                                <button type="submit" class="botonPersonalizado" style="margin-bottom: 5%">Modificar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>  

    <script src="{{ url('/js/btnsPerfil.js') }}"></script>
    <script src="{{ url('/js/tomaFoto.js') }}"></script>
@endsection
