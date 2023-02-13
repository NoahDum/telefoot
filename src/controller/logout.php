<?php
class LogoutController {
    private $model;

    public function __construct(LogoutModel $model)
    {
        $this->model = $model;
    }
}