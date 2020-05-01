<?php

namespace App\Libraries;

/** 
 * App Core Class
 * Creates URL & loades Core Controller
 * URL FORMAT /Controller/method/params
*/

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        echo $_GET['url'];
    }
}