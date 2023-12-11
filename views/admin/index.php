<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mt-20 mb-20 relative overflow-x-auto">
    <a href="/admin/article/add"
       class="absolute top-0 right-0 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-5">Ajouter
        un article</a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3">Titre</th>
            <th class="px-6 py-3">Catégorie</th>
            <th class="px-6 py-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['articles'] as $articles) { ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $articles->getTitle(); ?></td>
                <td class="px-6 py-4"><?php echo $articles->getCategory() ?></td>
                <td class="px-6 py-4">
                    <a href="/admin/article/edit?id=<?php echo $articles->Getid(); ?>"
                       class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
                    <a href="/admin/article/delete?id=<?php echo $articles->Getid(); ?>"
                       class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>