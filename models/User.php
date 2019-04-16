<?php

class User
{


    //Проверка на наличие в базе Юзернейм и Емаил
    public static function getOneValue($table, $field, $value)
    {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(*) FROM {$table} WHERE {$field} = :value";
        $stmt = $db->prepare($sql);
        $params = [':value' => $value];
        $rows = $stmt->execute($params);
        $row = $stmt->fetch();
        return $row[0];
    }
    //Проверка на наличие в базе Юзернейм и Емаил
    public static function checkRegisteredUsers($data)
    {
        $count_users = User::getOneValue('users', 'username', $data['username']);
        $count_emails = User::getOneValue('users', 'email', $data['email']);
        if ($count_users > 0) {
            $error = "Пользователь с таким именем уже существует";
            require ROOT . "/config/errors.php";
            exit;
        } elseif ($count_emails > 0) {
            $error = "Пользователь с таким email уже существует";
            require ROOT . "/config/errors.php";
            exit;
        }
    }



    public static function allUsers($table, $data)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM {$table} WHERE email = :email";
        $statement = $db->prepare($sql);
        $data = $data['email'];
        $statement->execute(array(':email' => $data));
        $array = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

//Проверка имени и  парлоя и запись в сессию переменных
    public static function login($table, $data)
    {
        $users = User::allUsers($table, $data);

        foreach ($users as $user) {
            if ($user['email'] == $data['email']) {
                if ($user['password'] == $data['password']) {
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['userid'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                }

            }

        }

    }
}