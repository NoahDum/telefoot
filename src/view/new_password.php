<?php
class NewView
{
    private $controller;
    private $template;
    public function __construct(NewController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "new_password.php";
    }

    public function render()
    {
        require($this->template);
    }
}