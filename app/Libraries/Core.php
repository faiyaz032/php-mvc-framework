<?php

namespace App\Libraries;

error_reporting(E_ALL & ~ E_NOTICE);

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
    //    print_r($this->getUrl()); 
        
        $url = $this->getUrl();

        // Look in Controllers for first value
        if(file_exists('../App/Controllers/'.ucwords($url[0]) . '.php')){
            //If exists then set as controller
            $this->currentController = ucwords($url[0]);
            //unset 0 index
            unset($url[0]);
        }

        //Require the Controller
        require_once '../App/Controllers/'.$this->currentController . '.php';

        //instantiate controller class
        $this->currentController = new $this->currentController;

    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
