<?php
class AccountView
{
    private $controller;
    private $template;
    public function __construct(AccountController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "my_account.php";
    }

    public function render()
    {
        $dataChannel = $this->controller->get();
        $dataReplay = $this->controller->getreplay();
        $dataLigue1 = $this->controller->getLigue1();
        $dataLigue2 = $this->controller->getLigue2();
        require($this->template);
    }
}