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
    <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?= htmlspecialchars($contato->getId()) ?></td>
            <td><?= htmlspecialchars($contato->getFormatedTipo()) ?></td>
            <td><?= htmlspecialchars($contato->getDescricao()) ?></td>
            <td><?= htmlspecialchars($contato->getPessoa()->getNome()) ?></td>
            <td>
                <a href="?controller=contato&action=edit&id=<?= htmlspecialchars($contato->getId()) ?>">
                    <button type="button">Editar</button>
                </a>
                <form method="post" action="?controller=contato&action=delete&id=<?= htmlspecialchars($contato->getId()) ?>" style="display:inline;" onsubmit="return confirm('Você quer mesmo deletar esse Contato?');">
                    <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>