<?php

class Main extends Controller{
    function __construct()
    {
        parent::__construct();
        
        // echo "<p>Nuevo controlador main</p>";
    }
    function render(){
        $this->view->render('main/index');
    }

    function saludo(){
        echo "<p>Metodo saludo ejecutado</p>";
    }
}

?>