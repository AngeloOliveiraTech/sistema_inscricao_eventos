<?php

include '../_app/conexao.php';

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
    <title>Eventos| Secretária Área Guará</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey darken-1">
    <nav>
        <div class="nav-wrapper red darken-4">
            <a class="brand-logo"> Inscrições </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../adm/home_adm.php">Secretários</a></li>
                <li><a href="../inscricoes/inscricoes.php">Inscrições</a></li>
                <li><a href="evento.php">Eventos</a></li>
                <li class="active"><a href="sair.php">Sair</a></li>
            </ul>
        </div>
     </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="../adm/home_adm.php">Secretários</a></li>
            <li><a href="../inscricoes/inscricoes.php">Inscrições</a></li>
            <li><a href="evento.php">Eventos</a></li>
            <li class="active"><a href="sair.php">Sair</a></li>
        </ul>

        <div class="container">
            <div class="card-panel">
                <h5>Eventos da Área:</h5>
            </div>
            <div class="card-panel blue lighten-5">
            <?php

include '../_app/conexao.php';
// Prepara a query de select
$sth = $pdo->prepare("select * from evento ORDER by eve_descricao");
//Executa
$sth->execute();
echo '<h6>' .$sth->rowCount() .'  Eventos Cadastrados </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> ID </th>';
echo '<th> Descrição </th>';
echo '<th> Data </th>';
echo '<th> Horas </th>';
echo '<th> Término/Inscrições </th>';
echo '<th> Local </th>';
echo '</tr>';

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td> '.$eve_id.' </td>';
    echo '<td> '.$eve_descricao.' </td>';
    echo '<td> '.$eve_data.' </td>';
    echo '<td> '.$eve_horas.' </td>';
    echo '<td> '.$eve_termino.' </td>';
    echo '<td> '.$eve_local.' </td>';
    echo '<td>';
    echo '<a href="delete.php?eve_id='.$eve_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
    echo '<a href="formulario_update.php?eve_id='.$eve_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
    echo '<a href="lista.php?eve_id='.$eve_id.'"> <i class="material-icons blue-text"> list </i> </a> ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' registros</p>';

?>

        <ul class="collapsible popout">
            <li >
            <div class="collapsible-header"><i class="material-icons">account_circle</i>Cadastro de Eventos | **Campo Obrigatório**</div>
            <div class="collapsible-body">
                <div class="row">
                    <form class="col s12" action="insert.php" method="post">
                        <div class="row">
                            <div class="input field col s6">
                                <label>DESCRIÇÃO</label>
                                <input type="text" name="eve_descricao"/>
                            </div>

                            <div class="input field col s6">
                                <label>LOCAL</label>
                                <input type="text" name="eve_local"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input field col s6">
                                <label>DATA</label>
                                <input id="eve_data" placehoLder="DD/MM/AA" type="text" name="eve_data" data-length="8"/>
                            </div>

                            <div class="input field col s6">
                                <label>TÉRMINO DAS INSCRIÇÕES</label>
                                <input id="eve_termino" placehoLder="DD/MM/AA" type="text" name="eve_termino" data-length="8"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input field col s6">
                                <label>HORAS</label>
                                <input id="eve_horas" placehoLder="Ex. 18h00" type="text" name="eve_horas" data-length="5"/>
                            </div>

                            <input class="btn red darken-2" type="submit" value="CADASTRAR" />
                        </div>
                    </form>
                </div>
            </div>
            </li>
        </ul>
            </div>

        
        </div>


        <div class="container">
        <footer class="page-footer grey darken-4">
          <div class="footer-copyright red accent-4">
            <div class="container">
              <div class="row">
                  <div class="col m9 s12valign-wrapper">
                      © 2020 Todos os direitos reservados. Igreja Cristã Maranata
                  </div> 
                  <div class="col m3 s12 offset-12">
                  <i class="material-icons">wifi_tethering</i> 
                  ARGO Sites |v1.0
                  </div>
              </div>               
            </div>
          </div>
        </footer>
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