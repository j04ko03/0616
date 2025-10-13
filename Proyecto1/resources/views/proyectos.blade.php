@extends('layouts.barraNavegacion')

@section('content')
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .projects-list {
            padding: 20px;
        }
        
        .project-item {
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .project-item:hover {
            background-color: #f9f9f9;
            transform: translateX(5px);
        }
        
        .project-item:last-child {
            border-bottom: none;
        }
        
        .project-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .project-date {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        
        .project-number {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: #3498db;
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            margin-right: 15px;
            font-weight: bold;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
            font-size: 0.9rem;
            border-top: 1px solid #eaeaea;
        }
        
        @media (max-width: 600px) {
            .project-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .project-date {
                margin-top: 5px;
                margin-left: 45px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Lista de Proyectos</h1>
            <p class="subtitle">Seguimiento y gestión de proyectos activos</p>
        </header>
        
        <div class="projects-list">
            <div class="project-item">
                <div>
                    <span class="project-number">1</span>
                    <span class="project-title">Sistema de Gestión de Inventarios</span>
                </div>
                <div class="project-date">15 de marzo, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">2</span>
                    <span class="project-title">Plataforma E-learning</span>
                </div>
                <div class="project-date">2 de abril, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">3</span>
                    <span class="project-title">Aplicación Móvil de Fitness</span>
                </div>
                <div class="project-date">18 de mayo, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">4</span>
                    <span class="project-title">Sitio Web Corporativo</span>
                </div>
                <div class="project-date">5 de junio, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">5</span>
                    <span class="project-title">Herramienta de Análisis de Datos</span>
                </div>
                <div class="project-date">22 de julio, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">6</span>
                    <span class="project-title">Sistema de Reservas Online</span>
                </div>
                <div class="project-date">10 de agosto, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">7</span>
                    <span class="project-title">App de Gestión Financiera</span>
                </div>
                <div class="project-date">3 de septiembre, 2023</div>
            </div>
            
            <div class="project-item">
                <div>
                    <span class="project-number">8</span>
                    <span class="project-title">Portal de Noticias</span>
                </div>
                <div class="project-date">19 de octubre, 2023</div>
            </div>
        </div>
        
        <footer>
            <p>Total de proyectos: 8 | Última actualización: Noviembre 2023</p>
        </footer>
    </div>
@endsection