<?php
$title = array("headerTitle" => "Telefoot- Créer un compte");
include("header.php");
?>
<main>
    <h1>Création d'un compte utilisateur</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="inputEmail">Email : </label>
            <input type="email" name="email" id="inputEmail" value="<?= $email ?? "" ?>">
            <?php if (isset($data["email"])) {
            ?>
                <p class="error"><?= $data["email"] ?></p>
            <?php
            }  ?>
        </div>
        <div class="form-group">
            <label for="inputConfirmEmail">Confirmez L'email : </label>
            <input type="email" name="ConfirmEmail" id="inputConfirmEmail" value="<?= $confirmEmail ?? "" ?>">
            <?php if (isset($data["ConfirmEmail"])) {
            ?>
                <p class="error"><?= $data["ConfirmEmail"] ?></p>
            <?php
            } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword">Mot de passe : </label>
            <input type="password" name="password" id="inputPassword" value="<?= $password ?? "" ?>">
            <?php if (isset($data["password"])) {
            ?>
                <p class="error"><?= $data["password"] ?></p>
            <?php
            }?>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword">Confirmez le mot de passe : </label>
            <input type="password" name="ConfirmPassword" id="inputConfirmPassword" value="<?= $confirmPassword ?? "" ?>">
            <?php if (isset($data["ConfirmPassword"])) {
            ?>
                <p class="error"><?= $data["ConfirmPassword"] ?></p>
            <?php
            } ?>
        </div>
        <input type="submit" value="Création du compte">
    </form>
    <h3>Déja un compte ?</h3>
    <a href="./index.php?page=login">Se connecter</a>
</main>
<?php
include("footer.php");
?>