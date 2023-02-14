<?php
class ResetModel
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function reset($email,$token)
    {
        $query = $this->db->prepare("INSERT INTO password_reset (email, token) VALUES (:email, :token)");
        $query->bindParam(":email", $email);
        $query->bindParam(":token", $token);
        return $query->execute();
    }
}