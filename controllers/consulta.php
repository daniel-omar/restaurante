<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->datos=[];
    }
    function render(){
        $alumnos=$this->model->get();
        
        $this->view->datos=$alumnos;
        $this->view->render('consulta/index');
    }

}

?>