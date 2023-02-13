<?php
class LogoutView
{
    private $controller;
    private $template;
    public function __construct(LogoutController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "logout.php";
    }

    public function render()
    {
        require($this->template);
    }
}