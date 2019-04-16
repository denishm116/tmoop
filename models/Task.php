<?php

class Task
{
    public function taskShow($table, $userid)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM {$table} WHERE userid = {$userid}";
        $stmt = $db->prepare($sql);
        $params = [':userid'=>$userid];
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public static function getTaskById ($table, $id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $sql = "SELECT * FROM {$table} WHERE id={$id}";
            $result = $db->query($sql);
            $newsItem = $result->fetch(PDO::FETCH_ASSOC);
            return $newsItem;
        }
    }


    public function ParametersString (array $data)
    {
        $string = '';
        $keys = array_keys($data);
        $string = $keys[0]. " = :".$keys[0];
        $string = rtrim($string, ' AND ');
        return $string;
    }

//Функция для редактирования записей в таблице задач
    public function updateTaskIntoDb ($table, array $data)
    {
        $db = Db::getConnection();
        $keys = array_keys($data);
        unset($keys[0]);
        $string = '';
        foreach ($keys as $key) {
            $string .= $key . ' = :' . $key . ', ';
        }
        $keys = rtrim($string, ', ');
        $where_string = $this->ParametersString($data);
        $sql = "UPDATE {$table} SET {$keys} WHERE {$where_string}";
        $statement = $db->prepare($sql);
        $statement->execute($data);
    }



    public function updateTask($table, $data, $file, $id)
    {
        $filename = File::fileCheck($table, $file, $id);
        $data['img'] = $filename;
    $this->updateTaskIntoDb($table, $data);

    }


}