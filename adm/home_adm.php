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
    <title>Página do Administrador| Secretária Área Guará</title>
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
                <li><a href="home_adm.php">Secretários</a></li>
                <li><a href="../inscricoes/inscricoes.php">Inscrições</a></li>
                <li><a href="../evento/evento.php">Eventos</a></li>
                <li class="active"><a href="sair.php">Sair</a></li>
            </ul>
        </div>
     </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="home_adm.php">Secretários</a></li>
            <li><a href="../inscricoes/inscricoes.php">Inscrições</a></li>
            <li><a href="../evento/evento.php">Eventos</a></li>
            <li class="active"><a href="sair.php">Sair</a></li>
        </ul>

        <div class="container">
            <div class="card-panel">
                <?php
                echo '<h5>Seja Bem-Vindo, '. $_SESSION['Ped']['sec_email'].', ao Sistema de Inscrições.</h5>'; 
                ?>
            </div>
            <div class="card-panel  blue lighten-5">
            <?php

include '../_app/conexao.php';
// Prepara a query de select
$sth = $pdo->prepare("select * from  secretario s
                     INNER JOIN igreja i on i.igr_id = s.sec_igr_id
                     INNER JOIN tipo_secretario t on t.tip_id = s.sec_tip_id
                     WHERE tip_id = 2 ORDER by i.igr_nome");
//Executa
$sth->execute();
echo '<h6>' .$sth->rowCount() .'  Secretários Cadastrados </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> Igreja </th>';
echo '<th> E-Mail </th>';
echo '<th> Tipo </th>';
echo '</tr>';

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td> '.$sec_id.' </td>';
    echo '<td> '.$sec_nome.' </td>';
    echo '<td> '.$igr_nome.' </td>';
    echo '<td> '.$sec_email.' </td>';
    echo '<td> '.$tip_descricao.' </td>';
    echo '<td>';
    echo '<a href="delete.php?sec_id='.$sec_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
    echo '<a href="formulario_update.php?sec_id='.$sec_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' registros</p>';

?>
            
            <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">account_circle</i>Cadastrar Novo Secretário</div>
      <div class="collapsible-body">
      <form name="cadastro" action="insert.php" method="post"> 
                    
                        <div class="input-field">
                            <label>Nome Completo</label>
                            <input type="text" name="sec_nome"/>
                        </div>
                

                    
                            <label>Igreja</label>
                            <select class="browser-default" name="sec_igr_id">
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
                  

                    
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="sec_email"/>
                        </div>
                   

                  
                        <div class="input-field">
                            <label>Senha</label>
                            <input type="password" name="sec_senha"/>
                        </div>
              

                   
                        <input class="btn red darken-2" type="submit" value="CADASTRAR" />
                       
                    </div>
                </form>
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
    </script>
</html>

