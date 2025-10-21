@extends('layouts.barraNavegacion')

@section('content')

<!--comentario-->
<div class="container" style="height: 800px;">

    <div class="container-Padre" style="height: 100%;"> 

        <div class="card-contenedor" style="height: 100%; width: 100%; cursor:auto;">

            <div class="contenedorCabeceraPerfil flex1">

                <div class="flex2" style="width: 33%; height: 100%;">
                    <div class="contendorFoto   ">

                    </div>
                </div>
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
                                <p style="width: fit-content">Juán jiménez del rosario</p>
                            </div>
                            <div class="ultimoContenedorDatosPerfil">
                                <p style="width: fit-content; margin-right: 1%">Apodo: </p>
                                <p style="width: fit-content">Juán</p>
                            </div>
                        </div>
                    <div class="subContenedorDatosPerfil">  
                            <div class="ultimoContenedorDatosPerfil">
                                <p style="width: fit-content; margin-right: 1%">Creación de cuenta: </p>
                                <p style="width: fit-content">00-00-0000</p>
                            </div>
                            <div class="ultimoContenedorDatosPerfil">
                                <p style="width: fit-content; margin-right: 1%">Tipo de usuario: </p>
                                <p style="width: fit-content">User</p>
                            </div>
                    </div>

                    </div>
                </div>

            </div>

            <div class="contenedorCardDatos">
                <div class="botoneraPerfil">
                    <div style="height: 33%; align-content: center; justify-items: center">
                        <p class="card-cabecera" style=" width: 75%; cursor: pointer;">Cambiar datos generales</p>
                    </div>
                    <div style="height: 33%; align-content: center; justify-items: center">
                        <p class="card-cabecera" style="width: 75%; cursor: pointer;">Cerrar sesión</p>    
                    </div>
                    <div style="height: 33%; align-content: center; justify-items: center">
                        <p class="card-cabecera" style="width: 75%; cursor: pointer;">Solicitar ser super usuario</p>
                    </div>
                </div>
                <div class="flex2 contenedorModificaciones">
                    <div id="contenedorOcultos" class="card-cabecera" style="width: 100%; height: 80%; margin-inline: 5%;">
                    <!--Datos a modificar y otras pantallas emergentes-->
                    <div class="oculto" style="height: 100%; margin-bottom: 5%;">
                        <div style="margin: 5%;">
                            <h2 class="h2">
                                Solicitud
                            </h2>
                        </div>
                        <div style="margin: 5%; height: 60%;">
                            <p style="width: 100%;">Introducir password para solicitud de Super User.</p>
                            
                            <div style="margin-top: 5%;">
                                <input style="border: 1px solid black;" type="password" id="clave" name="clave" placeholder="Escribe tu contraseña">
                            </div>

                            <div style="margin-top: 5%; display: flex; justify-content: end;">
                                <button class="botonPersonalizado" style="margin-bottom: 5%">Ok</button>
                            </div>
                        </div>
                    </div>

                    <div class="" style="height: 100%;">
                        <div style="margin: 5%;">
                            <h2 class="h2">
                                Modificación de datos
                            </h2>
                        </div>
                        <div style="margin: 5%;">
                            <div style="height: 100%; display: flex; flex-direction: column; gap: 1rem;">
                                <div style="" class="flex1">
                                    <p style="width: 40%;">Nombre completo</p>
                                    <textarea class="campoTexto" style="width: 60%; height: 30px; padding-inline-start: 2%;" id="nom" name="nom" placeholder="Escribe tu nombre..."></textarea>
                                </div>
                                <div style="" class="flex1">
                                    <p style="width: 40%;">Apodo</p>
                                    <textarea class="campoTexto" style="width: 60%; height: 30px; padding-inline-start: 2%;" id="apodo" name="apodo" placeholder="Escribe tu apodo..."></textarea>
                                </div>
                                <div style="" class="flex1">
                                    <p style="width: 40%;">Otro</p>
                                    <textarea class="campoTexto" style="width: 60%; height: 30px; padding-inline-start: 2%;" id="otro" name="otro" placeholder="Escribe tu otro..."></textarea>
                                </div>
                                <div style="margin-top: 5%; display: flex; justify-content: flex-end;">
                                    <button class="botonPersonalizado" style="margin-bottom: 5%">Ok</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection