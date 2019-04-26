<?php
/**
 * Created by PhpStorm.
 * User: ДенисПК
 * Date: 14.04.2019
 * Time: 20:18
 */

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include ($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        return $db;
    }

}