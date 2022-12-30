<?php

include '../_app/conexao.php';

$nome = filter_input(INPUT_POST, 'ins_nome', FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST, 'ins_cpf', FILTER_DEFAULT);
$evento = filter_input(INPUT_POST, 'ins_eve_id', FILTER_DEFAULT);
$igreja = filter_input(INPUT_POST, 'ins_igr_id', FILTER_DEFAULT);
$status = 1;
$presenca = 2;
                    
$sth = $pdo -> prepare ("INSERT INTO inscricoes (ins_nome,  ins_cpf, ins_eve_id, ins_igr_id, ins_sta_id, ins_presenca) VALUES 
(:ins_nome, :ins_cpf, :ins_eve_id, :ins_igr_id, :ins_sta_id, :ins_presenca)"); 

$sth->bindValue(":ins_nome", ($nome));
$sth->bindValue(":ins_cpf", ($cpf));
$sth->bindValue(":ins_eve_id", ($evento));
$sth->bindValue(":ins_igr_id", ($igreja));
$sth->bindValue(":ins_sta_id", ($status));
$sth->bindValue(":ins_presenca", ($presenca));

$sth->execute();

echo $pdo->lastInsertId();
header ("LOCATION: inscricoes.php");
?>