<?php
    require_once "Banco.php";
    require_once "Cliente.php";

    // $idade = $_POST['idade'];
    // $nome = $_POST['nome'];

    // echo "O nome no formulário é: ".$nome;
    // echo "<br>";
    // echo "A idade no formulário é: ". $idade;

    $banco = new Banco();
    $conexao =  $banco->conectar();

    $cliente = new Cliente($conexao);
    $cliente->nome = 'luiz';
    $cliente->telefone = '400228922';
    $cliente->email = 'professor@email.com';
    $cliente->cpf = '4444';

    $cliente->create();
?>