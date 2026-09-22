<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
AuthController::exigirLogin();

$titulo = 'Início';
require __DIR__ . '/views/layout/header.php';
?>

<h2>Bem-vindo(a), <?= htmlspecialchars($_SESSION['funcionario_nome']) ?>!</h2>
<p>Escolha o que deseja gerenciar:</p>

<div class="menu-cards">
    <a href="/livros/index.php">📚 Livros</a>
    <a href="/alunos/index.php">🧑‍🎓 Alunos</a>
    <a href="/emprestimos/index.php">🔄 Empréstimos</a>
</div>

<?php require __DIR__ . '/views/layout/footer.php'; ?>
