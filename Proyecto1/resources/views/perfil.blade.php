@extends('layouts.barraNavegacion')

@section('content')


<div class="container mx-auto p-4" style="border: 1px solid black; height: 800px;">

    <div class="container-Padre" style="border: 1px solid blue; height: 100%;"> 

        <div class="card-contenedor" style="height: 100%; width: 100%; background-color: blanchedalmond; border: 1px solid green">

            <div class="" style="width: 100%; height: 40%; border: 1px solid red; display: flex; flex-wrap: wrap; justify-content: space-between">

                <div style="width: 33%; height: 100%; border: 1px solid rgb(118, 23, 207); display: flex; justify-content: center; align-items: center">
                    <div style="border: 1px solid brown; height: 85%; width: 60%; border-radius: 50%;">

                    </div>
                </div>
                <div style="width: 66%; height: 100%; border: 1px solid rgb(118, 23, 207);">
                    <div style="border: 1px solid red; height: 30%; align-content: center;">
                        <h1 class="h1">
                        Datos generales 
                        </h1>
                    </div>
                    <div style="border: 1px solid pink; height: 70%; display: flex; flex-wrap: wrap;">
                        <div style="border: 1px solid green; height: 100%; width: 50%; align-content: center;">                            
                            <div style="border: 1px solid red; display: flex; flex-wrap: wrap;">
                                <p style="border: 1px solid blue; width: fit-content; margin-right: 1%">Nombre completo: </p>
                                <p style="border: 1px solid blue; width: fit-content">Juán jiménez del rosario</p>
                            </div>
                            <div style="border: 1px solid red; display: flex; flex-wrap: wrap; margin-top: 5%">
                                <p style="border: 1px solid blue; width: fit-content; margin-right: 1%">Apodo: </p>
                                <p style="border: 1px solid blue; width: fit-content"">Juán</p>
                            </div>
                        </div>
                    <div style="border: 1px solid green; height: 100%; width: 50%; align-content: center;">  
                            <div style="border: 1px solid red; display: flex; flex-wrap: wrap;">
                                <p style="border: 1px solid blue; width: fit-content; margin-right: 1%">Creación de cuenta: </p>
                                <p style="border: 1px solid blue; width: fit-content">00-00-0000</p>
                            </div>
                            <div style="border: 1px solid red; display: flex; flex-wrap: wrap; margin-top: 5%">
                                <p style="border: 1px solid blue; width: fit-content; margin-right: 1%">Tipo de usuario: </p>
                                <p style="border: 1px solid blue; width: fit-content"">User</p>
                            </div>
                    </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection