<?php
/**
 * Created by PhpStorm.
 * User: ДенисПК
 * Date: 25.04.2019
 * Time: 16:42
 */

class Template
{

    public static function render($tmp, $vars = array())
    {
        if (file_exists(ROOT.'/views/templates/' . $tmp . '.tpl')) {
            ob_start();
            extract($vars);
            require (ROOT."/views/templates/".$tmp.".tpl");
            return ob_get_clean();
        }


    }
}