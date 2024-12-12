<?php
class App{

    protected $controller="Home";
    protected $action="Show";
    protected $params=[];
    function __construct(){
        $arr = $this->UrlProcess();
        // Controller
        if( file_exists("./mvc/controllers/".$arr[0].".php") ){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params );
        // echo $this->action;
    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            if (!isset($_GET["page"])) {
                $_SESSION["page"] = 1;
              } else {
                $_SESSION["page"] = $_GET["page"];
        
              }
           $ur= explode("/", filter_var(trim($_GET["url"], "/")));
           return $ur;
        }
    }

}
?>