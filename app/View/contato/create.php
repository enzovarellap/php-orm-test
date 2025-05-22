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
            <h1 class="text-2xl font-bold mb-6 text-center">Criar Contato</h1>
            <form method="post" action="?controller=contato&action=create" class="space-y-6">
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo:</label>
                    <select id="tipo" name="tipo" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecione</option>
                        <option value="1">Telefone</option>
                        <option value="0">Email</option>
                    </select>
                </div>
                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição:</label>
                    <input type="text" id="descricao" name="descricao" required
                           class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="pessoa_id" class="block text-sm font-medium text-gray-700 mb-1">Pessoa:</label>
                    <select id="pessoa_id" name="pessoa_id" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecione</option>
                        <?php foreach ($pessoas as $pessoa): ?>
                            <option value="<?= htmlspecialchars($pessoa->getId()) ?>"><?= htmlspecialchars($pessoa->getNome()) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Criar Contato
                </button>
            </form>
        </div>
    </div>
</body>
