<?php
//require_once (ROOT.'/models/User.php');
//require_once (ROOT.'/models/InsertForm.php');

class UserController
    {
    //Подключаем трейт
        use InsertForm;

    //Объявляем свойства класса
        private $data;
        private $table = "users";
        public $check;


    //Объявляем конструктор класса, создаем экземпляр класса
        public function __construct()
        {
            $this->data = $_POST;
            $this->check = new User();

        }


    //Регистрируем пользователя
        public function actionRegister()
        {
            if($_POST) {
                $this->check->checkFormEmpty($this->data);
                User::checkRegisteredUsers($this->data);
                InsertForm::insertIntoDb($this->table, $this->data);
                header('Location: /user/login');
                exit;
            }
            echo Template::render('register');
            exit;
        }



        //Логинимся
        public function actionLogin()
        {
            if ($_POST) {
                $this->check->checkFormEmpty($this->data);
                User::login($this->table, $this->data);
                header('Location: /task/show');
                exit;
        }
            echo Template::render('login');
            exit;
        }

    //Логаут и удаление сессии.
        public function actionLogout()
        {
            $_SESSION = array();
            session_destroy();
            header('Location: /user/login');
        }
    }