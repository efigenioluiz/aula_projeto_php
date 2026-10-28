<?php $titulo = 'Login'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<main style="max-width: 380px; margin-top: 80px;">
    <h2>Login do Funcionário</h2>

    <?php if (!empty($erro)): ?>
        <div class="alerta alerta-erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="POST" action="/login.php">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit">Entrar</button>
    </form>

    <!-- <p style="margin-top:15px; font-size:13px; color:#666;">Usuário de teste: admin / 1234</p> -->
</main>

</body>
</html>
