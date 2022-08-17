<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Após 15 segundos a pagina sera redirecionada para index.php -->
    <meta http-equiv="refresh" content="40;URL=index.php">
    <title>Verificação de contato</title>
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>

<body class="fundofixo">
    <?php



    include('menu_publico.php'); ?>
    <main class="container">
        <section>
            <div class="jumbotron alert-danger">
                <h1 class="text-danger">Agradecemos o Contato</h1>
                <?php
                $destino = "vinimaximo033@hotmail.com";
                $nome_contato = $_POST['nome_contato'];
                $email_contato = $_POST['email_contato'];
                $msg_contato = "Mensagem de: " . $_POST['nome_contato'] . "\n" . $_POST['comentarios_contato'];

                include('./phpmailer/src/PHPMailer.php');
                include('./phpmailer/src/SMTP.php');

                // Instância da classe
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->CharSet = 'UTF8';
                // Configurações do servidor
                $mail->isSMTP();        //Devine o uso de SMTP no envio
                $mail->SMTPAuth = true; //Habilita a autenticação SMTP
                $mail->Username   = '390ca30af6fa18';
                $mail->Password   = '6966f9050e17bf';
                // Criptografia do envio SSL também é aceito
                $mail->SMTPSecure = 'tls';
                // Informações específicadas pelo Google
                $mail->Host = 'smtp.mailtrap.io';
                $mail->Port = 2525;


                // Define o destinatário
                $mail->addAddress($email_contato);
                // Conteúdo da mensagem
                $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
                $mail->Subject = $nome_contato;
                $mail->Body    = $msg_contato;

                if (!$mail->Send()) {

                    // echo "Mailer Error: " . $mail->ErrorInfo;

                } else {

                    // echo "Mensagem enviada com sucesso";

                }




                ?>
            </div>
        </section>

        <footer>
            <?php include('rodape.php') ?>
        </footer>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>