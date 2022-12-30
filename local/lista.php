<?php
include '../_app/conexao.php';

$id = filter_input(INPUT_GET, 'ins_id', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE inscricoes set ins_presenca = 1 where ins_id = :ins_id");
$sth->bindValue(":ins_id", ($id));
$sth->execute();
header ("LOCATION: home_local.php");