<?php
$title = array("headerTitle" => "Telefoot- Se connecter");
include("header.php");
?>
<main>
    <h1>J'ai oublié mon mot de passe :(</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="inputEmail">Email :</label>
            <input type="email" name="email" id="inputEmail">
        </div>
        <input type="submit" value="Envoyer">
    </form>
</main>
<?php
include("footer.php");
?>