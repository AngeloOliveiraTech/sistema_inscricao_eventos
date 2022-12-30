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
    <title>Inscrições| Secretária Área Guará</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey darken-1">
    <nav>
        <div class="nav-wrapper red darken-4">
            <a class="brand-logo">Inscrições </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../adm/home_adm.php">Secretários</a></li>
                <li><a href="inscricoes.php">Inscrições</a></li>
                <li><a href="../evento/evento.php">Eventos</a></li>
                <li class="active"><a href="sair.php">Sair</a></li>
            </ul>
        </div>
     </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="../adm/home_adm.php">Secretários</a></li>
            <li><a href="inscricoes.php">Inscrições</a></li>
            <li><a href="../evento/evento.php">Eventos</a></li>
            <li class="active"><a href="sair.php">Sair</a></li>
        </ul>

        <div class="container">
          <div class="card-panel">
            <h5>Selecione a Igreja a Visualizar:</h5>
          </div>

          <div class="card-panel blue lighten-5">
          <span class="indigo-text"><h5>Guaratinguetá</h5></span>
          <div class="divider"></div>
          <ul class="collapsible popout active">
    <li class="active">
      <div class="collapsible-header"><i class="material-icons">home</i>Pedregulho</div>
      <div class="collapsible-body"><?php include 'select/pedregulho.php';?></div>
    </li>
    <li >
    <div class="collapsible-header"><i class="material-icons">place</i>Vila Molica</div>
      <div class="collapsible-body"><?php include 'select/vila_molica.php';?></div>
    </li>
    <li >
    <div class="collapsible-header"><i class="material-icons">home</i>Vila Paulista</div>
      <div class="collapsible-body"><?php include 'select/vila_paulista.php';?></div>
    </li>
    <li>
    <div class="collapsible-header"><i class="material-icons">place</i>Centro</div>
      <div class="collapsible-body"><?php include 'select/centro.php';?></div>
    </li>
    <li >
    <div class="collapsible-header"><i class="material-icons">home</i>Colônia</div>
      <div class="collapsible-body"><?php include 'select/colonia.php';?></div>
    </li>
  </ul>
          <br>
          <span class="indigo-text"><h5>Lorena</h5></span>
          <div class="divider"></div>
          <ul class="collapsible popout">
            <li>
              <div class="collapsible-header"><i class="material-icons">home</i>Lorena</div>
            <div class="collapsible-body"><?php include 'select/lorena.php';?></div>
            </li>
          </ul>

          <span class="indigo-text"><h5>Aparecida</h5></span>
          <div class="divider"></div>
          <ul class="collapsible popout">
            <li>
              <div class="collapsible-header"><i class="material-icons">place</i>Aparecida</div>
            <div class="collapsible-body"><?php include 'select/aparecida.php';?></div>
            </li>
          </ul>

          <span class="indigo-text"><h5>Piquete</h5></span>
          <div class="divider"></div>
          <ul class="collapsible popout">
            <li>
              <div class="collapsible-header"><i class="material-icons">place</i>Piquete</div>
            <div class="collapsible-body"><?php include 'select/piquete.php';?></div>
            </li>
          </ul>

          <span class="indigo-text"><h5>Cruzeiro</h5></span>
          <div class="divider"></div>
          <ul class="collapsible popout">
            <li>
              <div class="collapsible-header"><i class="material-icons">home</i>Cruzeiro</div>
            <div class="collapsible-body"><?php include 'select/cruzeiro.php';?></div>
            </li>
          </ul>

          <span class="indigo-text"><h5>Cunha</h5></span>
          <div class="divider"></div>
          <ul class="collapsible popout">
            <li>
              <div class="collapsible-header"><i class="material-icons">place</i>Cunha</div>
            <div class="collapsible-body"><?php include 'select/cunha.php';?></div>
            </li>
          </ul>

          <ul class="collapsible">
    <li class="active">
      <div class="collapsible-header"><i class="material-icons">account_circle</i>Cadastrar Novo Membro</div>
      <div class="collapsible-body">
      <form name="cadastro" action="insert.php" method="post"> 
        <div class="row">
            <div class="col m6 s6">
            <div class="input-field">
              <label> Nome </label>
              <input  name="ins_nome" type="text" >
              </div>

              <div class="input-field">
              <label for="input_number"> CPF </label>
              <input id="input_text" name="ins_cpf" type="text" data-length="11">
              </div>
            </div>

            <div class="col m6 s6">
            <label>Igreja</label>
                            <select class="browser-default" name="ins_igr_id">
                                        <?php
                                        include '../_app/conexao.php';
                                            $sth = $pdo->prepare(" SELECT * FROM igreja");
                                            $sth->execute();

                                        foreach ($sth as $res) {
                                        extract($res);
                                        echo '<option value="'.$igr_id.'">'.$igr_nome.'</option>';
                                        }
                                        ?>
                                    </select>
            <label>Evento</label>
            <select class="browser-default" name="ins_eve_id">
                                        <?php
                                        include '../_app/conexao.php';
                                            $sth = $pdo->prepare(" SELECT * FROM evento");
                                            $sth->execute();

                                        foreach ($sth as $res) {
                                        extract($res);
                                        echo '<option value="'.$eve_id.'">'.$eve_descricao.'</option>';
                                        }
                                        ?>
                                    </select>
            </div>
        </div>

        <input class="btn red darken-2" type="submit" value="CADASTRAR" />              
      </form>
      </div>
    </li>
            </ul>
          </div>
        <div>


        
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