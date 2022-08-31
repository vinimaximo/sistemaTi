<?php 
//A sessão será iniciada a cada página diferente
//Determinar o nível de acesso, se necessário
session_name('Chuleta');
if (!isset($_SESSION)){
    session_start();
}

//Verifica se há reserva logado na sessão
//Identifica o reserva
if(!isset($_SESSION['login_reserva'])){
    // Se não existir destruimos a sessão por segurança
    header("location: login_reserva.php");
    exit;
}
$nome_da_sessao = session_name();
// verifica o nome da sessão
if(!isset($_SESSION['nome_da_sessao'])OR($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
// se não existir, destruiremos a sessão por segurança
session_destroy("location: login_reserva.php");
exit;
}

// verificar se o login e valido
if(!isset($_SESSION['login_reserva'])){
//se não existir, destruiremos a sessão por segurança
session_destroy();
header("location: login_reserva.php");
exit;

}
?>