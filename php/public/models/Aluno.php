<?php

/**
 * ATIVIDADE EM SALA (Aula 2):
 * Complete os métodos abaixo seguindo exatamente o mesmo padrão usado em
 * models/Livro.php (que já está pronto e funcionando). A tabela `aluno`
 * já existe no banco (veja database/schema.sql) com as colunas:
 * id, nome, matricula, email.
 */
class Aluno {
    public $id;
    public $nome;
    public $matricula;
    public $email;

    public $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // TODO: Insira um novo aluno na tabela `aluno` usando os atributos
    // $this->nome, $this->matricula e $this->email.
    // Dica: olhe o método create() em models/Livro.php.
    public function create() {
        // $query = "INSERT INTO aluno (nome, matricula, email) VALUES (:nome, :matricula, :email)";
        // ...
    }

    // TODO: Retorne todos os alunos cadastrados, ordenados por nome.
    public function listarTodos() {
        // $query = "SELECT * FROM aluno ORDER BY nome";
        // ...
        return [];
    }

    // TODO: Retorne os dados de um único aluno a partir do $id.
    public function buscarPorId($id) {
        // ...
    }

    // TODO: Atualize nome, matricula e email do aluno com o $this->id informado.
    public function atualizar() {
        // ...
    }

    // TODO: Remova o aluno com o $id informado.
    public function excluir($id) {
        // ...
    }
}
