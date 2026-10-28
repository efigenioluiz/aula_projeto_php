<h2>Livros</h2>

<a href="/livros/criar.php" class="botao">+ Novo Livro</a>

<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>ISBN</th>
        <th>Disponível / Total</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= htmlspecialchars($livro['isbn']) ?></td>
            <td>
                <span class="<?= $livro['quantidade_disponivel'] > 0 ? 'status-disponivel' : 'status-indisponivel' ?>">
                    <?= $livro['quantidade_disponivel'] ?> / <?= $livro['quantidade_total'] ?>
                </span>
            </td>
            <td class="acoes">
                <a href="/livros/editar.php?id=<?= $livro['id'] ?>">Editar</a>
                <a href="/livros/excluir.php?id=<?= $livro['id'] ?>" onclick="return confirm('Excluir este livro?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
