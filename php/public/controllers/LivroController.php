<?php
require_once __DIR__ . '/../config/Banco.php';
require_once __DIR__ . '/../models/Livro.php';

class LivroController {

    private $conexao;

    public function __construct() {
        $banco = new Banco();
        $this->conexao = $banco->conectar();
    }

    public function index() {
        $livroModel = new Livro($this->conexao);
        $livros = $livroModel->listarTodos();

        $titulo = 'Livros';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/livros/listar.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function criar() {
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $livro = new Livro($this->conexao);
            $livro->titulo = $_POST['titulo'];
            $livro->autor = $_POST['autor'];
            $livro->isbn = $_POST['isbn'];
            $livro->quantidade_total = (int) $_POST['quantidade_total'];
            $livro->quantidade_disponivel = (int) $_POST['quantidade_total'];

            $livro->create();

            header('Location: /livros/index.php');
            exit;
        }

        $livro = null;
        $titulo = 'Novo Livro';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/livros/form.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function editar($id) {
        $livroModel = new Livro($this->conexao);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $livroModel->id = $id;
            $livroModel->titulo = $_POST['titulo'];
            $livroModel->autor = $_POST['autor'];
            $livroModel->isbn = $_POST['isbn'];
            $livroModel->quantidade_total = (int) $_POST['quantidade_total'];

            $livroModel->atualizar();

            header('Location: /livros/index.php');
            exit;
        }

        $livro = $livroModel->buscarPorId($id);
        $titulo = 'Editar Livro';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/livros/form.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function excluir($id) {
        $livroModel = new Livro($this->conexao);
        $livroModel->excluir($id);

        header('Location: /livros/index.php');
        exit;
    }
}
