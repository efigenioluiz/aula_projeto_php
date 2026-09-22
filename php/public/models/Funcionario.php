<?php

class Funcionario {
    public $id;
    public $nome;
    public $usuario;
    public $senha;

    public $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Busca o funcionário pelo usuário e confere a senha com password_verify.
    // Retorna os dados do funcionário (sem a senha) em caso de sucesso, ou false.
    public function autenticar($usuario, $senha) {
        $query = "SELECT id, nome, usuario, senha FROM funcionario WHERE usuario = :usuario";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($funcionario && password_verify($senha, $funcionario['senha'])) {
            unset($funcionario['senha']);
            return $funcionario;
        }

        return false;
    }
}
