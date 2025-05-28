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
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold text-gray-900">Pessoa</h1>
                        <p class="mt-2 text-sm text-gray-700">Listagem de pessoas cadastradas no sistema</p>
                    </div>
                    <div class="flex sm:flex-auto sm:justify-end gap-4">
                        <a class="mt-4 sm:mt-0 sm:flex-none" href="?controller=pessoa&action=create">
                            <button  type="button" class=" block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Adicionar pessoa</button>
                        </a>
                        <a class="mt-4 sm:mt-0 sm:flex-none" href="?controller=contato&action=list">
                            <button  type="button" class=" block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ver Contatos</button>
                        </a>
                    </div>
                </div>

                <div class="justify-end my-4 max-w-md">
                    <form method="get" action="" class="mb-6 flex items-center gap-2">
                        <input type="hidden" name="controller" value="pessoa">
                        <input type="hidden" name="action" value="list">
                        <input
                                type="text"
                                name="search"
                                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                                placeholder="Pesquisar por nome"
                                class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <button  type="button" class=" block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Pesquisar </button>
                    </form>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black/5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nome</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">CPF</th>
                                        <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-6">
                                            <span class="sr-only">Editar</span>
                                        </th>
                                        <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-6">
                                            <span class="sr-only">Deletar</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <?php foreach ($pessoas as $pessoa): ?>
                                        <tr>
                                            <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-gray-900 sm:pl-6"><?= htmlspecialchars($pessoa->getId()) ?></td>
                                            <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500"><?= htmlspecialchars($pessoa->getNome()) ?></td>
                                            <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500"><?= htmlspecialchars($pessoa->getFormatedCpf()) ?></td>
                                            <td class="relative py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-6">
                                                <a href="?controller=pessoa&action=edit&id=<?= htmlspecialchars($pessoa->getId()) ?>" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            </td>
                                            <td class="relative py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-6">
                                                <form method="post"
                                                      action="?controller=pessoa&action=delete&id=<?= htmlspecialchars($pessoa->getId()) ?>"
                                                      onsubmit="return confirm('Você quer mesmo deletar esse Contato?');">
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>