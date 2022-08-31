<?php
//Incluindo sistema de autenticação
include('acesso_com.php');

//Incluindo conexão com banco de dados
include('../connections/conn.php');

$id_res = $_GET['id_reserva'];

//Removendo Usando músculos (Força Bruta)
$query = "delete from tbreserva where id_reserva = $id_res;";

//Removendo(mais ou menoss) Usando metodo de acumular (Vai que precisa outra hora)
// $query = "delete from tbreserva set deletado = default where id_reserva = $id_res;";


$resultado = $conn->query($query);
if (mysqli_insert_id($conn)) {
    header("location:reserva_lista.php");
} else {
    header("location:reserva_lista.php");
}
