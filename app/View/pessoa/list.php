
<table border="2">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>CPF</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= htmlspecialchars($pessoa->getId()) ?></td>
            <td><?= htmlspecialchars($pessoa->getNome()) ?></td>
            <td><?= htmlspecialchars($pessoa->getFormatedCpf()) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>