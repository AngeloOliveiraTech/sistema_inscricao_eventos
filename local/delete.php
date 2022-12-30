<?php
include '../_app/conexao.php';

$id = filter_input(INPUT_GET, 'ins_id', FILTER_DEFAULT);
$sth = $pdo->prepare("DELETE from inscricoes where ins_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
header ("LOCATION: home_local.php");