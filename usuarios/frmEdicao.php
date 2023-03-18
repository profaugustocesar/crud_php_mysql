<?php

    require_once '../core/conexao.php';

    // Array para guardar as mensagens de erro
    $erros = array();

    // Verifica se NÃO existe o parâmetro id na URL ou se ele está vazio
    if (!isset($_GET['id']) or empty($_GET['id'])) {
        
        array_push($erros, 'Usuário não encontrado!');

    } else {
        
        // Realiza um SELECT buscando os dados do usuário pelo ID ***********************
            try {
                            
                $select = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
                $select->bindValue(':id',filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
                $select->execute();
                $encontrado = $select->rowCount();

                if ( $encontrado > 0 ) {
                    $usuario = $select->fetch();
                } else {
                    array_push($erros, 'Usuário não encontrado!');
                }

            } catch (PDOException $e) {
                array_push($erros,"<strong>Erro ao buscar os dados do Usuário no Banco de Dados:</strong> ".$e->getMessage());
            }
        // ******************************************************************************

    }

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center">


    <?php if (count($erros) > 0) { ?>

        <div class="col-6 my-5 bg-body-secondary rounded text-danger p-3">
            <h5>Erro:</h5>
            <hr>

            <?php foreach ($erros as $erro) { ?>

                <p>- <?php echo $erro;?></p>

            <?php } ?>

            <a href="index.php"><< Voltar para a tela inicial</a>
            
        </div>

    <?php } else { ?>

        <div class="col-6">

            <h3 class="my-3 d-flex justify-content-between">Editar Usuário <a href="index.php" class="btn btn-secondary"><< Voltar</a> </h3>

            <hr>

            <form action="_atualizar.php" method="POST">

                <input type="hidden" name="txtId" value="<?php echo $usuario->id; ?>">

                <div class="mb-3">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Digite o Nome" value="<?php echo $usuario->nome; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="txtEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Digite o E-mail" value="<?php echo $usuario->email; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="txtSenha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Digite a Senha" value="">
                </div>

                <button type="submit" class="btn btn-primary">Salvar Dados</button>

            </form>    
            
        </div>

    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>