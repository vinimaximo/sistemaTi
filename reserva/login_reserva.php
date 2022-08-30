<?php
include('../connections/conn.php');
// inicia verificação do login
if ($_POST) {
        //Definindo o use do cliente no banco de dados
        mysqli_select_db($conn, $database_conn);

        //Verifica login e senha recebidos do cliente

        $login_reserva = $_POST['login_reserva'];
        $senha_cliente = $_POST['senha_cliente'];
     
        $verificaSQL = "select * from tbreserva where email_reserva = '$login_reserva' and senha_reserva = '$senha_reserva'";

         // carregar os dados e verificar a linha de retorno, caso exista.

         $lista_session = mysqli_query($conn, $verificaSQL);

         $linha = $lista_session->fetch_assoc();
 
         $numeroLinhas =mysqli_num_rows($lista_session);

        // se a sessão não exixtir, iniciamos uma sessão
       

        if (!isset($_SESSION)) {
            $sessao_antiga = session_name("Chuleta");
            session_start();
            $sessao_name_new = session_name(); // recupera o nome atual
        }
        if ($linha != null) {
            $_SESSION['login_reserva'] =  $login_reserva;
            $_SESSION['id_tipo_reserva'] = $id_tipo_reserva;
            $_SESSION['nome_da_sessao'] = session_name();
            echo "<script>window.open('lista_reserva.php','_self')</script>";
        } else {
            echo "<script>window.open('invasor.php','_self')</script>";
        }
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
                                <form action="login.php" name="form_login" id="form_login" method="post" enctype="multipart/form-data">
                                    <label for="login_reserva">Login:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="login_reserva" id="login_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
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