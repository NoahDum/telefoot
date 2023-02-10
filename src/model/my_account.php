<?php
class AccountModel
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}