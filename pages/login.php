
<?php require("../structure/header.php"); require_once("../traitement/config.php") ?>
<div class="h-full w-full flex justify-center items-center">
    <div class="max-w-md w-full bg-grey-400 p-8 rounded-lg shadow-md flex flex-col justify-center items-center space-y-4">
        <h1 class="text-2xl md:text-3xl mb-4">LOGIN</h1>
        <form method="post" lang="fr" title="login form" name="login_form" action="../traitement/auth.php" class="w-full">
            <div class="mb-4">
                <label for="email" class="block text-sm md:text-base font-medium text-gray-600">Email:</label>
                <input id="email" type="email" name="email" alt="mail utilisateur" required placeholder="exemple@domaine.com" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm md:text-base font-medium text-gray-600">Mot de passe:</label>
                <input id="password" type="password" name="password" alt="mot de passe utilisateur" required placeholder="Votre mot de passe" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="flex justify-center">
                <button name="form_name" value="login_form" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>



<?php require("../structure/footer.php"); ?>

