<?php
include '../_app/conexao.php';

$id = filter_input(INPUT_POST, 'ins_id', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'ins_nome', FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST, 'ins_cpf', FILTER_DEFAULT);


$sth = $pdo->prepare("UPDATE inscricoes set ins_nome = :ins_nome , ins_cpf = :ins_cpf where ins_id = :ins_id");
$sth->bindValue(":ins_id", ($id));
$sth->bindValue(":ins_nome",($nome));
$sth->bindValue(":ins_cpf", ($cpf));
$sth->execute();
header ("LOCATION: home_local.php");