<?php
trait InsertForm
{
    //Добавление данных в бд
    public static function insertIntoDb($table, $data) {
        $db = Db::getConnection();

        //Извлекаем ключи передаваемого массива значений (будут использоваться как название столбцов БД)
        $keys = implode(', ', array_keys($data));

        //Преобразуем ключи в вид placeholders для PDO
        $string = ":" . implode(", :", array_keys($data));

        //Сохраняем массив с placeholders
        $placeholders = explode(", ", $string);

        //объединяем массив с placeholders и значениями для передачи в execute
        $values = array_combine($placeholders, $data);

        //Формируем SQL запрос
        $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$string})";
//        var_dump($sql);
//  var_dump($values);
//  var_dump($_SESSION);
        $statement = $db->prepare($sql);
       $statement->execute($values);


    }

    //Формирование имени файла
    public function uploadImage($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if(!($extension == '')) {
            $filename = uniqid() . "." . $extension;
            move_uploaded_file($image['tmp_name'], ROOT."/uploads/" . $filename);
        } else {
            $filename = "noimage.jpg";
        }
        return $filename;
    }

}