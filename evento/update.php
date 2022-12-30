<?php
include '../_app/conexao.php';

$id = filter_input(INPUT_POST, 'eve_id', FILTER_DEFAULT);
$descricao = filter_input(INPUT_POST, 'eve_descricao', FILTER_DEFAULT);
$local = filter_input(INPUT_POST, 'eve_local', FILTER_DEFAULT);
$data = filter_input(INPUT_POST, 'eve_data', FILTER_DEFAULT);
$termino = filter_input(INPUT_POST, 'eve_termino', FILTER_DEFAULT);
$horas = filter_input(INPUT_POST, 'eve_horas', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE evento SET eve_descricao = :eve_descricao, eve_local = :eve_local, eve_data = :eve_data, eve_termino = :eve_termino,
eve_horas = :eve_horas WHERE eve_id = :eve_id");
$sth->bindValue(":eve_id", ($id));
$sth->bindValue(":eve_descricao",($descricao));
$sth->bindValue(":eve_local", ($local));
$sth->bindValue(":eve_data", ($data));
$sth->bindValue(":eve_termino", ($termino));
$sth->bindValue(":eve_horas", ($horas));
$sth->execute();
header ("LOCATION: evento.php");