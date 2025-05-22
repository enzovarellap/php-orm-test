<form method="post" action="?controller=pessoa&action=create">
    <label for="nome">Name:</label>
    <input type="text" id="nome" name="nome" required>
    <br>
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required pattern="\d{11}">
    <br>
    <button type="submit">Create Pessoa</button>
</form>