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
    <nav>
        <div class="nav-wrapper red darken-4">
            <a class="brand-logo"> Atualizar</a>
        </div>
     </nav>

        <div class="container">

        <div class="card-panel blue lighten-5">
        <?php
    include '../_app/conexao.php';
    $id = filter_input(INPUT_GET, 'eve_id', FILTER_DEFAULT);

    $sth = $pdo->prepare("select *from evento where eve_id = :eve_id");
    $sth->bindValue(":eve_id", $id, PDO::PARAM_INT);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    ?>

      <form name="cadastro" action="update.php" method="post"> 
      <input type="hidden" name="eve_id" value="<?= $eve_id; ?>" />
      <div class="row">
                    <form class="col s12" action="insert.php" method="post">
                        <div class="row">
                            <div class="input field col s6">
                                <label>DESCRIÇÃO</label>
                                <input type="text" name="eve_descricao" value="<?= $eve_descricao; ?>"/>
                            </div>

                            <div class="input field col s6">
                                <label>LOCAL</label>
                                <input type="text" name="eve_local"value="<?= $eve_local; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input field col s6">
                                <label>DATA</label>
                                <input id="eve_data" placehoLder="DD/MM/AA" type="text" name="eve_data" data-length="8" value="<?= $eve_data; ?>"/>
                            </div>

                            <div class="input field col s6">
                                <label>TÉRMINO DAS INSCRIÇÕES</label>
                                <input id="eve_termino" placehoLder="DD/MM/AA" type="text" name="eve_termino" data-length="8" value="<?= $eve_termino; ?>"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input field col s6">
                                <label>HORAS</label>
                                <input id="eve_horas" placehoLder="Ex. 18h00" type="text" name="eve_horas" data-length="5" value="<?= $eve_horas; ?>"/>
                            </div>

                            <input class="btn red darken-2" type="submit" value="ATUALIZAR" />
                            <a href="evento.php" class="waves-effect waves-light btn red darken-2">VOLTAR</a>    
                        </div>
                                                
      </form>

        </div>
        </div>

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