<?php

class ClassHome{

    public function index(){
      //return 'Welcome';
      $view = new View('home','home-index');
    }

    public function error(){
        $view = new View('home','home-error');
    }
}