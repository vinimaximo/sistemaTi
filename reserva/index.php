<?php
// Incluindo o sistema de autenticação
   include('acesso_com.php');
    include('../config.php');
?> 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> <?php echo SYS_NAME;?> - Área da Reserva</title>
</head>
<body>
    <?php include('reserva_cliente.php')?>
    <?php include('area_reserva.php')?>
   
</body>
</html>