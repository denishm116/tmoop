<?php

//require_once (ROOT.'/models/Task.php');
//require_once (ROOT.'/models/InsertForm.php');
//require_once (ROOT.'/models/File.php');
class TaskController
{
    //Подключаем трейт
    use InsertForm;

    //Объявляем свойства класса
    private $table = "tasks";
    public $taskItem;

    //Объявляем конструктор класса, создаем экземпляр класса
    public function __construct()
    {
        $this->taskItem = new Task();
    }

    //Отображаем список задач
    public function actionShow()
    {
        $vars = $this->taskItem->taskShow($this->table, $_SESSION['userid']);

        echo Template::render('tasklist', $vars);
        exit;

    }

    //Создаем задачу
    public function actionCreate()
    {
        if ($_POST) {
            $filename = $this->uploadImage($_FILES['image']);
            $data = $_POST;
            $data['img'] = $filename;
            $id = $_SESSION['userid'];
            $data['userid'] = $id;
            $this->insertIntoDb($this->table, $data);
            $this->actionShow();
        }
        echo Template::render('addtask');
        exit;
    }

    //Отображаем конкретную задачу
    public function actionView($id)
    {
        $vars = $this->taskItem->getTaskById($this->table,$id);
        echo Template::render('viewtask', $vars);
//        require_once (ROOT.'/views/task/view.php');
        exit;
    }

    //Редактируем задачу
    public function actionEdit($id)
    {
        if ($_POST) {
            $data = $_POST;
            $file = $_FILES;
            $edit = new Task();
            $vars = $edit->updateTask($this->table, $data, $file, $id);
            $this->actionShow();
            exit();
            }
        $vars = $this->taskItem->getTaskById($this->table, $id);
        echo Template::render('edittask', $vars);
        exit;
    }

    //Удаляем задачу
    public function actionDelete($id)
    {
        $this->taskItem->deleteTask($id);
        $this->actionShow();
    }
}