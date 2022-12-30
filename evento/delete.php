<?php
include '../_app/conexao.php';

$id = filter_input(INPUT_GET, 'eve_id', FILTER_DEFAULT);
$sth = $pdo->prepare("DELETE from evento where eve_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
header ("LOCATION: evento.php");