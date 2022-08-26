<?php
include('../connections/conn.php');
// Inicia verificação do login
if ($_POST) {
    //definindo o USE do banco de dados
    mysqli_select_db($conn, $database_conn);
    //verifica login e senha recebidos
    $nome_reserva = $_POST['nome_reserva'];
    $cpf_reserva = $_POST['cpf_reserva'];
    $email_reserva = $_POST['email_reserva'];
    $senha_reserva = $_POST['senha_reserva'];

    $verificaSQL = "select * 
    from tbreserva 
    where nome_reserva = '$nome_reserva'  , cpf_reserva = '$cpf_reserva' , email_reserva = '$email_reserva' and senha_reserva = '$senha_reserva'
    ";
    echo $verificaSQL;
    //carregar os dados e verificar a linha de retorno, caso exista
    $lista_session = mysqli_query($conn, $verificaSQL);
    $linha = $lista_session->fetch_assoc();
    $numero_linhas = mysqli_num_rows($lista_session);

    // se a sessão não existir, iniciamos uma sessão
    if (!isset($_SESSION)) {
        $sessao_antiga = session_name("Chulettaaa");
        session_start();
        $sessao_name_new = session_name(); //Recupera o nome atual
    }
    if ($linha != null) {
        $_SESSION['nome_reserva'] = $nome_reserva;
        $_SESSION['cpf_reserva'] = $linha['cpf_reserva'];
        $_SESSION['email_reserva'] = $linha['email_reserva'];
        $_SESSION['senha_reserva'] = $linha['senha_reserva'];
        $_SESSION['nome_da_sessao'] = session_name();
        echo "<script>window.open('reserva.php','_self')</script>";
    }
}

?>



<!doctype html>
<html lang="pt-BR">

<head>
    <meta http-equiv="refresh" content="30;URL=../reserva/reserva_cliente.php">
    <title>Login</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="fundofixo">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-info text-center">Faça seu login </h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-10x"></i>
                            </p>
                            <br>
                            <div class="alert alert-info" role="alert">
                                <form action="reserva_cliente.php" name="login_reserva" id="reserva_login" method="post" enctype="multipart/form-data">
                                    <label for="nome_reserva">Login:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="nome_reserva" id="nome_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                                    </p>
                                    <label for="cpf_reserva">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-paperclip text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="cpf_reserva" id="cpf_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu CPF.">
                                    </p>
                                    <label for="email_reserva">Email:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-paperclip text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="email_reserva" id="email_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu Email.">
                                    </p>
                                    
                                    <label for="senha_reserva">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha_reserva" id="senha_reserva" class="form-control" required autocomplete="off" placeholder="Digite sua senha.">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Entrar" class="btn btn-primary">
                                    </p>
                                </form>
                                <p class="text-center">
                                    <small>
                                        <br>
                                        Caso não faça uma escolha em 30 segundos será redirecionado automaticamente para página inicial.
                                    </small>
                                </p>
                            </div>
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>
    </main>

    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>