<?php

class Livro {
    public $id;
    public $titulo;
    public $autor;
    public $isbn;
    public $quantidade_total;
    public $quantidade_disponivel;

    public $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function create() {
        $query = "INSERT INTO livro (titulo, autor, isbn, quantidade_total, quantidade_disponivel)
                   VALUES (:titulo, :autor, :isbn, :quantidade_total, :quantidade_disponivel)";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':quantidade_total', $this->quantidade_total);
        $stmt->bindParam(':quantidade_disponivel', $this->quantidade_disponivel);

        $stmt->execute();
    }

    public function listarTodos() {
        $query = "SELECT * FROM livro ORDER BY titulo";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarDisponiveis() {
        $query = "SELECT * FROM livro WHERE quantidade_disponivel > 0 ORDER BY titulo";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM livro WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ATIVIDADE EM SALA (Aula 1 - vamos fazer juntos):
    // Complete o UPDATE para atualizar titulo, autor, isbn e quantidade_total
    // do livro com o :id informado. Dica: siga o mesmo padrão do create().
    public function atualizar() {
        $query = "UPDATE livro
                   SET titulo = :titulo,
                       -- TODO: adicione aqui os outros campos (autor, isbn, quantidade_total)
                   WHERE id = :id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        // TODO: bindParam dos outros campos
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
    }

    public function excluir($id) {
        $query = "DELETE FROM livro WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Usado pelo módulo de Empréstimos para dar baixa/devolver um exemplar.
    public function atualizarDisponibilidade($id, $delta) {
        $query = "UPDATE livro SET quantidade_disponivel = quantidade_disponivel + :delta WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':delta', $delta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
