<?php
namespace MyApp;

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/mvc/")
        {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2); //array(2) { [0]=> string(10) "controller" [1]=> string(6) "action" }
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2); // http://localhost/mvc/controller/action/param/tu  array(2) { [0]=> string(5) "param" [1]=> string(2) "tu" }
        }

    }
}