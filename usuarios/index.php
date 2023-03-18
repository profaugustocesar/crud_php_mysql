<?php

    require_once '../core/conexao.php';

    if (!isset($_GET['buscaUsuario'])) {
        $sql = $pdo->prepare('SELECT * FROM usuarios');
    } else {
        $sql = $pdo->prepare('SELECT * FROM usuarios WHERE nome LIKE :nome');
        $sql->bindValue(':nome','%'.$_GET['buscaUsuario'].'%');
    }

    $sql->execute();
    $usuarios = $sql->fetchAll();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center">

    <div class="col-6">

        <h3 class="my-3 d-flex justify-content-between">Usuários <a href="frmCadastro.php" class="btn btn-primary">Novo Usuário</a> </h3>

        <hr>

            <form action="index.php">
                
                <div class="row">
                    <div class="col">
                        <?php
                            if (isset($_GET['buscaUsuario'])) {
                                $dadosBusca = filter_input(INPUT_GET,'buscaUsuario',FILTER_SANITIZE_SPECIAL_CHARS);
                            } else {
                                $dadosBusca = '';
                            }
                        ?>
                        <input class="form-control" type="text" id="buscaUsuario" name="buscaUsuario" placeholder="Buscar Usuário" value="<?php echo $dadosBusca; ?>" autocomplete="off">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-secondary">Buscar</button>
                        <a href="index.php" class="btn btn-light">Limpar Busca</a>
                    </div>
                </div>
                
            </form>

        <hr>

        <table class="table table-striped">

            <thead>
                <th>#ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Operações</th>
            </thead>

            <tbody>
                
                <?php foreach ($usuarios as $usuario) { ?>

                    <tr>
                        <td><?php echo $usuario->id; ?></td>
                        <td>
                            <a href="frmEdicao.php?id=<?php echo $usuario->id; ?>">
                                <?php echo $usuario->nome; ?>
                            </a>
                        </td>
                        <td><?php echo $usuario->email; ?></td>
                        <td>
                            <a href="frmEdicao.php?id=<?php echo $usuario->id; ?>" class="btn btn-sm btn-secondary">Editar</a> 
                            <a href="_deletar.php?id=<?php echo $usuario->id; ?>" class="btn btn-sm btn-danger">Deletar</a>
                        </td>
                    </tr>

                <?php } ?>
                
            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>