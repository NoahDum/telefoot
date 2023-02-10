<?php
    session_start();
    $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    

    if(isset($_GET["token"]) && !isset($_SESSION["email"])){

        $token = trim(strip_tags($_GET["token"]));
        // Vérification que le token existe
        $query = $db->prepare("SELECT email FROM password_reset WHERE token like :token");
        $query->bindParam(":token", $token);
        $query->execute();
        $result = $query->fetch();

        if (!empty($result)){
            // Le token existe bel et bien et qu'un mail lui est associé
            // On stocke l'email pour la mise à jour a venir (une fois que le formulaire sera envoyé)
            $_SESSION["email"] = $result["email"];
        }else{
            // Truand bis !
            header("Location: ./index.php");
        }
    } else if (isset($_SESSION["email"]) && isset($_POST["password"])){
        // N'oubliez pas de valider la consitance du mot de passe 

        $password = trim(strip_tags($_POST["password"]));
        // Crytpage du mot de passe 
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $db->prepare("UPDATE users SET password = :password WHERE email LIKE :email");
        $query->bindParam(":password", $hash);
        $query->bindParam(":email", $_SESSION["email"]);
        if ($query->execute()){
            // Possibilité de compléter avec une requete DELETE sur la table password_reset pour purger la ligne en question

            // Nettoyage des variables de sessions
            session_destroy();

            // redirection vers la page de login pour que l'utilisateur puisse se reconnecter avec son nouveau mot de passe 
            header("Location: ./index.php?page=login");
        }
    }else {
        // Truand!
        header("Location: ./index.php");
    }

$title = array("headerTitle" => "Telefoot- Nouveau Mot de passe");
include("header.php");
?>
<main>
    <h1>Nouveau mot de passe</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="inputPassword">Nouveau mot de passe</label>
            <input type="password" name="password" id="inputPassword">
        </div>
        <input type="submit" value="Envoyer">
    </form>
</main>
<?php
include("footer.php");
?>