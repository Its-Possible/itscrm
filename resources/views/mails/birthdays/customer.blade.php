<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Título</title>
    <!-- Adicione estilos ou links adicionais que você precisa no cabeçalho -->
</head>
<body>
<!-- Conteúdo do seu email -->
<div>
    <img width="120" src="{{ $customer->avatar->image }}" />
    <h1>Olá, Mundo!</h1>
    <p>Este é um exemplo de email HTML.</p>
</div>
<!-- Adicione mais conteúdo conforme necessário -->

<!-- Assinatura ou rodapé do email -->
<div>
    <p>Atenciosamente,<br>Clinica Mais</p>
</div>
</body>
</html>
