<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mt-20 mb-20 relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th class="px-6 py-3">Auteur</th>
            <th class="px-6 py-3">Titre de l'article</th>
            <th class="px-6 py-3">Commentaire</th>
            <th class="px-6 py-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['comments'] as $comment) { ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $comment->getAuthor(); ?></td>
                <td class="px-6 py-4"><?php echo $comment->getArticleTitle() ?></td>
                <td class="px-6 py-4"><?php echo $comment->getContent() ?></td>
                <td class="px-6 py-4">
                    <a href="/admin/comments/delete?id=<?php echo $comment->Getid(); ?>"
                       class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
