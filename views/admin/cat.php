<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mt-20 mb-20 relative overflow-x-auto">
    <form method="post" action="/admin/category/create" class="ml-5">
        <div class="flex flex-col md:flex-row md:space-x-3 mb-3">
            <div class="w-1/2">
                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400" for="libelle">Libellé</label>
                <input
                        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                        id="libelle" name="libelle" type="text" placeholder="Libellé" aria-label="Libellé"/>
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-3 mb-3">
            <div class="w-1/2">
                <button type="submit"
                        class="block w-full px-4 py-2 mt-6 text-base font-semibold text-center text-white transition duration-200 ease-in bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                    Ajouter
                </button>
            </div>
        </div>
    </form>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3">ID</th>
            <th class="px-6 py-3">Libellé</th>
            <th class="px-6 py-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['categories'] as $category) { ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $category->getId(); ?></td>
                <td class="px-6 py-4"><?php echo $category->getLibelle() ?></td>
                <td class="px-6 py-4">
                    <a href="/admin/category/edit?id=<?php echo $category->Getid(); ?>"
                       class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
                    <a href="/admin/category/delete?id=<?php echo $category->Getid(); ?>"
                       class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
