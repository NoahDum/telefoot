<?php
class AccountController {
    private $model;

    public function __construct(AccountModel $model)
    {
        $this->model = $model;
    }
    public function get()
    {
        $query = $this->model->db->query("SELECT * FROM club WHERE ligue =\"channel\"");
        $channel = $query->fetchAll(PDO::FETCH_ASSOC);

        return $channel;
    }
    public function getreplay()
    {
        $query = $this->model->db->query("SELECT * FROM club WHERE ligue =\"replay\"");
        $replay = $query->fetchAll(PDO::FETCH_ASSOC);

        return $replay;
    }
    public function getLigue1()
    {
        $query = $this->model->db->query("SELECT * FROM club WHERE ligue =\"ligue1\"");
        $ligue1 = $query->fetchAll(PDO::FETCH_ASSOC);

        return $ligue1;
    }
    public function getLigue2()
    {
        $query = $this->model->db->query("SELECT * FROM club WHERE ligue =\"ligue2\"");
        $ligue2 = $query->fetchAll(PDO::FETCH_ASSOC);

        return $ligue2;
    }
}