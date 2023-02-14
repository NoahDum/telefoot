<?php
require("../vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

define("HOST", "http://localhost/telefoot/"); 

class ResetController
{
    private $model;

    public function __construct(ResetModel $model)
    {
        $this->model = $model;
    }
    public function reset_password()
    {

        if (isset($_POST["email"])) {
            $email = trim(strip_tags($_POST["email"]));

            // La fonction random_bytes rencoie un binaire que nous allons transformer en une chaine de caractère hexadéciamale avec la fonction bin2hex--> c'est ainsi que l'on obtient notre token
            // si nous indiquons 50 en paramètre de la fonction random_bytes nous obtiendrons un token de 100 caractères avec bin2hex
            $token = bin2hex(random_bytes(50));
            $this->model->reset($email, $token);
            if ($this->model->reset($email, $token)) {

                // On valide que l'insertion en BDD est bien réalisée avant de faire l'envoi du mail 

                // Appel au constructeur de la classe PHPMailer 
                $phpmailer = new PHPMailer();
                // On indique que l'on utilise le protocole SMTP
                $phpmailer->isSMTP();
                // Information du compte Mailtrap
                $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = 2525;
                $phpmailer->Username = '6b6dbb89573de2';
                $phpmailer->Password = 'f8c3fa53af9164';

                // Expéditeur
                $phpmailer->From = "no-reply@toto.fr";
                // Nom à afficher à la place de l'adresse mail dans le client mail
                $phpmailer->FromName = "Team DWWM";

                // Destinataire 
                $phpmailer->addAddress($email);

                // On indique que le contenu de l'email sera du code html
                $phpmailer->isHTML();

                // Encodage de caractères (UTF8)
                $phpmailer->CharSet = "UTF-8";

                // Sujet du mail
                $phpmailer->Subject = "Rénitialisation du mot de passe";

                // Corps du mail
                $phpmailer->Body = "<a href=\"" . HOST . "index.php?page=new_password&token={$token}\">Rénitialisation du mot de passe</a>";

                // Envoi de l'email
                $phpmailer->send();
            }
        }
    }
}
