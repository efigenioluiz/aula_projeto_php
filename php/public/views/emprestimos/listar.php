<h2>Empréstimos</h2>

<a href="/emprestimos/criar.php" class="botao">+ Novo Empréstimo</a>

<table>
    <tr>
        <th>Aluno</th>
        <th>Livro</th>
        <th>Data Empréstimo</th>
        <th>Devolução Prevista</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($emprestimos as $emprestimo): ?>
        <tr>
            <td><?= htmlspecialchars($emprestimo['aluno_nome']) ?></td>
            <td><?= htmlspecialchars($emprestimo['livro_titulo']) ?></td>
            <td><?= htmlspecialchars($emprestimo['data_emprestimo']) ?></td>
            <td><?= htmlspecialchars($emprestimo['data_devolucao_prevista']) ?></td>
            <td>
                <?php if ($emprestimo['status'] === 'em_andamento'): ?>
                    <span class="status-indisponivel">Em andamento</span>
                <?php else: ?>
                    <span class="status-disponivel">Devolvido</span>
                <?php endif; ?>
            </td>
            <td class="acoes">
                <?php if ($emprestimo['status'] === 'em_andamento'): ?>
                    <a href="/emprestimos/devolver.php?id=<?= $emprestimo['id'] ?>">Registrar devolução</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
