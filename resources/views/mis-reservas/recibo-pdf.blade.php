<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA - GATITO NEGRO</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        

        p {
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        strong {
            font-weight: bold;
        }

        .cost-details {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: relative;
        }

        .reservation-number {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 24px;
            color: red;
            font-weight: bold;
        }

        .note {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .thanks {
            font-style: italic;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        
        <img src="{{ public_path('assets/images/logo-gatitonegro.png') }}" width="120" alt="Logo de Gatito Negro">
        <h1>RECIBO - {{ config('app.name','') }}</h1>
    </header>

    <div class="cost-details">
        <p class="reservation-number"><strong>Número de Reserva:</strong> 000-{{ $reserva->id }}</p>
        <p><strong>Fecha:</strong> {{ $reserva->created_at->format('d-m-Y') }}</p>

        <p><strong>DATOS DEL CLIENTE:</strong></p>
        <ul>
            <li><strong>Cliente:</strong> {{ $reserva->user->apellidos }} {{ $reserva->user->nombres }}</li>
            <li><strong>D.N.I:</strong> {{ $reserva->user->identificacion }}</li>
            <li><strong>Email:</strong> {{ $reserva->user->email }}</li>
            <li><strong>Teléfono:</strong> {{ $reserva->user->telefono }}</li>
            <li><strong>Dirección:</strong> {{ $reserva->user->direccion }}</li>
        </ul>
        <hr>
        <p><strong>DETALLE DE RESERVA:</strong></p>
        <ul>
            <li><strong>{{ $reserva->servicio->nombre }}:</strong> Reservada para el {{ Carbon\Carbon::parse($reserva->fecha_inicio)->format('d-m-Y') }}</li>
            <li><strong>Hora de Inicio:</strong> {{ $reserva->fecha_inicio }}</li>
            <li><strong>Hora de Finalización:</strong> {{ $reserva->fecha_final }}</li>
            <li><strong>Duración:</strong> {{ $reserva->cantidad_horas }} horas</li>
            <li><strong>Costo por hora:</strong> ${{ $reserva->precio }}</li>
            <li><strong>Detalle del cliente:</strong> {{ $reserva->detalle_cliente }}</li>
        </ul>

        <p><strong>COSTOS:</strong></p>
        <h1><strong>TOTAL:</strong> ${{ $reserva->cantidad_horas*$reserva->precio }}</h1>
    </div>

    <div class="note">
        <p><strong>NOTA:</strong><br>
        El presente recibo ha sido enviada a su correo electrónico. Agradecemos su reserva y le recordamos que deberá acercarse al lugar con esta factura para efectuar el pago el día de la reserva. La Secretaría se pondrá en contacto con usted a la brevedad posible para validar información y confirmar la reserva.</p>
    </div>

    <p class="thanks">Agradecemos su preferencia,<br>
    {{ config('app.name','') }}</p>

    <footer>
        <p>Para más información, visite nuestra página web: <a href="{{ url('/') }}" style="color: #fff; text-decoration: underline;">{{ url('/') }}</a></p>
        <p>Contacto por email: <a href="info@centrorecreacionalgatitonegro.com" style="color: #fff; text-decoration: underline;">info@centrorecreacionalgatitonegro.com</a></p>
        <p>Teléfono de contacto: : 0984805154 / 0992920401</p>
        <p>Dirección: Salcedo-Mulliquindil (Santa Ana),Barrio Sur San Miguel</p>
    </footer>
</body>
</html>
