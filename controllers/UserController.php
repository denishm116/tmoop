<?php
require_once (ROOT.'/models/User.php');
require_once (ROOT.'/models/InsertForm.php');

class UserController
    {
        use InsertForm;

        private $data;
        private $table = "users";


    public function actionRegister()
    {

           if($_POST) {
               $this->data = $_POST;
               $this->data['password'] = md5($_POST['password']);
               User::checkRegisteredUsers($this->data);
               InsertForm::insertIntoDb($this->table, $this->data);
               header('Location: /user/login');
       }
        require_once (ROOT.'/views/user/register.php');

    }

    public function actionLogin()
    {
        if ($_POST) {
            $this->data = $_POST;
            $this->data['password'] = md5($_POST['password']);
            User::login($this->table, $this->data);
            header('Location: /task/show');

        }


        require_once (ROOT.'/views/user/login.php');
        return true;
    }



}