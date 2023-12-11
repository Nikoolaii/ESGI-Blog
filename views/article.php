<?php

$article = $_SESSION['article'];
?>

<div class="mt-20 mb-20">
    <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 m-4">
        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
            <?php echo $article->getTitle(); ?>
        </h5>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            <?php echo $article->getContent(); ?>
        </p>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            <?php echo $article->getAuthor(); ?>
        </p>
    </div>
</div>

<div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 m-4">
    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
        Ajouter un commentaire
    </h5>
    <form action="/addComment" method="post">
        <input type="hidden" name="article_id" value="<?php echo $article->getId(); ?>">
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-neutral-600 dark:text-neutral-300" for="content">Contenu</label>
            <textarea class="w-full px-3 py-2 text-base text-neutral-700 placeholder-neutral-500 border border-neutral-300 rounded-lg focus:shadow-outline" id="content" name="content" rows="4" placeholder="Contenu du commentaire" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-neutral-600 dark:text-neutral-300" for="author">Auteur</label>
            <input class="w-full px-3 py-2 text-base text-neutral-700 placeholder-neutral-500 border border-neutral-300 rounded-lg focus:shadow-outline" id="author" name="author" type="text" placeholder="Auteur du commentaire" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_
            9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:bg-white" data-te-ripple-init data-te-ripple-color="light">Ajouter</button>
        </div>
    </form>
</div>

<div class="mb-20">
    <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 m-4">
        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
            Commentaires
        </h5>
        <div>
            <?php
            foreach ($article->getComments() as $comment){
                ?>
                <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 m-4">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        <?php echo $comment->getAuthor(); ?>
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        <?php echo $comment->getContent(); ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>