<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?? 'Biblioteca' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
    <h1>Sistema de Empréstimos da Biblioteca</h1>
    <?php if (!empty($_SESSION['funcionario_id'])): ?>
        <nav>
            <a href="/index.php">Início</a>
            <a href="/livros/index.php">Livros</a>
            <a href="/alunos/index.php">Alunos</a>
            <a href="/emprestimos/index.php">Empréstimos</a>
            <a href="/logout.php">Sair (<?= htmlspecialchars($_SESSION['funcionario_nome']) ?>)</a>
        </nav>
    <?php endif; ?>
</header>

<main>
