<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Secretária Área Guará</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="_app/css/materialize.min.css"  media="screen,projection"/>
</head>
    <body class="grey darken-1">
        <div class="container">
            <div class="card-panel" style="margin-top: 10%;">
                <span class="indigo-text"><h4>Sistema de Informação de Inscrições | Área Guará</h4></span>
                <div class="divider"></div>
                    <div class="card-panel  grey lighten-2">
                        <div class="row">
                            <div class="col m7">
                                <h5>Faça o Seu Login</h5>
                                <br>
                                <form name="login" action="validar.php" method="post">

                                    <div class="input-field">
                                        <label>E-Mail</label>
                                        <input type="text" name="sec_email"/>
                                    </div>

                                    <div class="input-field">
                                        <label>Senha</label>
                                        <input type="password" name="sec_senha"/>
                                    </div>
                                    <!--<label>Tipo de Secretário:</label>
                                    <select class="browser-default" name="sec_tip_id">-->
                                        <!--<//?php
                                        include '_app/conexao.php';
                                            $sth = $pdo->prepare(" SELECT * FROM tipo_secretario");
                                            $sth->execute();

                                        foreach ($sth as $res) {
                                        extract($res);
                                        echo '<option value="'.$tip_id.'">'.$tip_descricao.'</option>';
                                        }
                                        ?>
                                    </select>-->
                                    <br>
                                    <br>
                                    <input class="btn red darken-2" type="submit" value="Logar" />
                                    <!--<a href="cadastro/cadastro.php" class="waves-effect waves-light btn red darken-2">CADASTRE-SE</a>-->
                                    <a class="waves-effect waves-light btn red darken-2 modal-trigger" href="#modal1">AJUDA</a>

                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <span class="red-text text-accent-4"><h4>Sistema de Inscrições | Área Guará</h4></span>
                                                <p class="flow-text">Suporte: (12)988355238 - Whatsapp</p>
                                                <!--<p class="flow-text">1° Secretários das Igrejas, Apertar CADASTRE-SE.</p>
                                                <p class="flow-text">2° Preencher todos os Dados, Apertar CADASTRAR.</p>
                                                <p class="flow-text">3° Após cadastrar, aperte em "Fazer Login"</p>-->
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-red btn-flat">ENTENDIDO</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col m5">
                                <img class="responsive-img" src="img/icm_logo_1.jfif" >
                            </div>
                        </div>
                    </div>
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

<script type="text/javascript" src="_app/js/jquery-3.3.1.min.js" ></script>

<script type="text/javascript" src="_app/js/materialize.min.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });

</script>
</html>