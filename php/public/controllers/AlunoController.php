<?php
require_once __DIR__ . '/../config/Banco.php';
require_once __DIR__ . '/../models/Aluno.php';

class AlunoController {

    private $conexao;

    public function __construct() {
        $banco = new Banco();
        $this->conexao = $banco->conectar();
    }

    public function index() {
        $alunoModel = new Aluno($this->conexao);
        $alunos = $alunoModel->listarTodos();

        $titulo = 'Alunos';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/alunos/listar.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aluno = new Aluno($this->conexao);
            $aluno->nome = $_POST['nome'];
            $aluno->matricula = $_POST['matricula'];
            $aluno->email = $_POST['email'];

            $aluno->create();

            header('Location: /alunos/index.php');
            exit;
        }

        $aluno = null;
        $titulo = 'Novo Aluno';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/alunos/form.php';
        require __DIR__ . '/../views/layout/footer.php';

    }

    public function editar($id) {
        $alunoModel = new Aluno($this->conexao);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $alunoModel->id = $id;
            $alunoModel->nome = $_POST['nome'];
            $alunoModel->matricula = $_POST['matricula'];
            $alunoModel->email = $_POST['email'];

            $alunoModel->atualizar();

            header('Location: /alunos/index.php');
            exit;
        }

        $aluno = $alunoModel->buscarPorId($id);
        $titulo = 'Editar Aluno';
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . '/../views/alunos/form.php';
        require __DIR__ . '/../views/layout/footer.php';
    }

    public function excluir($id) {
        $alunoModel = new Aluno($this->conexao);
        $alunoModel->excluir($id);

        header('Location: /alunos/index.php');
        exit;
    }
}
