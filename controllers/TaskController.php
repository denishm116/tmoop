<?php

require_once (ROOT.'/models/Task.php');
require_once (ROOT.'/models/InsertForm.php');
require_once (ROOT.'/models/File.php');
class TaskController
{
    use InsertForm;

    private $table = "tasks";

    public function actionShow()
    {
        $tasks = array();
        $task = new Task;
        $tasks = $task->taskShow($this->table, $_SESSION['userid']);
        require_once(ROOT . '/views/task/index.php');
    }

    public function actionCreate()
    {

        if ($_POST) {
            $filename = $this->uploadImage($_FILES['image']);
            $data = $_POST;
            $data['img'] = $filename;
            $id = $_SESSION['userid'];
            $data['userid'] = $id;
            $this->insertIntoDb($this->table, $data);
            header('Location: /task/show');

        }
        require_once (ROOT.'/views/task/add_task_form.php');


    }

    public function actionView($id)
    {
        $newsItem = Task::getTaskById($this->table, $id);
        require_once (ROOT.'/views/task/view.php');
    }

    public function actionEdit($id)
    {

        if ($_POST) {
            $data = $_POST;
            $file = $_FILES;
            $edit = new Task();
            $edit->updateTask($this->table, $data, $file, $id);
            header('Location: /task/show');
            exit();
            }
        $newsItem = Task::getTaskById($this->table, $id);
        require_once(ROOT . '/views/task/edit_task_form.php');


    }

    public function actionDelete($id)
    {
        $db = Db::getConnection();
        $db->exec("DELETE FROM tasks WHERE id = '$id'");

        header('Location: /task/show');

    }
}