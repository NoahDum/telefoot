<?php
$title = array("headerTitle" => "Telefoot- Se connecter");
include("header.php");

$message = "";
if (!empty($_POST)) {
    $email = trim(strip_tags($_POST["email"]));
    $password = trim(strip_tags($_POST["password"]));

    $dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

    // Récupération de l'utilisateur à partir de l'email
    $query = $db->prepare("SELECT * FROM users WHERE email LIKE :email");
    $query->bindParam(":email", $email);
    $query->execute();
    $result = $query->fetch();
    // if ($password === result["password]) pas possible car nous avons d'un coté une donnée non cryptée et de l'autre une donnée crytée 

    // if (password_hash($password,PASSWORD_DEFAULT) === result["password]) pas possible non plus car le hash généré par le password _hash change à chaque appel;

    // password_verify va nous permettre de vérifier la correspondance entre le mot de passe saisie et le hash stocké en BDD
    // la fonction va nous retourner TRUE si le mot de passe est ok ou FALSE si il ne l'est pas  
    if (!empty($result) && password_verify($password, $result["password"])) {
        // les informations de connexion sont correctes on peut donc donner acces à l'utilisateur à des pages protégées
        // Demarrage du système de session
        session_start();
        // création d'une variable de session
        // On stock l'adresse ip de l'utilisateur pour palier à une possible attaque "session hijacking"
        // Pour obtenir l'adresse ip de l'utilisateur (client) on utilise : $_SERVER["REMOTE_ADDR"] 
        $_SESSION["user"] = [
            "id" => $result["id"],
            "email" =>  $result["email"],
            "ip" => $_SERVER["REMOTE_ADDR"]
        ];
        // redirection vers la page d'accueil
        header("Location: ./index.php?page=my_account");
    } else {
        // Les informations saisies sont incorrectes 
        $message = "<p>Impossible de se connecter avec les informations saisies, veuillez rééesayer</p>";
    };
}
?>
<main>
    <h1>Connexion à l'espace utilisateur</h1>
    <?= $message ?>
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