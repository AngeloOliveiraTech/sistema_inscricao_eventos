<?php

session_start();
include '_app/conexao.php';
$email = filter_input(INPUT_POST, 'sec_email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'sec_senha', FILTER_DEFAULT);
//$nivel = filter_input(INPUT_POST, 'sec_tip_id' , FILTER_DEFAULT);
$novasenha = MD5($senha);

$sth = $pdo->prepare("SELECT sec_tip_id FROM secretario WHERE sec_email LIKE :sec_email");
$sth->bindValue(":sec_email", ($email));
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
foreach ($sth as $res) {
    extract($res);
    $sec_tip_id;
}
//echo $sec_tip_id;
if ($sec_tip_id == 1) {
    $sth = $pdo->prepare('SELECT *FROM secretario where sec_email = :sec_email and sec_senha = :sec_senha and sec_tip_id = :sec_tip_id');
    $sth->bindValue(':sec_email', $email);
    $sth->bindValue(':sec_senha', $novasenha);
    $sth->bindValue(':sec_tip_id', $sec_tip_id);
    $sth->execute();
    if ($sth->rowCount() > 0):
        $_SESSION['Ped']['sec_email'] = $email;
        $_SESSION['Ped']['sec_senha'] = $senha;
        $_SESSION['Ped']['sec_tip_id'] = $sec_tip_id;
        header('LOCATION: adm/home_adm.php'); 
      else:   
        header('LOCATION: index.php ');
    endif;
} else {
    $sth = $pdo->prepare('SELECT *FROM secretario where sec_email = :sec_email and sec_senha = :sec_senha and sec_tip_id = :sec_tip_id');
    $sth->bindValue(':sec_email', $email);
    $sth->bindValue(':sec_senha', $novasenha);
    $sth->bindValue(':sec_tip_id', $sec_tip_id);
    $sth->execute();
    if ($sth->rowCount() > 0):
        $_SESSION['Ped']['sec_email'] = $email;
        $_SESSION['Ped']['sec_senha'] = $senha;
        $_SESSION['Ped']['sec_tip_id'] = $sec_tip_id;
        header('LOCATION: local/home_local.php'); 
      else:
        header('LOCATION: index.php ');
endif;
}
?>