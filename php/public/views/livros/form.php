<h2><?= $titulo ?></h2>

<?php if (!empty($erro)): ?>
    <div class="alerta alerta-erro"><?= htmlspecialchars($erro) ?></div>
<?php endif; ?>

<form method="POST">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($livro['titulo'] ?? '') ?>" required>

    <label for="autor">Autor</label>
    <input type="text" name="autor" id="autor" value="<?= htmlspecialchars($livro['autor'] ?? '') ?>" required>

    <label for="isbn">ISBN</label>
    <input type="text" name="isbn" id="isbn" value="<?= htmlspecialchars($livro['isbn'] ?? '') ?>">

    <label for="quantidade_total">Quantidade de exemplares</label>
    <input type="number" min="1" name="quantidade_total" id="quantidade_total" value="<?= htmlspecialchars($livro['quantidade_total'] ?? 1) ?>" required>

    <button type="submit">Salvar</button>
</form>
