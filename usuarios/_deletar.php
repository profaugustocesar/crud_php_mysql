<?php

    require_once '../core/conexao.php';

    // Array para guardar as mensagens de erro
    $erros = array();


    // Verifica se o ID NÃO existe na URL OU se ele está vazio ***********************************
    if (!isset($_GET['id']) or empty($_GET['id'])) {

        header('Location:index.php');

    } else {

        // Verifica se o CONFIRMADO existe na URL e se ele é igual a 1 **************************
        if ( isset($_GET['confirmado']) and $_GET['confirmado'] == 1 ) {
            
            // Realiza a operação de DELETE no BD ***************************************
                try {
                            
                    $delete = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
                    $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
                    $delete->bindValue(':id', $id);
                    
                    if ($delete->execute()) {
                        header('Location:index.php');
                    }

                } catch (PDOException $e) {
                    array_push($erros,"<strong>Erro ao deletar o USUÁRIO do Banco de Dados:</strong> ".$e->getMessage());
                }
            // **************************************************************************

        }
        // ***************************************************************************************

    } 
    // *************************************************************************************************

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center">

    <div class="col-6 my-5 bg-body-secondary rounded text-danger p-3">

        <?php if (count($erros) > 0) { ?>

            <h5>Erro:</h5>
            <hr>

            <?php foreach ($erros as $erro) { ?>

                <p>- <?php echo $erro;?></p>

            <?php } ?>

            <a href="index.php"><< Voltar para a tela inicial</a>

        <?php } else { ?>

            <h5>Deseja mesmo excluir o Usuário?</h5>
            <hr>

            <a href="index.php" class="btn btn-secondary">Não</a>
            <a href="_deletar.php?id=<?php echo filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT); ?>&confirmado=1" class="btn btn-danger">Sim</a> 

        <?php } ?>
    </div>

</body>
</html>