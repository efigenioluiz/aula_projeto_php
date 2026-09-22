<?php
require_once __DIR__ . '/../config/Banco.php';
require_once __DIR__ . '/../models/Emprestimo.php';
require_once __DIR__ . '/../models/Aluno.php';
require_once __DIR__ . '/../models/Livro.php';

class EmprestimoController {

    private $conexao;

    public function __construct() {
        $banco = new Banco();
        $this->conexao = $banco->conectar();
    }

    public function index() {
        $emprestimoModel = new Emprestimo($this->conexao);
        $emprestimos = $emprestimoModel->listarTodos();

        $titulo = 'Empréstimos';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/emprestimos/listar.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function criar() {
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $emprestimo = new Emprestimo($this->conexao);
            $emprestimo->aluno_id = (int) $_POST['aluno_id'];
            $emprestimo->livro_id = (int) $_POST['livro_id'];
            $emprestimo->funcionario_id = (int) $_SESSION['funcionario_id'];

            $sucesso = $emprestimo->realizar();

            if ($sucesso) {
                header('Location: /emprestimos/index.php');
                exit;
            }

            $erro = 'Não foi possível realizar o empréstimo (livro indisponível ou método ainda não implementado).';
        }

        $alunoModel = new Aluno($this->conexao);
        $livroModel = new Livro($this->conexao);

        $alunos = $alunoModel->listarTodos();
        $livrosDisponiveis = $livroModel->listarDisponiveis();

        $titulo = 'Novo Empréstimo';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/emprestimos/form.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function devolver($id) {
        $emprestimoModel = new Emprestimo($this->conexao);
        $emprestimoModel->devolver($id);

        header('Location: /emprestimos/index.php');
        exit;
    }
}
