<?php
// Conexão com o banco de dados (substitua com suas configurações)
$host="sql313.infinityfree.com";
$user="if0_35431994";
$senha="SrPdyePoOSUW";
$bd="if0_35431994_uenp";

$conn = new mysqli($host, $user, $senha, $bd);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>