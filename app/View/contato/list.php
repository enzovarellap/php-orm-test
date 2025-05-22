<table border="2">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Pessoa</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contatos as $contao): ?>
        <tr>
            <td><?= htmlspecialchars($contao->getId()) ?></td>
            <td><?= htmlspecialchars($contao->getFormatedTipo()) ?></td>
            <td><?= htmlspecialchars($contao->getDescricao()) ?></td>
            <td><?= htmlspecialchars($contao->getPessoa()->getNome()) ?></td>
            <td>
                <a href="?controller=pessoa&action=edit&id=<?= htmlspecialchars($contao->getId()) ?>">
                    <button type="button">Editar</button>
                </a>
                <form method="post" action="?controller=pessoa&action=delete&id=<?= htmlspecialchars($contao->getId()) ?>" style="display:inline;" onsubmit="return confirm('Você quer mesmo deletar essa Pessoa?');">
                    <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>