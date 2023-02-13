<?php
class SubscribeController
{
    private $model;

    public function __construct(SubscribeModel $model)
    {
        $this->model = $model;
    }
    public function sub()
    {
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

                $hash = password_hash($password, PASSWORD_DEFAULT);
                if ($this->model->register($email, $hash)) {
                    header("Location: index.php?page=login");
                } else {
                    $errors["execute"] = "Un problème est survenu veuillez réessayer ultérieurement";
                }
            }
            return $errors;
        }
    }
}
