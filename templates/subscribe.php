<?php
$title = array("headerTitle" => "Telefoot- Créer un compte");
include("header.php");

if (!empty($_POST)) {
    $errors = array();

    // Le formulaire à été soumis
    $email = trim(strip_tags($_POST["email"]));
    $password = trim(strip_tags($_POST["password"]));
    $confirmEmail = trim(strip_tags($_POST["ConfirmEmail"]));
    $confirmPassword = trim(strip_tags($_POST["ConfirmPassword"]));

    // VALIDATION DE L'EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "l'email n'est pas valide";
    }

    $uppercase = preg_match("/[A-Z]/", $password);
    $lowercase = preg_match("/[a-z]/", $password);
    $number = preg_match("/[0-9]/", $password);
    $special = preg_match("/[^a-zA-Z0-9]/", $password);

    if (!$uppercase || !$lowercase || !$number || !$special || strlen($password < 8)) {
        $errors["password"] = "Le mot de passe doit contenir 8 caracères minimum, une lettre majuscule, un chiffre et un caractère spécial ";
    }
    if ($password !== $confirmPassword) {
        $errors["ConfirmPassword"] = "Les mots de passe ne correspondent pas";
    }
    if ($email !== $confirmEmail) {
        $errors["ConfirmEmail"] = "Les adresses email ne correspondent pas";
    }
    if (empty($errors)) {
        require("../config/index.php");

        $hash = password_hash($password, PASSWORD_DEFAULT);


        $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
        $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    
        $query = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $hash);
        if ($query->execute()) {
            // Rediriger l'utilisateur vers la page de connexion
            header("Location: index.php?page=login");
        } else {
            // La requete ne s'est pas bien déroulée
            $errors["execute"] = "Un problème est survenu veuillez réessayer ultérieurement";
        }
    }
}


?>
<main>
    <h1>Création d'un compte utilisateur</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="inputEmail">Email : </label>
            <input type="email" name="email" id="inputEmail" value="<?= $email ?? "" ?>">
            <?php if (isset($errors["email"])) {
            ?>
                <p class="error"><?= $errors["email"] ?></p>
            <?php
            }  ?>
        </div>
        <div class="form-group">
            <label for="inputConfirmEmail">Confirmez L'email : </label>
            <input type="email" name="ConfirmEmail" id="inputConfirmEmail" value="<?= $confirmEmail ?? "" ?>">
            <?php if (isset($errors["ConfirmEmail"])) {
            ?>
                <p class="error"><?= $errors["ConfirmEmail"] ?></p>
            <?php
            }  ?>
        </div>
        <div class="form-group">
            <label for="inputPassword">Mot de passe : </label>
            <input type="password" name="password" id="inputPassword" value="<?= $password ?? "" ?>">
            <?php if (isset($errors["password"])) {
            ?>
                <p class="error"><?= $errors["password"] ?></p>
            <?php
            }  ?>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword">Confirmez le mot de passe : </label>
            <input type="password" name="ConfirmPassword" id="inputConfirmPassword" value="<?= $confirmPassword ?? "" ?>">
            <?php if (isset($errors["ConfirmPassword"])) {
            ?>
                <p class="error"><?= $errors["ConfirmPassword"] ?></p>
            <?php
            }  ?>
        </div>
        <input type="submit" value="Création du compte">
    </form>
    <h3>Déja un compte ?</h3>
    <a href="./index.php?page=login">Se connecter</a>
</main>
<?php
include("footer.php");
?>