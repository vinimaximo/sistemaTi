<?php 
// incluindo arquivo de conexão
include ('connections/conn.php');

// consulta para trazer os dados
/* $tbtipos = "tbtipos";
$ordenar = "rotulo_tipo";
$queryTipos = "SELECT *
                FROM ".$tbtipos." 
                ORDER BY ".$ordenar.""; */
$consulta = "select * from tbtipos order by rotulo_tipo"; 
$listaTipos = $conn->query($consulta);
$linhaTipo = $listaTipos->fetch_assoc();
$totalLinhas = $listaTipos->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <!-- abre a barra de navegação -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!--Agrupamento Mobile-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuPublico" aria-expanded="false">
                    <span class="sr-only">Navegação Mobile</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">
                    <img src="images/logochurrascopequeno.png" alt="">
                </a>
            </div> <!--  Fecha agrupamento Mobile-->
           
            <!-- Nav Direita -->
            <div class="collapse navbar-collapse" id="menuPublico">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li><a href="index.php#destaques">Destaques</a></li>
                    <li><a href="index.php#produtos">Produtos</a></li>
                    <!--Dropdown-->
                    <li class="dropdown">
                        <a href="" 
                        class="dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Tipos <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Abre estrutura de repetição -->
                            <?php do { ?>
                                <li>
                                    <a href="produtos_por_tipo.php?id_tipo=<?php echo $linhaTipo['id_tipo'] ?>">
                                        <?php echo $linhaTipo['rotulo_tipo'] ?> 
                                    </a>
                                </li>
                                <?php } while ($linhaTipo=$listaTipos->fetch_assoc());?>
                                <!-- fecha estrutura de repetição -->  
                        </ul> <!-- fecha lista de tipo -->
                    </li>    <!--fecha Dropdown-->
                    <li><a href="index.php#contato">Contato</a></li>
                    <li>
                        <!-- formulário de busca -->
                        <form action="produtos_busca.php" 
                            method="get" 
                            name="form_busca"
                            id="form_busca"
                            class="navbar-form navbar-left"
                            role="search"
                            >
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" 
                                        class="form-control" 
                                        placeholder="Busca produto"
                                        name="buscar"
                                        id="buscar"
                                        size="9" required>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>  <!--  fecha inputp-group -->
                        </form>
                    </li>
                    <li class="active">
                        <a href="admin/index.php">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;Admin
                        </a>

                    </li>
                </ul>
            </div><!-- Fecha Nav Direita -->
        </div> <!-- Fecha container-fluid -->
    </nav><!-- Fecha barra de navegação -->
</body>
</html>
<?php mysqli_free_result($listaTipos);?>