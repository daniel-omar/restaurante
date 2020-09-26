<?php

class ErrorPage extends Controller{

    function __construct()
    {
        parent::__construct();
        
        // echo "<p>Error al cargar la pagina</p>";
    }
    function render(){
        $this->view->mensaje="Error al cargar el recurso / generico";
        $this->view->render('errorpage/index');
    }

}

?>