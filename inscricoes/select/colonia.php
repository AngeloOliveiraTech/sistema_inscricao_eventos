<?php

include '../_app/conexao.php';
// Prepara a query de select
$sth = $pdo->prepare("select * from  inscricoes i
                    INNER JOIN evento e on e.eve_id = i.ins_eve_id
                    INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                    INNER JOIN _status s on s.sta_id = i.ins_sta_id
                    WHERE igr_id = 5 ORDER by i.ins_nome");
//Executa
$sth->execute();
echo '<h6>' .$sth->rowCount() .'  Membros Cadastrados </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> CPF </th>';
echo '<th> Evento </th>';
echo '<th> Igreja </th>';
echo '<th> Status </th>';
echo '</tr>';

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td> '.$ins_id.' </td>';
    echo '<td> '.$ins_nome.' </td>';
    echo '<td> '.$ins_cpf.' </td>';
    echo '<td> '.$eve_descricao.' </td>';
    echo '<td> '.$igr_nome.' </td>';
    echo '<td> '.$sta_descricao.' </td>';
    echo '<td>';
    echo '<a href="delete.php?ins_id='.$ins_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
    echo '<a href="formulario_update.php?ins_id='.$ins_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' registros</p>';

?>