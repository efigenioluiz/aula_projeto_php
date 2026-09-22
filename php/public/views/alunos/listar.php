<h2>Alunos</h2>

<a href="/alunos/criar.php" class="botao">+ Novo Aluno</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Matrícula</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($alunos as $aluno): ?>
        <tr>
            <td><?= htmlspecialchars($aluno['nome']) ?></td>
            <td><?= htmlspecialchars($aluno['matricula']) ?></td>
            <td><?= htmlspecialchars($aluno['email']) ?></td>
            <td class="acoes">
                <a href="/alunos/editar.php?id=<?= $aluno['id'] ?>">Editar</a>
                <a href="/alunos/excluir.php?id=<?= $aluno['id'] ?>" onclick="return confirm('Excluir este aluno?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
