<?php
include '../_app/conexao.php';

$descricao = filter_input(INPUT_POST, 'eve_descricao', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'eve_data', FILTER_DEFAULT);
$horas = filter_input(INPUT_POST, 'eve_horas', FILTER_DEFAULT);
$termino = filter_input(INPUT_POST, 'eve_termino', FILTER_DEFAULT);
$local = filter_input(INPUT_POST, 'eve_local', FILTER_DEFAULT);

$sth = $pdo -> prepare ("INSERT INTO evento (eve_descricao, eve_data, eve_horas, eve_termino, eve_local) VALUES 
(:eve_descricao, :eve_data, :eve_horas, :eve_termino, :eve_local)"); 

$sth->bindValue(":eve_descricao", ($descricao));
$sth->bindValue(":eve_data", ($data));
$sth->bindValue(":eve_horas", ($horas));
$sth->bindValue(":eve_termino", ($termino));
$sth->bindValue(":eve_local", ($local));

$sth->execute();

echo $pdo->lastInsertId();
header ("LOCATION: evento.php");
?>