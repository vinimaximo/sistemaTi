<?php
include('../connections/conn.php');
// inicia verificação do login
if ($_POST) {
    try {
        mysqli_select_db($conn, $database_conn);

    // verifica login e senha recebidos
    $login_reserva = $_POST['login_reserva'];
    $senha_reserva = $_POST['senha_reserva'];
    $cpf_reserva = $_POST['cpf_reserva'];


    $verificaSQL = "select * from tbreserva where login_reserva = '$login_reserva' and cpf_reserva = '$cpf_reserva' and senha_reserva = '$senha_reserva'";
    

    // carregar os dados e verificar a linha de retorno, caso exista.
    //$lista_session = $conn->query($verificaSQL);
    $lista_session = mysqli_query($conn, $verificaSQL);
    $linha  = $lista_session->fetch_assoc();
    $numeroLinhas = mysqli_num_rows($lista_session);
    // se a sessão não exixtir, iniciamos uma sessão
    if (!isset($_SESSION)) {
        $sessao_antiga = session_name("Chuleta");
        session_start();
        $sessao_name_new = session_name(); // recupera o nome atual
    }
    if ($linha != null) {
        $_SESSION['login_reserva'] = $login_reserva;
        $_SESSION['nome_nivel'] = $linha['nome_nivel'];
        $_SESSION['nome_da_sessao'] = session_name();
        echo "<script>window.open('index.php','_self')</script>";

        // verifica e Definindo o use do cliente no banco de dados
    } 
    } catch (\Throwable $e) {
        echo $e;
    }
    // definindo o USE do banco de dados

    # code...

   
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta http-equiv="refresh" content="30;URL=../index.php">
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
                        <h1 class="breadcrumb text-info text-center">Faça seu login</h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-10x"></i>
                            </p>
                            <br>
                            <div class="alert alert-info" role="alert">
                                <form action="login_reserva.php" name="form_login_reserva" id="form_login_reserva" method="post" enctype="multipart/form-data">
                                    <label for="login_reserva">Login:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="login_reserva" id="login_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                                    </p>
                                    <label for="cpf_reserva">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-paperclip text-info" aria-hidden="true"></span>
                                        </span>
                                        <input maxlength="11" type="text" name="cpf_reserva" id="cpf_reserva" class="form-control" autofocus  autocomplete="off" placeholder="Digite seu CPF.">
                                    </p>

                                    <label for="senha_reserva">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha_reserva" id="senha_reserva" class="form-control"  autocomplete="off" placeholder="Digite sua senha.">
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
