<?php
class NewModel
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}