<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['subject'] }}</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-top: 4px solid #007BFF; /* Linha de destaque no topo */
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h2 {
            color: #007BFF;
            font-size: 20px;
            margin-bottom: 15px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            transition: background-color 0.3s; /* Efeito de transição */
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        .message-highlight {
            background-color: #e7f3ff; /* Fundo azul claro */
            border-left: 4px solid #007BFF; /* Linha de destaque à esquerda */
            padding: 10px;
            margin: 20px 0;
        }
        .header {
            text-align: center;
            margin: 20px 0;
        }
        .header img {
            width: 150px; /* Ajuste o tamanho conforme necessário */
            height: auto; /* Mantém a proporção */
            max-width: 100%; /* Imagem responsiva */
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://images.vexels.com/media/users/3/129286/isolated/preview/f71f09d3aa7db678ee884a2cdea1a435-simbolo-do-edificio-do-banco.png" alt="Logo da Empresa" />
        </div>
        <h1>Olá,</h1>
        <p>Meu nome é <strong>{{ $data['fromName'] }}</strong> e sou seu representante financeiro. Estou entrando em contato para compartilhar algumas soluções que podem ser úteis para otimizar sua situação financeira e ajudá-lo a alcançar seus objetivos.</p>
        <h2>Assunto:</h2>
        <p><strong>{{ $data['subject'] }}</strong></p>

        <!-- Mensagem personalizada -->
        <div class="message-highlight">
            <p>{!! nl2br(e($data['message'])) !!}</p>
        </div>

        <p>Se você estiver interessado em saber mais, estarei à disposição para uma conversa. Não hesite em me contatar para explorar suas opções financeiras!</p>

        <a href="mailto:{{ $data['fromEmail'] }}" class="button">Falar comigo</a>

        <div class="footer">
            <p>Atenciosamente,</p>
            <p>{{ $data['fromName'] }}</p>
            <p>Seu Banqueiro | {{ $data['fromEmail'] }}</p>
            <p>Telefone: (XX) XXXX-XXXX</p>
        </div>
    </div>
</body>
</html>
