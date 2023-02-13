<?php
class LoginView
{
    private $controller;
    private $template;
    public function __construct(LoginController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "login.php";
    }

    public function render()
    {
        $data=$this->controller->log();
        require($this->template);
    }
}