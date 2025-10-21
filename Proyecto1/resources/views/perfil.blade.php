@extends('layouts.barraNavegacion')

@section('content')

<!--comentario-->
<div class="container" style="border: 1px solid red; height: 800px;">

    <div class="container-Padre" style="height: 100%;"> 

        <div class="card-contenedor" style="height: 100%; width: 100%;">

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

            <div style="height: 450px;  border: 1px solid blue; display: flex; flex-wrap: nowrap; ">
                <div style="width: 33%;  border: 1px solid red;">
                    <div style="height: 33%; align-content: center; justify-items: center">
                        <p class="card-cabecera" style=" width: 75%;">Cambiar datos generales</p>
                    </div>
                    <div style="height: 33%; align-content: center; justify-items: center">
                        <p class="card-cabecera" style="width: 75%;">Cerrar sesión</p>    
                    </div>
                    <div style="height: 33%; align-content: center; justify-items: center">
                        <p class="card-cabecera" style="width: 75%;">Solicitar ser super usuario</p>
                    </div>
                </div>
                <div class="flex2" style="width: 80%;">
                    <div class="card-cabecera" style="width: 100%; height: 80%; border: 1px solid yellow;">
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
                        <div style="margin: 5%; height: 40%;">
                            <div style="height: 85%; display: flex; flex-direction: column; gap: 3%;">
                                <div style="" class="flex1">
                                    <p style="width: 40%;">Nombre completo</p>
                                    <textarea class="campoTexto" style="width: 60%; height: 30px;" id="nom" name="nom" placeholder="Escribe tu nombre..."></textarea>
                                </div>
                                <div style="" class="flex1">
                                    <p style="width: 40%;">Apodo</p>
                                    <textarea class="campoTexto" style="width: 60%; height: 30px;" id="apodo" name="apodo" placeholder="Escribe tu apodo..."></textarea>
                                </div>
                                <div style="" class="flex1">
                                    <p style="width: 40%;">Otro</p>
                                    <textarea class="campoTexto" style="width: 60%; height: 30px;" id="otro" name="otro" placeholder="Escribe tu otro..."></textarea>
                                </div>
                                <div style="margin-top: 5%; display: flex; justify-content: end;">
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