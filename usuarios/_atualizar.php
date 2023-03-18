<?php

    require_once '../core/conexao.php';

    
    // Array para guardar as mensagens de erro
    $erros = array();



    // Verifica se o método utilizado no envio do formulário foi o POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        // Sanitiza e Valida campo txtID *****************************************************

            if (isset($_POST['txtId']) and !empty($_POST['txtId'])) {
                //Retirei todas as tags primeiro
                $txtId = strip_tags($_POST['txtId']);
                //Depois filtrei com o filtro de caracteres especiais
                $txtId = filter_var($txtId, FILTER_SANITIZE_NUMBER_INT);
            } else {
                array_push($erros, 'ID do usuário faltando');
            }

        // **************************************************************************************



        // Sanitiza e Valida campo txtNOME *****************************************************

            if (isset($_POST['txtNome']) and !empty($_POST['txtNome'])) {
                //Retirei todas as tags primeiro
                $txtNome = strip_tags($_POST['txtNome']);
                //Depois filtrei com o filtro de caracteres especiais
                $txtNome = filter_var($txtNome, FILTER_SANITIZE_SPECIAL_CHARS);
            } else {
                array_push($erros, 'Preencha o campo NOME');
            }

        // **************************************************************************************

        


        // Sanitiza e Valida campo txtEmail ***************************************************
            if (isset($_POST['txtEmail']) and !empty($_POST['txtEmail'])) {
                //Retirei todas as tags primeiro
                $txtEmail = strip_tags($_POST['txtEmail']);
                //Depois filtrei com o filtro para sanitizar o E-MAIL
                $txtEmail = filter_var($txtEmail, FILTER_SANITIZE_EMAIL);
                //Em seguida valido o e-mail

                if (!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) {
                    array_push($erros, 'O E-MAIL digitado é inválido');
                }
            } else {
                array_push($erros, 'Preencha o campo E-MAIL');
            }
        // **************************************************************************************




        // Sanitiza e Valida campo txtSenha *****************************************************
            if (isset($_POST['txtSenha']) and !empty($_POST['txtSenha'])) {
                $txtSenha = filter_input(INPUT_POST, 'txtSenha', FILTER_SANITIZE_SPECIAL_CHARS);

                if (strlen($txtSenha) < 6) {
                    array_push($erros, 'A SENHA deve ter no mínimo 6 caracteres');
                } else {
                    $salt = uniqid();
                    $txtSenha = password_hash($txtSenha . $salt, PASSWORD_DEFAULT);
                }

            }
        // **************************************************************************************




        // Se a sanitização e validação não tiveram erros  **************************************
            if (count($erros) == 0) {
                
                // Realiza a operação de UPDATE no BD *******************************************
                    try {
                        
                        if (isset($_POST['txtSenha']) and !empty($_POST['txtSenha'])) {
                            $update = $pdo->prepare('UPDATE usuarios SET nome=:nome, email=:email, senha=:senha WHERE id=:id');
                            $update->bindValue(':id',$txtId);
                            $update->bindValue(':nome',$txtNome);
                            $update->bindValue(':email',$txtEmail);
                            $update->bindValue(':senha',$txtSenha);
                        } else {
                            $update = $pdo->prepare('UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id');
                            $update->bindValue(':id',$txtId);
                            $update->bindValue(':nome',$txtNome);
                            $update->bindValue(':email',$txtEmail);
                        }
                        
                        if ($update->execute()) {
                            header('Location:index.php');
                        }

                    } catch (PDOException $e) {
                        array_push($erros,"<strong>Erro ao atualizar o USUÁRIO no Banco de Dados:</strong> ".$e->getMessage());
                    }
                // ******************************************************************************
                     
            }
        // **************************************************************************************
        
    } else {
        array_push($erros,'Requisição Inválida!');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center">

    <div class="col-6 my-5 bg-body-secondary rounded text-danger p-3">
        <h5>Erro:</h5>
        <hr>

        <?php foreach ($erros as $erro) { ?>

            <p>- <?php echo $erro;?></p>

        <?php } ?>

        <a href="javascript:history.back();"><< Voltar para a tela de edição</a>
        
    </div>

</body>
</html>