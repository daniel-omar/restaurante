<?php

class Pedido extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje="";
        // echo "<p>Nuevo controlador main</p>";
    }
    function render(){
      $pedido=$this->model->get();
      $this->view->datos=$pedido;
      $this->view->render('pedido/index');
    }

    function nuevo(){
      $this->view->render('pedido/crear');
    }

    function verMesa($param){
      $idPedido=$param[0];
      $pedido=$this->model->getById($idPedido);

      session_start();
      $_SESSION['id_pedido']=$idPedido;

      $this->view->cliente=$pedido;
      // var_dump($this->view->cliente);
      $this->view->render('pedido/editar');
    }

    function registrarMesa(){
        $nombre=$_POST['txtNombre'];
        $apellidos=$_POST['txtApellidos'];
        $direccion=$_POST['txtDireccion'];
        $edad=$_POST['txtEdad'];
        $ciclo=$_POST['cbCiclo'];
        $email=$_POST['txtEmail'];
        $fech_create=date("Y-m-d H:i:s");

        $mensaje="";

        if($this->model->insert(
            [
                'nombre'=>$nombre,
                'apellidos'=>$apellidos,
                'direccion'=>$direccion,
                'edad'=>$edad,
                'ciclo'=>$ciclo,
                'email'=>$email,
                'fech_create'=>$fech_create
            ]
        )){

            $mensaje="Alumno registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al registrar el alumno";
        }

        $this->view->mensaje=$mensaje;
        $this->render();
    }

    function actualizarMesa(){
        session_start();
        $id_cliente=$_SESSION['id_pedido'];
        $nombre=$_POST['txtNombre'];
        $apellido_Paterno=$_POST['txtApellidoPaterno'];
        $apellido_Materno=$_POST['txtApellidoMaterno'];
        $tipo_documento=$_POST['cboDocumento'];
        $numero_documento=$_POST['txtNumDocumento'];
        $email=$_POST['txtEmail'];
        $telefono=$_POST['txtTelefono'];
        $observacion=$_POST['txtObservacion'];
        $fecha_registro=date("Y-m-d H:i:s");

        $mensaje="";

        unset($_SESSION['id_pedido']);

        if($this->model->update(
            [
                'Id_Cliente'=>$id_cliente,
                'Nombre'=>$nombre,
                'Apellido_Paterno'=>$apellido_Paterno,
                'Apellido_Materno'=>$apellido_Materno,
                'Tipo_Documento'=>$tipo_documento,
                'Num_Documento'=>$numero_documento,
                'Email'=>$email,
                'Telefono'=>$telefono,
                'Observacion'=>$observacion
            ]
        )){
            $mensaje="Alumno registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al actualizar el cliente";
        }

        $this->view->mensaje=$mensaje;
        header('Location: '.constant('URL').'cliente');
    }

    function eliminarMesa($param){

        $id_pedido=$param[0];

        $mensaje;

        if($this->model->delete(
            [
                'Id_Cliente'=>$id_pedido
            ]
        )){
            $mensaje=[
              'mensaje'=>"Cliente eliminado correctamente",
              'value'=>true
            ];
        }else{
          $mensaje=[
            'mensaje'=>"Hubo un inconveniente al eliminar el cliente",
            'value'=>true
          ];
        }
        echo json_encode($mensaje);
        // $this->view->mensaje=$mensaje;
        // $this->render();
    }


}

?>
