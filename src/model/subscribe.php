<?php
class SubscribeModel
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function register($email, $hash){

        $query = $this->db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $hash);
        return $query->execute();
    }
}