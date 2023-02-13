<?php
class LoginController {
    private $model;

    public function __construct(LoginModel $model)
    {
        $this->model = $model;
    }
    public function log(){
        $message = "";
        if (!empty($_POST)) {
            $email = trim(strip_tags($_POST["email"]));
            $password = trim(strip_tags($_POST["password"]));
            // Récupération de l'utilisateur à partir de l'email
            $query = $this->model->db->prepare("SELECT * FROM users WHERE email LIKE :email");
            $query->bindParam(":email", $email);
            $query->execute();
            $result = $query->fetch();
            if (!empty($result) && password_verify($password, $result["password"])) {
                session_start();
                $_SESSION["user"] = [
                    "id" => $result["id"],
                    "email" =>  $result["email"],
                    "ip" => $_SERVER["REMOTE_ADDR"]
                ];
                // redirection vers la page d'accueil
                header("Location: ./index.php?page=my_account");
            } else {
                session_start();
                $_SESSION['message'] = "<p>Impossible de se connecter avec les informations saisies, veuillez réessayer</p>";
            };
        }
    }
}