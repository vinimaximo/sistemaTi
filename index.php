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
    <?php include('menu_publico.php');?>
    <a name="home"></a>
    <main class="container">

   
        <!-- Área do caroussel -->
        <?php include('caroussel.php');?>
        <!-- Área de destaques -->
        <?php include('produtos_destaque.php');?>
        <a name="destaques">&nbsp;</a>
        <!-- Área produtos em geral -->
         <a name="produtos">&nbsp;</a>
        <?php include('produtos_geral.php');?>
       <hr>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<?php



?>