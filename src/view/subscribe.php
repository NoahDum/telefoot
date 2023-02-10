<?php
class SubscribeView
{
    private $controller;
    private $template;
    public function __construct(SubscribeController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "subscribe.php";
    }

    public function render()
    {
        require($this->template);
    }
}