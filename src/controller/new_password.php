<?php
class NewController {
    private $model;

    public function __construct(NewModel $model)
    {
        $this->model = $model;
    }

}