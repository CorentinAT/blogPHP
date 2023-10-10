<?php require("../structure/header.php"); require("../traitement/config.php"); require("../traitement/sql.php");
$articleId = intval(parse_url($_GET['id'], PHP_URL_PATH));
$article = get_article($articleId);
$_SESSION["id_article"] = $articleId;
if($article === false) {
    header('Location: /pages/article_existe_pas.php');
} else {
    ?>
    <div class="container mx-auto px-4 mt-12">
        <article title="<?php echo $article['titre'] ?>" class="prose prose-lg mx-auto">
            <h1 class="text-4xl font-semibold mb-4">
                <?php echo $article['titre'] ?>
            </h1>
            <div aria-label="contenu article" class="text-lg leading-relaxed">
                <?php echo $article['description'] ?>
            </div>
        </article>

        <!-- Section de commentaires -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold mb-4">Commentaires</h2>
            <?php
                if (!empty($_SESSION["id_user"])){ ?>
                    <form method="post" action="/traitement/traitement_forms.php" class="space-y-4">
                        <div>
                            <label for="commentaire" class="block text-sm font-medium text-gray-600">Votre commentaire :</label>
                            <textarea id="commentaire" name="commentaire" required rows="5" class="w-full p-2 border rounded-md resize-none"></textarea>
                        </div>
                        <div>
                            <button  name="form_name" value="commentaire_form" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Envoyer</button>
                        </div>
                    </form> <?php
                } else {
                    ?>
                        <h2 class="text-red-500">Veuillez vous connecter pour commenter</h2>
                    <?php
                }
            ?>

            <!-- Afficher les commentaires ici -->
            <?php
            $commentaires = get_commentaires_article($articleId);
            if ($commentaires) {
                foreach ($commentaires as $commentaire) {
                    echo "<div class='border-t mt-4 pt-4'>";
                    echo "<p class='font-medium'>" . htmlspecialchars($commentaire['pseudo'] != "" ? $commentaire['pseudo'] : $commentaire['email']) . "</p>";
                    echo "<p class='text-sm'>" . $commentaire['description'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-gray-500'>Pas encore de commentaires. Soyez le premier à commenter !</p>";
            }
            ?>
        </div>
    </div>
    <?php
}?>

<?php require("../structure/footer.php"); ?>
