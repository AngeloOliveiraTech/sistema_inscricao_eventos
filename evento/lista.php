<?php

session_start();

if(!$_SESSION['Ped']):
    header("Location: ../index.php");
    die;
endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Inscrição| Secretária Área Guará</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey darken-1">
        <br>
        <div class="container">
            <div class="card-panel blue lighten-5">
            <?php

include '../_app/conexao.php';
$id = filter_input(INPUT_GET, 'eve_id', FILTER_DEFAULT);

// Prepara a query de select
$sth = $pdo->prepare("select * from  inscricoes i
                    INNER JOIN evento e on e.eve_id = i.ins_eve_id
                    INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                    INNER JOIN _status s on s.sta_id = i.ins_sta_id
                    WHERE eve_id = :eve_id ORDER by i.ins_nome");
$sth->bindValue(":eve_id", $id, PDO::PARAM_INT);
$sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
echo '<h5> Evento: '.$eve_descricao.'</h5>';
echo '<div class="divider"></div>';
echo '<br>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> CPF </th>';
echo '<th> Igreja </th>';
echo '<th> Status </th>';
echo '</tr>';
$sth = $pdo->prepare("select * from  inscricoes i
                    INNER JOIN evento e on e.eve_id = i.ins_eve_id
                    INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                    INNER JOIN _status s on s.sta_id = i.ins_sta_id
                    WHERE eve_id = :eve_id ORDER by i.ins_nome");
$sth->bindValue(":eve_id", $id, PDO::PARAM_INT);
$sth->execute();

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td> '.$ins_id.' </td>';
    echo '<td> '.$ins_nome.' </td>';
    echo '<td> '.$ins_cpf.' </td>';
    echo '<td> '.$igr_nome.' </td>';
    echo '<td> '.$sta_descricao.' </td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' registros</p>';

?>
            <a href="evento.php" class="waves-effect waves-light btn red darken-2">VOLTAR</a>
            
            </div>
        </div>
    </body>

    <script type="text/javascript" src="../_app/js/jquery-3.3.1.min.js" ></script>

    <script type="text/javascript" src="../_app/js/materialize.min.js"></script>

    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  
  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
  </script>
</html>