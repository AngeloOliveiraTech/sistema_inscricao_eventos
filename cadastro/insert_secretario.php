<?php
include '../_app/conexao.php';

$nome= filter_input(INPUT_POST, 'sec_nome', FILTER_DEFAULT);
$igreja= filter_input(INPUT_POST, 'sec_igr_id', FILTER_DEFAULT);
$email= filter_input(INPUT_POST, 'sec_email', FILTER_DEFAULT);
$senha= filter_input(INPUT_POST, 'sec_senha', FILTER_DEFAULT);
$tipo = 2;
$novasenha = MD5($senha);

$sth = $pdo -> prepare ("INSERT INTO secretario (sec_nome, sec_igr_id, sec_email, sec_senha, sec_tip_id) VALUES 
(:sec_nome, :sec_igr_id, :sec_email, :sec_senha, :sec_tip_id)"); 

$sth->bindValue(":sec_nome", ($nome));
$sth->bindValue(":sec_igr_id", ($igreja));
$sth->bindValue(":sec_email", ($email));
$sth->bindValue(":sec_senha", ($novasenha));
$sth->bindValue(":sec_tip_id", ($tipo));

$sth->execute();

echo $pdo->lastInsertId();
header ("LOCATION: confirme.php");
?>