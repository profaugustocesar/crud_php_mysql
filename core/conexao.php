<?php

    // Define o fuso horário adequado
    date_default_timezone_set('America/Sao_Paulo');

    // Dados de acesso ao Banco de Dados
    $servidor = 'localhost';
    $bancoDados = 'curso';
    $usuario = 'root';
    $senha = '';


    // Cria uma conexão com o Banco de Dados
    try {
        
        $pdo = new PDO("mysql:host=$servidor;dbname=$bancoDados", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    } catch(PDOException $erro) {
        
        echo 'Erro ao conectar ao banco de dados: ' . $erro->getMessage();    
        
    }