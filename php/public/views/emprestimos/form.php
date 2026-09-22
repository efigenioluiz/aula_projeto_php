<h2><?= $titulo ?></h2>

<?php if (!empty($erro)): ?>
    <div class="alerta alerta-erro"><?= htmlspecialchars($erro) ?></div>
<?php endif; ?>

<form method="POST">
    <label for="aluno_id">Aluno</label>
    <select name="aluno_id" id="aluno_id" required>
        <option value="">Selecione...</option>
        <?php foreach ($alunos as $aluno): ?>
            <option value="<?= $aluno['id'] ?>"><?= htmlspecialchars($aluno['nome']) ?> (<?= htmlspecialchars($aluno['matricula']) ?>)</option>
        <?php endforeach; ?>
    </select>

    <label for="livro_id">Livro disponível</label>
    <select name="livro_id" id="livro_id" required>
        <option value="">Selecione...</option>
        <?php foreach ($livrosDisponiveis as $livro): ?>
            <option value="<?= $livro['id'] ?>"><?= htmlspecialchars($livro['titulo']) ?> (<?= $livro['quantidade_disponivel'] ?> disponível(is))</option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Confirmar Empréstimo</button>
</form>
