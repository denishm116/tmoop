<?php

class HelloController
{
    public function actionHi()
    {
        echo Template::render('hello',array());
    }
}