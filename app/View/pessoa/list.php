<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-3xl bg-white rounded-lg shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Pessoas</h1>
        <div class="flex justify-end mb-4">
            <a href="?controller=pessoa&action=create">
                <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Criar Pessoa
                </button>
            </a>
        </div>
        <table class="min-w-full border border-gray-300 rounded">
            <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">CPF</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pessoas as $pessoa): ?>
                <tr class="text-center border-b hover:bg-gray-50">
                    <td class="py-2 px-4"><?= htmlspecialchars($pessoa->getId()) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($pessoa->getNome()) ?></td>
                    <td class="py-2 px-4"><?= htmlspecialchars($pessoa->getFormatedCpf()) ?></td>
                    <td class="py-2 px-4 flex justify-center gap-2">
                        <a href="?controller=pessoa&action=edit&id=<?= htmlspecialchars($pessoa->getId()) ?>">
                            <button type="button"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar
                            </button>
                        </a>
                        <form method="post"
                              action="?controller=pessoa&action=delete&id=<?= htmlspecialchars($pessoa->getId()) ?>"
                              onsubmit="return confirm('Você quer mesmo deletar essa Pessoa?');">
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>