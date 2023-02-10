<?php
class SubscribeController {
    private $model;

    public function __construct(SubscribeModel $model)
    {
        $this->model = $model;
    }
}