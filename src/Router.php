<?php 
namespace App;

class Router extends \AltoRouter {

    private $view ;


    public function __construct(string $view)
    {
        $this->view = $view;
    }


    public function get( string $route, $target, string $name = null){
        $this->map('GET', $route, function() use ($target){
            require $this->view . DIRECTORY_SEPARATOR . $target. '.php';
        },$name);
    }

    public function run(){
        $match = $this->match();
        if($match){
            $match['target']();
        }
    }
}