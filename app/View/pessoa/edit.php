<form method="post" action="?controller=pessoa&action=edit&id=<?= htmlspecialchars($pessoa->getId()) ?>">
    <label for="nome">Name:</label>
    <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($pessoa->getNome()) ?>">
    <br>
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required pattern="\d{11}" value="<?= htmlspecialchars($pessoa->getCpf()) ?>">
    <br>
    <button type="submit">Update Pessoa</button>
</form>