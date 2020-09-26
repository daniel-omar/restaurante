<?php

class Mesa extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje="";
        // echo "<p>Nuevo controlador main</p>";
    }
    function render(){
      $mesa=$this->model->get();
      $this->view->datos=$mesa;
      $this->view->render('mesa/index');
    }

    function nuevo(){
      $this->view->render('mesa/crear');
    }

    function verMesa($param){
      $id_mesa=$param[0];
      $mesa=$this->model->getById($id_mesa);

      session_start();
      $_SESSION['id_mesa']=$id_mesa;

      $this->view->mesa=$mesa;
      // var_dump($this->view->cliente);
      $this->view->render('mesa/editar');
    }

    function registrarMesa(){
        $cod_mesa=$_POST['txtCodigo'];
        $cantidad=$_POST['txtCantidad'];
        $ubicacion=$_POST['txtUbicacion'];
        $fecha_registro=date("Y-m-d H:i:s");
        $fecha_modificacion=date("Y-m-d H:i:s");
        $estado=true;

        $mensaje="";

        if($this->model->insert(
            [
                'cod_mesa'=>$cod_mesa,
                'cantidad'=>$cantidad,
                'ubicacion'=>$ubicacion,
                'fecha_registro'=>$fecha_registro,
                'fecha_modificacion'=>$fecha_modificacion,
                'estado'=>$estado
            ]
        )){
            $mensaje="Mesa registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al registrar el mesa";
        }

        $this->view->mensaje=$mensaje;
        $this->render();
    }

    function actualizarMesa(){
        session_start();
        $id_mesa=$_SESSION['id_mesa'];
        $cod_mesa=$_POST['txtCodigo'];
        $cantidad=$_POST['txtCantidad'];
        $ubicacion=$_POST['txtUbicacion'];
        $fecha_modificacion=date("Y-m-d H:i:s");
        $estado=true;

        $mensaje="";

        unset($_SESSION['id_mesa']);

        if($this->model->update(
            [
              'id_mesa'=>$id_mesa,
              'cod_mesa'=>$cod_mesa,
              'cantidad'=>$cantidad,
              'ubicacion'=>$ubicacion,
              'fecha_modificacion'=>$fecha_modificacion,
              'estado'=>$estado
            ]
        )){
            $mensaje="Mesa registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al actualizar el mesa";
        }

        $this->view->mensaje=$mensaje;
        header('Location: '.constant('URL').'mesa');
    }

    function eliminarMesa($param){

        $id_mesa=$param[0];

        $mensaje;

        if($this->model->delete(
            [
                'id_mesa'=>$id_mesa
            ]
        )){
            $mensaje=[
              'mensaje'=>"Mesa eliminada correctamente",
              'value'=>true
            ];
        }else{
          $mensaje=[
            'mensaje'=>"Hubo un inconveniente al eliminar el mesa",
            'value'=>true
          ];
        }
        echo json_encode($mensaje);
        // $this->view->mensaje=$mensaje;
        // $this->render();
    }


}

?>
