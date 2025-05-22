<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<?php if (isset($error)): ?>
    <div class="mb-4 text-red-600 text-center font-semibold">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Editar Pessoa</h1>
        <form method="post" action="?controller=pessoa&action=edit&id=<?= htmlspecialchars($pessoa->getId()) ?>"
              class="space-y-6">
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Name:</label>
                <input type="text" id="nome" name="nome" required
                       value="<?= htmlspecialchars($pessoa->getNome()) ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF:</label>
                <input type="text" id="cpf" name="cpf" required pattern="\d{11}"
                       value="<?= htmlspecialchars($pessoa->getCpf()) ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit"
                    class="w-full bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                Salvar Alterações
            </button>
        </form>
    </div>
</div>
<body>