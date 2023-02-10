<?php
class ResetController {
    private $model;

    public function __construct(ResetModel $model)
    {
        $this->model = $model;
    }
}