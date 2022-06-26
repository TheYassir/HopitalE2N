<?php

class Autoload
{
    public static function include($className)
    {

    // str_replace permet de remplacer les '\' par des '/'
        require_once __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
    }
}

// spl_autoload_register s'execute automatiquement lorsqu'il voit passer le mot clé 'new' dans le code
spl_autoload_register(['Autoload', 'include']);
