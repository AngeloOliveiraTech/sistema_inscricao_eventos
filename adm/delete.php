<?php
include '../_app/conexao.php';

$id = filter_input(INPUT_GET, 'sec_id', FILTER_DEFAULT);
$sth = $pdo->prepare("DELETE from secretario where sec_id = :id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
header ("LOCATION: home_adm.php");