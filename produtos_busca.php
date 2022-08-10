<?php 
include('connections/conn.php');

$busca_user = $_GET['buscar'];
//echo "<h1>Voce digitou na busca: ".$busca_user."</h1>";
$consulta = "select * from vw_tbprodutos where descri_produto like '%".$busca_user."%' order by descri_produto asc ";
$lista = $conn->query ($consulta);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;
?>
    
     <table>
        <?php do {?>
            <tr>
                <td> <?php echo $linha['descri_produto'] ?> </td>
                <td> <?php echo $linha['valor_produto'] ?></td>
            </tr>
            <?php } while($linha=$lista->fetch_assoc())?>
    </table> 
 