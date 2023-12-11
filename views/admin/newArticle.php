<div class="mt-20 mb-20">
    <form class="w-4/5 mx-auto" method="post" action="/admin/article/create">
        <div class="mb-5">
            <input type="hidden" name="author_id" value="<?php echo $_SESSION['admin']->getId() ?>">
            <label for="Titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input type="text" id="Titre" name="title"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required>
        </div>
        <div class="mb-5">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catégorie</label>
            <select name="category_id">
                <?php foreach ($_SESSION['categories'] as $category) { ?>
                    <option value="<?php echo $category->getId() ?>"><?php echo $category->getLibelle() ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-5">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu</label>
            <textarea id="content" name="content"
                      class="bg-gray-50 h-1/2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      required></textarea>
        </div>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
    </form>

</div>