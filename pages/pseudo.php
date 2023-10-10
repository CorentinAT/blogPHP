
<?php require("../structure/header.php"); require("../traitement/config.php");?>
<div class="h-full w-full flex justify-center items-center">
    <div class="max-w-md w-full bg-grey-400 p-8 rounded-lg shadow-md flex flex-col justify-center items-center space-y-4">
        <h1 class="text-2xl md:text-3xl mb-4">Première Connexion: Pseudo</h1>
        <form method="post" lang="fr" title="login form" name="login_form" action="../traitement/traitement_forms.php" class="w-full">
            <div class="mb-4">
                <label for="pseudo" class="block text-sm md:text-base font-medium text-gray-600">Pseudo:</label>
                <input id="pseudo" type="text" name="pseudo" alt="pseudo utilisateur" placeholder="PhpPourLaVie" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="flex justify-center">
                <button name="form_name" value="pseudo_form" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                    Continuer
                </button>
            </div>
        </form>
    </div>
</div>



<?php require("../structure/footer.php"); ?>

