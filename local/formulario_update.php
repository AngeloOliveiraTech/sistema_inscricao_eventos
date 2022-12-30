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
    $id = filter_input(INPUT_GET, 'ins_id', FILTER_DEFAULT);

    $sth = $pdo->prepare("select *from inscricoes where ins_id = :ins_id");
    $sth->bindValue(":ins_id", $id, PDO::PARAM_INT);
    $sth->execute();
    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
    extract($resultado);

    ?>

      <form name="cadastro" action="update.php" method="post"> 
      <input type="hidden" name="ins_id" value="<?= $ins_id; ?>" />
            <div class="col m6 s6">
            <div class="input-field">
              <label> Nome </label>
              <input  name="ins_nome" type="text" value="<?= $ins_nome; ?>">
              </div>

              <div class="input-field">
              <label for="input_number"> CPF </label>
              <input id="input_text" name="ins_cpf" type="text" data-length="11" value="<?= $ins_cpf; ?>">

            </div>

            <div class="col m6 s6">
            <!--<label>Igreja</label>-->
                            <!--<select class="browser-default" name="ins_igr_id">
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
                                    </select>-->
            <!--<label>Evento</label>-->
            <!--<select class="browser-default" name="ins_eve_id">
                                        <?php
                                        include '../_app/conexao.php';
                                            $sth = $pdo->prepare(" SELECT * FROM evento");
                                            $sth->execute();

                                        foreach ($sth as $res) {
                                        extract($res);
                                        echo '<option value="'.$eve_id.'">'.$eve_descricao.'</option>';
                                        }
                                        ?>
                                    </select>-->
            </div>
        </div>
                                        
        <input class="btn red darken-2" type="submit" value="ATUALIZAR" />
        <a href="home_local.php" class="waves-effect waves-light btn red darken-2">VOLTAR</a>              
      </form>

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