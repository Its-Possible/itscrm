<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parabéns pelo Aniversário!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, p {
            text-align: center;
        }

        img {
            display: block;
            margin: 0 auto;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 20px;
        }

        .user-info {
            margin-top: 20px;
            text-align: center;
        }

        .user-info p {
            color: #555;
        }

        .birthday-message {
            margin-top: 20px;
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Avatar do Usuário -->
    <img src="{{ $customer->avatar->image }}" alt="Avatar">

    <h2>Parabéns pelo Aniversário, Dr. {{ $customer->name }}!</h2>
    <p>Desejamos a você um dia fantástico repleto de alegria e celebração.</p>

    <!-- Mensagem de Aniversário Personalizada -->
    <div class="birthday-message">
        <p>Enviamos calorosos votos no seu dia especial! Que seja cheio de amor e risos.</p>
        <p>E agradecemos também toda a dedicação que tem colocado na Clinica</p>
    </div>

    <!-- Rodapé do Email -->
    <div class="footer">
        <p>Atenciosamente,<br>
            {{ config("app.name") }}
        </p>
    </div>

</div>

</body>
</html>
