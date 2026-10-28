<?php
require_once __DIR__ . '/Livro.php';

/**
 * DESAFIO (Aula 3):
 * Este módulo une Aluno + Livro. As consultas de listagem já estão prontas
 * (usam JOIN para trazer o nome do aluno e o título do livro). O desafio é
 * implementar as duas regras de negócio principais: realizar() e devolver().
 */
class Emprestimo {
    public $id;
    public $aluno_id;
    public $livro_id;
    public $funcionario_id;
    public $data_emprestimo;
    public $data_devolucao_prevista;
    public $data_devolucao_real;
    public $status;

    public $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Já pronto: lista todos os empréstimos com nome do aluno e título do livro.
    public function listarTodos() {
        $query = "SELECT e.*, a.nome AS aluno_nome, l.titulo AS livro_titulo
                   FROM emprestimo e
                   JOIN aluno a ON a.id = e.aluno_id
                   JOIN livro l ON l.id = e.livro_id
                   ORDER BY e.data_emprestimo DESC";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Já pronto: lista os empréstimos de um aluno específico.
    public function listarPorAluno($aluno_id) {
        $query = "SELECT e.*, l.titulo AS livro_titulo
                   FROM emprestimo e
                   JOIN livro l ON l.id = e.livro_id
                   WHERE e.aluno_id = :aluno_id
                   ORDER BY e.data_emprestimo DESC";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':aluno_id', $aluno_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM emprestimo WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * TODO (desafio): Registrar um novo empréstimo.
     * Use $this->aluno_id, $this->livro_id e $this->funcionario_id, que já
     * chegam preenchidos pelo controller.
     *
     * Passos:
     *   1) Verifique se o livro tem quantidade_disponivel > 0 (use uma
     *      instância de Livro e o método buscarPorId($this->livro_id)).
     *      Se não tiver, retorne false e não faça mais nada.
     *   2) Insira a linha em `emprestimo` com:
     *        status = 'em_andamento'
     *        data_emprestimo = CURDATE()
     *        data_devolucao_prevista = DATE_ADD(CURDATE(), INTERVAL 7 DAY)
     *   3) Diminua em 1 a quantidade_disponivel do livro
     *      (dica: já existe o método atualizarDisponibilidade($id, $delta) em Livro.php).
     *   4) Retorne true se deu tudo certo.
     */
    public function realizar() {
        // $livroModel = new Livro($this->conexao);
        // $livro = $livroModel->buscarPorId($this->livro_id);
        //
        // if (!$livro || $livro['quantidade_disponivel'] <= 0) {
        //     return false;
        // }
        //
        // $query = "INSERT INTO emprestimo (...) VALUES (...)";
        // ...
        //
        // $livroModel->atualizarDisponibilidade($this->livro_id, -1);
        //
        // return true;

        return false;
    }

    /**
     * TODO (desafio): Registrar a devolução do empréstimo com o $id informado.
     *
     * Passos:
     *   1) Busque o empréstimo (buscarPorId) para descobrir o livro_id.
     *   2) Faça um UPDATE em `emprestimo` definindo:
     *        data_devolucao_real = CURDATE()
     *        status = 'devolvido'
     *      onde id = :id
     *   3) Aumente em 1 a quantidade_disponivel do livro correspondente
     *      (atualizarDisponibilidade($livro_id, +1)).
     */
    public function devolver($id) {
        // $emprestimo = $this->buscarPorId($id);
        //
        // $query = "UPDATE emprestimo SET ... WHERE id = :id";
        // ...
        //
        // $livroModel = new Livro($this->conexao);
        // $livroModel->atualizarDisponibilidade($emprestimo['livro_id'], 1);
    }
}
