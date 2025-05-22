
<?php foreach ($pessoas as $pessoa): ?>
    <div>
        <?= htmlspecialchars($pessoa->getNome()) ?> - <?= htmlspecialchars($pessoa->getCpf()) ?>
    </div>
<?php endforeach; ?>