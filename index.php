<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boi na Brasa</title>
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body class="fundofixo">
    <!-- Área do menu -->
    <?php include('meu_publico.php');?>
    <a name="home"></a>
    <main class="container">

   
        <!-- Área do caroussel -->
        <?php include('caroussel.php');?>
        <!-- Área de destaques -->
        <?php include('produtos_destaque.php');?>
        <a name="destaque">&nbsp;</a>
        <!-- Área produtos em geral -->
        <?php include('produtos_geral.php');?>
        <a name="produtos">&nbsp;</a>
        <!-- Área de rodapé -->
        <footer>
            <?php include('rodape.php');?>
            <a name="contato">&nbsp;</a>
        </footer>
     </main>
    <!-- Links dos arquivos bootstrap -->
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="js.bootstrap.min.js"></script>
</body>
</html>
<?php



?>