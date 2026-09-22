<h2><?= $titulo ?></h2>

<form method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($aluno['nome'] ?? '') ?>" required>

    <label for="matricula">Matrícula</label>
    <input type="text" name="matricula" id="matricula" value="<?= htmlspecialchars($aluno['matricula'] ?? '') ?>" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($aluno['email'] ?? '') ?>">

    <button type="submit">Salvar</button>
</form>
