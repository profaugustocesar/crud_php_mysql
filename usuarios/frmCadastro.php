<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center">

    <div class="col-6">

        <h3 class="my-3 d-flex justify-content-between">Cadastrar Usuário <a href="index.php" class="btn btn-secondary"><< Voltar</a> </h3>

        <hr>

        <form action="_inserir.php" method="POST">

            <div class="mb-3">
                <label for="txtNome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Digite o Nome" required>
            </div>

            <div class="mb-3">
                <label for="txtEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Digite o E-mail" required>
            </div>

            <div class="mb-3">
                <label for="txtSenha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Digite a Senha" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Dados</button>
            <button type="reset" class="btn btn-secondary">Limpar Dados</button>

        </form>    
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>