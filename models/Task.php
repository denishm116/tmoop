<?php

class Task
{
    //Объявляем свойства класса
    private $db;

    //Объявляем конструктор класса, создаем экземпляр класса
    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    //Извлекаем записи из БД по ключу ИД пользователя и записываем в массив
    public function taskShow($table, $userid)
    {
        $sql = "SELECT * FROM {$table} WHERE userid = {$userid}";
        $stmt = $this->db->prepare($sql);
        $params = [':userid'=>$userid];
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    }

    //Извлекаем конкретную запись по ИД записи
    public function getTaskById ($table, $id)
    {
        $id = intval($id);
        if ($id) {
            $sql = "SELECT * FROM {$table} WHERE id={$id}";
            $result = $this->db->query($sql);
            $newsItem = $result->fetch(PDO::FETCH_ASSOC);
            return $newsItem;
        }
    }

    //Вспомогательная функция для определения ключа
    public function ParametersString (array $data)
    {
        $string = '';
        $keys = array_keys($data);
        $string = $keys[0]. " = :".$keys[0];
        return $string;
    }

    //Функция для записи отредактированной записи в таблицу задач
    public function updateTaskIntoDb ($table, array $data)
    {
        $keys = array_keys($data);
        unset($keys[0]);
        $string = '';
        foreach ($keys as $key) {
            $string .= $key . ' = :' . $key . ', ';
        }
        $keys = rtrim($string, ', ');
        $where_string = $this->ParametersString($data);
        $sql = "UPDATE {$table} SET {$keys} WHERE {$where_string}";
        $statement = $this->db->prepare($sql);
        $statement->execute($data);
    }

    //Функция для редактирования записей в таблице задач
    public function updateTask($table, $data, $file, $id)
    {
        $filename = File::fileCheck($table, $file, $id);
        $data['img'] = $filename;
        $this->updateTaskIntoDb($table, $data);
    }

    //Скромненькая функция для удаления задачи
    public function deleteTask($id)
    {
        $this->db->exec("DELETE FROM tasks WHERE id = '$id'");
    }
}