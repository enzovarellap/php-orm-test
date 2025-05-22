<?php if (!empty($error)): ?>
    <div style="color:red;"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post">
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="">Selecione</option>
        <option value="1">Telefone</option>
        <option value="0">Email</option>
    </select>
    <br>
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>
    <br>
    <label for="pessoa_id">Pessoa:</label>
    <select id="pessoa_id" name="pessoa_id" required>
        <option value="">Selecione</option>
        <?php foreach ($pessoas as $pessoa): ?>
            <option value="<?= htmlspecialchars($pessoa->getId()) ?>">
                <?= htmlspecialchars($pessoa->getNome()) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type="submit">Criar Contato</button>
</form>
