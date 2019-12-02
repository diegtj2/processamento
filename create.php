<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Cadastre-se</title>
</head>

<body>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Cadastro </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">

                <div class="control-group <?php echo !empty($userErro)?'error ' : '';?>">
                    <label class="control-label">User</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="user" type="text" placeholder="Digite seu usuário" required="" value="<?php echo !empty($user)?$user: '';?>">
                        <?php if(!empty($userErro)): ?>
                            <span class="help-inline"><?php echo $nomeUser;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($passErro)?'error ': '';?>">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="pass" type="text" placeholder="Digite sua senha" required="" value="<?php echo !empty($pass)?$pass: '';?>">
                        <?php if(!empty($passErro)): ?>
                            <span class="help-inline"><?php echo $passErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($imgErro)?'error ': '';?>">
                    <label class="control-label">Imagem</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="img" type="file" placeholder="Imagem" required="" value="<?php echo !empty($img)?$img: '';?>">
                        <?php if(!empty($imgErro)): ?>
                            <span class="help-inline"><?php echo $imgErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                

                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <a href="index.php" type="btn" class="btn btn-default">Voltar</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php
    require 'banco.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $userErro = null;
        $passErro = null;
        $imgErro = null;
        

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $img = "";

        if(isset($_FILES['img'])){

            $extensao = strtolower(substr($_FILES['img']['name'], -4));

            $novo_name = md5(time()).$extensao;
            $diretorio = "upload/";

            $img = move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$novo_name);
        }

        // $img = $_FILES['img'];

        //Validaçao dos campos:
        $validacao = true;
        if(empty($user))
        {
            $userErro = 'Por favor digite o seu usuario!';
            $validacao = false;
        }

        if(empty($pass))
        {
            $passErro = 'Por favor digite sua senha!';
            $validacao = false;
        }

        if(empty($img))
        {
            $imgErro = 'Por favor insira sua imagem!';
            $validacao = false;
        }


        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios(user, pass, img) VALUES(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($user,$pass,$img));
            echo "Cadastrado com sucesso!";
            Banco::desconectar();
            header("Location: index.php");
        }
    }
?>
