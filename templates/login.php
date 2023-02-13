<?php
$title = array("headerTitle" => "Telefoot- Se connecter");
include("header.php");
?>
<main>
    <h1>Connexion à l'espace utilisateur</h1>
    <?php if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    } ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="inputEmail">Email : </label>
            <input type="email" name="email" id="inputEmail">
        </div>
        <div class="form-group">
            <label for="inputPassword">Mot de Passe :</label>
            <input type="password" name="password" id="inputPassword">
        </div>
        <input type="submit" value="Se connecter">
    </form>
    <a href="./index.php?page=reset">J'ai oublié mon mot de passe</a>
</main>
<?php
include("footer.php");
?>