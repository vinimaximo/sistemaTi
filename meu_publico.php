<?php 
 // incluindo arquivo de conexão
 include('connections/conn.php');

 // consulta para trazer os dados
 /*$tbtipos = "tbtipos";
 $ordenar = "rotulo_tipo";
 $queryTipos = "SELECT * 
                    FROM ".$tbtipos."        
                    ORDER BY ".$ordenar."";  */
 $consulta = "select * from tbtipos order by rotulo_tipo";
 $listaTipos = $conn->query($consulta);
 $linhaTipo = $listaTipos -> fetch_assoc();
 $totalLinhas = $listaTipos->num_rows;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
   
</head>
<body>
    <!--Abre a barra de navegação -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Agrupamento mobile -->
            <div class="navbar-header">
            <button type="button" class="nav-toggle collapsed" data-toggle="collapse" data-target="#menuPublico" aria-expanded="false">
                <span class="sr-only">Navegação Mobile</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="images/logochurrascopequeno.png" alt="">
            </a>
            </div>
            <!-- Fecha agrupamento mobile -->
            <!-- Nav Direita -->
            <div class="collapse navbar-collapse" id="menuPublico">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                    </li>
                    <li><a href="index.php#destaques">Destaques</a></li>
                    <li><a href="index.php#produtos">Produtos</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Tipos <span class="caret"></span>
                        
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Abre a estrutura de repetição -->
                        <?php do { ?>
                            <li><a href="produtos_por_tipo.php?id_tipo=<?php echo $linhaTipo['id_tipo'] ?>">
                            <?php echo $linhaTipo['id_tipo'] ?>
                        </a>
                    </li>
                    <?php } while($linhaTipo = $listaTipos->fetch_assoc());?>
                    </ul>
                    </li>
                    <li></li>
                    <li></li>
            </ul>
            </div><!-- Fecha Nav direita -->
        </div> <!-- Fecha conteiner-fluid -->
    </nav> <!-- Fecha barra de navegação -->
</body>
</html>