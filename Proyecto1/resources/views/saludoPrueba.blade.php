<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Div</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .responsive-box {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .responsive-box {
                margin: 20px;
                padding: 15px;
                background-color: #e3f2fd;
            }
        }

        @media (max-width: 480px) {
            .responsive-box {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="responsive-box">
        <h2>Div Responsive</h2>
        <p>Este div cambia su tamaño, márgenes y color de fondo según el ancho de la pantalla.</p>
        <ul>
            <li>✅ Se ve bien en PC</li>
            <li>✅ Se adapta en tablet</li>
            <li>✅ Funciona perfecto en móvil</li>
        </ul>
    </div>

</body>
</html>