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
                <h2>BIOMETRIA<span class="badge badge-secondary">PROCESSAMENTO DE IMAGEM</span></h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Cadastre-se</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Imagem</th>
                        </tr>
                    </thead>
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
