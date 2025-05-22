<table border="2">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>CPF</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= htmlspecialchars($pessoa->getId()) ?></td>
            <td><?= htmlspecialchars($pessoa->getNome()) ?></td>
            <td><?= htmlspecialchars($pessoa->getFormatedCpf()) ?></td>
            <td>
                <a href="?controller=pessoa&action=edit&id=<?= htmlspecialchars($pessoa->getId()) ?>">
                    <button type="button">Editar</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>