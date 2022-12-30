<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Secretária Área Guará</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey darken-1">
        <div class="container">
            <br>
            <div class="card-panel">
                <span class="indigo-text"><h4>Cadastre-se como Secretário Local</h4></span>
                <div class="divider"></div>
                <form name="cadastro" action="insert_secretario.php" method="post"> 
                    <div class="card-panel grey lighten-2">
                        <div class="input-field">
                            <label>Nome Completo</label>
                            <input type="text" name="sec_nome"/>
                        </div>
                    </div>

                    <div class="card-panel grey lighten-2">
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
                    </div>

                    <div class="card-panel grey lighten-2">
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="sec_email"/>
                        </div>
                    </div>

                    <div class="card-panel grey lighten-2">
                        <div class="input-field">
                            <label>Senha</label>
                            <input type="password" name="sec_senha"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col m4">
                        </div>
                        <div class="col m4">
                        <input class="btn red darken-2" type="submit" value="CADASTRAR" />
                    <a href="../index.php" class="waves-effect waves-light btn red darken-2">VOLTAR</a>
                        </div>
                        <div class="col m4">
                        </div>
                    </div>
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
</html>