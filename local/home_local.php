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
    <title>Página do Secretário Local| Secretária Área Guará</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey darken-1">
    <nav>
        <div class="nav-wrapper red darken-4">
            <a class="brand-logo"> Inscrições Local | Área Guará</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="sair.php">Sair</a></li>
            </ul>
        </div>
     </nav>
    
        <ul class="sidenav" id="mobile-demo">
            <li class="active"><a href="sair.php">Sair</a></li>
        </ul>

        <!--INTERFACE DO PC -->
        <div class="hide-on-small-only container">
        <div class="card-panel">
                <?php
                echo '<h5>Seja Bem-Vindo, '. $_SESSION['Ped']['sec_email'].', ao Sistema de Inscrições.</h5>'; 
                ?>
            </div>
        <div class="card-panel">
          <?php

          include '../_app/conexao.php';
          $email = $_SESSION['Ped']['sec_email'];    
          $sth = $pdo->prepare("select igr_nome from  secretario s
          INNER JOIN igreja i on i.igr_id = s.sec_igr_id
          WHERE sec_email LIKE :sec_email");
          $sth->bindValue(":sec_email", ($email));
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
          echo '<h5>Igreja Local: '.$igr_nome.'</h5>';
          ?>
        </div>

        <div class="card-panel blue lighten-5">

        <?php

        include '../_app/conexao.php';


        $email = $_SESSION['Ped']['sec_email'];    
        $sth = $pdo->prepare("select igr_id from  secretario s
        INNER JOIN igreja i on i.igr_id = s.sec_igr_id
        WHERE sec_email LIKE :sec_email");
        $sth->bindValue(":sec_email", ($email));
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);

        //SELECT DA TABELA
        $sth = $pdo->prepare("select * from inscricoes i
                            INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                            INNER JOIN evento e on e.eve_id = i.ins_eve_id
                            INNER JOIN _status s on s.sta_id = i.ins_sta_id
                            WHERE g.igr_id = :igr_id AND i.ins_presenca = 2 ORDER by ins_nome");
        $sth->bindValue(":igr_id", ($igr_id));
        $sth->execute();
echo '<h6>' .$sth->rowCount() .'  Inscrições Realizadas </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> </th>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> CPF </th>';
echo '<th> Evento </th>';
echo '<th> Término/Inscrições </th>';
echo '<th> Igreja </th>';
echo '<th> Status </th>';
echo '</tr>';

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td>';
    echo '<a href="lista.php?ins_id='.$ins_id.'"> <i class="material-icons"> person </i> </a> ';
    echo '</td>';
    echo '<td>'.$ins_id.' </td>';
    echo '<td> '.$ins_nome.' </td>';
    echo '<td> '.$ins_cpf.' </td>';
    echo '<td> '.$eve_descricao.' </td>';
    echo '<td> '.$eve_termino.' </td>';
    echo '<td> '.$igr_nome.' </td>';
    echo '<td> '.$sta_descricao.' </td>';
    echo '<td>';
    //echo '<a href="delete.php?ins_id='.$ins_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
    //echo '<a href="formulario_update.php?ins_id='.$ins_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' registros</p>';

?>

  <ul class="collapsible">
      <li class="active">
          <div class="collapsible-header"><i class="material-icons">beenhere</i>Listagem de Membros Presentes</div>
          <div class="collapsible-body">
          <?php

        include '../_app/conexao.php';


        $email = $_SESSION['Ped']['sec_email'];    
        $sth = $pdo->prepare("select igr_id from  secretario s
        INNER JOIN igreja i on i.igr_id = s.sec_igr_id
        WHERE sec_email LIKE :sec_email");
        $sth->bindValue(":sec_email", ($email));
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);

        //SELECT DA TABELA
        $sth = $pdo->prepare("select * from inscricoes i
                            INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                            INNER JOIN evento e on e.eve_id = i.ins_eve_id
                            INNER JOIN _status s on s.sta_id = i.ins_sta_id
                            WHERE g.igr_id = :igr_id AND i.ins_presenca = 1 ORDER by ins_nome");
        $sth->bindValue(":igr_id", ($igr_id));
        $sth->execute();
echo '<h6>' .$sth->rowCount() .' Membros Presentes no Evento </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> CPF </th>';
echo '<th> Evento </th>';
echo '<th> Igreja </th>';
echo '</tr>';

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td>'.$ins_id.' </td>';
    echo '<td> '.$ins_nome.' </td>';
    echo '<td> '.$ins_cpf.' </td>';
    echo '<td> '.$eve_descricao.' </td>';
    echo '<td> '.$igr_nome.' </td>';
    echo '<td>';
    //echo '<a href="delete.php?ins_id='.$ins_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
    //echo '<a href="formulario_update.php?ins_id='.$ins_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' presentes</p>';

?>
          </div>
      </li>
  </ul>






<div class="divider"></div>
<ul class="collapsible-disable">
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
          
                                        $email = $_SESSION['Ped']['sec_email'];    
                                        $sth = $pdo->prepare("select igr_id from  secretario s
                                        INNER JOIN igreja i on i.igr_id = s.sec_igr_id
                                        WHERE sec_email LIKE :sec_email");
                                        $sth->bindValue(":sec_email", ($email));
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
        </div>


        <div class="hide-on-small-only container">
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


        <!--INTERFACE CELULAR-->


        <div class="hide-on-large-only">
        <div class="card-panel">
                <?php
                echo '<h5>Seja Bem-Vindo, '. $_SESSION['Ped']['sec_email'].', ao Sistema de Inscrições.</h5>'; 
                ?>
            </div>
        <div class="card-panel">
          <?php

          include '../_app/conexao.php';
          $email = $_SESSION['Ped']['sec_email'];    
          $sth = $pdo->prepare("select igr_nome from  secretario s
          INNER JOIN igreja i on i.igr_id = s.sec_igr_id
          WHERE sec_email LIKE :sec_email");
          $sth->bindValue(":sec_email", ($email));
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);
          echo '<h5>Igreja Local: '.$igr_nome.'</h5>';
          ?>
        </div>

        <div class="card-panel blue lighten-5">

        <?php

        include '../_app/conexao.php';


        $email = $_SESSION['Ped']['sec_email'];    
        $sth = $pdo->prepare("select igr_id from  secretario s
        INNER JOIN igreja i on i.igr_id = s.sec_igr_id
        WHERE sec_email LIKE :sec_email");
        $sth->bindValue(":sec_email", ($email));
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);

        //SELECT DA TABELA
        $sth = $pdo->prepare("select * from inscricoes i
                            INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                            INNER JOIN evento e on e.eve_id = i.ins_eve_id
                            INNER JOIN _status s on s.sta_id = i.ins_sta_id
                            WHERE g.igr_id = :igr_id AND i.ins_presenca = 2 ORDER by ins_nome");
        $sth->bindValue(":igr_id", ($igr_id));
        $sth->execute();
echo '<h6>' .$sth->rowCount() .'  Inscrições Realizadas </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> </th>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> CPF </th>';
echo '<th> Evento </th>';
echo '<th> Término/Inscrições </th>';
echo '<th> Igreja </th>';
echo '<th> Status </th>';
echo '</tr>';

foreach ($sth as $res) {
    extract($res);

    echo '<tr>';
    echo '<td>';
    echo '<a href="lista.php?ins_id='.$ins_id.'"> <i class="material-icons"> person </i> </a> ';
    echo '</td>';
    echo '<td>'.$ins_id.' </td>';
    echo '<td> '.$ins_nome.' </td>';
    echo '<td> '.$ins_cpf.' </td>';
    echo '<td> '.$eve_descricao.' </td>';
    echo '<td> '.$eve_termino.' </td>';
    echo '<td> '.$igr_nome.' </td>';
    echo '<td> '.$sta_descricao.' </td>';
    echo '<td>';
    //echo '<a href="delete.php?ins_id='.$ins_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
    //echo '<a href="formulario_update.php?ins_id='.$ins_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' registros</p>';

?>

  <ul class="collapsible">
      <li class="active">
          <div class="collapsible-header"><i class="material-icons">beenhere</i>Listagem de Membros Presentes</div>
          <div class="collapsible-body">
          <?php

include '../_app/conexao.php';


$email = $_SESSION['Ped']['sec_email'];    
$sth = $pdo->prepare("select igr_id from  secretario s
INNER JOIN igreja i on i.igr_id = s.sec_igr_id
WHERE sec_email LIKE :sec_email");
$sth->bindValue(":sec_email", ($email));
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

//SELECT DA TABELA
$sth = $pdo->prepare("select * from inscricoes i
                    INNER JOIN igreja g on g.igr_id = i.ins_igr_id
                    INNER JOIN evento e on e.eve_id = i.ins_eve_id
                    INNER JOIN _status s on s.sta_id = i.ins_sta_id
                    WHERE g.igr_id = :igr_id AND i.ins_presenca = 1 ORDER by ins_nome");
$sth->bindValue(":igr_id", ($igr_id));
$sth->execute();
echo '<h6>' .$sth->rowCount() .' Membros Presentes no Evento </h6>';
echo '<table class="striped">';

echo '<tr>';
echo '<th> ID </th>';
echo '<th> Nome </th>';
echo '<th> CPF </th>';
echo '<th> Evento </th>';
echo '<th> Igreja </th>';
echo '</tr>';

foreach ($sth as $res) {
extract($res);

echo '<tr>';
echo '<td>'.$ins_id.' </td>';
echo '<td> '.$ins_nome.' </td>';
echo '<td> '.$ins_cpf.' </td>';
echo '<td> '.$eve_descricao.' </td>';
echo '<td> '.$igr_nome.' </td>';
echo '<td>';
//echo '<a href="delete.php?ins_id='.$ins_id.'"> <i class="material-icons red-text"> clear </i> </a> ';
//echo '<a href="formulario_update.php?ins_id='.$ins_id.'"> <i class="material-icons blue-text"> cached </i> </a> ';
echo '</td>';
echo '</tr>';
}

echo '</table>';
echo '<hr><p>Existem: ' . $sth->rowCount() . ' presentes</p>';

?>
          </div>
      </li>
  </ul>






<div class="divider"></div>
<ul class="collapsible-disable">
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
          
                                        $email = $_SESSION['Ped']['sec_email'];    
                                        $sth = $pdo->prepare("select igr_id from  secretario s
                                        INNER JOIN igreja i on i.igr_id = s.sec_igr_id
                                        WHERE sec_email LIKE :sec_email");
                                        $sth->bindValue(":sec_email", ($email));
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
        </div>


        <div class="hide-on-large-only">
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