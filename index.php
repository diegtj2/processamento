<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
             
                <h2><b>PROCESSAMENTO DE IMAGEM</b><span class="badge badge-secondary">BIOMETRIA</span></h2>
            </div>
          </div>
            </br>
           
            <div class="login">
                <p>
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
                <h3 class="well"> Login </h3>
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

                </p>
           
               
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Cadastre-se</a>
                </p>
                
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM usuarios ORDER BY usuario_id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['usuario_id'] . '</th>';
                            echo '<td>'. $row['user'] . '</td>';
                            echo '<td>'. $row['pass'] . '</td>';
                            echo '<td>'. $row['img'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['usuario_id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['usuario_id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['usuario_id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
             </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
