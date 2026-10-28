<?php
require_once __DIR__ . '/../config/Banco.php';
require_once __DIR__ . '/../models/Funcionario.php';

class AuthController {

    public function login() {
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $banco = new Banco();
            $conexao = $banco->conectar();

            $funcionario = new Funcionario($conexao);
            $dados = $funcionario->autenticar($usuario, $senha);

            if ($dados) {
                $_SESSION['funcionario_id'] = $dados['id'];
                $_SESSION['funcionario_nome'] = $dados['nome'];
                header('Location: /index.php');
                exit;
            }

            $erro = 'Usuário ou senha inválidos.';
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login.php');
        exit;
    }

    // Usada no topo de toda página protegida para exigir login.
    public static function exigirLogin() {
        if (empty($_SESSION['funcionario_id'])) {
            header('Location: /login.php');
            exit;
        }
    }
}
