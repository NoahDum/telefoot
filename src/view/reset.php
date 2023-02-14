<?php
class ResetView
{
    private $controller;
    private $template;
    public function __construct(ResetController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "reset.php";
    }

    public function render()
    {
        $this->controller->reset_password();
        require($this->template);
    }
}