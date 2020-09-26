<?php

class Plato extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje="";
        // echo "<p>Nuevo controlador main</p>";
    }
    function render(){
      $plato=$this->model->get();
      $this->view->datos=$plato;
      $this->view->render('plato/index');
    }

    function nuevo(){
      $this->view->render('plato/crear');
    }

    function getPlatos(){
      $plato=$this->model->get();
      echo json_encode($plato);
    }
    function verPlato($param){
      $idPlato=$param[0];
      $plato=$this->model->getById($idPlato);

      session_start();
      $_SESSION['id_plato']=$idPlato;

      $this->view->plato=$plato;
      // var_dump($this->view->cliente);
      $this->view->render('plato/editar');
    }

    function registrarPlato(){
        $descripcion=$_POST['txtDescripcion'];
        $precio=$_POST['txtPrecio'];
        $stock=$_POST['txtStock'];
        $fecha_registro=date("Y-m-d H:i:s");
        $id_usuario_registro=2;
        $fecha_modificacion=date("Y-m-d H:i:s");
        $id_usuario_modificacion=1;
        $estado=1;
        $mensaje="";

        if($this->model->insert(
            [
                'descripcion'=>$descripcion,
                'precio'=>$precio,
                'stock'=>$stock,
                'fecha_registro'=>$fecha_registro,
                'id_usuario_registro'=>$id_usuario_registro,
                'fecha_modificacion'=>$fecha_modificacion,
                'id_usuario_modificacion'=>$id_usuario_modificacion,
                'estado'=>$estado
            ]
        )){

            $mensaje="Plato registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al registrar el plato";
        }

        $this->view->mensaje=$mensaje;
        $this->render();
    }

    function actualizarPlato(){
        session_start();
        $id_plato=$_SESSION['id_plato'];
        $descripcion=$_POST['txtDescripcion'];
        $precio=$_POST['txtPrecio'];
        $stock=$_POST['txtStock'];
        $fecha_modificacion=date("Y-m-d H:i:s");
        $id_usuario_modificacion=1;
        $estado=1;

        $mensaje="";

        unset($_SESSION['id_plato']);

        if($this->model->update(
            [
                'id_plato'=>$id_plato,
                'descripcion'=>$descripcion,
                'precio'=>$precio,
                'stock'=>$stock,
                'fecha_modificacion'=>$fecha_modificacion,
                'id_usuario_modificacion'=>$id_usuario_modificacion,
                'estado'=>$estado
            ]
        )){
            $mensaje="Plato actualizado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al actualizar el plato";
        }

        $this->view->mensaje=$mensaje;
        header('Location: '.constant('URL').'plato');
    }

    function eliminarPlato($param){

        $id_plato=$param[0];

        $mensaje;

        if($this->model->delete(
            [
                'id_plato'=>$id_plato
            ]
        )){
            $mensaje=[
              'mensaje'=>"Plato eliminado correctamente",
              'value'=>true
            ];
        }else{
          $mensaje=[
            'mensaje'=>"Hubo un inconveniente al eliminar el plato",
            'value'=>true
          ];
        }
        echo json_encode($mensaje);
        // $this->view->mensaje=$mensaje;
        // $this->render();
    }


}

?>
