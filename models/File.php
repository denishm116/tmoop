<?php
/**
 * Created by PhpStorm.
 * User: ДенисПК
 * Date: 16.04.2019
 * Time: 17:51
 */

class File
{

    public static function uploadImage($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if(!($extension == '')) {
            $filename = uniqid() . "." . $extension;
            move_uploaded_file($image['tmp_name'], "uploads/" . $filename);
        } else {
            $filename = "noimage.jpg";
        }
        return $filename;
        }

    //Функция чекает изменение имени файла при редактировании задачи.
    public static function fileCheck ($table, $fn, $id)

    {
        $db = Db::getConnection();
      
        if (empty($fn['image']['name'])) {
            $sql = "SELECT * FROM $table WHERE id = '$id'";
            $statement = $db->prepare($sql);
            $statement->execute();
            $array = $statement->fetch();
            $filename = $array['img'];

            return $filename;
        } else {

            $filename = File::uploadImage($_FILES['image']);
        }

        return $filename;
    }

}